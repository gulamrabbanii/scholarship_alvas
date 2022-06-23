<?php
include("admin-layout.php");
require_once("../db/config.php");

$usn = $_GET['usn'];
$sql = "SELECT * FROM users WHERE username = '$usn'";
$result = $link->query($sql);
$img_path = 'https://www.nautec.com/wp-content/uploads/2018/04/placeholder-person.png';
$p1 = "SELECT * FROM display_pic where username='$usn'";
$res9 = $link->query($p1);
// print_r($res9);
if (mysqli_num_rows($res9) > 0) {
    $res9 = mysqli_fetch_assoc($res9);
    $img_path = $res9["dp"];
}

foreach ($result as $row) {
?>
    <style>
        .card-img {
            align-items: center;
            border-radius: 15px 15px 0 0;
            margin-top: -0px;
        }

        .card img {
            width: 90px;
            height: 90px;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background-image: linear-gradient(60deg, #2AAA8A, #4169E1);
            padding: 2px;
            margin-top: -40px;
        }
    </style>
    <div class="dash-content mt-5">
        <div class="overview">

        </div>
        <div class="card mx-1 card-img">
            <img src="<?php echo $img_path ?>" alt="">
            <div class="row m-4">
                <div class="col-md-6 mb-2">
                    <input type="text" class="form-control" value="<?php echo strtoupper($row['username']);
                                                                    $usn = $row['username']; ?>" disabled readonly />
                </div>
                <div class="col-md-6 mb-2">
                    <input type="text" class="form-control" value="<?php echo ucwords($row['first_name']); ?> <?php echo $row['last_name']; ?>" disabled readonly />
                </div>
                <div class="col-md-12 mb-2">
                    <input type="text" class="form-control" value="<?php echo $row['dept']; ?>" disabled readonly />
                </div>
                <div class="col-md-6 mb-2">
                    <input type="text" class="form-control" value="<?php echo $row['semester'] . ' Sem'; ?>" disabled readonly />
                </div>
                <div class="col-md-6 mb-2">
                    <input type="text" class="form-control" value="<?php echo $row['section'] . ' Section'; ?>" disabled readonly />
                </div>
                <?php }
            $q = "SELECT * FROM `upload_sch_docs` WHERE usn = '$usn' ORDER BY created_at DESC;";
            $r = $link->query($q);
            if (mysqli_num_rows($r) > 0) {
                echo '<h6>Scholarship Details:</h6>';
                $cnt = 1;
                while ($row2 = mysqli_fetch_array($r)) { ?>
                    <p>#<?php echo $cnt; ?><span class="value"></span></p>
                    <div class="col-md-12 mb-2">
                        <input type="text" class="form-control" value="<?php echo $row2['sch_name']; ?>" disabled readonly />
                    </div>
                    <div class="col-md-6 mb-2">
                        <input type="text" class="form-control" value="<?php echo $row2['sch_applied_year']; ?>" disabled readonly />
                    </div>
                    <div class="col-md-6 mb-2">
                        <input type="text" class="form-control" value="<?php echo 'College-Verified: ' . $row2['is_verified']; ?>" disabled readonly />
                    </div>

            <?php $cnt++;
                }
            } ?>

            <div class="col-md-4 mb-2">
                <a onclick="history.back()" class="btn mt-2 w-50 btn-secondary">Go Back</a>
            </div>
            </div>
        </div>
    </div>
    </div>
    </div>