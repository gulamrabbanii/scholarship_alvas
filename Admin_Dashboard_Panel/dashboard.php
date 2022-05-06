<?php
include("admin-layout.php");
if ($_SESSION["username"] == "admin"){ 
    header("location: list-admins.php");
    }
else {
    header("location: admin-profile.php");
}
?>