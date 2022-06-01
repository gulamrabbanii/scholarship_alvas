<?php
session_start();
$username = $_SESSION['username'];

if (isset($_GET['id']) && !empty($_GET['id'])) {
      $id = $_GET['id'];
      require_once("../db/config.php");

      $update = "UPDATE notification SET status = 'seen' WHERE id = '$id' AND usn = '$username';";
      $result = $link->query($update);

      $delete = "DELETE FROM `notification` WHERE id = '$id' AND usn ='$username' AND status = 'seen';";
      $link->query($delete);
}
