
<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../index.php");
    exit;
}
require_once("../db/config.php");
$sch_id = $_GET['id'];
$sql =  "UPDATE `scholarship_details` SET `status`='active' WHERE id = '$sch_id'";

if($result = $link->query($sql)){
    echo "<script>alert('Successfully Enabled')</script>";
    header("Refresh: 0 , url = ../Admin_Dashboard_Panel/view-scholarships.php");
    exit();
} else {
    echo "<script>alert('Failed to Enable')</script>";
    header("Refresh: 0 , url = ../Admin_Dashboard_Panel/inactive-scholarship.php");
    exit();
}
// Close connection
$link->close();
?>