<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}

$pattern = "/4(al)[0-9]{2}[A-Za-z]{2}[0-9]{3}/i";
if($_SESSION["username"] == "admin"){
    header("Location: Admin_Dashboard_Panel/dashboard.php");
}
if((preg_match($pattern, $_SESSION["username"]))){
    header("Location: Student_Dashboard_Panel/live-scholarship.php");
}
$admin_user = '/^[a-zA-Z0-9_]+$/';
if((preg_match($admin_user, $_SESSION["username"]))){
    header("Location: Admin_Dashboard_Panel/dashboard.php");
}
?>
