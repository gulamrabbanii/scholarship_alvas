<?php
// Include config file
require_once "../db/config.php";
include("admin-layout.php");
error_reporting(E_ALL & ~E_WARNING  & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
$q = "SELECT * FROM scholarship_details;";
$r = $link->query($q);

if (isset($_GET['id'])) {
    $id = htmlspecialchars(strip_tags(trim($_GET['id'])));
    $query = "SELECT * FROM scholarship_details t1 INNER JOIN elig_req t2 ON t2.sch_name = t1.sch_name INNER JOIN doc_req t3 ON t3.sch_name = t1.sch_name WHERE t1.id = '$id';";
    $result = $link->query($query);
    $scholarship = $row['sch_name'];
}
?>
<title>MODIFY SCHOLARSHIP</title>
<div class="dash-content">
    <div class="overview">
        <div class="title">
            <i class="fa fa-graduation-cap" aria-hidden="true"></i>
            <span class="text">MODIFY OR EDIT SCHOLARSHIP</span>
        </div>
    </div>
    <!-- Add contents here -->
    <?php foreach ($result as $row) { ?>
        <form action="../scholarship-operation/modify-sch.php" method="post" class="row g-3">
            <input type="text" name="sch-id" value="<?php echo $_GET['id']; ?>" id="" hidden>
            <div class="col-md-6">
                <label for="scholarship-name" class="form-label fw-bolder">Scholarship Name</label>
                <input type="text" name="sch-name" class="form-control" value="<?php echo $row['sch_name']; ?>" id="scholarship-name" list="scholarships" placeholder="SCHOLARSHIP NAME" required />
                <datalist id="scholarships">
                    <?php foreach ($r as $rr) { ?>
                        <option value="<?php echo $rr['sch_name']; ?>">
                        <?php } ?>
                </datalist>
            </div>
            <div class="col-md-6">
                <label for="scholarship-provider" class="form-label fw-bolder">Scholarship Provider</label>
                <input type="text" name="provider-name" class="form-control" value="<?php echo $row['sch_provider']; ?>" id="scholarship-provider" placeholder="SCHOLARSHIP PROVIDER NAME" required />
            </div>
            <div class="col-md-6">
                <label for="app-start" class="form-label fw-bolder mt-5">Registration Start Date</label>
                <input type="date" name="sch-start-date" class="form-control" value="<?php echo $row['sch_start_date']; ?>" id="app-start" placeholder="LAST DATE TO APPLY" required />
            </div>
            <div class="col-md-6">
                <label for="app-deadline" class="form-label fw-bolder mt-5">Registration Deadline</label>
                <input type="date" name="sch-deadline" class="form-control" value="<?php echo $row['sch_deadline']; ?>" id="app-deadline" placeholder="LAST DATE TO APPLY" required />
            </div>
            <div class="col-md-12">
                <label for="scholarship-type" class="form-label fw-bolder mt-5">Choose Provider Type</label>
                <div id="scholarship-type">
                    <div class="form-check">
                        <input class="form-check-input" value="NGO / Non-Profit" name="sch-type" type="radio" id="NGO" <?php echo ($row['sch_type'] == "NGO / Non-Profit") ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="NGO">NGO / Non-Profit</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" value="Business, Company, or Corporation" name="sch-type" type="radio" id="private" <?php echo ($row['sch_type'] == "Business, Company, or Corporation") ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="private">Business, Company, or Corporation</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" value="Government of India" name="sch-type" type="radio" id="c-govt" <?php echo ($row['sch_type'] == "Government of India") ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="c-govt">Government of India</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" value="Karnataka" name="sch-type" type="radio" id="k-govt" <?php echo ($row['sch_type'] == "Karnataka") ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="k-govt">Karnataka</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" value="Other State" name="sch-type" type="radio" id="o-govt" <?php echo ($row['sch_type'] == "Other State") ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="o-govt">Other State</label>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <label for="elig-crit" class="form-label fw-bolder mt-5">Eligibility Requirements (Select all that apply)</label>
                <div id="elig-crit">
                    <div class="form-check form-switch">
                        <input class="form-check-input" name="minority" value="Minority Communities Students(SC/ST/OBC)" type="checkbox" role="switch" id="minority" <?php echo ($row['minority'] == "Minority Communities Students(SC/ST/OBC)") ? 'checked' : ''; ?>>
                        <label for="minority" class="form-check-label">Minority Communities Students(SC/ST/OBC)</label>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" name="sc-st" value="SC/ST Communities Students only" type="checkbox" role="switch" id="sc-st" <?php echo ($row['sc_st'] == "SC/ST Communities Students only") ? 'checked' : ''; ?>>
                        <label for="sc-st" class="form-check-label">SC/ST Communities Students only</label>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" name="sch-girls" value="Scholarship for Girls Students" type="checkbox" role="switch" id="s-girls" <?php echo ($row['girls'] == "Scholarship for Girls Students") ? 'checked' : ''; ?>>
                        <label for="s-girls" class="form-check-label">Scholarship for Girls Students</label>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" name="sch-service" value="Community Service Scholarship" type="checkbox" role="switch" id="c-service" <?php echo ($row['community'] == "Community Service Scholarship") ? 'checked' : ''; ?>>
                        <label for="c-service" class="form-check-label">Community Service Scholarship</label>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" name="sch-military" value="Military Scholarship" type="checkbox" role="switch" id="m-scholarship" <?php echo ($row['military'] == "Military Scholarship") ? 'checked' : ''; ?>>
                        <label for="m-scholarship" class="form-check-label">Military Scholarship</label>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" name="sch-pwd" value="PwD(Person With Disability) For PwD Candidate" type="checkbox" role="switch" id="s-pwd" <?php echo ($row['pwd'] == "PwD(Person With Disability) For PwD Candidate") ? 'checked' : ''; ?>>
                        <label for="s-pwd" class="form-check-label">For PwD(Person With Disability) Candidate</label>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" name="sch-athletics" value="Athletic Scholarship" type="checkbox" role="switch" id="athletics" <?php echo ($row['athletic'] == "Athletic Scholarship") ? 'checked' : ''; ?>>
                        <label for="athletics" class="form-check-label">Athletic Scholarship</label>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="other-scholarship" onload="scholarshipName()" <?php if (!empty($row['other_sch'])) 'checked'; ?>>
                        <label for="other-scholarship" class="form-check-label">Something else not listed</label>
                    </div>
                    <div class="col-md-6 mt-5">
                        <input type="text" id="sch-name" name="other-sch" value="<?php if (!empty($row['other_sch'])) echo $row['']; ?>" class="form-control" style="display:none" placeholder="OTHER ELIGIBILITY REQUIREMENT">
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <label for="docs-req" class="form-label fw-bolder">Document Requirements (Select all that apply)</label>
                <div id="docs-req">
                    <div class="form-check form-switch">
                        <input class="form-check-input" name="govt-id" value="Government ID Proof(eg. Aadhar Card, Driving License etc.)" type="checkbox" role="switch" id="govt-id" <?php echo ($row['govt_id'] == "Government ID Proof(eg. Aadhar Card, Driving License etc.)") ? 'checked' : ''; ?>>
                        <label for="govt-id" class="form-check-label">Government ID Proof(eg. Aadhar Card, Driving License etc.)</label>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" name="resident-cert" value="Domicile/Residential Certificate" type="checkbox" role="switch" id="resident-cert" <?php echo ($row['domicile'] == "Domicile/Residential Certificate") ? 'checked' : ''; ?>>
                        <label for="resident-cert" class="form-check-label">Domicile/Residential Certificate</label>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" name="income-cert" value="Income Certificate issued from the Competent Authority" type="checkbox" role="switch" id="income-cert" <?php echo ($row['income'] == "Income Certificate issued from the Competent Authority") ? 'checked' : ''; ?>>
                        <label for="income-cert" class="form-check-label">Income Certificate issued from the Competent Authority</label>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" name="pwd-cert" value="PwD Certificate issued from the Competent Authority (For PwD Candidate only)" type="checkbox" role="switch" id="pwd-cert" <?php echo ($row['pwd_cert'] == "PwD Certificate issued from the Competent Authority (For PwD Candidate only)") ? 'checked' : ''; ?>>
                        <label for="pwd-cert" class="form-check-label">PwD Certificate issued from the Competent Authority (For PwD Candidate only)</label>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" name="bonf-cert" value="Bonafide Certificate" type="checkbox" role="switch" id="bonf-cert" <?php echo ($row['bonafide'] == "Bonafide Certificate") ? 'checked' : ''; ?>>
                        <label for="bonf-cert" class="form-check-label">Bonafide Certificate</label>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" name="caste-cert" value="Caste Certificate" type="checkbox" role="switch" id="caste-cert" <?php echo ($row['caste'] == "Caste Certificate") ? 'checked' : ''; ?>>
                        <label for="caste-cert" class="form-check-label">Caste Certificate</label>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" name="aadhar" value="Aadhar Card of Mother & Father/Guardian" type="checkbox" role="switch" id="aadhar" <?php echo ($row['parent_aadhar'] == "Aadhar Card of Mother & Father/Guardian") ? 'checked' : ''; ?>>
                        <label for="aadhar" class="form-check-label">Aadhar Card of Mother & Father/Guardian</label>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" name="bank-pass" value="Bank Passbook of Student(Aadhar Card should be link with Bank A/C)" type="checkbox" role="switch" id="bank-pass" <?php echo ($row['bank_passbook'] == "Bank Passbook of Student(Aadhar Card should be link with Bank A/C)") ? 'checked' : ''; ?>>
                        <label for="bank-pass" class="form-check-label">Bank Passbook of Student(Aadhar Card should be link with Bank A/C)</label>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" name="fee-rec" value="College Fee Receipt" type="checkbox" role="switch" id="fee-rec" <?php echo ($row['college_fee'] == "College Fee Receipt") ? 'checked' : ''; ?>>
                        <label for="fee-rec" class="form-check-label">College Fee Receipt</label>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" name="marks-cards" value="10 or 12 Marks Cards" type="checkbox" role="switch" id="marks-cards" <?php echo ($row['sslc_puc'] == "10 or 12 Marks Cards") ? 'checked' : ''; ?>>
                        <label for="marks-cards" class="form-check-label">10<sup>th</sup> or 12<sup>th</sup>Marks Cards</label>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" name="sem-marks" value="Previous 2 Semester Marks Card" type="checkbox" role="switch" id="sem-marks" <?php echo ($row['sem'] == "Previous 2 Semester Marks Card") ? 'checked' : ''; ?>>
                        <label for="sem-marks" class="form-check-label">Previous 2 Semester Marks Card</label>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" name="dipl-cert" value="Copy of Admission Letter to Diploma/Degree Course" type="checkbox" role="switch" id="dipl-cert" <?php echo ($row['diploma'] == "Copy of Admission Letter to Diploma/Degree Course") ? 'checked' : ''; ?>>
                        <label for="dipl-cert" class="form-check-label">Copy of Admission Letter to Diploma/Degree Course</label>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" name="self-decl" value="Self Declaration Minority Certificate" type="checkbox" role="switch" id="self-decl" <?php echo ($row['self_dec'] == "Self Declaration Minority Certificate") ? 'checked' : ''; ?>>
                        <label for="selt-decl" class="form-check-label">Self Declaration Minority Certificate</label>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" name="stud-photo" value="Student Photograph" type="checkbox" role="switch" id="s-photo" <?php echo ($row['photo'] == "Student Photograph") ? 'checked' : ''; ?>>
                        <label for="s-photo" class="form-check-label">Student Photograph</label>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="other-doc" onload="docName()" <?php if (!empty($row['other_cert'])) 'checked'; ?>>
                        <label for="other-doc" class="form-check-label">Something else not listed</label>
                    </div>
                    <div class="col-md-6 mt-5">
                        <input type="text" id="doc-name" value="<?php if (!empty($row['other_cert'])) echo $row['']; ?>" name="doc-name" class="form-control" style="display:none" placeholder="OTHER DOCUMENT NAME">
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <label for="sch-mode" class="form-label fw-bolder">Scholarship Application Mode</label>
                <div id="sch-mode">
                    <div class="form-check">
                        <input class="form-check-input" value="Offline" name="sch-mode" type="radio" id="offline" <?php echo ($row['sch_mode'] == "Offline") ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="offline">Offline</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" value="Online" name="sch-mode" type="radio" id="online" <?php echo ($row['sch_mode'] == "Online") ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="online">Online</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" value="Both" name="sch-mode" type="radio" id="both" <?php echo ($row['sch_mode'] == "Both") ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="both">Both</label>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <label for="web-link" class="form-label fw-bolder">Link to the Website, if any</label>
                <input type="url" name="web-link" value="<?php echo $row['sch_link']; ?>" class="form-control" id="web-link" placeholder="WEBSITE LINK" />
            </div>
        <?php }
        ?>
        <div class="form-group mt-5">
            <input type="submit" class="btn btn-primary" value="Modify">
            <a class="btn btn-danger" href="all-scholarships.php">Cancel</a>
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
        if (checkBox.checked == true) {
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
        if (checkBox.checked == true) {
            text.style.display = "block";
        } else {
            text.style.display = "none";
        }
    }
</script>