<?php
echo '<script>alert("update-status");</script>';
require_once("../db/config.php");
$usn = $_SESSION['username'];

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['sch-name'])) {
    echo '<script>alert("Hi");</script>';
    $sch_name = htmlspecialchars(strip_tags(trim($_POST["sch-name"])));
    $sch_IsApplied = htmlspecialchars(strip_tags(trim($_POST["IsApplied"])));
    $sch_IsReceived = htmlspecialchars(strip_tags(trim($_POST["IsReceived"])));
    $sch_applied_year = htmlspecialchars(strip_tags(trim($_POST["sch-year"])));
    $sch_provider = htmlspecialchars(strip_tags(trim($_POST["sch-provider"])));

    $sql = "SELECT id FROM scholarship_details WHERE usn = ? AND sch_name = ? AND sch_provider = ? AND academic_year = ?";

    if ($stmt = $link->prepare($sql)) {
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("ssss", $param_usn, $param_sch_name, $param_sch_provider, $param_applied_year);

        // Set parameters
        $param_usn = $usn;
        $param_sch_name = $sch_name;
        $param_sch_provider = $sch_provider;
        $param_applied_year = $sch_applied_year;

        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            // store result
            $stmt->store_result();

            if ($stmt->num_rows == 1) {
                echo "<script>alert('This scholarship result has already been updated by you.')</script>";
                header("Refresh:0 , url =  status.php");
                exit();
            } else {
                $sch_name = $sch_name;
            }
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }

        // Close statement
        $stmt->close();
    }

    if ($sch_IsApplied === 'yes' && $sch_IsReceived === 'no') {

        $sql_IsApplied = "INSERT INTO `sch_receipt_proof`(`usn`, `sch_name`, `sch_provider`, `is_applied`, `academic_year`, `is_received`) VALUES (?, ?, ?, ?, ?, ?)";

        if ($stmt = $link->prepare($sql_IsApplied)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("ssssss", $param_usn, $param_sch_name, $param_sch_provider, $param_is_applied, $param_applied_year, $param_is_received);

            // Set parameters
            $param_usn = $usn;
            $param_sch_name = $sch_name;
            $param_sch_provider = $sch_provider;
            $param_is_applied = $sch_IsApplied;
            $param_applied_year = $sch_applied_year;
            $param_is_received = $sch_IsReceived;

            // Attempt to execute the prepared statement
            $stmt->execute();
            // Close statement
            $stmt->close();
        }
    }

    if ($sch_IsApplied == 'yes' && $sch_IsReceived == 'yes' && !empty($sch_applied_year) && isset($_FILES["sch-proof"]) && $_FILES["sch-proof"]["error"] == 0) {

        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "pdf" => "application/pdf");
        $filename = $_FILES["sch-proof"]["name"];
        $filetype = $_FILES["sch-proof"]["type"];
        $file_tmp = $_FILES['sch-proof']['tmp_name'];
        $filesize = $_FILES["sch-proof"]["size"];

        // rename file 
        $words = preg_split("/[\s,_-]+/", $filename);
        $acronym = "";
        foreach ($words as $w) {
            $acronym .= $w[0];
        }
        $extension = end(explode(".", $filename));
        $newfilename = $usn . $acronym . "." . $extension;

        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if (!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");

        // Verify file size - 5MB maximum
        $maxsize = 307200;
        $minsize = 51200;
        if ($filesize > $maxsize || $filesize <  $minsize) die("Error: File size is larger/lesser than the allowed limit.");

        // Verify MYME type of the file
        if (in_array($filetype, $allowed)) {
            $sql_IsReceived = "INSERT INTO `sch_receipt_proof`(`usn`, `sch_name`, `sch_provider`, `is_applied`, `academic_year`, `is_received`, `receipt_proof) VALUES (?, ?, ?, ?, ?, ?, ?)";
            // Bind variables to the prepared statement as parameters
            if ($stmt = $link->prepare($sql_IsReceived)) {
                $stmt->bind_param("ssssssb", $param_usn, $param_sch_name, $param_sch_provider, $param_is_applied, $param_applied_year, $param_is_received, $param_file_name);

                // Set parameters
                $param_usn = $usn;
                $param_sch_name = $sch_name;
                $param_sch_provider = $sch_provider;
                $param_is_applied = $sch_IsApplied;
                $param_applied_year = $sch_applied_year;
                $param_is_received = $sch_IsReceived;
                $param_file_name = $newfilename;

                // Attempt to execute the prepared statement
                $stmt->execute();
                // Close statement
                $stmt->close();
            }
        }
    }
    // Close connection
    $link->close();
}
