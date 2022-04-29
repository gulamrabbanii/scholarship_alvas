<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
// if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
//     header("location: welcome.php");
//     exit;
// }


 
// Include config file
require_once "db/config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Check if username is empty
    
    // Validate credentials
    if (empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $username = mysqli_real_escape_string($link, $_POST['username']);
        $password = mysqli_real_escape_string($link, md5($_POST['password']));
        $sql = "SELECT username, passwd FROM users WHERE username ='" . $username . "' and passwd = '" . $password . "'";
        $query = mysqli_query($link, $sql);
        $result = mysqli_fetch_array($query, MYSQLI_ASSOC);
        if (!$result) {
            $login_err = "Invalid username or password.";
        } else {
            session_start();
            $_SESSION['username'] = $result['username'];
            header("Location: cred-validation/login-validation.php");
            session_write_close();
        }
        
        // if($stmt = mysqli_prepare($link, $sql)){
        //     // Bind variables to the prepared statement as parameters
        //     mysqli_stmt_bind_param($stmt, "s", $param_username);
            
        //     // Set parameters
        //     $param_username = $username;
            
        //     // Attempt to execute the prepared statement
        //     if(mysqli_stmt_execute($stmt)){
        //         // Store result
        //         mysqli_stmt_store_result($stmt);
                
        //         // Check if username exists, if yes then verify password
        //         if(mysqli_stmt_num_rows($stmt) == 1){                    
        //             // Bind result variables
        //             mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
        //             if(mysqli_stmt_fetch($stmt)){
        //                 if(password_verify($password, $hashed_password)){
        //                     // Password is correct, so start a new session
        //                     session_start();
                            
        //                     // Store data in session variables
        //                     $_SESSION["loggedin"] = true;
        //                     $_SESSION["id"] = $id;
        //                     $_SESSION["username"] = $username;                            
                            
        //                     // Redirect user to welcome page
        //                     header("location: welcome.php");
        //                 } else{
        //                     // Password is not valid, display a generic error message
        //                     $login_err = "Invalid username or password.";
        //                 }
        //             }
        //         } else{
        //             // Username doesn't exist, display a generic error message
        //             $login_err = "Invalid username or password.";
        //         }
        //     } else{
        //         echo "Oops! Something went wrong. Please try again later.";
        //     }

        //     // Close statement
        //     mysqli_stmt_close($stmt);
        // }
    }
    
    // Close connection
    mysqli_close($link);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="icon" href="./assets/img/icon.png" type="image/icon type">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/style/style.css">
    <link rel="stylesheet" href="./assets/style/bootstrap.min.css">
</head>
<body>

<div class="vstack" style="align-items: center;">
    <?php 
    if(!empty($login_err)){
    echo '<div class="alert alert-danger w-75 text-center">' . $login_err . '</div>';
    }        
    ?>
    <div class="login-div">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
         <div class="logo"></div>
        <div class="title">ALVA'S</div>
        <div class="sub-title">Education Foundation</div>
        <div class="fields">
            <div class="username"><svg xmlns="http://www.w3.org/2000/svg" fill="#999" viewBox="0 0 448 512"><path d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z" /></svg><input type="username" name="username" class="user-input" value="" placeholder="Username" required/></div>
            
            <div class="password"><svg fill="#999" viewBox="0 0 1024 1024"><path class="path1" d="M742.4 409.6h-25.6v-76.8c0-127.043-103.357-230.4-230.4-230.4s-230.4 103.357-230.4 230.4v76.8h-25.6c-42.347 0-76.8 34.453-76.8 76.8v409.6c0 42.347 34.453 76.8 76.8 76.8h512c42.347 0 76.8-34.453 76.8-76.8v-409.6c0-42.347-34.453-76.8-76.8-76.8zM307.2 332.8c0-98.811 80.389-179.2 179.2-179.2s179.2 80.389 179.2 179.2v76.8h-358.4v-76.8zM768 896c0 14.115-11.485 25.6-25.6 25.6h-512c-14.115 0-25.6-11.485-25.6-25.6v-409.6c0-14.115 11.485-25.6 25.6-25.6h512c14.115 0 25.6 11.485 25.6 25.6v409.6z"></path></svg><input type="password" name="password" class="pass-input" placeholder="Password" required/></div>
        </div>
        <button type="submit" class="signin-button">Login</button>
        </form>
        <div class="link">
            <a href="#">Forgot Password?</a> or 
            <a href="registration/stud-register.html">Sign up</a>
        </div>
    </div>
</div>
</body>
</html>