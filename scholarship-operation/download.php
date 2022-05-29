<?php
require_once("../db/config.php");
$FileNo = $_GET['FileNo'];

//Use Mysql Query to find the 'full path' of file using $FileNo.
// I Assume $FilePaths as 'Full File Path'.
$sql = "SELECT * FROM upload_sch_docs WHERE uid='$FileNo'";
$result = $link->query($sql);
$file = "file";
for ($i = 1; $i <= 14; $i++)
    echo $file . $i . "_tmp\n";
while ($row = $result->fetch_assoc()) {
}
