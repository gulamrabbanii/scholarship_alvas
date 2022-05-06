<?php
// Include config file
require_once "../db/config.php";
include("admin-layout.php");
error_reporting(E_ALL & ~E_WARNING  & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED); 


// Define variables and initialize with empty values
$sch_name_err = $provider_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Setting variables to values
    $sch_name = strtoupper(htmlspecialchars(strip_tags(trim($_POST["sch-name"]))));
    $provider_name = htmlspecialchars(strip_tags(trim($_POST["provider-name"])));
    $sch_start_date = htmlspecialchars(strip_tags(trim($_POST["sch-start-date"])));
    $start_date = date("Y-m-d", strtotime($sch_start_date));
    $sch_type = htmlspecialchars(strip_tags(trim($_POST["sch-type"])));
    $sch_deadline = htmlspecialchars(strip_tags(trim($_POST["sch-deadline"])));
    $deadline_date = date("Y-m-d", strtotime($sch_deadline));
    $minority = htmlspecialchars(strip_tags(trim($_POST["minority"])));
    $sc_st = htmlspecialchars(strip_tags(trim($_POST["sc-st"])));
    $sch_girls = htmlspecialchars(strip_tags(trim($_POST["sch-girls"])));
    $sch_service = htmlspecialchars(strip_tags(trim($_POST["sch-service"])));
    $sch_military = htmlspecialchars(strip_tags(trim($_POST["sch-military"])));
    $sch_pwd = htmlspecialchars(strip_tags(trim($_POST["sch-pwd"])));
    $sch_athletics = htmlspecialchars(strip_tags(trim($_POST["sch-athletics"])));
    $other_sch = htmlspecialchars(strip_tags(trim($_POST["other-sch"])));
    $govt_id = htmlspecialchars(strip_tags(trim($_POST["govt-id"])));
    $resident_cert = htmlspecialchars(strip_tags(trim($_POST["resident-cert"])));
    $income_cert = htmlspecialchars(strip_tags(trim($_POST["income-cert"])));
    $pwd_cert = htmlspecialchars(strip_tags(trim($_POST["pwd-cert"])));
    $bonafide_cert = htmlspecialchars(strip_tags(trim($_POST["bonf-cert"])));
    $caste_cert = htmlspecialchars(strip_tags(trim($_POST["caste-cert"])));
    $parent_aadhar = htmlspecialchars(strip_tags(trim($_POST["aadhar"])));
    $bank_passbook = htmlspecialchars(strip_tags(trim($_POST["bank-pass"])));
    $college_fee_receipt = htmlspecialchars(strip_tags(trim($_POST["fee-rec"])));
    $sslc_puc = htmlspecialchars(strip_tags(trim($_POST["marks-cards"])));
    $sem_marks = htmlspecialchars(strip_tags(trim($_POST["sem-marks"])));
    $diploma_cert = htmlspecialchars(strip_tags(trim($_POST["dipl-cert"])));
    $self_dec = htmlspecialchars(strip_tags(trim($_POST["self-decl"])));
    $photography = htmlspecialchars(strip_tags(trim($_POST["stud-photo"])));
    $doc_name = htmlspecialchars(strip_tags(trim($_POST["doc-name"])));
    $sch_mode = htmlspecialchars(strip_tags(trim($_POST["sch-mode"])));
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
                    echo "<script>alert('This scholarship already exists.')</script>";
                    header("Refresh:0 , url =  createscholarship.php");
                    exit();
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
    
    if(empty($provider_name)){
        $provider_err = "Please enter sholarship provider name.";     
    } else{
        $provider_name = $provider_name;
    }
    
    // Check, if not have http:// or https:// then prepend it
    if (!preg_match('#^http(s)?://#', $website_link)) {
        $website_link = 'http://' . $website_link;
    } 

    // Check input errors before inserting in database
    if(empty($sch_name_err) && empty($provider_err) && empty($academic_year_err)){
        
        // Prepare an insert statement
        $scholarship_details_sql = "INSERT INTO scholarship_details (sch_name, sch_provider, sch_start_date, sch_type, sch_deadline, sch_mode, sch_link) VALUES (?, ?, ?, ?, ?, ?, ?)";

        $elig_req_sql = "INSERT INTO elig_req (sch_name, minority, sc_st, girls, community, military, pwd, athletic, other_sch) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $doc_req_sql = "INSERT INTO doc_req (sch_name, govt_id, domicile, income, pwd, bonafide, caste, parent_aadhar, bank_passbook, college_fee, sslc_puc, sem, diploma, self_dec, other_cert) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
         
        if($stmt = $link->prepare($scholarship_details_sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("sssssss", $param_sch_name, $param_sch_provider, $param_start_date, $param_sch_type, $param_sch_deadline, $param_sch_mode, $param_sch_link);
            
            // Set parameters
            $param_sch_name = $sch_name;
            $param_sch_provider = $provider_name;
            $param_start_date = $start_date;
            $param_sch_type = $sch_type;
            $param_sch_deadline = $deadline_date;
            $param_sch_mode = $sch_mode;
            $param_sch_link = $website_link;
            
            // Attempt to execute the prepared statement
            $stmt->execute();
            // Close statement
            $stmt->close();
        }

        if($stmt = $link->prepare($elig_req_sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("sssssssss", $param_sch_name, $param_minority, $param_sc_st, $param_girls, $param_community, $param_military, $param_pwd, $param_athletic, $param_other_sch);
            
            // Set parameters
            $param_sch_name = $sch_name;
            $param_minority = $minority;
            $param_sc_st = $sc_st;
            $param_girls = $sch_girls;
            $param_community = $sch_service;
            $param_military = $sch_military;
            $param_pwd = $sch_pwd;
            $param_athletic = $sch_athletics;
            $param_other_sch = $other_sch;
            
            // Attempt to execute the prepared statement
            $stmt->execute();
            // Close statement
            $stmt->close();
        }

        if($stmt = $link->prepare($doc_req_sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("sssssssssssssss", $param_sch_name, $param_govt_id, $param_domicile, $param_income, $param_pwd_cert, $param_bonafide, $param_caste, $param_parent_aadhar, $param_bank_passbook, $param_college_fee, $param_sslc_puc, $param_sem, $param_diploma, $param_self_dec, $param_other_cert);
            
            // Set parameters
            $param_sch_name = $sch_name;
            $param_govt_id = $govt_id;
            $param_domicile = $resident_cert;
            $param_income = $income_cert;
            $param_pwd_cert = $pwd_cert;
            $param_bonafide = $bonafide_cert;
            $param_caste = $caste_cert;
            $param_parent_aadhar = $parent_aadhar;
            $param_bank_passbook = $bank_passbook;
            $param_college_fee = $college_fee_receipt;
            $param_sslc_puc = $sslc_puc;
            $param_sem = $sem_marks;
            $param_diploma = $diploma_cert;
            $param_self_dec = $self_dec;
            $param_other_cert = $doc_name;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()) {
                echo "<script>alert('Scholarship has been successfully added.')</script>";
                header("Refresh:0 , url =  view-scholarships.php");
            }
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
                    <input type="text" name="sch-name" class="form-control" value="<?php echo $sch_name; ?>" id="scholarship-name" placeholder="SCHOLARSHIP NAME" required />
            </div>
                <div class="col-md-6">
                <label for="scholarship-provider" class="form-label fw-bolder">Scholarship Provider</label>
                    <input type="text" name="provider-name" class="form-control <?php echo (!empty($provider_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $provider_name; ?>" id="scholarship-provider" placeholder="SCHOLARSHIP PROVIDER NAME" required />
                </div>
                  <div class="col-md-6">
                <label for="app-start" class="form-label fw-bolder mt-5">Registration Start Date</label>
                    <input type="date" name="sch-start-date" class="form-control" id="app-start" placeholder="LAST DATE TO APPLY" required />
                </div>
                <div class="col-md-6">
                <label for="app-deadline" class="form-label fw-bolder mt-5">Registration Deadline</label>
                    <input type="date" name="sch-deadline" class="form-control" id="app-deadline" placeholder="LAST DATE TO APPLY" required />
                </div>
            <div class="col-md-12">
                <label for="scholarship-type" class="form-label fw-bolder mt-5">Choose Provider Type</label>
               <div id="scholarship-type">
                <div class="form-check">
                    <input class="form-check-input" value="NGO / Non-Profit" name="sch-type" type="radio" id="NGO">
                    <label class="form-check-label" for="NGO">NGO / Non-Profit</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" value="Business, Company, or Corporation" name="sch-type" type="radio" id="private">
                    <label class="form-check-label" for="private">Business, Company, or Corporation</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" value="Government of India" name="sch-type" type="radio" id="c-govt">
                    <label class="form-check-label" for="c-govt">Government of India</label>
                </div> 
                <div class="form-check">
                    <input class="form-check-input" value="Karnataka" name="sch-type" type="radio" id="k-govt">
                    <label class="form-check-label" for="k-govt">Karnataka</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" value="Other State" name="sch-type" type="radio" id="o-govt">
                    <label class="form-check-label" for="o-govt">Other State</label>
                </div>    
               </div>
            </div>
                <div class="col-md-12">
                    <label for="elig-crit" class="form-label fw-bolder mt-5">Eligibility Requirements (Select all that apply)</label>
                    <div id="elig-crit">
                        <div class="form-check form-switch">
                            <input class="form-check-input" name="minority" value="Minority Communities Students(SC/ST/OBC)" type="checkbox" role="switch" id="minority">
                            <label for="minority" class="form-check-label">Minority Communities Students(SC/ST/OBC)</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" name="sc-st" value="SC/ST Communities Students only" type="checkbox" role="switch" id="sc-st">
                            <label for="sc-st" class="form-check-label">SC/ST Communities Students only</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" name="sch-girls" value="Scholarship for Girls Students" type="checkbox" role="switch" id="s-girls">
                            <label for="s-girls" class="form-check-label">Scholarship for Girls Students</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" name="sch-service" value="Community Service Scholarship" type="checkbox" role="switch" id="c-service">
                            <label for="c-service" class="form-check-label">Community Service Scholarship</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" name="sch-military" value="Military Scholarship" type="checkbox" role="switch" id="m-scholarship">
                            <label for="m-scholarship" class="form-check-label">Military Scholarship</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" name="sch-pwd" value="PwD(Person With Disability) For PwD Candidate" type="checkbox" role="switch" id="s-pwd">
                            <label for="s-pwd" class="form-check-label">For PwD(Person With Disability) Candidate</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" name="sch-athletics" value="Athletic Scholarship" type="checkbox" role="switch" id="athletics">
                            <label for="athletics" class="form-check-label">Athletic Scholarship</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="other-scholarship" onclick="scholarshipName()">
                            <label for="other-scholarship" class="form-check-label">Something else not listed</label>
                        </div>
                        <div class="col-md-6 mt-5">
                            <input type="text" id="sch-name" name="other-sch" class="form-control" style="display:none" placeholder="OTHER ELIGIBILITY REQUIREMENT">      
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
                            <input class="form-check-input" name="resident-cert" value="Domicile/Residential Certificate" type="checkbox" role="switch" id="resident-cert">
                            <label for="resident-cert" class="form-check-label">Domicile/Residential Certificate</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" name="income-cert" value="Income Certificate issued from the Competent Authority" type="checkbox" role="switch" id="income-cert">
                            <label for="income-cert" class="form-check-label">Income Certificate issued from the Competent Authority</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" name="pwd-cert" value="PwD Certificate issued from the Competent Authority (For PwD Candidate only)" type="checkbox" role="switch" id="pwd-cert">
                            <label for="pwd-cert" class="form-check-label">PwD Certificate issued from the Competent Authority (For PwD Candidate only)</label>
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
                            <input class="form-check-input" name="stud-photo" value="Student Photograph" type="checkbox" role="switch" id="s-photo">
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
                <label for="sch-mode" class="form-label fw-bolder">Scholarship Application Mode</label>
                <div id="sch-mode">
                    <div class="form-check">
                        <input class="form-check-input" value="Offline" name="sch-mode" type="radio" id="offline">
                        <label class="form-check-label" for="offline">Offline</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" value="Online" name="sch-mode" type="radio" id="online">
                        <label class="form-check-label" for="online">Online</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" value="Both" name="sch-mode" type="radio" id="both">
                        <label class="form-check-label" for="both">Both</label>
                    </div>
                </div>
            </div>        

            <div class="col-md-6">
                <label for="web-link" class="form-label fw-bolder">Link to the Website, if any</label>
                    <input type="text" name="web-link" class="form-control" id="web-link" placeholder="WEBSITE LINK" />
            </div>
                
            <div class="form-group mt-5">
                <input type="submit" class="btn btn-primary" value="Create">
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
