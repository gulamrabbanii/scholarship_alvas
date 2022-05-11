<?php
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../index.php");
    exit;
}
require_once("../db/config.php");

$sql = $sql = "SELECT * FROM scholarship_details t1 INNER JOIN elig_req t2 ON t2.sch_name = t1.sch_name WHERE (status = 'active' OR status IS NULL) AND (minority = 'Minority Communities Students(SC/ST/OBC)') ORDER BY sch_deadline";
?>
<!-- Cards Start -->
<div class="row">
<?php
if($result = $link->query($sql)){
    if($result->num_rows > 0){
        while($row = $result->fetch_array()){ ?>
                <div class="col-sm-4">
                <div class="card mt-3">
                <div class="card-header text-center <?php echo ($row['sch_start_date'] > date("Y-m-d")) ? 'bg-success' : 'bg-danger'; ?>">
                <i class="fa-solid fa-calendar-days px-2"></i><?php echo ($row['sch_start_date'] > date("Y-m-d")) ? "Launch Date: " . $row["sch_start_date"] : "Deadline: " . $row["sch_deadline"]; ?>
                </div>
                <div class="card-body">
                <h5 class="card-title txt"><a class="text-decoration-none text-secondary" href="<?php echo $row['sch_link'] ?>" target="_blank" rel="noopener noreferrer"><?php echo $row["sch_name"] ?></a></h5>
                <hr>
                <div class="card-text-body">
                      <div class="card-text text-primary">Eligibility</div>
                        <?php if(!empty($row['minority'])) {?>
                        <small class="text-muted"><?php echo $row['minority'] ?></small>
                       <?php }?>
                       <?php if(!empty($row['sc_st'])) {?>
                    <small class="text-muted"><?php echo $row['sc_st'] ?></small>
                       <?php }?>
                       <?php if(!empty($row['girls'])) {?>
                    <small class="text-muted"><?php echo $row['girls'] ?></small>
                       <?php }?><?php if(!empty($row['community'])) {?>
                    <small class="text-muted"><?php echo $row['community'] ?></small>
                       <?php }?>
                       <?php if(!empty($row['pwd'])) {?>
                    <small class="text-muted"><?php echo $row['pwd'] ?></small>
                       <?php }?>
                       <?php if(!empty($row['atthletic'])) {?>
                    <small class="text-muted"><?php echo $row['athletics'] ?></small>
                       <?php }?>
                       <?php if(!empty($row['other_sch'])) {?>
                    <small class="text-muted"><?php echo $row['other_sch'] ?></small>
                       <?php }?>
                </div>
                </div>
                <div class="card-footer text-center bg-primary">
                <a href="scholarship-details.php?id=<?php echo urlencode($row['id']) ?>" class="text-decoration-none text-dark">View Scholarship</a>
                </div>
            </div>
            </div>            
<?php    } 
        // Free result set
        $result->free();
    } else{
        echo "<br>";
        echo "There are currently no scholarships available.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}
?>
</div>
<!-- Cards End -->