<?php
include("admin-layout.php");
require_once("../db/config.php");
$sql = "SELECT * FROM scholarship_details ORDER BY sch_name ASC";
?>
<title>DOCs VERIFICATION</title>

<div class="dash-content">
    <div class="overview">
        <div class="title">
            <i class="bi bi-folder2"></i>
            <span class="text">VERIFY DOCUMENTS
            </span>
        </div>
    </div>
    <!-- Add contents here -->
    <?php
    if ($result = $link->query($sql)) {
        $i = 1;
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_array()) { ?>
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-heading<?php echo $i; ?>">
                            <button class="accordion-button collapsed text-dark fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?php echo $i; ?>" aria-expanded="false" aria-controls="flush-collapse<?php echo $i; ?>">
                                <?php echo strtoupper($row['sch_name']);
                                $sch_name = $row['sch_name']; ?>

                            </button>
                        </h2>
                        <div id="flush-collapse<?php echo $i; ?>" class="accordion-collapse collapse" aria-labelledby="flush-heading<?php echo $i; ?>" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <?php $sql1 = "SELECT * FROM `upload_sch_docs` t1 INNER JOIN users t2 ON t2.username = t1.usn WHERE sch_name = '$sch_name' ORDER BY t1.created_at DESC;";
                                $query = $link->query($sql1);
                                if (mysqli_num_rows($query) > 0) {
                                ?>
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">USN</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Sem</th>
                                                <th scope="col">Section</th>
                                                <th scope="col">Academic Year</th>
                                                <th scope="col">Download</th>
                                                <th scope="col">Action</th>
                                                <th scope="col">College Verified</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $idpro = 1;
                                            while ($row1 = mysqli_fetch_array($query)) { ?>
                                                <tr>
                                                    <th scope="row"><?php echo $idpro ?></th>
                                                    <td><?php echo $row1['usn'] ?></td>
                                                    <td><?php echo ucwords($row1['first_name']); ?> <?php echo $row1['last_name']; ?></td>
                                                    <td><?php echo $row1['semester'] ?></td>
                                                    <td><?php echo $row1['section'] ?></td>
                                                    <td><?php echo $row1['sch_applied_year'] ?></td>
                                                    <td><a href="../scholarship-operation/download-docs.php?FileNo=<?php echo $row1['uid']; ?>" class="btn btn-primary">Download</a></td>
                                                    <td><a href="../scholarship-operation/verify.php?FileId=<?php echo $row1['uid']; ?>" class="btn btn-primary">Verify</a></td>
                                                    <td><?php echo $row1['is_verified'] ?></td>
                                                </tr>
                                        <?php
                                                $idpro++;
                                            }
                                        } else {
                                            echo "There are currently no scholarships entry.";
                                        } ?>
                                        </tbody>
                                    </table>
                            </div>
                        </div>
                    </div>
                <?php $i++;
            } ?>
                </div>
        <?php
        }
        $link->close();
    }
        ?>
</div>
<!-- End of content  -->
<!-- <i class="px-4 bi bi-patch-check-fill"></i> 
<i class="bi bi-file-earmark-arrow-down-fill" style="font-size: 100%;"></i>-->


</section>
<!-- Bootstrap Java Script -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>