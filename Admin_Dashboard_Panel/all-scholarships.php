<?php
include("admin-layout.php");
require_once("../db/config.php");

$sql = "SELECT * FROM scholarship_details t1 INNER JOIN elig_req t2 ON t2.sch_name = t1.sch_name WHERE (status = 'active' OR status IS NULL) ORDER BY created_at DESC";
?>
<title>ALL SCHOLARSHIPS</title>
        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">

<div class="container">
  <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
  <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
  <label class="btn btn-outline-primary" for="btnradio1" onclick="window.location.href = 'all-scholarships.php';">ALL SCHOLARSHIP</label>

  <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
  <label class="btn btn-outline-primary" for="btnradio2" onclick="window.location.href = 'live-scholarship.php';">LIVE SCHOLARSHIP</label>

  <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
  <label class="btn btn-outline-primary" for="btnradio3" onclick="window.location.href = 'upcoming-scholarship.php';">UPCOMING SCHOLARSHIP</label>

  <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
  <label class="btn btn-outline-primary" for="btnradio3" onclick="window.location.href = 'inactive-scholarship.php';">INACTIVE SCHOLARSHIP</label>
</div>
</div>


                    </span>
                </div>
    
<!-- Add contents here -->
<style>
  .card {
    border-radius: 5px;
    background: rgba(236, 240, 243, 0.6);
    height: 450px;
}
.card-text-body {
  margin-top: 10px;
  height: calc(100% - 300px);
}
.txt:hover {
    text-decoration: underline;
}
p {
margin: 0;
padding: 2px;
text-align: justify;
text-justify:initial;
word-break: break-all;
line-height: 1;
}
</style>


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
                        <ul>
                        <?php if(!empty($row['minority'])) {?>
                        <li><p><small class="text-muted"><?php echo $row['minority']; ?></small></p></li>
                        <?php }?>
                        <?php if(!empty($row['sc_st'])) {?>
                        <li><p><small class="text-muted"><?php echo $row['sc_st']; ?></small></p></li>
                        <?php }?>
                        <?php if(!empty($row['girls'])) {?>
                        <li><p><small class="text-muted"><?php echo $row['girls']; ?></small></p></li>
                        <?php }?><?php if(!empty($row['community'])) {?>
                        <li><p><small class="text-muted"><?php echo $row['community']; ?></small></p></li>
                        <?php }?>
                        <?php if(!empty($row['pwd'])) {?>
                        <li><p><small class="text-muted"><?php echo $row['pwd']; ?></small></p>
                        <?php }?></li>
                        <?php if(!empty($row['athletic'])) {?>
                        <li><p><small class="text-muted"><?php echo $row['athletic']; ?></small></p></li>
                        <?php }?>
                        <?php if(!empty($row['other_sch'])) {?>
                        <li><p><small class="text-muted"><?php echo $row['other_sch']; ?></small></p></li>
                       <?php }?>
                    <ul>                     
                </div>         
                </div>
                <div class="card-footer d-flex justify-content-between">
                <small> Last Updated On:</small>
                <small class="text-muted"><?php echo $row['created_at'] ?></small>   
                </div>
                <div class="card-footer">
                  <div class="d-flex justify-content-center">
                      <div class="btn btn-sm"><i class="fas fa-eye-slash" aria-hidden="true">
                        <?php echo "<a class='px-1 text-decoration-none text-muted' onclick=\"return confirm('Do you really want to disable this scholarship?')\" href=\"../scholarship-operation/disable-scholarship.php?id=" . $row['id'] . " \">DISABLE</a>"; ?>
                            <script>
                                document.getElementById('a.delete').on('click', function() {
                                    var choice = confirm('Disable this scholarship?');
                                    if (choice === true) {
                                        return true;
                                    }
                                    return false;
                                });
                            </script>
                      </i></div>
                      <div class="btn btn-sm"><i class="fas fa-edit" aria-hidden="true">
                          <?php echo "<a class='px-1 text-decoration-none text-success' onclick=\"return confirm('Do you really want to modify this scholarship?')\" href=\"update-scholarship.php?id=" . $row['id'] . " \">MODIFY</a>"; ?>
                            <script>
                                document.getElementById('a.delete').on('click', function() {
                                    var choice = confirm('Modify this scholarship?');
                                    if (choice === true) {
                                        return true;
                                    }
                                    return false;
                                });
                            </script>
                      </i></div>
                      <div class="btn btn-sm"><i class="fa fa-trash" aria-hidden="true">
                          <?php echo "<a class='px-1 text-decoration-none text-danger' onclick=\"return confirm('Do you really want to delete this scholarship?')\" href=\"../scholarship-operation/delete-scholarship.php?id=" . $row['id'] . " \">DELETE</a>"; ?>
                            <script>
                                document.getElementById('a.delete').on('click', function() {
                                    var choice = confirm('Delete this scholarship?');
                                    if (choice === true) {
                                        return true;
                                    }
                                    return false;
                                });
                            </script>
                      </i></div>
                      </div>
                       </div>
                 <div class="card-footer text-center bg-primary">
                <a href="../scholarship-operation/scholarship-details.php?id=<?php echo urlencode($row['id']) ?>" class="text-decoration-none text-white">View Scholarship</a>
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



<!-- End of content  -->


            </div>
        </div>
    </section>
        