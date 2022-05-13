<?php 
include("sidebar-layout.php");
require_once("../db/config.php");
$username = $_SESSION['username'];
$sql = "SELECT * FROM users WHERE username = '$username'";
$result = $link->query($sql);
foreach ($result as $row) {
?>
<style>
.card{
    display: flex;
    flex-direction: column;
    box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
    padding-top: 15px;
    border-radius: 0 0 0 0;
    padding-bottom: 15px;
    background:rgba(255,255,255, 0.3);
}
.card-img {
  align-items: center;
  border-radius: 15px 15px 0 0;
}
.card-details {
border-radius: 0 0 15px 15px;
}
.card-sch {
  box-shadow: none;
}
.card img{
    width: 90px;
    height: 90px;
    border-radius: 50%;
    background-image: linear-gradient(60deg, #2AAA8A, #4169E1);
    padding: 2px;
    margin-top: -45px;
}
.card h2{
    margin: 10px 0;
}
.label {
  color: #97A1BF;
  font-size: 14px;
  font-weight: 800;
}
.value {
  color: #161E37;
  font-size: 12px;
}
</style>

<title>STUDENT | PROFILE</title>
 <section>
      <div class="container p-4">
        <h2 style="letter-spacing: 0.2rem; background:rgba(255,255,255, 1); color: #4E4E91;">PROFILE</h2>

<!-- Profile Image -->
  <div class="card card-img">
    <img src="https://www.nautec.com/wp-content/uploads/2018/04/placeholder-person.png" alt="">
    <h2><?php echo ucwords($row['first_name']);?> <?php echo $row['last_name'];?></h2>
    <h6><?php echo strtoupper($row['username']);?></h6>
    <h6><?php echo $row['email'];?></h6>
    <h6><?php echo $row['phone'];?></h6>
  </div>
  
<!-- Profile Details -->
  <div class="card mt-2">
    <div class="row mx-3">
      <p><i class="label">Basic Details</i></p>
      <div class="col col-lg-4 col-12 mb-2">USN Number : <span><?php echo $row['username'];?></span>
      </div>
      <div class="col col-lg-4 col-12 mb-2">Gender : <span><?php echo $row['gender'];?></span>
      </div>
      <div class="col col-lg-4 col-12 mb-2">Year : <span><?php echo $row['year'];?></span>
      </div>
      <div class="col col-lg-4 col-12 mb-2">Semester : <span><?php echo $row['semester'];?></span>
      </div>
      <div class="col col-lg-4 col-12 mb-2">Section : <span><?php echo $row['section'];?></span>
      </div>
      <div class="col col-lg-4 col-12 mb-2">Branch : <span><?php echo $row['dept'];?></span>
      </div>
      <div class="col col-lg-4 col-12 mb-2">Mobile Number : <span><?php echo $row['phone'];?></span>
      </div>
      <div class="col col-lg-8 col-12 mb-2">e-mail Address : <span><?php echo $row['email'];?></span>
      </div>
    </div>
    <?php
    }
  ?>
    <form action="#" method="post">
      <button type="submit" class="btn" style="float: right;"><i class="fas fa-edit"></i></button>
    </form>
  </div>
<!-- Scholarship Applied -->
  <div class="card card-sch mt-2"> 
    <div class="row mx-3">
      <i class="label">Scholarship Details</i>
    </div>
  </div>
  <div class="card"> 
    <div class="row mx-3">
      <p>#<span class="value"></span></p>
      <div class="col col-lg-12 col-12 mb-2">Scholarship Name : <span class="value"></span>
        </div>
        <div class="col col-lg-6 col-12 mb-2">Academic Year : <span class="value"></span>
        </div>
        <div class="col col-lg-6 col-12 mb-2">Status : <span class="value"></span>
        </div>
    </div>
  </div>
  <div class="mb-2"></div>
  <div class="card card-details">
  </div>

  <!-- End -->
</div>
</section>