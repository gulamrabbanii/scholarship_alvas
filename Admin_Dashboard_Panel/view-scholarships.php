<?php 
// Include config file
include("admin-layout.php");

?>
<title>Content</title>
        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">Scholarships</span>
                </div>
    
<!-- Add contents here -->

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
    <form method="POST" action="createscholarship.php">
      <input type="submit"class="btn btn-primary"  value="Add Details"></input>
    </form>
   
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
    <form method="POST" action="createscholarship.php">
      <input type="submit"class="btn btn-primary"  value="Add Details"></input>
    </form>
   
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
    <form method="POST" action="createscholarship.php">
      <input type="submit"class="btn btn-primary"  value="Add Details"></input>
    </form>
   
  </div>
  
            </div>
        </div>
    </section>
        