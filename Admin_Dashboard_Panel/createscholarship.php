<?php
// Include config file
require_once "../db/config.php";
include("admin-layout.php");

// Define variables and initialize with empty values
$sch_name_err = $provider_err = $sch_year_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    // Define variables and initialize with values
    $sch_name = htmlspecialchars(strip_tags(trim($_POST["s-name"])));
    $p_name = htmlspecialchars(strip_tags(trim($_POST["p-name"])));
    $s_year = htmlspecialchars(strip_tags(trim($_POST["s-year"])));
    $s_type = htmlspecialchars(strip_tags(trim($_POST["s-type"])));
    $deadline_date = htmlspecialchars(strip_tags(trim($_POST["app-deadline"])));
    $date = date("Y-m-d", strtotime($deadline_date));
    $minority = htmlspecialchars(strip_tags(trim($_POST["minority"])));
    $sc_st = htmlspecialchars(strip_tags(trim($_POST["sc-st"])));
    $s_girls = htmlspecialchars(strip_tags(trim($_POST["s-girls"])));
    $c_service = htmlspecialchars(strip_tags(trim($_POST["c-service"])));
    $m_scholarship = htmlspecialchars(strip_tags(trim($_POST["m-scholarship"])));
    $s_pwd = htmlspecialchars(strip_tags(trim($_POST["s-pwd"])));
    $athletics = htmlspecialchars(strip_tags(trim($_POST["athletics"])));
    $sch_name = htmlspecialchars(strip_tags(trim($_POST["sch-name"])));
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
    $website_link = htmlspecialchars(strip_tags(trim($_POST["web-link"])));
    
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } elseif(!preg_match($email, trim($_POST["username"]))){
        $username_err = "Username can only contain letters, numbers, and underscores.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = $link->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // store result
                $stmt->store_result();
                
                if($stmt->num_rows == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                    $username = strip_tags($username);
	                $username = htmlspecialchars($username);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["cfpassword"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["cfpassword"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }

    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, passwd, first_name, last_name, phone) VALUES (?, ?, ?, ?, ?)";
         
        if($stmt = $link->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("sssss", $param_username, $param_password, $param_f_name, $param_l_name, $param_phone);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_f_name = $first_name;
            $param_l_name = $last_name;
            $param_phone = $phone;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Redirect to login page
                header("location: dashboard.php");
            } else{
                echo "Oops! Something went wrong. Please try again later.";
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
                            <input class="form-check-input" name="s-girls" value="Scholarship for Girls" type="checkbox" role="switch" id="s-girls">
                            <label for="s-girls" class="form-check-label">Scholarship for Girls</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" name="c-service" value="Community Service Scholarship" type="checkbox" role="switch" id="c-service">
                            <label for="c-service" class="form-check-label">Community Service Scholarship</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" name="m-scholarship" value="Military Scholarship" type="checkbox" role="switch" id="m-scholarship">
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
