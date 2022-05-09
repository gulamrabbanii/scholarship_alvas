
<?php
// Include config file
require_once "../db/config.php";
include("admin-layout.php");
error_reporting(E_ALL & ~E_WARNING  & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED); 
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = $phone_err = $email_err = "";
$username_err = $password_err = $confirm_password_err = "";
$pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";
// Processing form data when form is submitted
if ($_SESSION['username'] != "admin") {
    header("location: dashboard.php");
}  

if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate username
    $username = htmlspecialchars(strip_tags(trim($_POST["username"])));
 
    if(empty($username)){
        $username_err = "Please enter a username.";
    } elseif(!preg_match($pattern, $username)){
        $username_err = "Username can only your email address";
    } else {
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = $link->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // store result
                $stmt->store_result();
                
                if($stmt->num_rows == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = $username;
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    }
    
    // Validate password
    $password = htmlspecialchars(strip_tags(trim($_POST["password"])));

    if(empty($password)){
        $password_err = "Please enter a password.";     
    } elseif(strlen($password) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = $password;
    }
    
    // Validate confirm password
    $confirm_password = htmlspecialchars(strip_tags(trim($_POST["cfpassword"])));

    if(empty($confirm_password)){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = $confirm_password;
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }

    // Setting variables to values
    $first_name = htmlspecialchars(strip_tags(trim($_POST["f-name"])));
    $last_name = htmlspecialchars(strip_tags(trim($_POST["l-name"])));
    $phone = htmlspecialchars(strip_tags(trim($_POST["phone"])));
    $email = htmlspecialchars(strip_tags(trim($_POST['email'])));

    // phone validation
    if(empty($phone)){
        $phone_err = "Please enter phone number.";     
    } elseif(strlen($phone) != 10){
        $phone_err = "Phone number must have 10 digits.";
    } else{
        $phone = $phone;
    }

    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, passwd, first_name, last_name, email, phone) VALUES (?, ?, ?, ?, ?, ?)";
         
        if($stmt = $link->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("ssssss", $param_username, $param_password, $param_f_name, $param_l_name, $param_email, $param_phone);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_f_name = $first_name;
            $param_l_name = $last_name;
            $param_phone = $phone;
            $param_email = $username;
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


<title>REGISTER NEW ADMIN</title>

        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="fa-regular fa-pen-to-square"></i>
                    <div class="text">ADMINISTRATOR REGIRSTRATION</div>
                </div>    
            </div> 
<!-- Add contents here -->

           <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="row g-3">
                    <div class="col-md-6">
                        <label for="first-name" class="form-label">First Name</label>
                        <input type="text" name="f-name" class="form-control" id="first-name"
                            placeholder="YOUR FIRST NAME" required />
                    </div>
                    <div class="col-md-6">
                        <label for="first-name" class="form-label">Last Name</label>
                        <input type="text" name="l-name" class="form-control" id="first-name"
                            placeholder="YOUR LAST NAME" required />
                    </div>
                    <div class="col-md-12">
                        <label for="username" class="form-label">Username</label>
                        <input type="email" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>" id="username"
                            placeholder="Username must contain " />
                            <span class="invalid-feedback"><?php echo $username_err; ?></span>
                    </div>
                    <div class="col-md-12">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="email"
                            placeholder="YOUR E-MAIL ID" />
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="phone" class="form-label">Mobile Number</label>
                            <input type="tel" name="phone" class="form-control" id="phone"
                                placeholder="10-DIGIT MOBILE NUMBER" pattern="[0-9]{10}" min-lenght="10" max-length="10" required />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="passwd" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>" id="passwd" minlength="6"
                            maxlength="20" placeholder="Password">
                            <span class="invalid-feedback"><?php echo $password_err; ?></span>
                    </div>
                    <div class="col-md-6">
                        <label for="confirm-paaswd" class="form-label">Confirm Password</label>
                        <input type="password" name="cfpassword" id="confirm-paaswd" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>"
                            placeholder="CONFIRM PASSWORD">
                        <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
                    </div>

                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary">Sign in</button>
                    </div>
                </form>

<!-- End of content  -->

        </div>
    </section>
        