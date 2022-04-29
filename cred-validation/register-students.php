<?php
session_start();
require_once "../db/config.php";
$username = mysqli_real_escape_string($link, $_POST['username']);
$password = mysqli_real_escape_string($link, md5($_POST['password']));
$sql = "SELECT username FROM users WHERE username ='" . $username . "'";
$query = mysqli_query($link, $sql);
$result = mysqli_fetch_array($query, MYSQLI_ASSOC);
if ($result) {
    echo "<script>alert('Username is used!')</script>";
    header("Refresh:0 , url = ../registration/stud-register.html");
    exit();
}else{
if ($_POST['username'] != null && $_POST['password'] != null && $_POST['cfpassword'] != null && $_POST['cfpassword'] == $_POST['password']) {
    $sql = "INSERT INTO users (username, passwd, first_name, last_name, dept, year, phone) VALUES ('" . trim($_POST['username']) . "','" . trim(md5($_POST['password'])) . "','" . trim($_POST['f-name']) . "','" . trim($_POST['l-name']) . "','" . trim($_POST['sel-branch']) . "','" . trim($_POST['year']) . "','" . trim($_POST['phone']) . "')";
    if ($link->query($sql)) {
        echo "<script>alert('Registration is complete.')</script>";
        header("Refresh:0 , url = ../index.php");
        exit();
    } else {
        echo "<script>alert('Registration isn't complete.')</script>";
        header("Refresh:0 , url = ../registration/stud-register.html");
        exit();
    }
} else {
    echo "<script>alert('Please enter new information or the password does not match.')</script>";
    header("Refresh:0 , url = ../registration/stud-register.html");
    exit();
}
    mysqli_close($link);
}
