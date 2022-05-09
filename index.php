<?php
// Initialize the session
session_start();
error_reporting(E_ALL & ~E_WARNING  & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED); 
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: login-validation.php");
    exit;
}
 
// Include config file
require_once "db/config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $username = htmlspecialchars(strip_tags(trim($_POST["username"])));
    // Check if username is empty
    if(empty($username)){
        $username_err = "Please enter username.";
    } else{
        $username = $username;
    }
    
    // Check if password is empty
    $password = htmlspecialchars(strip_tags(trim($_POST["password"])));
    
    if(empty($password)){
        $password_err = "Please enter your password.";
    } else{
        $password = $password;
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, passwd FROM users WHERE username = ?";
        
        if($stmt = $link->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Store result
                $stmt->store_result();
                
                // Check if username exists, if yes then verify password
                if($stmt->num_rows == 1){                    
                    // Bind result variables
                    $stmt->bind_result($id, $username, $hashed_password);
                    if($stmt->fetch()){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: login-validation.php");
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $login_err = "Invalid username or password.";
                }
            } else{
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
    <title>LOGIN</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="icon" href="./assets/img/icon.png" type="image/icon type">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/style/style.css">
        
</head
 <body>

<div class="vstack" style="align-items: center;">
    <?php 
    if(!empty($login_err)){
    echo '<div class="alert mt-5 alert-danger vw-100 text-center">' . $login_err . '</div>';
    }        
    ?>
    <div class="container position-relative px-2 px-lg-5">
        <div class="container position-relative px-4 px-lg-5 px-md-5">
            <div class="container position-relative px-lg-5 px-md-5">
                <div class="row gx-5 gx-lg-5 px-sm-5 px-lg-4 justify-content-center vh-100">
                    <div class="login-div col-xl-7 pt-4 col-sm-12 col-md-12 col-lg-8">
                        <div class="logo"><img src="assets/img/icon.png" alt="Alva's Logo" srcset=""></div>
                        <div class="title">ALVA'S</div>
                        <div class="sub-title">Education Foundation</div>
                        <form class="login-form px-3 mt-2" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <div class="username px-4"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#999" viewBox="0 10 448 512"><path d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z" /></svg>
                            <input type="username" name="username" class="user-input <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>" placeholder="Username" required /></div>
                            
                            <div class="password px-4"><svg fill="#999" width="18" height="18" viewBox="0 120 1024 1024"><path class="path1"
                            d="M742.4 409.6h-25.6v-76.8c0-127.043-103.357-230.4-230.4-230.4s-230.4 103.357-230.4 230.4v76.8h-25.6c-42.347 0-76.8 34.453-76.8 76.8v409.6c0 42.347 34.453 76.8 76.8 76.8h512c42.347 0 76.8-34.453 76.8-76.8v-409.6c0-42.347-34.453-76.8-76.8-76.8zM307.2 332.8c0-98.811 80.389-179.2 179.2-179.2s179.2 80.389 179.2 179.2v76.8h-358.4v-76.8zM768 896c0 14.115-11.485 25.6-25.6 25.6h-512c-14.115 0-25.6-11.485-25.6-25.6v-409.6c0-14.115 11.485-25.6 25.6-25.6h512c14.115 0 25.6 11.485 25.6 25.6v409.6z"></path></svg>
                            <input type="password" name="password" class="pass-input <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>" placeholder="Password" required /></div>
                            <button type="submit" class="btn signin-button w-100">Login</button>
                            <div class="link">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Forgot Password?</a> or <a href="stud-register.php">Sign up</a>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Forgot Password?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="forgot-password.php" method="post">
                    <div class="modal-body">
                        <div class="col-md-12">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" id="username"
                                placeholder="Your Username." />
                        </div>
                        <label for="email" class="form-label">Your registred e-mail to get password.</label>
                        <input type="email" name="email" class="form-control" id="email"
                            placeholder="Your Registered e-mail." />
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>
</html>