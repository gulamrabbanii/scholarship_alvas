<?php 
// Include config file
include("admin-layout.php");
require_once "../db/config.php";
 
// Define variables and initialize with empty values
$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    $new_password = trim($_POST["new_password"]);
    $new_password = strip_tags($new_password);
	$new_password = htmlspecialchars($new_password);
    // Validate new password
    if(empty($new_password)){
        $new_password_err = "Please enter the new password.";     
    } elseif(strlen(trim($_POST["new_password"])) < 6){
        $new_password_err = "Password must have atleast 6 characters.";
    } else{
        $new_password = $new_password;
    }
    
    $confirm_password = trim($_POST["confirm_password"]);
    $confirm_password = strip_tags($confirm_password);
	$confirm_password = htmlspecialchars($confirm_password);
    // Validate confirm password
    if(empty($confirm_password)){
        $confirm_password_err = "Please confirm the password.";
    } else{
        $confirm_password = $confirm_password;
        if(empty($new_password_err) && ($new_password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
        
    // Check input errors before updating the database
    if(empty($new_password_err) && empty($confirm_password_err)){
        // Prepare an update statement
        $sql = "UPDATE users SET passwd = ? WHERE id = ?";
        
        if($stmt = $link->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("si", $param_password, $param_id);
            
            // Set parameters
            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $_SESSION["id"];
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Password updated successfully. Destroy the session, and redirect to login page
                session_destroy();
                header("location: ../index.php");
                exit();
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

<title>RESET PASSWORD</title>
<div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">RESET PASSWORD</span>
                </div>
            </div>
<!-- Add contents here -->
        <label>Please fill out this form to reset your password.</label>
        <br><br>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="row g-3"> 
            <div class="col-md-12">
                <label for="passwd" class="form-label">New Password</label>
                <input type="password" name="new_password" class="form-control <?php echo (!empty($new_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $new_password; ?>" id="passwd" minlength="6" maxlength="20" placeholder="NEW PASSWORD">
                <span class="invalid-feedback"><?php echo $new_password_err; ?></span>
            </div>
            <div class="col-md-12">
                <label for="confirm-passwd" class="form-label">Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" id="confirm-passwd" minlength="6" maxlength="20" placeholder="CONFIRM NEW PASSWORD">
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <a class="btn btn-danger" href="dashboard.php">Cancel</a>
            </div>
        </form>
    </div>  
<!-- End of content  -->
</section>