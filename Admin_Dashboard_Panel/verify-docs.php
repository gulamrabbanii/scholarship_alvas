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
if($result = $link->query($sql)){
    $i = 1;
    if($result->num_rows > 0){
        while($row = $result->fetch_array()){ ?>
        <div class="accordion accordion-flush" id="accordionFlushExample">
     <div class="accordion-item">
            <h2 class="accordion-header" id="flush-heading<?php echo $i; ?>">
                <button class="accordion-button collapsed text-dark fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?php echo $i; ?>" aria-expanded="false" aria-controls="flush-collapse<?php echo $i; ?>">
                    <?php echo $row['sch_name']; ?>
                </button>
            </h2>
            <div id="flush-collapse<?php echo $i; ?>" class="accordion-collapse collapse" aria-labelledby="flush-heading<?php echo $i; ?>" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    
                    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">USN</th>
      <th scope="col">Name</th>
      <th scope="col">Year</th>
      <th scope="col">Applied Scholarship</th>
      <th scope="col">Academic Year</th>
      <th scope="col">Download</th>
      <th scope="col">Verified</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>4AL18CS099</td>
      <td>Gulam Rabbani</td>
      <td>4</td>
      <td>National Scholarship Portal</td>
      <td>2022-23</td>
      <td class="justify-content-center d-flex"><a href="#"><i class="bi bi-file-earmark-arrow-down-fill"></i></a></td>
      <td><a href="#"><i class="px-4 bi bi-patch-check-fill"></i></a></td>
    </tr>
  </tbody>
</table>

                </div>
            </div>
        </div> 
<?php   $i++;
        } ?>
    </div>
<?php
    }
}
?>  
</div>
<!-- End of content  -->



    </section>
<!-- Bootstrap Java Script -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
