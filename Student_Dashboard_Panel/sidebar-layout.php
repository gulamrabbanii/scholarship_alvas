<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../index.php");
    exit;
}
require_once("../db/config.php");
$username = $_SESSION['username'];
$sql = "SELECT * FROM users WHERE username = '$username'";
$result = $link->query($sql);
foreach ($result as $row) {
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
        <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
      integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../assets/style/style_std.css">
    
   </head>

<body>
  <input type="checkbox" id="check">
  <label class="button bars" for="check"><i class="fas fa-bars"></i></label>
  <div class="side_bar">
    <div class="title">
      <div class="logo"><img src="../assets/img/person.png" style="margin:5px; width: 80px; height: 80px; border-radius: 50%;"  alt="" srcset="">
    </div>
    <div class="p-2" style="position: relative; top: 20px;"><h5><?php echo ucwords($row['first_name']);?></h5><h5><?php echo ucwords($row['last_name']); ?></h5></div>
      <label class=" button cancel" for="check"><i class="fas fa-times"></i></label>
    </div>
    <ul>
          <li><a href="profile.php"><i class="fas fa-qrcode"></i>Profile</a></li>
          <li><a href="live-scholarship.php"><i class="fa-solid fa-graduation-cap"></i>Scholarship</a></li>
          <li><a href="verification.php"><i class="fas fa-check-circle"></i>Verification</a></li>
          <li><a href="status.php"><i class="fa-solid fa-flag"></i>Status</a></li>
          <li><a href="reset-password.php"><i class="fas fa-question-circle"></i>Reset Password</a></li>
          <li><a href="notification.php"><i class="fas fa-phone-volume"></i>Notification<span class="badge bg-primary rounded-pill mx-auto">14</span></a></li>
          <li><a href="feedback.php"><i class="fas fa-comments"></i>Feedback</a></li>
    </ul>
        
      <div class="media_icons" >
        <a href="../logout.php"><i class="fa-solid fa-power-off"></i></a>
      </div>
        <!-- <div class="media_icons">
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-youtube"></i></a>
          <a href="#"><i class="fa-solid fa-power-off"></i></a>
        </div> -->
        
  </div>
<?php 
}
?>
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html>
