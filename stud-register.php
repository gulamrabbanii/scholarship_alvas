<?php
// Include config file
require_once "db/config.php";
error_reporting(E_ALL & ~E_WARNING  & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED); 
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = $phone_err = $email_err = "";
$username_err = $password_err = $confirm_password_err = "";
$email_pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";
$pattern = "/4(al)[0-9]{2}[A-Za-z]{2}[0-9]{3}/i";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    $username = htmlspecialchars(strip_tags(trim($_POST["username"])));

    if(empty($username)){
        $username_err = "Please enter a username.";
    } elseif(!preg_match($pattern, $username)){
        $username_err = "Username must be your USN No.";
    } else{
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
    $dept = htmlspecialchars(strip_tags(trim($_POST["sel-branch"])));
    $year = htmlspecialchars(strip_tags(trim($_POST["year"])));
    $email = htmlspecialchars(strip_tags(trim($_POST["email"])));
    $gender = htmlspecialchars(strip_tags(trim($_POST["gender"])));
    $sem = htmlspecialchars(strip_tags(trim($_POST["sem"])));
    $section = htmlspecialchars(strip_tags(trim($_POST["section"])));
    // phone validation
    if(empty($phone)){
        $phone_err = "Please enter phone number.";     
    } elseif(strlen($phone) != 10){
        $phone_err = "Phone number must have 10 digits.";
    } else{
        $phone = $phone;
    }
    // Email Validation
    if(empty($email)){
        $email_err = "Please enter your email.";
    } elseif(!preg_match($email_pattern, $email)){
        $email_err = "Please enter a valid email.";
    } else{
        $email = $email;
    }
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, passwd, first_name, last_name, gender, email, dept, year, semester, section, phone) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
         
        if($stmt = $link->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("sssssssssss", $param_username, $param_password, $param_f_name, $param_l_name, $param_gender, $param_email, $param_dept, $param_year, $param_sem, $param_section, $param_phone);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_f_name = $first_name;
            $param_l_name = $last_name;
            $param_dept = $dept;
            $param_year = $year;
            $param_phone = $phone;
            $param_email = $email;
            $param_gender = $gender;
            $param_sem = $sem;
            $param_section = $section;
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Redirect to login page
                header("location: index.php");
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


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTER</title>
    <link rel="icon" href="assets/img/icon.png" type="image/icon type">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap" rel="stylesheet">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
    body{
    font-family: Raleway;
    font-weight: 700;
    background: url("assets/img/bg.png") no-repeat center center / cover !important;
}
.bg-opacity {
    background-color: rgba(255, 255, 255, 0.7);
    box-shadow: 13px 13px 20px #f4f5f7, -13px -13px 20px #ffffff;
}
    .wrapper {
    background-color: rgba(255, 255, 255, 0.7);
    margin-left: 100px;
    margin-right: 100px;
    margin-bottom: 20px;
    padding: 60px;
}  
@media (max-width: 768px) {
    .wrapper {
    margin: 10px;
    margin-top: 5px;
    padding: 10px;
    }
}
</style>
</head>
<body>
    <div class="row">
        <nav class="navbar navbar-light bg-opacity">
            <div class="container-fluid">
                <div class="navbar-brand">
                    <img src="assets/img/icon.png" alt="Alva's Icon" width="30" height="30"
                        class="d-inline-block align-text-top">
                    Alva's Institute of Engineering and Technology
                </div>
            </div>
        </nav>

        <div class="col-md-12">
            <div class="wrapper">
                <div class="form-title font-weight-bold" style="font-size: 25px;">Student Registration
                    <i class="fa-regular fa-pen-to-square"></i>
                </div>
                <br>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="row g-3 ">
                    <div class="col-md-6">
                        <label for="first-name" class="form-label">First Name</label>
                        <input type="text" name="f-name" class="form-control username" id="first-name" placeholder="First Name"
                            required />
                    </div>
                    <div class="col-md-6">
                        <label for="first-name" class="form-label">Last Name</label>
                        <input type="text" name="l-name" class="form-control username" id="first-name" placeholder="Last Name"
                            required />
                    </div>
                    <div class="col-md-12">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>" id="username" placeholder="Your USN..." minlength="10"
                            maxlength="10" pattern="^4[Aa][Ll][0-9]{2}[A-Za-z]{2}[0-9]{3}" />
                            <span class="invalid-feedback"><?php echo $username_err; ?></span>
                    </div>
                     <div class="col-md-12">
                        <div class="form-group">
                            <label for="gender" class="form-label">Gender</label>
                            <select name="gender" id="inputState" class="form-control" required>
                                <option value="" selected>Choose...</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="branch" class="form-label">Branch</label>
                            <select name="sel-branch" id="branch" class="form-control" required>
                                <option value="" selected>Choose...</option>
                                <option value="AGRICULTURE ENGG">Agriculture Engg</option>
                                <option value="AIML ENGG">Artificial Intelligence and Machine Learning Engg</option>
                                <option value="CIVIL ENGG">Civil Engg</option>
                                <option value="COMPUTER SCIENCE & ENGG">Computer Science & Engg</option>
                                <option value="COMPUTER SCIENCE & DESIGN">Computer Science & Design</option>
                                <option value="ELECTRONICS & COMMUNICATION ENGG">Electronics & Communication Engg</option>
                                <option value="INFORMATION TECHNOLOGY ENGG">Information Science Engg</option>
                                <option value="MECHANICAL ENGG">Mechanical Engg</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="current-year" class="form-label">Current Year</label>
                        <input type="number" name="year" min="1" max="4" class="form-control" id="current-year" placeholder="eg. 4"
                            required>
                    </div><div class="col-md-4">
                        <label for="current-sem" class="form-label">Current Semester</label>
                        <input type="number" name="sem" min="1" max="8" class="form-control" id="current-sem" placeholder="eg. 7"
                            required>
                    </div>
                    <div class="col-md-4">
                        <label for="section" class="form-label">Section</label>
                        <input type="text" name="section" min="1" max="1" class="form-control" id="section" placeholder="eg. B"
                            required>
                    </div>
                    <div class="col-md-12">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>" id="email"
                            placeholder="Valid e-mail address" />
                            <span class="invalid-feedback"><?php echo $email_err; ?></span>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="phone" class="form-label">Mobile Number</label>
                            <input type="tel" name="phone" class="form-control" id="phone" placeholder="10-digit mobile number" pattern="[0-9]{10}" minlength="10" maxlength="10" required />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="passwd" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>" id="passwd" minlength="6" maxlength="20"
                            placeholder="Password">
                            <span class="invalid-feedback"><?php echo $password_err; ?></span>
                    </div>
                    <div class="col-md-6">
                        <label for="confirm-paaswd" class="form-label">Confirm Password</label>
                        <input type="password" name="cfpassword" id="confirm-paaswd" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>"
                            placeholder="Confirm Password">
<span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary">Sign in</button>
                    </div>
                    <div class="col-md-1">
                        <a href="index.php">
                            <button type="button" class="btn btn-danger">Cancel</button>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>