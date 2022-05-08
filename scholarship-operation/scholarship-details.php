<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../index.php");
    exit;
}
require_once("../db/config.php");
$sch_id = urldecode($_GET['id']);
$sql = "SELECT * FROM scholarship_details t1 INNER JOIN elig_req t2 ON t2.sch_name = t1.sch_name WHERE t1.id = '$sch_id'";
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
  <button type="button" class="btn btn-outline-light">About The Program</button>
  <button type="button" class="btn btn-outline-light">Eligibility</button>
  <button type="button" class="btn btn-outline-light">Required Documents</button>
  <button type="button" class="btn btn-outline-light">How To Apply</button>
</div>
    <div class="container mt-5 px-4 px-lg-5">
        <div class="card row gx-4 gx-lg-5 justify-content-center">
            <div class="text-capitalize font-monospace card-header w-100 col-md-10" style="background-color: #4E4E91;">
                  <h4 class="pt-1 text-white"><?php echo $row['sch_name'] ?></h4>
            </div>
            <div class="card-body">
              <h5 class="card-title">Special title treatment</h5>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            </div>
        </div>
    </div>
<?php }
}
} ?>
</body>

</html>