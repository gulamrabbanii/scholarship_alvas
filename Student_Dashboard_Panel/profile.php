<?php
include("sidebar-layout.php");
require_once("../db/config.php");

$img_path = 'https://www.nautec.com/wp-content/uploads/2018/04/placeholder-person.png';
$p1 = 'SELECT * FROM display_pic where username="' . $_SESSION["username"] . '"';
$res9 = $link->query($p1);
// print_r($res9);
if (mysqli_num_rows($res9) > 0) {
  $res9 = mysqli_fetch_assoc($res9);
  $img_path = $res9["dp"];
}

$username = $_SESSION['username'];
$sql = "SELECT * FROM users WHERE username = '$username'";
$result = $link->query($sql);
foreach ($result as $row) {
?>
  <style>
    .card {
      display: flex;
      flex-direction: column;
      box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
      padding-top: 15px;
      border-radius: 0 0 0 0;
      padding-bottom: 15px;
      background: rgba(255, 255, 255, 0.3);
    }

    .card-img {
      align-items: center;
      border-radius: 15px 15px 0 0;
      margin-top: 20px;
    }

    .card-details {
      border-radius: 0 0 15px 15px;
    }

    .card-sch {
      box-shadow: none;
    }

    .card img {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      background-image: linear-gradient(60deg, #2AAA8A, #4169E1);
      padding: 2px;
      margin-top: -50px;
    }

    .card h2 {
      margin: 10px 0;
    }

    .card-img button {
      display: none;
    }

    .profileUpload {
      position: relative;
      /* top: 200px; */
      right: -82px;
      top: -66px;
      z-index: 1;
    }

    .profileDelete {
      position: relative;
      /* top: 200px; */
      left: -15px;
      top: -98px;
      z-index: 1;
    }

    .profileDelete:hover {
      display: block;
    }

    #img-wrapper:hover button {
      display: block;
      transition: display 250ms linear;
    }

    #imageUpload {
      display: none;
    }
  </style>

  <title>STUDENT | PROFILE</title>
  <section>
    <div class="container p-4">
      <h2 style="letter-spacing: 0.2rem; background:rgba(255,255,255, 1); color: #413F42;">PROFILE</h2>

      <!-- Profile Image -->
      <div class="card card-img">
        <div id="img-wrapper">
          <img id="profile_pich" src="<?php echo $img_path ?>" alt="">
          <button id="profileImage" class="profileUpload btn btn-warning btn-sm" onclick="document.getElementById('imageUpload').click()" style="border-radius: 50%;">
            <i class="fas fa-camera"></i>
          </button>
          <form action="profile_pic_delete.php" method="post">
            <button id="profileDelete" class="profileDelete btn btn-danger btn-sm" style="border-radius: 50%;">
              <i class="fas fa-trash"></i>
            </button>
          </form>
        </div>
        <form action="profile_pic_upload.php" method="post" style="display: none;" enctype="multipart/form-data">
          <input id="imageUpload" onchange="" name="path" type="file" accept="image/png, image/gif, image/jpeg" />
          <input type="submit" value="Submit" name="profile_pic" id="profile_pic_submit">
        </form>
        <h2><?php echo ucwords($row['first_name']); ?> <?php echo $row['last_name']; ?></h2>
        <h6><?php echo strtoupper($row['username']); ?></h6>
        <h6><?php echo $row['email']; ?></h6>
        <h6><?php echo $row['phone']; ?></h6>
      </div>

      <!-- Profile Details -->
      <div class="card mt-2">
        <div class="row mx-3">
          <p><i class="fw-bold" style="color: #4E4E91;">Basic Details</i></p>
          <div class="col col-lg-4 col-12 mb-2">USN Number : <span><?php echo strtoupper($row['username']); ?></span>
          </div>
          <div class="col col-lg-4 col-12 mb-2">Gender : <span><?php echo $row['gender']; ?></span>
          </div>
          <div class="col col-lg-4 col-12 mb-2">Caste : <span><?php echo $row['caste']; ?></span>
          </div>
          <div class="col col-lg-4 col-12 mb-2">Year : <span><?php echo $row['year']; ?></span>
          </div>
          <div class="col col-lg-4 col-12 mb-2">Semester : <span><?php echo $row['semester']; ?></span>
          </div>
          <div class="col col-lg-4 col-12 mb-2">Section : <span><?php echo strtoupper($row['section']); ?></span>
          </div>
          <div class="col col-lg-4 col-12 mb-2">Branch : <span><?php echo $row['dept']; ?></span>
          </div>
          <div class="col col-lg-4 col-12 mb-2">Mobile Number : <span><?php echo $row['phone']; ?></span>
          </div>
          <div class="col col-lg-8 col-12 mb-2">e-mail Address : <span><?php echo $row['email']; ?></span>
          </div>
        </div>
        <span>
          <button class="btn" style="float: right;"><a href="update-profile.php"><i class="fas fa-edit"></i></a></button>
        </span>
      </div>


      <?php $sql1 = "SELECT * FROM `upload_sch_docs` WHERE usn = '$username';";
      $result1 = $link->query($sql1);
      if (mysqli_num_rows($result1) > 0) { ?>
        <!-- Scholarship Applied -->
        <div class="card card-sch mt-2">
          <div class="row mx-3">
            <i class="fw-bold" style="color: #4E4E91;">Scholarship Details</i>
          </div>
        </div>
        <?php
        $idpro = 1;
        while ($row1 = mysqli_fetch_array($result1)) { ?>
          <div class="card">
            <div class="row mx-3">
              <p>#<?php echo $idpro; ?><span class="value"></span></p>
              <div class="col col-lg-12 col-12 mb-2">Scholarship Name : <span class="value"><?php echo $row1['sch_name']; ?></span>
              </div>
              <div class="col col-lg-6 col-12 mb-2">Academic Year : <span class="value"><?php echo $row1['sch_applied_year']; ?></span>
              </div>
              <div class="col col-lg-12 col-12 mb-2">College Verification : <span class="value"><?php echo $row1['is_verified']; ?></span>
              </div>
              <div class="col col-lg-12 col-12 mb-2">Scholarship Received : <span class="value"><?php echo $row1['is_received']; ?></span>
              </div>
            </div>
          </div>
      <?php $idpro++;
        }
      } ?>
      <div class="card card-details">
      </div>


      <!-- End -->
    </div>
  </section>
  <script>
    function fasterPreview(uploader) {
      if (uploader.files && uploader.files[0]) {
        $('#profile_pich').attr('src',
          window.URL.createObjectURL(uploader.files[0]));
        if ("space") {
          document.getElementById("profile_pic_submit").click();
          // $("#profile_pick_submit").click();
          <?php unset($_SESSION['flag_pic']) ?>;
        }

      }
    }

    $("#imageUpload").change(function() {
      fasterPreview(this);
    });
  </script>
<?php
  // Close connection
  $link->close();
}
?>