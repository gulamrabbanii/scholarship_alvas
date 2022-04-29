<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
// if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
//     header("location: login.php");
//     exit;
// }

$pattern = "/4(al)[0-9]{2}[A-Za-z]{2}[0-9]{3}/i";
if($_SESSION["username"] == "admin"){
    header("Location: ../Admin_Dashboard_Panel/dashboard.php");
}
if((preg_match($pattern, $_SESSION["username"]))){
    header("Location: ../Student_Dashboard_Panel/scholarship.php");
}
$email = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";
if((preg_match($email, $_SESSION["username"]))){
    header("Location: ../Admin_Dashboard_Panel/dashboard.php");
}
?>
