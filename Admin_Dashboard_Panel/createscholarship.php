<?php
include("admin-layout.php")
?>
<title>Create Scholarship</title>
<div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">Create or List Scholarship</span>
                </div>
            </div>
<!-- Add contents here -->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="row g-3">
            <div class="col-md-6">
                <label for="scholarship-name" class="form-label fw-bolder">Scholarship Name</label>
                    <input type="text" name="s-name" class="form-control" id="scholarship-name" placeholder="SCHOLARSHIP NAME" required />
            </div>
                <div class="col-md-6">
                <label for="scholarship-provider" class="form-label fw-bolder">Scholarship Provider</label>
                    <input type="text" name="provider-name" class="form-control" id="scholarship-provider" placeholder="SCHOLARSHIP PROVIDER NAME" required />
                </div>
            <div class="col-md-12">
                <label for="scholarship-type" class="form-label fw-bolder mt-5">Choose Provider Type</label>
               <div id="scholarship-type">
                <div class="form-check">
                    <input class="form-check-input" name="s-type" type="radio" id="NGO">
                    <label class="form-check-label" for="NGO">NGO / Non-Profit</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" name="s-type" type="radio" id="private">
                    <label class="form-check-label" for="private">Business, Company, or Corporation</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" name="s-type" type="radio" id="c-govt">
                    <label class="form-check-label" for="c-govt">Central Government</label>
                </div> 
                <div class="form-check">
                    <input class="form-check-input" name="s-type" type="radio" id="s-govt" onclick="stateName()">
                    <label class="form-check-label" for="s-govt">State Government</label>
                </div>   
                <div class="col-md-6 mt-5">
                    <input type="text" id="state" class="form-control" style="display:none" placeholder="STATE NAME">      
                </div>    
               </div>
            </div>
                <div class="col-md-6">
                <label for="app-deadline" class="form-label fw-bolder">Application Deadline</label>
                    <input type="date" name="app-deadline" class="form-control" id="app-deadline" placeholder="LAST DATE TO APPLY" required />
                </div>
                <div class="col-md-12">
                    <label for="elig-crit" class="form-label fw-bolder mt-5">Eligibility Requirements (Select all that apply)</label>
                    <div id="elig-crit">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                            <label for="eligibility-criteria" class="form-check-label">Scholarship for Minorities(SC/ST/OBC)</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                            <label for="eligibility-criteria" class="form-check-label">Scholarship for SC/ST</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                            <label for="eligibility-criteria" class="form-check-label">Scholarship for Women</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                            <label for="eligibility-criteria" class="form-check-label">Community Service Scholarship</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                            <label for="eligibility-criteria" class="form-check-label">Military Scholarship</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                            <label for="eligibility-criteria" class="form-check-label">PwD(Person With Disability) Scholarship</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                            <label for="eligibility-criteria" class="form-check-label">Athletic Scholarship</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="other-scholarship" onclick="scholarshipName()">
                            <label for="eligibility-criteria" class="form-check-label">Something else not listed</label>
                        </div>
                        <div class="col-md-6 mt-5">
                            <input type="text" id="sch-name" class="form-control" style="display:none" placeholder="SCHOLARSHIP NAME">      
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <label for="elig-crit" class="form-label fw-bolder">Document Requirements (Select all that apply)</label>
                    <div id="elig-crit">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                            <label for="eligibility-criteria" class="form-check-label">Government ID Proof(eg. Aadhar Card, Driving License etc.)</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                            <label for="eligibility-criteria" class="form-check-label">Scholarship for SC/ST</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                            <label for="eligibility-criteria" class="form-check-label">Scholarship for Women</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                            <label for="eligibility-criteria" class="form-check-label">Community Service Scholarship</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                            <label for="eligibility-criteria" class="form-check-label">Military Scholarship</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                            <label for="eligibility-criteria" class="form-check-label">PwD(Person With Disability) Scholarship</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                            <label for="eligibility-criteria" class="form-check-label">Athletic Scholarship</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="other-scholarship" onclick="scholarshipName()">
                            <label for="eligibility-criteria" class="form-check-label">Something else not listed</label>
                        </div>
                        <div class="col-md-6 mt-5">
                            <input type="text" id="sch-name" class="form-control" style="display:none" placeholder="SCHOLARSHIP NAME">      
                        </div>
                    </div>
                </div>
                
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <a class="btn btn-danger" href="dashboard.php">Cancel</a>
            </div>
        </form>
    </div>  
<!-- End of content  -->
</section>


<!-- Java Script Links -->
<script>

// State Name
    function stateName() {
  // Get the checkbox
  var checkBox = document.getElementById("s-govt");
  // Get the output text
  var text = document.getElementById("state");

  // If the checkbox is checked, display the output text
  if (checkBox.checked == true){
    text.style.display = "block";
  } else {
    text.style.display = "none";
  }
} 

// Other Scholarship Name

    function scholarshipName() {
  // Get the checkbox
  var checkBox = document.getElementById("other-scholarship");
  // Get the output text
  var text = document.getElementById("sch-name");

  // If the checkbox is checked, display the output text
  if (checkBox.checked == true){
    text.style.display = "block";
  } else {
    text.style.display = "none";
  }
}
</script>
