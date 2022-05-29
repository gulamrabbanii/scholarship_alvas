<?php
include("sidebar-layout.php");
error_reporting(E_ALL & ~E_WARNING  & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);

require_once("../db/config.php");
$usn = $_SESSION['username'];

$err1 = $err2 = $err3 = $err4 = $err5 = $err6 = $err7 = $err8 = $err9 = $err10 = $errr11 = $err12 = $err13 = $err14 = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['sch-name'])) {
      $sch_name = htmlspecialchars(strip_tags(trim($_POST["sch-name"])));
      $sch_applied_year = htmlspecialchars(strip_tags(trim($_POST["sch-year"])));

      $sql = "SELECT id FROM upload_sch_docs WHERE usn = ? AND sch_name = ? AND sch_applied_year = ?";

      if ($stmt = $link->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("sss", $param_usn, $param_sch_name, $param_applied_year);

            // Set parameters
            $param_usn = $usn;
            $param_sch_name = $sch_name;
            $param_applied_year = $sch_applied_year;

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                  // store result
                  $stmt->store_result();

                  if ($stmt->num_rows == 1) {
                        echo "<script>alert('This scholarship result has already been updated by you.')</script>";
                        header("Refresh:0 , url =  upload-docs.php");
                        $stmt->close();
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

      $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "pdf" => "application/pdf");

      // scholarship acronym 
      $words = preg_split("/[\s,_-]+/", $sch_name);
      $acronym = "";
      foreach ($words as $w) {
            $acronym .= $w[0];
      }

      // allowed file size
      $maxsize = 307200;
      $minsize = 51200;

      if (isset($_FILES["aadhar"]) && $_FILES["aadhar"]["error"] == 0) {
            // access file values
            $file1 = $_FILES["aadhar"]["name"];
            $file1_type = $_FILES["aadhar"]["type"];
            $file1_tmp = addslashes(file_get_contents($_FILES['aadhar']['tmp_name']));
            $file1_size = $_FILES["aadhar"]["size"];

            // rename
            $extension = end(explode(".", $file1));
            $file1 = $usn . "_aadhar_" . $acronym . "." . $extension;

            // Verify file extension and Verify file size
            $ext = pathinfo($file1, PATHINFO_EXTENSION);
            if (!array_key_exists($ext, $allowed) && !in_array($file1_type, $allowed) && ($file1_size > $maxsize || $file1_size <  $minsize)) {
                  $err1 = "Invalid file format or Invalid File size";
            }
      }

      if (isset($_FILES["resident"]) && $_FILES["resident"]["error"] == 0) {
            $file2 = $_FILES["resident"]["name"];
            $file2_type = $_FILES["resident"]["type"];
            $file2_tmp = addslashes(file_get_contents($_FILES['resident']['tmp_name']));
            $file2_size = $_FILES["resident"]["size"];

            // rename
            $extension = end(explode(".", $file2));
            $file2 = $usn . "_resident_" . $acronym . "." . $extension;

            // Verify file extension and Verify file size
            $ext = pathinfo($file2, PATHINFO_EXTENSION);
            if (!array_key_exists($ext, $allowed) && !in_array($file2_type, $allowed) && ($file2_size > $maxsize || $file2_size <  $minsize)) {
                  $err2 = "Invalid file format or Invalid File size";
            }
      }

      if (isset($_FILES["income"]) && $_FILES["income"]["error"] == 0) {
            $file3 = $_FILES["income"]["name"];
            $file3_type = $_FILES["income"]["type"];
            $file3_tmp = addslashes(file_get_contents($_FILES['income']['tmp_name']));
            $file3_size = $_FILES["income"]["size"];

            // rename 
            $extension = end(explode(".", $file3));
            $file3 = $usn . "_income_" . $acronym . "." . $extension;

            // Verify file extension
            $ext = pathinfo($file3, PATHINFO_EXTENSION);
            if (!array_key_exists($ext, $allowed) && !in_array($file3_type, $allowed) && ($file3_size > $maxsize || $file3_size <  $minsize)) {
                  $err3 = "Invalid file format or Invalid File size";
            }
      }

      if (isset($_FILES["pwd"]) && $_FILES["pwd"]["error"] == 0) {
            $file4 = $_FILES["pwd"]["name"];
            $file4_type = $_FILES["pwd"]["type"];
            $file4_tmp = addslashes(file_get_contents($_FILES['pwd']['tmp_name']));
            $file4_size = $_FILES["pwd"]["size"];

            //rename
            $extension = end(explode(".", $file4));
            $file4 = $usn . "_pwd_" . $acronym . "." . $extension;

            // Verify file extension
            $ext = pathinfo($file4, PATHINFO_EXTENSION);
            if (!array_key_exists($ext, $allowed) && !in_array($file4_type, $allowed) && ($file4_size > $maxsize || $file4_size <  $minsize)) {
                  $err4 = "Invalid file format or Invalid File size";
            }
      }

      if (isset($_FILES["bonafide"]) && $_FILES["bonafide"]["error"] == 0) {
            $file5 = $_FILES["bonafide"]["name"];
            $file5_type = $_FILES["bonafide"]["type"];
            $file5_tmp = addslashes(file_get_contents($_FILES['bonafide']['tmp_name']));
            $file5_size = $_FILES["bonafide"]["size"];

            // rename
            $extension = end(explode(".", $file5));
            $file5 = $usn . "_bonafide_" . $acronym . "." . $extension;

            // Verify file extension
            $ext = pathinfo($file5, PATHINFO_EXTENSION);
            if (!array_key_exists($ext, $allowed) && !in_array($file5_type, $allowed) && ($file5_size > $maxsize || $file5_size <  $minsize)) {
                  $err5 = "Invalid file format or Invalid File size";
            }
      }

      if (isset($_FILES["caste"]) && $_FILES["caste"]["error"] == 0) {
            $file6 = $_FILES["caste"]["name"];
            $file6_type = $_FILES["caste"]["type"];
            $file6_tmp = addslashes(file_get_contents($_FILES['caste']['tmp_name']));
            $file6_size = $_FILES["caste"]["size"];

            // rename
            $extension = end(explode(".", $file6));
            $file6 = $usn . "_caste_" . $acronym . "." . $extension;

            // Verify file extension
            $ext = pathinfo($file6, PATHINFO_EXTENSION);
            if (!array_key_exists($ext, $allowed) && !in_array($file6_type, $allowed) && ($file6_size > $maxsize || $file6_size <  $minsize)) {
                  $err6 = "Invalid file format or Invalid File size";
            }
      }

      if (isset($_FILES["parent_aadhar"]) && $_FILES["parent_aadhar"]["error"] == 0) {
            $file7 = $_FILES["parent_aadhar"]["name"];
            $file7_type = $_FILES["parent_aadhar"]["type"];
            $file7_tmp = addslashes(file_get_contents($_FILES['parent_aadhar']['tmp_name']));
            $file7_size = $_FILES["parent_aadhar"]["size"];

            // rename
            $extension = end(explode(".", $file7));
            $file7 = $usn . "_parent_aadhar_" . $acronym . "." . $extension;

            // Verify file extension
            $ext = pathinfo($file7, PATHINFO_EXTENSION);
            if (!array_key_exists($ext, $allowed) && !in_array($file7_type, $allowed) && ($file7_size > $maxsize || $file7_size <  $minsize)) {
                  $err7 = "Invalid file format or Invalid File size";
            }
      }

      if (isset($_FILES["passbook"]) && $_FILES["passbook"]["error"] == 0) {
            $file8 = $_FILES["passbook"]["name"];
            $file8_type = $_FILES["passbook"]["type"];
            $file8_tmp = addslashes(file_get_contents($_FILES['passbook']['tmp_name']));
            $file8_size = $_FILES["passbook"]["size"];

            // rename
            $extension = end(explode(".", $file8));
            $file8 = $usn . "_passbook_" . $acronym . "." . $extension;

            // Verify file extension
            $ext = pathinfo($file8, PATHINFO_EXTENSION);
            if (!array_key_exists($ext, $allowed) && !in_array($file8_type, $allowed) && ($file8_size > $maxsize || $file8_size <  $minsize)) {
                  $err8 = "Invalid file format or Invalid File size";
            }
      }

      if (isset($_FILES["clg_fee"]) && $_FILES["clg_fee"]["error"] == 0) {
            $file9 = $_FILES["clg_fee"]["name"];
            $file9_type = $_FILES["clg_fee"]["type"];
            $file9_tmp = addslashes(file_get_contents($_FILES['clg_fee']['tmp_name']));
            $file9_size = $_FILES["clg_fee"]["size"];

            // rename
            $extension = end(explode(".", $file9));
            $file9 = $usn . "_clg_fee_" . $acronym . "." . $extension;

            // Verify file extension
            $ext = pathinfo($file9, PATHINFO_EXTENSION);
            if (!array_key_exists($ext, $allowed) && !in_array($file9_type, $allowed) && ($file9_size > $maxsize || $file9_size <  $minsize)) {
                  $err9 = "Invalid file format or Invalid File size";
            }
      }

      if (isset($_FILES["sslc_puc"]) && $_FILES["sslc_puc"]["error"] == 0) {
            $file10 = $_FILES["sslc_puc"]["name"];
            $file10_type = $_FILES["sslc_puc"]["type"];
            $file10_tmp = addslashes(file_get_contents($_FILES['sslc_puc']['tmp_name']));
            $file10_size = $_FILES["sslc_puc"]["size"];

            // rename
            $extension = end(explode(".", $file10));
            $file10 = $usn . "_sslc_puc_" . $acronym . "." . $extension;

            // Verify file extension
            $ext = pathinfo($file10, PATHINFO_EXTENSION);
            if (!array_key_exists($ext, $allowed) && !in_array($file10_type, $allowed) && ($file10_size > $maxsize || $file10_size <  $minsize)) {
                  $err10 = "Invalid file format or Invalid File size";
            }
      }

      if (isset($_FILES["sem_marks"]) && $_FILES["sem_marks"]["error"] == 0) {
            $file11 = $_FILES["sem_marks"]["name"];
            $file11_type = $_FILES["sem_marks"]["type"];
            $file11_tmp = addslashes(file_get_contents($_FILES['sem_marks']['tmp_name']));
            $file11_size = $_FILES["sem_marks"]["size"];

            // rename
            $extension = end(explode(".", $file11));
            $file11 = $usn . "_sem_marks_" . $acronym . "." . $extension;

            // Verify file extension
            $ext = pathinfo($file11, PATHINFO_EXTENSION);
            if (!array_key_exists($ext, $allowed) && !in_array($file11_type, $allowed) && ($file11_size > $maxsize || $file11_size <  $minsize)) {
                  $err11 = "Invalid file format or Invalid File size";
            }
      }

      if (isset($_FILES["diploma"]) && $_FILES["diploma"]["error"] == 0) {
            $file12 = $_FILES["diploma"]["name"];
            $file12_type = $_FILES["diploma"]["type"];
            $file12_tmp = addslashes(file_get_contents($_FILES['diploma']['tmp_name']));
            $file12_size = $_FILES["diploma"]["size"];

            // rename
            $extension = end(explode(".", $file12));
            $file12 = $usn . "_diploma_" . $acronym . "." . $extension;

            // Verify file extension
            $ext = pathinfo($file12, PATHINFO_EXTENSION);
            if (!array_key_exists($ext, $allowed) && !in_array($file12_type, $allowed) && ($file12_size > $maxsize || $file12_size <  $minsize)) {
                  $err12 = "Invalid file format or Invalid File size";
            }
      }

      if (isset($_FILES["self_minority"]) && $_FILES["self_minority"]["error"] == 0) {
            $file13 = $_FILES["self_minority"]["name"];
            $file13_type = $_FILES["self_minority"]["type"];
            $file13_tmp = addslashes(file_get_contents($_FILES['self_minority']['tmp_name']));
            $file13_size = $_FILES["self_minority"]["size"];

            // rename
            $extension = end(explode(".", $file13));
            $file13 = $usn . "_self_decl_minority_" . $acronym . "." . $extension;

            // Verify file extension
            $ext = pathinfo($file13, PATHINFO_EXTENSION);
            if (!array_key_exists($ext, $allowed) && !in_array($file13_type, $allowed) && ($file13_size > $maxsize || $file13_size <  $minsize)) {
                  $err13 = "Invalid file format or Invalid File size";
            }
      }

      if (isset($_FILES["ration"]) && $_FILES["ration"]["error"] == 0) {
            $file14 = $_FILES["ration"]["name"];
            $file14_type = $_FILES["ration"]["type"];
            $file14_tmp = addslashes(file_get_contents($_FILES['ration']['tmp_name']));
            $file14_size = $_FILES["ration"]["size"];

            // rename
            $extension = end(explode(".", $file14));
            $file14 = $usn . "_ration_" . $acronym . "." . $extension;

            // Verify file extension
            $ext = pathinfo($file14, PATHINFO_EXTENSION);
            if (!array_key_exists($ext, $allowed) && !in_array($file14_type, $allowed) && ($file14_size > $maxsize || $file14_size <  $minsize)) {
                  $err14 = "Invalid file format or Invalid File size";
            }
      }

      if (empty($err1) && empty($err2) && empty($err3) && empty($err4) && empty($err5) && empty($err6) && empty($err7) && empty($err8) && empty($err9) && empty($err10) && empty($err11) && empty($err12) && empty($err13) && empty($err14) && !empty($sch_name) && !empty($sch_applied_year)) {

            $sql_upload = "INSERT INTO `upload_sch_docs`(`usn`, `sch_name`, `sch_applied_year`, `govt_id`, `file1`, `domicile`, `file2`, `income`, `file3`, `pwd`, `file4`, `bonafide`, `file5`, `caste`, `file6`, `parent_aadhar`, `file7`, `passbook`, `file8`, `clg_fee`, `file9`, `sslc_puc`, `file10`, `sem_marks`, `file11`, `diploma`, `file12`, `self_decl`, `file13`, `ration`, `file14`) VALUES ('$usn','$sch_name','$sch_applied_year','$file1','{$file1_tmp}','$file2','{$file2_tmp}','$file3','{$file3_tmp}','$file4','{$file4_tmp}','$file5','{$file5_tmp}','$file6','{$file6_tmp}','$file7','{$file7_tmp}','$file8','{$file8_tmp}','$file9','{$file9_tmp}','$file10','{$file10_tmp}','$file11','{$file11_tmp}','$file12','{$file12_tmp}','$file13','{$file13_tmp}','$file14','{$file14_tmp}');";

            if ($stmt1 = $link->query($sql_upload)) {
                  echo '<script>alert("File successfully uploaded.");</script>';
            } else {
                  echo '<script>alert("Oops! Something went wrong. Please upload documents in required format.");</script>';
            }
      }
      // Close connection
      $link->close();
}
?>

<style>
      .custom-field {
            width: 100%;
            border: 1px solid;
            border-top: none;
            margin: 32px 2px;
            padding: 8px;
      }

      .custom-field h1 {
            font: 16px normal;
            margin: -16px -8px 0;
      }

      .custom-field h1 span {
            float: left;
      }

      .custom-field h1:before {
            border-top: 1px solid;
            content: ' ';
            float: left;
            margin: 8px 2px 0 -1px;
            width: 25px;
      }

      .custom-field h1:after {
            border-top: 1px solid;
            content: ' ';
            display: block;
            height: 30px;
            left: 2px;
            margin: 0 1px 0 0;
            overflow: hidden;
            position: relative;
            top: 8px;
      }
</style>
<title>DOCS | VERIFICATION</title>
<section>
      <div class="container p-4">
            <h2 style="letter-spacing: 0.2rem; word-spacing: 0.5rem; background:rgba(255,255,255, 1); color: #413F42;">UPLOAD DOCUMENTS</h2>
            <p>Please upload documentation related to your scholarship.</p>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" accept-charset="utf-8" method="post" enctype="multipart/form-data">
                  <div class="custom-field">
                        <h1>
                              <span class="fw-bold" style="color: #4E4E91;">Please provide scholarship information</span>
                        </h1>
                        <div class="row m-3">
                              <div class="col-md-12">
                                    <label for="sch_name" class="form-label">Scholarship Name</label>
                                    <input type="text" name="sch-name" class="form-control username" id="sch_name" placeholder="eg. National Scholarship Portal" required />
                              </div>
                              <div class="col-md-12 mt-2">
                                    <label for="sch-year" class="form-label">Scholarship Academic Year</label>
                                    <input type="text" name="sch-year" class="form-control username" id="sch-year" placeholder="eg. 2022-23" required />
                              </div>
                        </div>
                  </div>
                  <p class="fw-bold" style="color: #4E4E91;">Please only choose documents that are relevant to your scholarship.</p>
                  <div class="input-group mb-3">
                        <input type="file" name="aadhar" class="form-control" id="govt-id" required>
                        <label class="input-group-text bg-danger w-50 text-white" for="govt-id">Government ID Proof (eg. Aadhar Card, Driving License)</label>
                  </div>
                  <div class="input-group mb-3">
                        <input type="file" name="resident" class="form-control" id="domicile">
                        <label class="input-group-text w-50 bg-danger text-white" for="domicile">Domicile/Residential Certificate</label>
                  </div>
                  <div class="input-group mb-3">
                        <input type="file" name="income" class="form-control" id="income">
                        <label class="input-group-text w-50 bg-danger text-white" for="income">Income Certificate</label>
                  </div>
                  <div class="input-group mb-3">
                        <input type="file" name="pwd" class="form-control" id="pwd-cert">
                        <label class="input-group-text w-50 bg-danger text-white" for="pwd-cert">PwD(Person With Disability) Certificate</label>
                  </div>
                  <div class="input-group mb-3">
                        <input type="file" name="bonafide" class="form-control" id="bonafide">
                        <label class="input-group-text w-50 bg-danger text-white" for="bonafide">Bonafide Certificate</label>
                  </div>
                  <div class="input-group mb-3">
                        <input type="file" name="caste" class="form-control" id="caste-cert">
                        <label class="input-group-text w-50 bg-danger text-white" for="caste-cert">Caste Certificate</label>
                  </div>
                  <div class="input-group mb-3">
                        <input type="file" name="parent_aadhar" class="form-control" id="parent-aadhar">
                        <label class="input-group-text w-50 bg-danger text-white" for="parent-aadhar"> Aadhar Card of Mother & Father/Guardian</label>
                  </div>
                  <div class="input-group mb-3">
                        <input type="file" name="passbook" class="form-control" id="bank-passbook">
                        <label class="input-group-text w-50 bg-danger text-white" for="bank-passbook">Bank Passbook of Student</label>
                  </div>
                  <div class="input-group mb-3">
                        <input type="file" name="clg_fee" class="form-control" id="college-fee">
                        <label class="input-group-text w-50 bg-danger text-white" for="college-fee">College Fee Receipt</label>
                  </div>
                  <div class="input-group mb-3">
                        <input type="file" name="sslc_puc" class="form-control" id="sslc-puc">
                        <label class="input-group-text w-50 bg-danger text-white" for="sslc-puc">10<sup>th</sup> or 12<sup>th</sup> Marks Cards</label>
                  </div>
                  <div class="input-group mb-3">
                        <input type="file" name="sem_marks" class="form-control" id="sem-marks">
                        <label class="input-group-text w-50 bg-danger text-white" for="sem-marks">Previous 2 Semester Marks Card</label>
                  </div>
                  <div class="input-group mb-3">
                        <input type="file" name="diploma" class="form-control" id="diploma-cert">
                        <label class="input-group-text w-50 bg-danger text-white" for="diploma-cert">Admission Letter to Diploma</label>
                  </div>
                  <div class="input-group mb-3">
                        <input type="file" name="self_minority" class="form-control" id="self-decl">
                        <label class="input-group-text w-50 bg-danger text-white" for="self-decl">Self Declaration Minority Certificate</label>
                  </div>
                  <div class="input-group mb-3">
                        <input type="file" name="ration" class="form-control" id="ration-card">
                        <label class="input-group-text w-50 bg-danger text-white" for="ration-card">Ration Card</label>
                  </div>

                  <div class="input-group mt-5">
                        <button type="submit" class="btn btn-primary w-100">Submit</button>
                  </div>
            </form>
      </div>
</section>