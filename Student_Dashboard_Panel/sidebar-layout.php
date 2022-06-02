<?php
session_start();
$pattern = "/4(al)[0-9]{2}[A-Za-z]{2}[0-9]{3}/i";
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || !preg_match($pattern, $_SESSION["username"])) {
  header("location: ../index.php");
  exit;
}
require_once("../db/config.php");
$username = $_SESSION['username'];

$sql1 = "SELECT id, subject, msg_body FROM notification WHERE usn = '$username' AND status = 'unseen';";
$result1 = $link->query($sql1);
$noti_count_sql = "SELECT COUNT(*) FROM notification WHERE usn = '$username' AND status = 'unseen';";
$noti_count = $link->query($noti_count_sql);

$sql = "SELECT * FROM users WHERE username = '$username'";
$result = $link->query($sql);
foreach ($result as $row) {
?>
  <!DOCTYPE html>
  <html lang="en" dir="ltr">

  <head>
    <meta charset="UTF-8">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/style/style_std.css">

  </head>

  <body>
    <input type="checkbox" id="check">
    <label class="button bars" for="check"><i class="fas fa-bars"></i></label>
    <div class="side_bar">
      <div class="title">
        <div class="logo"><img src="https://www.nautec.com/wp-content/uploads/2018/04/placeholder-person.png" style="margin:5px; width: 80px; height: 80px; border-radius: 50%;background-image: linear-gradient(60deg, #2AAA8A, #4169E1);
    padding: 1px;" alt="" srcset="">
        </div>
        <div class="p-2" style="position: relative; top: 20px;">
          <h5 style="font-family: cursive;"><?php echo ucwords($row['first_name']); ?></h5>
          <h5 style="font-family: cursive;"><?php echo ucwords($row['last_name']); ?></h5>
        </div>
        <label class=" button cancel" for="check"><i class="fas fa-times"></i></label>
      </div>
      <ul>
        <li><a href="profile.php"><i class="fas fa-qrcode"></i>Profile</a></li>
        <li><a href="scholarship.php"><i class="fa-solid fa-graduation-cap"></i>Scholarship</a></li>
        <li><a href="upload-docs.php"><i class="fa fa-folder" aria-hidden="true"></i>
            Upload Docs</a></li>
        <li><a href="status.php"><i class="fa-solid fa-flag"></i>Update Result</a></li>
        <li><a href="reset-password.php"><i class="fa fa-undo"></i></i>Reset Password</a></li>
        <li><a class="btn" id="liveToastBtn"><i class="fas fa-phone-volume"></i>Notification<span class="badge bg-primary rounded-pill mx-2"><?php foreach ($noti_count as $noti) echo $noti['COUNT(*)']; ?></span></a></li>

        <!-- <li><a href="feedback.php"><i class="fas fa-comments"></i>Feedback</a></li> -->
      </ul>
      <div class="media_icons">
        <a href="../logout.php"><i class="fa-solid fa-power-off"></i></a>
      </div>
      <!-- <div class="media_icons">
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-youtube"></i></a>
          <a href="#"><i class="fa-solid fa-power-off"></i></a>
        </div> -->

    </div>
    <div class="toast-container">
      <div class="position-fixed top-0 end-0 p-3" style="z-index: 999;">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
          <?php
          while ($row1 = mysqli_fetch_assoc($result1)) {
            echo '<div class="toast-header" style="background: green; opacity: 1;">';
            // <!-- <img src="..." class="rounded me-2" alt="..."> -->
            echo '<strong class="me-auto text-white" id="sub">' . $row1['subject'] . '</strong>';
            // $dateTime = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
            // // <!-- <small>11 mins ago</small> -->
            // echo $dateTime->format("H:i:s A");
            echo '<button type="button" onClick="update(' . $row1["id"] . ')" class="btn-close bg-white" data-bs-dismiss="toast" aria-label="Close"></button>';
            echo '</div>';
            echo '<div class="toast-body" style="text-align: justify;
    word-wrap: break-word;
  overflow-wrap: break-word;
-webkit-hyphens: auto;
   -moz-hyphens: auto;
        hyphens: auto;" id="body">' . $row1['msg_body'];
            echo '</div>';
          }
          ?>
        </div>
      </div>
    </div>
  <?php
}
  ?>
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <script>
    var toastTrigger = document.getElementById('liveToastBtn')
    var toastLiveExample = document.getElementById('liveToast')

    //do your AJAX stuff here
    if (toastTrigger) {
      toastTrigger.addEventListener('click', function() {
        var toast = new bootstrap.Toast(toastLiveExample)

        toast.show()
      })
    }


    function update(id) {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {}
      };
      xmlhttp.open("GET", "noti.php?id=" + id, true);
      xmlhttp.send();
    }
  </script>
  </body>

  </html>