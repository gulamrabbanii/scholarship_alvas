<?php
// Include config file
require_once "../db/config.php";
include("admin-layout.php");

// Define variables and initialize with empty values
$sch_name_err = $provider_err = $sch_year_err = "";
$global_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    // Define variables and initialize with values
    $sch_name = htmlspecialchars(strip_tags(trim($_POST["s-name"])));
    $p_name = htmlspecialchars(strip_tags(trim($_POST["p-name"])));
    $sch_academic_year = htmlspecialchars(strip_tags(trim($_POST["s-year"])));
    $s_type = htmlspecialchars(strip_tags(trim($_POST["s-type"])));
    $deadline_date = htmlspecialchars(strip_tags(trim($_POST["app-deadline"])));
    $date = date("Y-m-d", strtotime($deadline_date));
    $minority = htmlspecialchars(strip_tags(trim($_POST["minority"])));
    $sc_st = htmlspecialchars(strip_tags(trim($_POST["sc-st"])));
    $s_girls = htmlspecialchars(strip_tags(trim($_POST["s_girls"])));
    $c_service = htmlspecialchars(strip_tags(trim($_POST["c_service"])));
    $m_scholarship = htmlspecialchars(strip_tags(trim($_POST["m_scholarship"])));
    $s_pwd = htmlspecialchars(strip_tags(trim($_POST["s-pwd"])));
    $athletics = htmlspecialchars(strip_tags(trim($_POST["athletics"])));
    $other_sch = htmlspecialchars(strip_tags(trim($_POST["sch-name"])));
    $govt_id = htmlspecialchars(strip_tags(trim($_POST["govt-id"])));
    $resident_cert = htmlspecialchars(strip_tags(trim($_POST["resident-cert"])));
    $income_cert = htmlspecialchars(strip_tags(trim($_POST["income-cert"])));
    $pwd_cert = htmlspecialchars(strip_tags(trim($_POST["pwd-cert"])));
    $bonafide_cert = htmlspecialchars(strip_tags(trim($_POST["bonf-cert"])));
    $caste_cert = htmlspecialchars(strip_tags(trim($_POST["caste-cert"])));
    $parent_aadhar = htmlspecialchars(strip_tags(trim($_POST["aadhar"])));
    $bank_passbook = htmlspecialchars(strip_tags(trim($_POST["bank-pass"])));
    $fee_receipt = htmlspecialchars(strip_tags(trim($_POST["fee-rec"])));
    $sslc_puc_marks = htmlspecialchars(strip_tags(trim($_POST["marks-cards"])));
    $sem_marks = htmlspecialchars(strip_tags(trim($_POST["sem-marks"])));
    $diploma_cert = htmlspecialchars(strip_tags(trim($_POST["dipl-cert"])));
    $self_declaration = htmlspecialchars(strip_tags(trim($_POST["self-decl"])));
    $student_photo = htmlspecialchars(strip_tags(trim($_POST["s-photo"])));
    $other_doc = htmlspecialchars(strip_tags(trim($_POST["doc-name"])));
    $sch_mode = htmlspecialchars(strip_tags(trim($_POST["s-mode"])));
    $website_link = htmlspecialchars(strip_tags(trim($_POST["web-link"])));
    
    // Validate scholarship name
    if(empty($sch_name)){
        $sch_name_err = "Please enter scholarship name.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM scholarship_details WHERE sch_name = ?";
        
        if($stmt = $link->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_sch_name);
            
            // Set parameters
            $param_sch_name = $sch_name;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // store result
                $stmt->store_result();
                
                if($stmt->num_rows == 1){
                    $username_err = "This scholarship already exists.";
                } else{
                    $sch_name = $sch_name;
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    }
    
    // Validate provider name
    if(empty($date)){
        $provider_err = "Please enter the provider name.";     
    }  else{
        $p_name = $p_name;
    }
    
    if(empty($sch_academic_year)){
        $sch_year_err = "Please enter academic year for scholarship.";     
    }  else{
        $sch_academic_year = $sch_academic_year;
    }

    // Check input errors before inserting in database
    if(empty($sch_name_err) && empty($provider_err) && empty($sch_year_err) && !empty($s_type) && !empty($date)){
        
        // Prepare an insert statement
        $sch_details_insert = "INSERT INTO scholarship_details (sch_name, sch_provider, sch_academic_year, sch_type, sch_deadline, sch_mode, sch_link) VALUES (?, ?, ?, ?, ?, ?, ?)";

        $elig_req_insert = "INSERT INTO elig_req (sch_name, minority, sc_st, girls, community, military, pwd, athletic, other_sch) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $doc_req_insert = "INSERT INTO doc_req (sch_name, govt_id, domicile, income, pwd, bonafide, caste, parent_aadhar, bank_passbook, college_fee, sslc_puc, sem, diploma, self_dec, other_cert) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
         
        if($stmt = $link->prepare($sch_details_insert)){
            
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("sssssss", $param_sch_name, $param_p_name, $param_academic_year, $param_sch_type, $param_deadline,$param_sch_mode ,$param_link);
            
            // Set parameters
            $param_sch_name = $sch_name;
            $param_p_name = $p_name;
            $param_academic_year = $sch_academic_year;
            $param_sch_type = $s_type;
            $param_deadline = $date;
            $param_link = $website_link;
            $param_sch_mode = $sch_mode;
            
            // Attempt to execute the prepared statement
            $stmt->execute();
            // Close statement
            $stmt->close();
        }

        if($stmt = $link->prepare($elig_req_insert)){
            
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("sssssssss", $param_sch_name, $param_minority, $param_sc_st, $param_sch_girls, $param_c_service, $param_m_scholarship, $param_s_pwd, $param_athletics, $param_other_sch);

            // Set parameters
            $param_sch_name = $sch_name;
            $param_minority = $minority;
            $param_sc_st = $sc_st;
            $param_sch_girls = $s_girls;
            $param_c_service = $c_service;
            $param_m_scholarship = $m_scholarship;
            $param_s_pwd = $s_pwd;
            $param_athletics = $athletics;
            $param_other_sch = $other_sch;            
            
            // Attempt to execute the prepared statement
            $stmt->execute();
            // Close statement
            $stmt->close();
        }

        if($stmt = $link->prepare($doc_req_insert)){
            
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("sssssssssssssss", $param_sch_name, $param_govt_id, $param_resident_cert, $param_income_cert, $param_pwd_cert, $param_bonafide_cert, $param_caste_cert, $param_parent_aadhar, $param_bank_passbook, $param_fee_receipt, $param_sslc_puc, $param_sem_marks, $param_diploma_cert, $param_self, $param_other_doc);
            
            // Set parameters
            $param_sch_name = $sch_name;
            $param_resident_cert = $resident_cert;
            $param_income_cert = $income_cert;
            $param_pwd_cert = $pwd_cert;
            $param_bonafide_cert = $bonafide_cert;
            $param_caste_cert = $caste_cert;
            $param_parent_aadhar = $parent_aadhar;
            $param_bank_passbook = $bank_passbook;
            $param_fee_receipt = $fee_receipt;
            $param_sslc_puc = $sslc_puc_marks;
            $param_sem_marks = $sem_marks;
            $param_diploma_cert = $diploma_cert;
            $param_self = $self_declaration;
            $param_photography = $student_photo;
            $param_other_doc = $other_doc;
            $param_sch_mode = $sch_mode;
            $param_govt_id = $govt_id;
            
            // Attempt to execute the prepared statement
            $stmt->execute();

            // Close statement
            $stmt->close();
        }
    }
    // Close connection
    $link->close();
}
?>
<title>Create Scholarship</title>
<div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="fa fa-graduation-cap" aria-hidden="true"></i>
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
                            <input class="form-check-input" name="minority" value="Scholarship for Minorities(SC/ST/OBC)" type="checkbox" role="switch" id="minority">
                            <label for="minority" class="form-check-label">Scholarship for Minorities(SC/ST/OBC)</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" name="sc-st" value="Scholarship for SC/ST only" type="checkbox" role="switch" id="sc-st">
                            <label for="sc-st" class="form-check-label">Scholarship for SC/ST only</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" name="s_girls" value="Scholarship for Girls" type="checkbox" role="switch" id="s-girls">
                            <label for="s-girls" class="form-check-label">Scholarship for Girls</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" name="c_service" value="Community Service Scholarship" type="checkbox" role="switch" id="c-service">
                            <label for="c-service" class="form-check-label">Community Service Scholarship</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" name="m_scholarship" value="Military Scholarship" type="checkbox" role="switch" id="m-scholarship">
                            <label for="m-scholarship" class="form-check-label">Military Scholarship</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" name="s-pwd" value="PwD(Person With Disability) Scholarship" type="checkbox" role="switch" id="s-pwd">
                            <label for="s-pwd" class="form-check-label">PwD(Person With Disability) Scholarship</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" name="athletics" value="Athletic Scholarship" type="checkbox" role="switch" id="athletics">
                            <label for="athletics" class="form-check-label">Athletic Scholarship</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="other-scholarship" onclick="scholarshipName()">
                            <label for="other-scholarship" class="form-check-label">Something else not listed</label>
                        </div>
                        <div class="col-md-6 mt-5">
                            <input type="text" id="sch-name" name="sch-name" class="form-control" style="display:none" placeholder="OTHER ELIGIBILITY REQUIREMENT">      
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <label for="docs-req" class="form-label fw-bolder">Document Requirements (Select all that apply)</label>
                    <div id="docs-req">
                        <div class="form-check form-switch">
                            <input class="form-check-input" name="govt-id" value="Government ID Proof(eg. Aadhar Card, Driving License etc.)" type="checkbox" role="switch" id="govt-id">
                            <label for="govt-id" class="form-check-label">Government ID Proof(eg. Aadhar Card, Driving License etc.)</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" value="resident-cert" value="Domicile/Residential Certificate" type="checkbox" role="switch" id="resident-cert">
                            <label for="resident-cert" class="form-check-label">Domicile/Residential Certificate</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" value="income-cert" value="Income Certificate issued from the Competent Authority" type="checkbox" role="switch" id="income-cert">
                            <label for="income-cert" class="form-check-label">Income Certificate issued from the Competent Authority</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" value="pwd-cert" value="PwD Certificate issued from the Competent Authority" type="checkbox" role="switch" id="pwd-cert">
                            <label for="pwd-cert" class="form-check-label">PwD Certificate issued from the Competent Authority</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" name="bonf-cert" value="Bonafide Certificate" type="checkbox" role="switch" id="bonf-cert">
                            <label for="bonf-cert" class="form-check-label">Bonafide Certificate</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" name="caste-cert" value="Caste Certificate" type="checkbox" role="switch" id="caste-cert">
                            <label for="caste-cert" class="form-check-label">Caste Certificate</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" name="aadhar" value="Aadhar Card of Mother & Father/Guardian" type="checkbox" role="switch" id="aadhar">
                            <label for="aadhar" class="form-check-label">Aadhar Card of Mother & Father/Guardian</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" name="bank-pass" value="Bank Passbook of Student(Aadhar Card should be link with Bank A/C)" type="checkbox" role="switch" id="bank-pass">
                            <label for="bank-pass" class="form-check-label">Bank Passbook of Student(Aadhar Card should be link with Bank A/C)</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" name="fee-rec" value="College Fee Receipt" type="checkbox" role="switch" id="fee-rec">
                            <label for="fee-rec" class="form-check-label">College Fee Receipt</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" name="marks-cards" value="10 or 12 Marks Cards" type="checkbox" role="switch" id="marks-cards">
                            <label for="marks-cards" class="form-check-label">10<sup>th</sup> or 12<sup>th</sup>Marks Cards</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" name="sem-marks" value="Previous 2 Semester Marks Card" type="checkbox" role="switch" id="sem-marks">
                            <label for="sem-marks" class="form-check-label">Previous 2 Semester Marks Card</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" name="dipl-cert" value="Copy of Admission Letter to Diploma/Degree Course" type="checkbox" role="switch" id="dipl-cert">
                            <label for="dipl-cert" class="form-check-label">Copy of Admission Letter to Diploma/Degree Course</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" name="self-decl" value="Self Declaration Minority Certificate" type="checkbox" role="switch" id="self-decl">
                            <label for="selt-decl" class="form-check-label">Self Declaration Minority Certificate</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" name="s-photo" value="Student Photograph" type="checkbox" role="switch" id="s-photo">
                            <label for="s-photo" class="form-check-label">Student Photograph</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="other-doc" onclick="docName()">
                            <label for="other-doc" class="form-check-label">Something else not listed</label>
                        </div>
                        <div class="col-md-6 mt-5">
                            <input type="text" id="doc-name" name="doc-name" class="form-control" style="display:none" placeholder="OTHER DOCUMENT NAME">      
                        </div>
                    </div>
                </div>
            <div class="col-md-12">
                <label for="sch-mode" class="form-label fw-bolder">Scholarship Mode</label>
                <div id="sch-mode">
                    <div class="form-check">
                        <input class="form-check-input" value="Offline" name="s-mode" type="radio" id="offline">
                        <label class="form-check-label" for="offline">Offline</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" value="Online" name="s-mode" type="radio" id="online">
                        <label class="form-check-label" for="online">Online</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" value="Both" name="s-mode" type="radio" id="both">
                        <label class="form-check-label" for="both">Both</label>
                    </div>
                </div>
            </div>        

            <div class="col-md-6">
                <label for="web-link" class="form-label fw-bolder">Link to the Website, if any</label>
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
