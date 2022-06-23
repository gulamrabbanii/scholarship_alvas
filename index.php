<?php
// Initialize the session
session_start();
error_reporting(E_ALL & ~E_WARNING  & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);

// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: login-validation.php");
    exit;
}

// Include config file
require_once "db/config.php";

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = htmlspecialchars(strip_tags(trim($_POST["username"])));
    // Check if username is empty
    if (empty($username)) {
        $username_err = "Please enter username.";
    } else {
        $username = $username;
    }

    // Check if password is empty
    $password = htmlspecialchars(strip_tags(trim($_POST["password"])));

    if (empty($password)) {
        $password_err = "Please enter your password.";
    } else {
        $password = $password;
    }

    // Validate credentials
    if (empty($username_err) && empty($password_err)) {
        // Prepare a select statement
        $sql = "SELECT id, username, passwd FROM users WHERE username = ?";

        if ($stmt = $link->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_username);

            // Set parameters
            $param_username = $username;

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Store result
                $stmt->store_result();

                // Check if username exists, if yes then verify password
                if ($stmt->num_rows == 1) {
                    // Bind result variables
                    $stmt->bind_result($id, $username, $hashed_password);
                    if ($stmt->fetch()) {
                        if (password_verify($password, $hashed_password)) {
                            // Password is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;

                            // Redirect user to welcome page
                            header("location: login-validation.php");
                        } else {
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else {
                    // Username doesn't exist, display a generic error message
                    $login_err = "Invalid username or password.";
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    }

    // Close connection
    $link->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="shortcut icon" href="./asset/img/1aiet-logo.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/style/style.css">


</head>

<body>

    <style>
        #eye {
            cursor: pointer;
            position: absolute;
            left: 85%;
            padding-left: 20px;
            margin-right: 10px;
        }

        @media screen and (max-width: 1024px) {

            #eye {
                left: 80%;
            }

        }

        @media screen and (max-width: 430px) {

            #eye {
                margin-left: 27px;
            }

        }

        @media screen and (max-width: 770px) {

            #eye {

                left: 73%;
            }
        }

        @media screen and (max-width: 330px) {

            #eye {
                left: 65%;
            }

        }

        @media screen and (max-width: 379px) {

            #eye {
                margin-left: 20px;
            }

        }
    </style>

    <div class="bg-image">
        <div class="form_bg mx-auto">
            <div class="container">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <?php
                    if (!empty($login_err)) {
                        echo '<div class="alert alert-danger">' . $login_err . '</div>';
                    }
                    ?>
                    <div class="row">
                        <div class="col-md-5 col-sm-12 mx-auto card-login border p-5">
                            <div class="form_icon text-center m-3 p-3"><img src="./assets/img/aiet-logo.png" style="width: 100px;">
                            </div>

                            <div class="fontuser">
                                <label><b class="white"></b></label>
                                <input type="text" placeholder="Username" name="username" class="in form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                                <i><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#999" viewBox="0 0 448 800">
                                        <path d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z" />
                                    </svg></i>
                            </div>

                            <div class="fontpassword">
                                <label><b class="white"></b></label>
                                <input id="password" type="password" placeholder="Password" name="password" class="in form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                                <i class="fa fa-key fa-lg pr-5 pt-2"></i>
                                <i class="fa fa-eye-slash eye fa-lg pr-5 pt-2" id="eye" onclick="show_password();"></i>
                                <span class="invalid-feedback"><?php echo $password_err; ?></span>
                            </div>
                            <button type="submit">Login</button>
                            <div class="link">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Forgot Password?</a> or <a href="stud-register.php">Sign up</a>
                            </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Forgot Password?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?php echo htmlspecialchars("forgot-password.php"); ?>" method="post">
                    <div class="modal-body">
                        <div class="col-md-12">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" id="username" placeholder="Your Username." required />
                        </div>
                        <label for="email" class="form-label">Your registred e-mail to get password.</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Your Registered e-mail." required />
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" value="Send" class="btn btn-primary">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap Js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        function show_password() {

            x = document.getElementById("password");
            y = document.getElementById("eye");

            if (x.type == "password") {
                x.type = "text";
                y.classList.remove("fa-eye-slash");
                y.classList.add("fa-eye")
            } else {
                x.type = "password";
                y.classList.remove("fa-eye");
                y.classList.add("fa-eye-slash")
            }

        }
    </script>
</body>