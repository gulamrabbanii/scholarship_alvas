<?php
session_start();
require_once("../db/config.php");
error_reporting(0);

// echo $_FILES['path']['name'];
// echo $_SESSION["username"];

$usn = $_SESSION["username"];
$target_path = "../profile_pic/";

$doc_file = $_FILES['path']['name'];

// rename
$extension = end(explode(".", $doc_file));
$doc_file = $usn . "." . $extension;
$target_path = $target_path . basename($doc_file);
if (file_exists($target_path)) unlink($target_path);

$p1 = 'SELECT * FROM display_pic WHERE username="' . $_SESSION["username"] . '"';
$res9 = $link->query($p1);

// echo $p1;
if (move_uploaded_file($_FILES['path']['tmp_name'], $target_path)) {
    // echo mysqli_num_rows($res9);

    if ((mysqli_num_rows($res9) > 0)) {
        $q = 'UPDATE `display_pic` SET `dp`="' . $target_path . '" WHERE username="' . $_SESSION["username"] . '"';
    } else {
        $q = 'INSERT INTO `display_pic`(`username`, `dp`) VALUES ("' . $_SESSION["username"] . '","' . $target_path . '")';
    }
    // echo $q;
    $link->query($q);
    // header("Location :faculty_login_profile_view.php");
    $_SESSION['flag_pic'] = 0;
    // echo '<script>window.location.replace("faculty_login_profile_view.php");</script>';
    echo '<script>window.location.replace("profile.php");</script>';
} else {
    echo "error";
}
