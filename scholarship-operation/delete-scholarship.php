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
    echo "<script>alert('Successfully deleted');
    window.location.href='../Admin_Dashboard_Panel/all-scholarships.php';</script>";
} else {
    echo "<script>alert('Failed to delete');
    window.location.href='../Admin_Dashboard_Panel/all-scholarships.php';</script>";
}
// Close connection
$link->close();
