<?php
$pattern = "/4(al)[0-9]{2}[A-Za-z]{2}[0-9]{3}/i";
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || preg_match($pattern, $_SESSION["username"])) {
    header("location: ../index.php");
    exit;
}
require_once("../db/config.php");

if (isset($_GET['FileNo'])) {
    $FileNo = $_GET['FileNo'];

    $query = "SELECT * FROM sch_receipt_proof WHERE uid='$FileNo'";
    $result = $link->query($query);

    list($uid, $usn, $sch_name, $sch_provider, $is_applied, $academic_year, $is_received, $file_name, $file_type, $file_size, $receipt_proof) = mysqli_fetch_array($result);

    // scholarship acronym 
    $words = preg_split("/[\s,_-]+/", $sch_name);
    $acronym = "";
    foreach ($words as $w) {
        $acronym .= $w[0];
    }

    header("Content-length: $file_size");
    header("Content-type: $file_type");
    header("Content-Disposition: attachment; filename=$file_name");
    ob_clean();
    flush();
    echo $receipt_proof;

    mysqli_close($link);
    exit;
}
