<?php 
include("sidebar-layout.php");
require_once("../db/config.php");

$sql = "SELECT * FROM scholarship_details WHERE (sch_start_date <= CURDATE()) AND (sch_deadline >= CURDATE()) ORDER BY sch_deadline";
?>
<title>SCHOLARSHIP</title>

<style>
  .card {
    border-radius: 5px;
    background: rgba(236, 240, 243, 0.6);
    box-shadow: 13px 13px 20px #cbced1,
        -13px -13px 20px #ffffff;
    height: 400px;
}
</style>

<section>
<div class="container p-4">
  <h2>Scholarship</h2>
<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">All Scholarships</button>
    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Category</button>
    <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Government</button>
    <button class="nav-link" id="nav-non-govt-tab" data-bs-toggle="tab" data-bs-target="#nav-non-govt" type="button" role="tab" aria-controls="nav-non-govt" aria-selected="false">Non-Government</button>
  </div>
</nav>
<div class="tab-content mt-5" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
 
<div class="container">
  <div class="btn-group" role="group" aria-label="Basic outlined example">
  <button type="button" class="btn btn-outline-primary" onclick="window.location.href = 'live-scholarship.php';">LIVE SCHOLARSHIPS</button>
  <button type="button" class="btn btn-outline-primary" onclick="window.location.href = 'upcoming-scholarship.php';">UPCOMING SCHOLARSHIPS</button>
  <button type="button" class="btn btn-outline-primary" onclick="window.location.href = 'always-open.php';">ALWAYS OPEN</button>
</div>
</div>

<!-- Cards Start -->
<h5 class="p-2">Live Scholarship</h5>
<div class="row">
<?php
if($result = $link->query($sql)){
    if($result->num_rows > 0){
        while($row = $result->fetch_array()){ ?>
                <div class="col-sm-4">
                <div class="card mt-5 text-center">
                <div class="card-header">
                <i class="fa-solid fa-calendar-days px-2"></i>Deadline: <?php echo $row["sch_deadline"] ?>
                </div>
                <div class="card-body">
                <h5 class="card-title"><a href="<?php echo $row['sch_link'] ?>" target="_blank" rel="noopener noreferrer"><?php echo $row["sch_name"] ?></a></h5>
                <p class="card-text">Eligibility</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
                <div class="card-footer">
                <a href="#" class="text-decoration-none text-dark">View Scholarship</a>
                </div>
            </div>
            </div>            
<?php    } 
        // Free result set
        $result->free();
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}
// Close connection
$link->close();
?>
</div>
<!-- Cards End -->

</div>


  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
<div class="container">
<div class="btn-group" role="group" aria-label="Basic outlined example">
    <button type="button" class="btn btn-outline-primary" onclick="window.location.href = '#';">MINORITY(SC/ST/OBC)</button>
    <button type="button" class="btn btn-outline-primary" onclick="window.location.href = '#';">SC/ST ONLY</button>
    <button type="button" class="btn btn-outline-primary" onclick="window.location.href = '#';">GIRLS</button>
    <button type="button" class="btn btn-outline-primary" onclick="window.location.href = '#';">MINORITY</button>
    <button type="button" class="btn btn-outline-primary" onclick="window.location.href = '#';">PHYSICALLY DISABLED</button>
</div>
</div>

<!-- card
 -->

  </div>
  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
  <div class="container">
  <div class="btn-group" role="group" aria-label="Basic outlined example">
    <button type="button" class="btn btn-outline-primary" onclick="window.location.href = '#';">GOVERNMENT OF INDIA</button>
    <button type="button" class="btn btn-outline-primary" onclick="window.location.href = '#';">KARNATAKA</button>
    <button type="button" class="btn btn-outline-primary" onclick="window.location.href = '#';">OTHERS STATE</button>
</div>
    </div>

    <!-- Cards Start -->
<div class="row">
<div class="col-sm-4">
<div class="card mt-5 text-center">
  <div class="card-header">
     <i class="fa-solid fa-calendar-days px-2"></i>Deadline: 26/04/2022
  </div>
  <div class="card-body">
    <h5 class="card-title">Scholarship Name</h5>
    <p class="card-text">Eligibility</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
  <div class="card-footer text-muted">
    View Scholarship
  </div>
</div>
</div>

<div class="col-sm-4">
<div class="card mt-5 text-center">
  <div class="card-header">
     <i class="fa-solid fa-calendar-days px-2"></i>Deadline: 26/04/2022
  </div>
  <div class="card-body">
    <h5 class="card-title">Scholarship Name</h5>
    <p class="card-text">Eligibility</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
  <div class="card-footer text-muted">
    View Scholarship
  </div>
</div>
</div>

<div class="col-sm-4">
<div class="card mt-5 text-center">
  <div class="card-header">
     <i class="fa-solid fa-calendar-days px-2"></i>Deadline: 26/04/2022
  </div>
  <div class="card-body">
    <h5 class="card-title">Scholarship Name</h5>
    <p class="card-text">Eligibility</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
  <div class="card-footer text-muted">
    View Scholarship
  </div>
</div>
</div>
</div>
<!-- Cards End -->
</div>
  <div class="tab-pane fade" id="nav-non-govt" role="tabpanel" aria-labelledby="nav-non-govt-tab">
    <!-- Cards Start -->
<div class="row">
  <div class="col-sm-4">
<div class="card mt-5 text-center">
  <div class="card-header">
    <i class="fa-solid fa-calendar-days px-2"></i>Deadline: 26/04/2022
  </div>
  <div class="card-body">
    <h5 class="card-title">Scholarship Name</h5>
    <p class="card-text">Eligibility</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
  <div class="card-footer text-muted">
    View Scholarship
  </div>
</div>
</div>

  <div class="col-sm-4">
<div class="card mt-5 text-center">
  <div class="card-header">
    <i class="fa-solid fa-calendar-days px-2"></i>Deadline: 26/04/2022
  </div>
  <div class="card-body">
    <h5 class="card-title">Scholarship Name</h5>
    <p class="card-text">Eligibility</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
  <div class="card-footer text-muted">
    View Scholarship
  </div>
</div>
</div>

  <div class="col-sm-4">
<div class="card mt-5 text-center">
  <div class="card-header">
    <i class="fa-solid fa-calendar-days px-2"></i>Deadline: 26/04/2022
  </div>
  <div class="card-body">
    <h5 class="card-title">Scholarship Name</h5>
    <p class="card-text">Eligibility</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
  <div class="card-footer text-muted">
    View Scholarship
  </div>
</div>

<!-- Cards End -->
  </div>
</div>
<div>
</section>


