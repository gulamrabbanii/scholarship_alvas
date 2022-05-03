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
                    <input type="text" name="p-name" class="form-control" id="scholarship-provider" placeholder="SCHOLARSHIP PROVIDER NAME" required />
                </div>
                <div class="col-md-6 mt-5">
                <label for="scholarship-year" class="form-label fw-bolder">Scholarship For Academic Year</label>
                    <input type="text" name="s-year" class="form-control" id="scholarship-year" placeholder="eg. 2022-23" pattern="[0-9]{4}-[0-9]{2}" equired />
                </div>
            <div class="col-md-12">
                <label for="scholarship-type" class="form-label fw-bolder mt-5">Choose Provider Type</label>
               <div id="scholarship-type">
                <div class="form-check">
                    <input class="form-check-input" value="NGO / Non-Profit" name="s-type" type="radio" id="NGO">
                    <label class="form-check-label" for="NGO">NGO / Non-Profit</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" value="Business, Company, or Corporation" name="s-type" type="radio" id="private">
                    <label class="form-check-label" for="private">Business, Company, or Corporation</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" value="Central Government" name="s-type" type="radio" id="c-govt">
                    <label class="form-check-label" for="c-govt">Central Government</label>
                </div> 
                <div class="form-check">
                    <input class="form-check-input" value="Karnataka" name="s-type" type="radio" id="k-govt">
                    <label class="form-check-label" for="k-govt">Karnataka</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" value="Other State" name="s-type" type="radio" id="o-govt">
                    <label class="form-check-label" for="o-govt">Other State</label>
                </div>    
               </div>
            </div>
                <div class="col-md-6">
                <label for="app-deadline" class="form-label fw-bolder mt-5">Application Deadline</label>
                    <input type="date" name="app-deadline" class="form-control" id="app-deadline" placeholder="LAST DATE TO APPLY" required />
                </div>
                <div class="col-md-12">
                    <label for="elig-crit" class="form-label fw-bolder mt-5">Eligibility Requirements (Select all that apply)</label>
                    <div id="elig-crit">
                        <div class="form-check form-switch">
                            <input class="form-check-input" value="Scholarship for Minorities(SC/ST/OBC)" type="checkbox" role="switch" id="minority">
                            <label for="minority" class="form-check-label">Scholarship for Minorities(SC/ST/OBC)</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" value="Scholarship for SC/ST only" type="checkbox" role="switch" id="sc-st">
                            <label for="sc-st" class="form-check-label">Scholarship for SC/ST only</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" value="Scholarship for Girls" type="checkbox" role="switch" id="s-girls">
                            <label for="s-girls" class="form-check-label">Scholarship for Girls</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" value="Community Service Scholarship" type="checkbox" role="switch" id="c-service">
                            <label for="c-service" class="form-check-label">Community Service Scholarship</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" value="Military Scholarship" type="checkbox" role="switch" id="m-scholarship">
                            <label for="m-scholarship" class="form-check-label">Military Scholarship</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" value="PwD(Person With Disability) Scholarship" type="checkbox" role="switch" id="s-pwd">
                            <label for="s-pwd" class="form-check-label">PwD(Person With Disability) Scholarship</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" value="Athletic Scholarship" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                            <label for="eligibility-criteria" class="form-check-label">Athletic Scholarship</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="other-scholarship" onclick="scholarshipName()">
                            <label for="other-scholarship" class="form-check-label">Something else not listed</label>
                        </div>
                        <div class="col-md-6 mt-5">
                            <input type="text" id="sch-name" class="form-control" style="display:none" placeholder="OTHER ELIGIBILITY REQUIREMENT">      
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <label for="docs-req" class="form-label fw-bolder">Document Requirements (Select all that apply)</label>
                    <div id="docs-req">
                        <div class="form-check form-switch">
                            <input class="form-check-input" value="Government ID Proof(eg. Aadhar Card, Driving License etc.)" type="checkbox" role="switch" id="govt-id">
                            <label for="govt-id" class="form-check-label">Government ID Proof(eg. Aadhar Card, Driving License etc.)</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" value="Domicile/Residential Certificate" type="checkbox" role="switch" id="resident-cert">
                            <label for="resident-cert" class="form-check-label">Domicile/Residential Certificate</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" value="Income Certificate issued from the Competent Authority" type="checkbox" role="switch" id="income-cert">
                            <label for="income-cert" class="form-check-label">Income Certificate issued from the Competent Authority</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" value="PwD Certificate issued from the Competent Authority" type="checkbox" role="switch" id="pwd-cert">
                            <label for="pwd-cert" class="form-check-label">PwD Certificate issued from the Competent Authority</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" value="Bonafide Certificate" type="checkbox" role="switch" id="bonf-cert">
                            <label for="bonf-cert" class="form-check-label">Bonafide Certificate</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" value="Caste Certificate" type="checkbox" role="switch" id="caste-cert">
                            <label for="caste-cert" class="form-check-label">Caste Certificate</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" value="Aadhar Card of Mother & Father/Guardian" type="checkbox" role="switch" id="aadhar">
                            <label for="aadhar" class="form-check-label">Aadhar Card of Mother & Father/Guardian</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" value="Bank Passbook of Student(Aadhar Card should be link with Bank A/C)" type="checkbox" role="switch" id="bank-pass">
                            <label for="bank-pass" class="form-check-label">Bank Passbook of Student(Aadhar Card should be link with Bank A/C)</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" value="College Fee Receipt" type="checkbox" role="switch" id="fee-rec">
                            <label for="fee-rec" class="form-check-label">College Fee Receipt</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" value="10 or 12 Marks Cards" type="checkbox" role="switch" id="marks-cards">
                            <label for="marks-cards" class="form-check-label">10<sup>th</sup> or 12<sup>th</sup>Marks Cards</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" value="Previous 2 Semester Marks Card" type="checkbox" role="switch" id="sem-marks">
                            <label for="sem-marks" class="form-check-label">Previous 2 Semester Marks Card</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" value="Copy of Admission Letter to Diploma/Degree Course" type="checkbox" role="switch" id="dipl-cert">
                            <label for="dipl-cert" class="form-check-label">Copy of Admission Letter to Diploma/Degree Course</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" value="Self Declaration Minority Certificate" type="checkbox" role="switch" id="self-decl">
                            <label for="selt-decl" class="form-check-label">Self Declaration Minority Certificate</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" value="Student Photograph" type="checkbox" role="switch" id="s-photo">
                            <label for="s-photo" class="form-check-label">Student Photograph</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="other-doc" onclick="docName()">
                            <label for="other-doc" class="form-check-label">Something else not listed</label>
                        </div>
                        <div class="col-md-6 mt-5">
                            <input type="text" id="doc-name" class="form-control" style="display:none" placeholder="OTHER DOCUMENT NAME">      
                        </div>
                    </div>
                </div>
            <div class="col-md-6">
                <label for="web-link" class="form-label fw-bolder">Link to the Website</label>
                    <input type="text" name="web-link" class="form-control" id="web-link" placeholder="WEBSITE LINK" required />
            </div>
                
            <div class="form-group mt-5">
                <input type="submit" class="btn btn-primary" value="Submit">
                <a class="btn btn-danger" href="dashboard.php">Cancel</a>
            </div>
        </form>
    </div>  
<!-- End of content  -->
</section>


<!-- Java Script Links -->
<script>

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

// Other Doc Name

    function docName() {
  // Get the checkbox
  var checkBox = document.getElementById("other-doc");
  // Get the output text
  var text = document.getElementById("doc-name");

  // If the checkbox is checked, display the output text
  if (checkBox.checked == true){
    text.style.display = "block";
  } else {
    text.style.display = "none";
  }
}
</script>
