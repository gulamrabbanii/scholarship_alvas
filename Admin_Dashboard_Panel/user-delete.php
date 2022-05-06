<?php
session_start();
require_once("../db/config.php");
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../index.php");
    exit;
}
$delete_user = $_GET['id'];
$sql =  "DELETE FROM users WHERE id = '$delete_user'";

if($result = $link->query($sql)){
    echo "<script>alert('Successfully Deleted')</script>";
    header("Refresh: 0 , url = list-admins.php");
    exit();
} else {
    echo "<script>alert('Failed to Delete')</script>";
    header("Refresh: 0 , url = list-admins.php");
    exit();
}
// Close connection
$link->close();
?>