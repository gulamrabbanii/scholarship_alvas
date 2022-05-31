<?php
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


    // header("Content-length: $size1");
    // header("Content-type: $type1");
    // header("Content-Disposition: attachment; filename=$file1_name");
    // ob_clean();
    // flush();




    // header("Content-length: $size2");
    // header("Content-type: $type2");
    // header("Content-Disposition: attachment; filename=$file2_name");
    // ob_clean();
    // flush();

    // header("Content-length: $size3");
    // header("Content-type: $type3");
    // header("Content-Disposition: attachment; filename=$file3_name");
    // ob_clean();
    // flush();

    // header("Content-length: $size4");
    // header("Content-type: $type4");
    // header("Content-Disposition: attachment; filename=$file4_name");
    // ob_clean();
    // flush();

    // header("Content-length: $size5");
    // header("Content-type: $type5");
    // header("Content-Disposition: attachment; filename=$file5_name");
    // ob_clean();
    // flush();

    // header("Content-length: $size6");
    // header("Content-type: $type6");
    // header("Content-Disposition: attachment; filename=$file6_name");
    // ob_clean();
    // flush();

    // header("Content-length: $size7");
    // header("Content-type: $type7");
    // header("Content-Disposition: attachment; filename=$file7_name");
    // ob_clean();
    // flush();

    // header("Content-length: $size8");
    // header("Content-type: $type8");
    // header("Content-Disposition: attachment; filename=$file8_name");
    // ob_clean();
    // flush();

    // header("Content-length: $size9");
    // header("Content-type: $type9");
    // header("Content-Disposition: attachment; filename=$file9_name");
    // ob_clean();
    // flush();

    // header("Content-length: $size10");
    // header("Content-type: $type10");
    // header("Content-Disposition: attachment; filename=$file10_name");
    // ob_clean();
    // flush();

    // header("Content-length: $size11");
    // header("Content-type: $type11");
    // header("Content-Disposition: attachment; filename=$file11_name");
    // ob_clean();
    // flush();

    // header("Content-length: $size12");
    // header("Content-type: $type12");
    // header("Content-Disposition: attachment; filename=$file12_name");
    // ob_clean();
    // flush();


    // header("Content-length: $size13");
    // header("Content-type: $type13");
    // header("Content-Disposition: attachment; filename=$file13_name");
    // ob_clean();
    // flush();


    // header("Content-length: $size14");
    // header("Content-type: $type14");
    // header("Content-Disposition: attachment; filename=$file14_name");
    // ob_clean();
    // flush();


    $files = array();

    if ($file1_name)
        array_push($files, $file1_name);

    if ($file14_name)
        array_push($files, $file14_name);

    $zipname = $usn . "_" . $acronym . '.zip';
    $zip = new ZipArchive;
    $zip->open($zipname, ZipArchive::CREATE);
    foreach ($files as $file) {
        $zip->addFile($file);
    }
    $zip->close();

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
    readfile($zipname);
    exit;

    mysqli_close($link);
}
