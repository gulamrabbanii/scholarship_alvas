<?php
session_start();
$pattern = "/4(al)[0-9]{2}[A-Za-z]{2}[0-9]{3}/i";
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || preg_match($pattern, $_SESSION["username"])) {
    header("location: ../index.php");
    exit;
}
require_once("../db/config.php");
error_reporting(E_ALL & ~E_WARNING  & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $sch_id = $_POST['sch-id'];
    $sql = "SELECT * FROM scholarship_details WHERE id = '$sch_id';";
    $result = $link->query($sql);
    $row = mysqli_fetch_array($result);
    $scholarship = $row['sch_name'];

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

    // Check, if not have http:// or https:// then prepend it
    if (!preg_match('#^http(s)?://#', $website_link)) {
        $website_link = 'http://' . $website_link;
    }

    $scholarship_details_update = "UPDATE `scholarship_details` SET `sch_name`='$sch_name',`sch_provider`='$provider_name',`sch_start_date`='$start_date',`sch_type`='$sch_type',`sch_deadline`='$deadline_date',`sch_mode`='$sch_mode',`sch_link`='$website_link' WHERE `sch_name` = '$scholarship' AND id = '$sch_id';";
    if ($link->query($scholarship_details_update)) {
        $success1 = "updated";
    }

    $elig_req_update = "UPDATE `elig_req` SET `sch_name`='$sch_name',`minority`='$minority',`sc_st`='$sc_st',`girls`='$sch_girls',`community`='$sch_service',`military`='$sch_military',`pwd`='$sch_pwd',`athletic`='$sch_athletics',`other_sch`='$other_sch' WHERE `sch_name` = '$scholarship';";
    if ($link->query($elig_req_update)) {
        $success2 = "updated";
    }

    $doc_req_update = "UPDATE `doc_req` SET `sch_name`='$sch_name',`govt_id`='$govt_id',`domicile`='$resident_cert',`income`='$income_cert',`pwd_cert`='$pwd_cert',`bonafide`='$bonafide_cert',`caste`='$caste_cert',`parent_aadhar`='$parent_aadhar',`bank_passbook`='$bank_passbook',`college_fee`='$college_fee_receipt',`sslc_puc`='$sslc_puc',`sem`='$sem_marks',`diploma`='$diploma_cert',`self_dec`='$self_dec',`photo`='$photography',`other_cert`='$doc_name' WHERE `sch_name` = '$scholarship';";
    if ($link->query($doc_req_update)) {
        $sucess3 = "updated";
    }

    if (!empty($sucess3) && !empty($success2) && !empty($success1)) {
        echo "<script>alert('Successfully updated');
    window.location.href='../Admin_Dashboard_Panel/all-scholarships.php';</script>";
    }
}
$link->close();
