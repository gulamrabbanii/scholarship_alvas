<?php
$pattern = "/4(al)[0-9]{2}[A-Za-z]{2}[0-9]{3}/i";
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || preg_match($pattern, $_SESSION["username"])) {
    header("location: ../index.php");
    exit;
}
error_reporting(E_ALL & ~E_WARNING  & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
require_once("../db/config.php");

if (isset($_GET['FileNo'])) {
    $FileNo = $_GET['FileNo'];

    $query = "SELECT * FROM upload_sch_docs WHERE uid='$FileNo'";
    $result = $link->query($query);

    list($id, $usn, $sch_name, $sch_applied_year, $file1_name, $type1, $size1, $content1, $file2_name, $type2, $size2, $content2, $file3_name, $type3, $size3, $content3, $file4_name, $type4, $size4, $content4, $file5_name, $type5, $size5, $content5, $file6_name, $type6, $size6, $content6, $file7_name, $type7, $size7, $content7, $file8_name, $type8, $size8, $content8, $file9_name, $type9, $size9, $content9, $file10_name, $type10, $size10, $content10, $file11_name, $type11, $size11, $content11, $file12_name, $type12, $size12, $content12, $file13_name, $type13, $size13, $content13, $file14_name, $type14, $size14, $content14) = mysqli_fetch_array($result);

    // scholarship acronym 
    $words = preg_split("/[\s,_-]+/", $sch_name);
    $acronym = "";
    foreach ($words as $w) {
        $acronym .= $w[0];
    }

    $zipname = $usn . "_" . $acronym . '.zip';
    $zip = new ZipArchive;


    if ($file1_name) {
        // file_put_contents($file1_name, $content1);
        // if ($zip->open($zipname, ZipArchive::CREATE) === TRUE) {
        $zip->open($zipname, ZipArchive::CREATE);

        // $zip->addFile($file1_name);
        $zip->addFromString($file1_name, $content1);
        // }
    }

    if ($file2_name) {
        // file_put_contents($file2_name, $content2);
        // if ($zip->open($zipname, ZipArchive::CREATE) === TRUE) {
        $zip->open($zipname, ZipArchive::CREATE);

        $zip->addFromString($file2_name, $content2);
        // }
    }

    if ($file3_name) {
        // file_put_contents($file3_name, $content3);
        // if ($zip->open($zipname, ZipArchive::CREATE) === TRUE) {
        $zip->open($zipname, ZipArchive::CREATE);

        $zip->addFromString($file3_name, $content3);
        // }
    }

    if ($file4_name) {
        $zip->open($zipname, ZipArchive::CREATE);
        // file_put_contents($file4_name, $content4);
        // if ($zip->open($zipname, ZipArchive::CREATE) === TRUE) {
        // $zip->addFile($file4_name);
        $zip->addFromString($file4_name, $content4);
        // }
    }

    if ($file5_name) {
        // file_put_contents($file5_name, $content5);
        $zip->open($zipname, ZipArchive::CREATE);

        // if ($zip->open($zipname, ZipArchive::CREATE) === TRUE) {
        // $zip->addFile($file5_name);
        $zip->addFromString($file5_name, $content5);
        // }
    }

    if ($file6_name) {
        // file_put_contents($file6_name, $content6);
        // if ($zip->open($zipname, ZipArchive::CREATE) === TRUE) {
        $zip->open($zipname, ZipArchive::CREATE);
        // $zip->addFile($file6_name);
        $zip->addFromString($file6_name, $content6);
        // }
    }

    if ($file7_name) {
        // file_put_contents($file7_name, $content7);
        // if ($zip->open($zipname, ZipArchive::CREATE) === TRUE) {
        $zip->open($zipname, ZipArchive::CREATE);

        // $zip->addFile($file7_name);
        $zip->addFromString($file7_name, $content7);
        // }
    }

    if ($file8_name) {
        // file_put_contents($file8_name, $content8);
        $zip->open($zipname, ZipArchive::CREATE);

        // if ($zip->open($zipname, ZipArchive::CREATE) === TRUE) {
        // $zip->addFile($file8_name);
        $zip->addFromString($file8_name, $content8);
        // }
    }

    if ($file9_name) {
        $zip->open($zipname, ZipArchive::CREATE);
        // file_put_contents($file9_name, $content9);
        // if ($zip->open($zipname, ZipArchive::CREATE) === TRUE) {
        // $zip->addFile($file9_name);
        $zip->addFromString($file9_name, $content9);
        // }
    }

    if ($file10_name) {
        // file_put_contents($file10_name, $content10);
        $zip->open($zipname, ZipArchive::CREATE);

        // if ($zip->open($zipname, ZipArchive::CREATE) === TRUE) {
        // $zip->addFile($file10_name);
        $zip->addFromString($file10_name, $content10);
        // }
    }

    if ($file11_name) {
        $zip->open($zipname, ZipArchive::CREATE);
        // file_put_contents($file11_name, $content11);
        // if ($zip->open($zipname, ZipArchive::CREATE) === TRUE) {
        // $zip->addFile($file11_name);
        $zip->addFromString($file11_name, $content11);
        // }
    }

    if ($file12_name) {
        // file_put_contents($file12_name, $content12);
        // if ($zip->open($zipname, ZipArchive::CREATE) === TRUE) {
        $zip->open($zipname, ZipArchive::CREATE);
        // $zip->addFile($file12_name);
        $zip->addFromString($file12_name, $content12);
        // }
    }

    if ($file13_name) {
        // file_put_contents($file13_name, $content13);
        $zip->open($zipname, ZipArchive::CREATE);
        // $zip->open($zipname, ZipArchive::CREATE) === TRUE);
        // $zip->addFile($file13_name);
        $zip->addFromString($file13_name, $content13);
    }

    if ($file14_name) {
        // file_put_contents($file14_name, $content14);
        $zip->open($zipname, ZipArchive::CREATE);
        // $zip->addFile($file14_name);
        $zip->addFromString($file14_name, $content14);
    }


    //open zip file and put all files in zip
    // foreach ($files as $f) {

    //         // $new_filename = substr($f, strrpos($f, '/'));
    //         // echo $new_filename;
    //         // $zip->addFile($f, $new_filename);

    // }

    //check zip file create or not and download it
    if (file_exists($zipname)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/zip');
        header('Content-Disposition: attachment; filename=' . basename($zipname));
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($zipname));
        ob_clean();
        flush();
        // sleep one second
        sleep(1);
        readfile($zipname);
        fclose($zipname);
    } else {
        die('Error: Could not download the file. Please try again.');
    }

    mysqli_free_result($result);

    mysqli_close($link);
}
