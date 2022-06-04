<?php

require_once("../db/config.php");

session_start();
$q = 'DELETE FROM `display_pic` WHERE username="' . $_SESSION["username"] . '"';
$res = $link->query($q);
echo '<script>window.location.replace("profile.php");</script>';
