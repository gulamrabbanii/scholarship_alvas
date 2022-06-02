<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="card modal-body card-img">
                <img src="https://www.nautec.com/wp-content/uploads/2018/04/placeholder-person.png" alt="">
                <div class="row mt-4">
                    <div class="col-md-6 mb-2">
                        <input type="text" class="form-control" value="<?php echo strtoupper($row1['username']); ?>" disabled readonly />
                    </div>
                    <div class="col-md-6 mb-2">
                        <input type="text" class="form-control" value="<?php echo ucwords($row1['first_name']); ?> <?php echo $row1['last_name']; ?>" disabled readonly />
                    </div>
                    <div class="col-md-12 mb-2">
                        <input type="text" class="form-control" value="<?php echo $row1['dept']; ?>" disabled readonly />
                    </div>
                    <div class="col-md-6 mb-2">
                        <input type="text" class="form-control" value="<?php echo $row1['semester'] . ' Sem'; ?>" disabled readonly />
                    </div>
                    <div class="col-md-6 mb-2">
                        <input type="text" class="form-control" value="<?php echo $row1['section'] . ' Section'; ?>" disabled readonly />
                    </div>
                    <h6>Scholarship Details:</h6>
                    <?php $q = "SELECT * FROM `upload_sch_docs` WHERE usn = '$usn' ORDER BY created_at DESC;";
                    $r = $link->query($q);
                    if (mysqli_num_rows($r) > 0) {
                        $cnt = 1;
                        while ($row2 = mysqli_fetch_array($r)) { ?>
                            <p>#<?php echo $cnt; ?><span class="value"></span></p>
                            <div class="col-md-12 mb-2">
                                <input type="text" class="form-control" value="<?php echo $row2['sch_name']; ?>" disabled readonly />
                            </div>
                            <div class="col-md-4 mb-2">
                                <input type="text" class="form-control" value="<?php echo $row2['sch_applied_year']; ?>" disabled readonly />
                            </div>
                            <div class="col-md-8 mb-2">
                                <input type="text" class="form-control" value="<?php echo 'College-Verified: ' . $row2['is_verified']; ?>" disabled readonly />
                            </div>
                            <div class="col-md-12 mb-2">
                                <input type="text" class="form-control" value="<?php echo 'Received: ' . $row2['is_received']; ?>" disabled readonly />
                            </div>
                    <?php $cnt++;
                        }
                    } ?>

                </div>
                <button type="button" class="btn mt-2 w-100 btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>