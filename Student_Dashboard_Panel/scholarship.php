<?php
include('sidebar-layout.php');
?>

<style>
.nav-pills > li > a.active {
  background-color: green !important;
  color: white !important;
}

.nav-pills > li > a:hover {
background-color: black !important; 
color: white !important; 
}

.nav-pills > li > a {
background-color: #EEEEEE !important;
color: black;  
}
.nav-link-color {
  color: #ffffff;
}
.card {
    border-radius: 5px;
    background: rgba(236, 240, 243, 0.6);
    box-shadow: 13px 13px 20px #cbced1,
        -13px -13px 20px #ffffff;
    height: 400px;
}
.card-text-body {
  margin-top: 30px;
  height: calc(100% - 150px);
}
.txt:hover {
    text-decoration: underline;
}
</style>


<section>
<div class="container p-4">
  <h2>Scholarship</h2>


<!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" data-bs-toggle="tab" href="#all-scholarship">All Scholarship</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="tab" href="#category">Category</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="tab" href="#govt">Government</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="tab" href="#non-govt">Non-Government</a>
    </li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div id="all-scholarship" class="container tab-pane active"><br>
      
      <!-- Nav pills -->
  <ul class="nav nav-pills" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" data-bs-toggle="pill" href="#live-scholarship">LIVE SCHOLARSHIP</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="pill" href="#upcoming-scholarship">UPCOMING SCHOLARSHIP</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="pill" href="#always-open">ALWAYS OPEN</a>
    </li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div id="live-scholarship" class="container tab-pane active"><br>
      <?php 
        include("../scholarship-operation/live-scholarship.php");
        ?>
    </div>
    <div id="upcoming-scholarship" class="container tab-pane fade"><br>
      <?php 
        include("../scholarship-operation/upcoming-scholarship.php");
        ?>
    </div>
    <div id="always-open" class="container tab-pane fade"><br>
      <?php 
        include("../scholarship-operation/always-open.php");
        ?>
    </div>
  </div>  
    </div>
    
    
    
    <div id="category" class="container tab-pane fade"><br>
      <!-- Nav pills -->
  <ul class="nav nav-pills" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" data-bs-toggle="pill" href="#minority">MINORITY</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="pill" href="#sc-st">SC/ST</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="pill" href="#girls">GIRLS</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="pill" href="#athletics">ATHLETICS</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="pill" href="#pwd">PHYSICALY DISABLED</a>
    </li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div id="minority" class="container tab-pane active"><br>
      <?php 
        include("../scholarship-operation/minority-scholarship.php");
        ?>
    </div>
    <div id="sc-st" class="container tab-pane fade"><br>
      <?php 
        include("../scholarship-operation/sc-st-scholarship.php");
        ?>
    </div>
    <div id="girls" class="container tab-pane fade"><br>
      <?php 
        include("../scholarship-operation/girls-scholarship.php");
        ?>
    </div>
    <div id="athletics" class="container tab-pane fade"><br>
      <?php 
        include("../scholarship-operation/athletics-scholarship.php");
        ?>
    </div>
    <div id="pwd" class="container tab-pane fade"><br>
      <?php 
        include("../scholarship-operation/pwd-scholarship.php");
        ?>
    </div>
  </div>
    </div>
    
    
    
    <div id="govt" class="container tab-pane fade"><br>
      <!-- Nav pills -->
  <ul class="nav nav-pills" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" data-bs-toggle="pill" href="#govt-india">GOVERNMENT OF INDIA</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="pill" href="#karnataka">KARNATAK</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="pill" href="#other-state">OTHER STATE</a>
    </li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div id="govt-india" class="container tab-pane active"><br>
      <?php 
        include("../scholarship-operation/govt-india.php");
        ?>
    </div>
    <div id="karnataka" class="container tab-pane fade"><br>
      <?php 
        include("../scholarship-operation/karnataka.php");
        ?>
    </div>
    <div id="other-state" class="container tab-pane fade"><br>
      <?php 
        include("../scholarship-operation/other-state.php");
        ?>
    </div>
  </div>
    </div>
    
    
    <div id="non-govt" class="container tab-pane fade"><br>
      <?php 
        include("../scholarship-operation/non-govt.php");
        ?>
    </div>
  </div>


</div>
</section>