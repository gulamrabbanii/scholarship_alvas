<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../index.php");
    exit;
}
require_once("../db/config.php");
$sch_id = urldecode($_GET['id']);
$sql = "SELECT * FROM scholarship_details t1 INNER JOIN elig_req t2 ON t2.sch_name = t1.sch_name INNER JOIN doc_req t3 ON t3.sch_name = t1.sch_name WHERE t1.id = '$sch_id'";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APPLY FOR SCHOLARSHIP</title>
    <link rel="icon" href="../assets/img/icon.png" type="image/icon type">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap" rel="stylesheet">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
header.masthead {
  position: relative;
  padding-top: 4rem;
  padding-bottom: 3rem;
  background-color: #ffffff;
}
@media (min-width: 992px) {
  header.masthead {
    padding-top: 6rem;
    padding-bottom: 6rem;
  }
header.masthead .page-heading h1, header.masthead .page-heading .h1,
header.masthead .site-heading h1,
header.masthead .site-heading .h1 {
    font-size: 2rem;
  }
  header.masthead .post-heading h1, header.masthead .post-heading .h1 {
    font-size: 2rem;
  }
  header.masthead .post-heading .subheading {
    font-size: 1.875rem;
  }
}
header.masthead .page-heading,
header.masthead .site-heading {
  text-align: center;
}
header.masthead .page-heading h1, header.masthead .page-heading .h1,
header.masthead .site-heading h1,
header.masthead .site-heading .h1 {
  font-size: 3rem;
}
header.masthead .post-heading h1, header.masthead .post-heading .h1 {
  font-size: 2.25rem;
}
</style>
</head>
<body>
<?php
if($result = $link->query($sql)){
    if($result->num_rows > 0){
        while($row = $result->fetch_array()){ ?>
    <header class="masthead">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10">
                    <div class="site-heading">
                        <h1 style="color: #4E4E91; text-transform: capitalize;"><?php echo $row['sch_name'] ?></h1>
                        <span class="subheading"><button type="button" onclick="window.open('<?php echo $row['sch_link']?>','_blank' );" class="btn btn-primary">Apply Now</button></span>
                    </div>
                </div>
            </div>
        </div>
    </header>

<div class="btn-group bg-dark w-100" role="group" aria-label="Basic outlined example">
  <button type="button" class="btn btn-outline-light" onClick="history.go(-1);">Go Back</button>
  <button type="button" class="btn btn-outline-light" onclick="window.location.href='#program';">About The Program</button>
  <button type="button" class="btn btn-outline-light" onclick="window.location.href='#elig';">Eligibility</button>
  <button type="button" class="btn btn-outline-light" onclick="window.location.href='#docs';">Required Documents</button>
  <button type="button" class="btn btn-outline-light" onclick="window.location.href='#apply';">How To Apply</button>
</div>
    <div class="container mt-5 px-4 px-lg-5">
        <div class="card row gx-4 gx-lg-5 justify-content-center">
            <div class="text-capitalize font-monospace card-header w-100 col-md-10" style="background-color: #4E4E91;">
                  <h4 class="pt-1 text-white" id="program"><?php echo $row['sch_name'] ?></h4>
            </div>
            <div class="card-body">
              <h5 class="card-title fw-bold" id="elig">Eligibility</h5>
              <p class="fw-bold">To be eligible, an applicant must -</p>
              <p class="card-text"><ul>
                      <?php if(!empty($row['minority'])) {?>
                        <li><small class="text-muted"><?php echo $row['minority'] ?></small></li>
                       <?php }?>
                       <?php if(!empty($row['sc_st'])) {?>
                        <li><small class="text-muted"><?php echo $row['sc_st'] ?></small></li>
                       <?php }?>
                       <?php if(!empty($row['girls'])) {?>
                        <li><small class="text-muted"><?php echo $row['girls'] ?></small></li>
                       <?php }?><?php if(!empty($row['community'])) {?>
                        <li><small class="text-muted"><?php echo $row['community'] ?></small></li>
                       <?php }?>
                       <?php if(!empty($row['pwd'])) {?>
                        <li><small class="text-muted"><?php echo $row['pwd'] ?></small></li>
                       <?php }?>
                       <?php if(!empty($row['atthletic'])) {?>
                        <li><small class="text-muted"><?php echo $row['athletics'] ?></small></li>
                       <?php }?>
                       <?php if(!empty($row['other_sch'])) {?>
                        <li><small class="text-muted"><?php echo $row['other_sch'] ?></small></li>
                       <?php }?>
              </ul></p>
            </div>
            <div class="card-body">
              <h5 class="card-title fw-bold" id="docs">Required Documents</h5>
              <p class="card-text"><ul>

                      <?php if(!empty($row['govt_id'])) {?>
                        <li><small class="text-muted"><?php echo $row['govt_id'] ?></small></li>
                       <?php }?>
                       <?php if(!empty($row['domicile'])) {?>
                        <li><small class="text-muted"><?php echo $row['domicile'] ?></small></li>
                       <?php }?>
                       <?php if(!empty($row['income'])) {?>
                        <li><small class="text-muted"><?php echo $row['income'] ?></small></li>
                       <?php }?><?php if(!empty($row['pwd'])) {?>
                        <li><small class="text-muted"><?php echo $row['pwd'] ?></small></li>
                       <?php }?>
                       <?php if(!empty($row['bonafide'])) {?>
                        <li><small class="text-muted"><?php echo $row['bonafide'] ?></small></li>
                       <?php }?>
                       <?php if(!empty($row['caste'])) {?>
                        <li><small class="text-muted"><?php echo $row['caste'] ?></small></li>
                       <?php }?>
                       <?php if(!empty($row['parent_aadhar'])) {?>
                        <li><small class="text-muted"><?php echo $row['parent_aadhar'] ?></small></li>
                       <?php }?>
                       <?php if(!empty($row['bank_passbook'])) {?>
                        <li><small class="text-muted"><?php echo $row['bank_passbook'] ?></small></li>
                       <?php }?>
                       <?php if(!empty($row['college_fee'])) {?>
                        <li><small class="text-muted"><?php echo $row['college_fee'] ?></small></li>
                       <?php }?>
                       <?php if(!empty($row['sslc_puc'])) {?>
                        <li><small class="text-muted"><?php echo $row['sslc_puc'] ?></small></li>
                       <?php }?>
                       <?php if(!empty($row['sem'])) {?>
                        <li><small class="text-muted"><?php echo $row['sem'] ?></small></li>
                       <?php }?>
                       <?php if(!empty($row['diploma'])) {?>
                        <li><small class="text-muted"><?php echo $row['diploma'] ?></small></li>
                       <?php }?>
                       <?php if(!empty($row['self_dec'])) {?>
                        <li><small class="text-muted"><?php echo $row['self_dec'] ?></small></li>
                       <?php }?>
                       <?php if(!empty($row['other_cert'])) {?>
                        <li><small class="text-muted"><?php echo $row['other_cert'] ?></small></li>
                       <?php }?>
              </ul></p>
              
            </div>
            <div class="card-body">
              <h5 class="card-title fw-bold" id="apply">How To Apply</h5>
              <p class="text-muted">Step 1: <small>Click on the 'Apply Now' button.</small></p>
              <p class="text-muted">Step 2: <small>Navigate to the official website of <?php echo $row['sch_name'] ?>.</small></p>
              <p class="text-muted">Step 3: <small>You need to <stron> register yourself </strong>with the <?php echo $row['sch_name'] ?> before you can apply for a scholarship.</small></p>
              <p class="text-muted">Step 4: <small>Filling the National Scholarship Portal Application Form.</small></p>
              <p class="text-muted">Step 5: <small>Uploading the Documents.</small></p>
            </div>
            <div class="d-grid gap-2 mb-5 col-2 mx-auto">
            <button type="button" onclick="window.open('<?php echo $row['sch_link']?>','_blank' );" class="btn btn-primary">Apply Now</button>
            </div>
        </div>
    </div>
<?php }
}
} ?>
<div class="mb-5"></div>
</body>

</html>