<?php
session_start();
require_once("../db/config.php");
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: ../index.php");
    exit;
}
$delete_user = $_GET['id'];
$sql =  "DELETE FROM users WHERE id = '$delete_user'";

if ($result = $link->query($sql)) {
    echo "<script>alert('Successfully Deleted');
    window.location.href='list-admins.php';</script>";
} else {
    echo "<script>alert('Failed to Delete');window.location.href='list-admins.php';</script>";
}
// Close connection
$link->close();
