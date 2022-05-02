<?php 
// Include config file
include("admin-layout.php");

?>

<title>Add Details</title>
<div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">Add Details</span>
                </div>
            </div>
<!-- Add contents here -->
        <label>Add the details of Scholarship</label>
        <br><br>
        <form  method="post" class="row g-3"> 
            <div class="col-md-12">
                <label for="name" class="form-label">Scholarship Name :</label>
                <input type="text" name="scholarshipname"  id="" minlength="" maxlength="" placeholder="Scholarship Name">
            </div>
            <div class="col-md-12">
                <label for="name" class="form-label">Elegibility :</label>
                <input type="text" name="elegibility"  id="" minlength="" maxlength="" placeholder="Elegibility">
            </div>
            <div class="col-md-12">
                <label for="name" class="form-label">Requirments :</label>
                <input type="text" name="requirments"  id="" minlength="" maxlength="" placeholder="Requirments">
            </div>
            <div class="col-md-12">
                <label for="name" class="form-label">Steps To Apply :</label>
                <input type="text" name="stepstoapply"  id="" minlength="" maxlength="" placeholder="Steps To Apply">
            </div>
            <div class="col-md-12">
                <label for="name" class="form-label">Add Link :</label>
                <input type="text" name="addlink"  id="" minlength="" maxlength="" placeholder="Add Link">
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <a class="btn btn-danger" href="dashboard.php">Cancel</a>
            </div>
        </form>
    </div>  
<!-- End of content  -->
</section>