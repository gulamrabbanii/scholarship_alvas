<?php
session_start();
$pattern = "/4(al)[0-9]{2}[A-Za-z]{2}[0-9]{3}/i";
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || preg_match($pattern, $_SESSION["username"])){
    header("location: ../index.php");
    exit;
}
require_once("../db/config.php");
$sch_id = $_GET['id'];
$sql =  "DELETE FROM `scholarship_details` WHERE id = '$sch_id'";

if($result = $link->query($sql)){
    echo "<script>alert('Successfully deleted')</script>";
    header("Refresh: 0 , url = ../Admin_Dashboard_Panel/all-scholarships.php");
    exit();
} else {
    echo "<script>alert('Failed to delete')</script>";
    header("Refresh: 0 , url = ../Admin_Dashboard_Panel/all-scholarships.php");
    exit();
}
// Close connection
$link->close();
?>