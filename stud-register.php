<?php
// Include config file
require_once "db/config.php";
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
$pattern = "/4(al)[0-9]{2}[A-Za-z]{2}[0-9]{3}/i";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    $username = trim($_POST["username"]);
    $username = strip_tags($username);
    $username = htmlspecialchars($username);
    // Validate username
    if(empty(trim($_POST["username"]))){
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
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
        $password = strip_tags($password);
	    $password = htmlspecialchars($password);
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

    // Setting variables to values
    $first_name = trim($_POST['f-name']);
    $first_name = strip_tags($first_name);
	$first_name = htmlspecialchars($first_name);

    $last_name = trim($_POST['l-name']);
    $last_name = strip_tags($last_name);
	$last_name = htmlspecialchars($last_name);

    $phone = trim($_POST['phone']);
    $phone = strip_tags($phone);
	$phone = htmlspecialchars($phone);

    $dept = trim($_POST['sel-branch']);
    $dept = strip_tags($dept);
	$dept = htmlspecialchars($dept);

    $year = trim($_POST['year']);
    $dept = strip_tags($dept);
	$dept = htmlspecialchars($dept);
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, passwd, first_name, last_name, dept, year, phone) VALUES (?, ?, ?, ?, ?, ?, ?)";
         
        if($stmt = $link->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("sssssss", $param_username, $param_password, $param_f_name, $param_l_name, $param_dept, $param_year, $param_phone);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_f_name = $first_name;
            $param_l_name = $last_name;
            $param_dept = $dept;
            $param_year = $year;
            $param_phone = $phone;
            
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
    font-family: 'Lato', sans-serif;
    font-weight: 700;
    background: url("assets/img/bg.png") no-repeat center center / cover !important;
}
.bg-opacity {
    background-color: rgba(255, 255, 255, 0.7);
    box-shadow: 13px 13px 20px #f4f5f7, -13px -13px 20px #ffffff;
}
    .wrapper {
    background-color: rgba(255, 255, 255, 0.7);
    margin-top: 20px;
    margin-left: 100px;
    margin-right: 100px;
    margin-bottom: 20px;
    padding: 60px;
}  
@media (max-width: 768px) {
    .wrapper {
    margin: 10px;
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
                        <input type="text" name="f-name" class="form-control username" id="first-name" placeholder="YOUR FIRST NAME"
                            required />
                    </div>
                    <div class="col-md-6">
                        <label for="first-name" class="form-label">Last Name</label>
                        <input type="text" name="l-name" class="form-control username" id="first-name" placeholder="YOUR LAST NAME"
                            required />
                    </div>
                    <div class="col-md-12">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>" id="username" placeholder="YOUR USN" minlength="10"
                            maxlength="10" pattern="^4[Aa][Ll][0-9]{2}[A-Za-z]{2}[0-9]{3}" />
                            <span class="invalid-feedback"><?php echo $username_err; ?></span>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="branch" class="form-label">Branch</label>
                            <select name="sel-branch" id="inputState" class="form-control" required>
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
                    <div class="col-md-12">
                        <label for="current-year" class="form-label">Current Year</label>
                        <input type="number" name="year" min="1" max="4" class="form-control" id="current-year" placeholder="eg. 3"
                            required>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="phone" class="form-label">Mobile Number</label>
                            <input type="tel" name="phone" class="form-control" id="phone" placeholder="10-digit MOBILE NUMBER" pattern="[0-9]{10}" minlength="10" maxlength="10" required />
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
                            placeholder="CONFIRM PASSWORD">
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