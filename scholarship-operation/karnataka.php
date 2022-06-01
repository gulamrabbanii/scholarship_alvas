<?php
$pattern = "/4(al)[0-9]{2}[A-Za-z]{2}[0-9]{3}/i";
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || !preg_match($pattern, $_SESSION["username"])) {
    header("location: ../index.php");
    exit;
}
require_once("../db/config.php");

$sql = $sql = "SELECT * FROM scholarship_details t1 INNER JOIN elig_req t2 ON t2.sch_name = t1.sch_name WHERE (status = 'active' OR status IS NULL) AND (sch_type LIKE '%karnataka%') ORDER BY sch_deadline";
?>
<!-- Cards Start -->
<div class="row">
    <?php
    if ($result = $link->query($sql)) {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_array()) { ?>
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
                                    <?php if (!empty($row['minority'])) { ?>
                                        <li>
                                            <p><small class="text-muted"><?php echo $row['minority']; ?></small></p>
                                        </li>
                                    <?php } ?>
                                    <?php if (!empty($row['sc_st'])) { ?>
                                        <li>
                                            <p><small class="text-muted"><?php echo $row['sc_st']; ?></small></p>
                                        </li>
                                    <?php } ?>
                                    <?php if (!empty($row['girls'])) { ?>
                                        <li>
                                            <p><small class="text-muted"><?php echo $row['girls']; ?></small></p>
                                        </li>
                                        <?php } ?><?php if (!empty($row['community'])) { ?>
                                        <li>
                                            <p><small class="text-muted"><?php echo $row['community']; ?></small></p>
                                        </li>
                                    <?php } ?>
                                    <?php if (!empty($row['pwd'])) { ?>
                                        <li>
                                            <p><small class="text-muted"><?php echo $row['pwd']; ?></small></p>
                                        <?php } ?>
                                        </li>
                                        <?php if (!empty($row['athletic'])) { ?>
                                            <li>
                                                <p><small class="text-muted"><?php echo $row['athletic']; ?></small></p>
                                            </li>
                                        <?php } ?>
                                        <?php if (!empty($row['other_sch'])) { ?>
                                            <li>
                                                <p><small class="text-muted"><?php echo $row['other_sch']; ?></small></p>
                                            </li>
                                        <?php } ?>
                                        <ul>
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
        } else {
            echo "<br>";
            echo "There are currently no scholarships available.";
        }
    } else {
        echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
    }

    ?>
</div>
<!-- Cards End -->