<?php
// Initialize the session
session_start();

// Include config file
require_once("db/config.php");
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

// Set variables
$username_err = $email_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = htmlspecialchars(strip_tags(trim($_POST["username"])));
    // Check if username is empty
    if (empty($username)) {
        $username_err = "Please enter username.";
        echo "<script>alert('Please enter username.');</script>";
    } else {
        $username = $username;
    }

    // Check if email is empty
    $email = htmlspecialchars(strip_tags(trim($_POST["email"])));

    if (empty($email)) {
        $email_err = "Please enter your password.";
        echo "<script>alert('Please enter your password.');</script>";
    } else {
        $email = $email;
    }

    // Validate credentials
    if (empty($username_err) && empty($email_err)) {
        // Prepare a select statement
        $sql = "SELECT id, username, passwd FROM users WHERE username = ? AND email = ?";

        if ($stmt = $link->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("ss", $param_username, $param_email);

            // Set parameters
            $param_username = $username;
            $param_email = $email;

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Store result
                $stmt->store_result();

                // Check if username exists, if yes then verify password
                if ($stmt->num_rows == 1) {
                    try {
                        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
                        $pass = array(); //remember to declare $pass as an array
                        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
                        for ($i = 0; $i < 8; $i++) {
                            $n = rand(0, $alphaLength);
                            $pass[] = $alphabet[$n];
                        }
                        $password = implode($pass);
                        $subject = "Your New Password.";
                        $message = "Please use this password to login <b>" . $password . "</b>";

                        //Server settings
                        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                  //Enable verbose debug output
                        $mail->isSMTP();                                          //Send using SMTP
                        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                        $mail->SMTPAuth   = true;                                 //Enable SMTP authentication
                        $mail->Username   = 'smartboygr07@gmail.com';             //SMTP username
                        $mail->Password   = 'rabbani@RAZA#1610';                   //SMTP password
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;          //Enable implicit TLS encryption
                        $mail->Port       = 465;                                  //TCP port to connect to; use 587 if you have set `SMTPSecure =                     PHPMailer::ENCRYPTION_STARTTLS`

                        //Recipients
                        $mail->setFrom('smartboygr07@gmail.com', "Alva's Scholarship Portal");
                        $mail->addAddress($email);                                //Name is optional

                        //Content
                        $mail->isHTML(true);                                      //Set email format to HTML
                        $mail->Subject = "Please use this password to login Alvas's Scholarship Portal. ";
                        $mail->Body    = $message;

                        $mail->send();


                        // Prepare an update statement
                        $password_sql = "UPDATE users SET passwd = ? WHERE username = '$username'";

                        if ($stmt2 = $link->prepare($password_sql)) {
                            // Bind variables to the prepared statement as parameters
                            $stmt2->bind_param("s", $param_password);

                            // Set parameters
                            $param_password = password_hash($password, PASSWORD_DEFAULT);

                            // Attempt to execute the prepared statement
                            if ($stmt2->execute()) {
                                // Password updated successfully. Destroy the session, and redirect to login page
                                session_destroy();
                                echo "<script>alert('Your Password has been sent to your email id.');
                                window.location.href='index.php';</script>";
                            } else {
                                echo "Oops! Something went wrong. Please try again later.";
                                header("location: index.php");
                                exit();
                            }

                            // Close statement
                            $stmt2->close();
                        }
                    } catch (Exception $e) {
                        echo "<script>alert('Failed to send your password, try again.');
                        window.location.href='index.php';</script>";
                    }
                } else {
                    // Username doesn't exist, display a generic error message
                    echo "<script>alert('Invalid username or email');
                    window.location.href='index.php';</script>";
                }
            }
            // Close statement
            $stmt->close();
        }
    }
    // Close connection
    $link->close();
}
