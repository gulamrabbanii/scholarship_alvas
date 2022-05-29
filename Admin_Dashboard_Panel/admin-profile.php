<?php
include("admin-layout.php");
require_once("../db/config.php");

$sql1 = "SELECT * FROM `upload_sch_docs` t1 INNER JOIN users t2 ON t2.username = t1.usn ORDER BY t1.created_at DESC;";
$query = $link->query($sql1);

$sql2 = "SELECT COUNT(*) FROM scholarship_details;";
$result2 = $link->query($sql2);

$sql3 = "SELECT COUNT(*) FROM upload_sch_docs ORDER BY created_at DESC;";
$result3 = $link->query($sql3);

$sql4 = "SELECT COUNT(*) FROM sch_receipt_proof WHERE is_received = 'yes';";
$result4 = $link->query($sql4);
?>
<title>ADMIN DASHBOARD PANEL</title>

<div class="dash-content">
    <div class="overview">
        <div class="title">
            <i class="uil uil-tachometer-fast-alt"></i>
            <span class="text">DASHBOARD</span>
        </div>

        <div class="boxes">
            <div class="box box1">
                <i class="mb-2 mt-1 fa fa-graduation-cap" aria-hidden="true"></i>
                <span class="text"># Total Scholarships</span>
                <span class="number"><?php foreach ($result2 as $res) echo $res['COUNT(*)']; ?></span>
            </div>

            <div class="box box2">
                <i class="my-2 fa fa-paper-plane" aria-hidden="true"></i>
                <span class="text"># Scholarship Application</span>
                <span class="number"><?php foreach ($result3 as $res) echo $res['COUNT(*)']; ?></span>
            </div>
            <div class="box box3">
                <i class="uil uil-thumbs-up"></i>
                <span class="text"># Received Scholarship</span>
                <span class="number"><?php foreach ($result4 as $res) echo $res['COUNT(*)']; ?></span>
            </div>
        </div>
    </div>

    <div class="activity">
        <div class="title">
            <i class="uil uil-clock-three"></i>
            <span class="text">Recent Activity</span>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col"><label>USN</label></th>
                    <th scope="col"><label>Name</label></th>
                    <th scope="col"><label>Year</label></th>
                    <th scope="col"><label>Branch</label></th>
                    <th scope="col"><label>Scholarship Name</label></th>
                    <th scope="col"><label>Applied Date</label></th>
                    <th scope="col"><label>Status</label></th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_array($query)) { ?>
                    <tr>
                        <td><label><?php echo $row['username']; ?></label></td>
                        <td><label><?php echo $row['first_name'];
                                    echo " ";
                                    echo $row['last_name']; ?></label></td>
                        <td><label><?php echo $row['year']; ?></label></td>
                        <td><label><?php echo $row['dept']; ?></label></td>
                        <td><label><?php echo $row['sch_name']; ?></label></td>
                        <td><label><?php echo $row['sch_applied_year']; ?></label></td>
                        <td><label><?php echo $row['is_received']; ?></label></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
</section>