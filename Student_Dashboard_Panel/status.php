<?php
include("sidebar-layout.php");
error_reporting(E_ALL & ~E_WARNING  & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);

require_once("../db/config.php");
$usn = $_SESSION['username'];

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['sch-name'])) {
    $sch_name = htmlspecialchars(strip_tags(trim($_POST["sch-name"])));
    $sch_IsApplied = htmlspecialchars(strip_tags(trim($_POST["IsApplied"])));
    $sch_IsReceived = htmlspecialchars(strip_tags(trim($_POST["IsReceived"])));
    $sch_applied_year = htmlspecialchars(strip_tags(trim($_POST["sch-year"])));
    $sch_provider = htmlspecialchars(strip_tags(trim($_POST["sch-provider"])));

    $sql = "SELECT uid FROM sch_receipt_proof WHERE usn = ? AND sch_name = ? AND sch_provider = ? AND academic_year = ?";

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
                echo "<script>alert('This scholarship result has already been updated by you.');
                window.location.href='status.php';</script>";
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
        echo '<script>alert("Thank you; please apply for a relevant scholarship.");</script>';

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

        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "png" => "image/png", "pdf" => "application/pdf");
        $filename = $_FILES["sch-proof"]["name"];
        $filetype = $_FILES["sch-proof"]["type"];
        $file_tmp = addslashes(file_get_contents($_FILES['sch-proof']['tmp_name']));
        $filesize = $_FILES["sch-proof"]["size"];

        // rename file 
        $words = preg_split("/[\s,_-]+/", $sch_name);
        $acronym = "";
        foreach ($words as $w) {
            $acronym .= $w[0];
        }
        $extension = end(explode(".", $filename));
        $newfilename = $usn . "_" . $acronym . "." . $extension;

        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if (!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");

        // Verify file size - 5MB maximum
        $maxsize = 307200;
        $minsize = 10240;
        if ($filesize > $maxsize || $filesize <  $minsize) die("Error: File size is larger/lesser than the allowed limit.");

        // Verify MYME type of the file
        if (in_array($filetype, $allowed)) {

            $sql_IsReceived = "INSERT INTO `sch_receipt_proof`(`usn`, `sch_name`, `sch_provider`, `is_applied`, `academic_year`, `is_received`, `file_name`,`file_type`,`file_size`, `receipt_proof`) VALUES ('$usn', '$sch_name', '$sch_provider', '$sch_IsApplied', '$sch_applied_year', '$sch_IsReceived', '$newfilename','$filetype','$filesize', '{$file_tmp}');";

            $sql_update = "INSERT INTO `upload_sch_docs`(`is_received`) VALUES ('$sch_IsReceived') WHERE usn = '$usn' AND sch_name = '$sch_name' AND sch_applied_year = '$sch_applied_year';";

            // Bind variables to the prepared statement as parameters
            if ($stmt = $link->query($sql_IsReceived)) {
                try {
                    $link->query($sql_update);
                }
                //catch exception
                catch (Exception $e) {
                    echo '';
                }
                echo '<script>alert("Thank you for your time."); window.location.href="status.php";</script>';
            }
        }
    }
    // Close connection
    $link->close();
}
?>
<link rel="stylesheet" href="../assets/style/border-style.css">
<title>SCHOLARSHIP | RESULT</title>
<section>
    <div class="container p-4">
        <h2 style="letter-spacing: 0.2rem; word-spacing: 0.5rem; background:rgba(255,255,255, 1); color: #413F42;">
            SCHOLARSHIP APPLICATION RESULT</h2>
        <!-- Content -->
        <div class="btn-1 card mt-4">
            <span class="row d-flex justify-content-center align-items-center">
                <div class="col-md-8">
                    <form id="regForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" accept-charset="utf-8" method="post" enctype="multipart/form-data">
                        <h2 id="register">Update Scholarship Result</h2>
                        <div class="progressbar">
                            <div class="progress" id="progress"></div>
                            <div class="progress-step progress-step-active"></div>
                            <div class="progress-step"></div>
                            <div class="progress-step"></div>
                            <div class="progress-step"></div>
                            <div class="progress-step"></div>
                            <div class="progress-step"></div>
                        </div>

                        <div class="form-step form-step-active">
                            <h6>Have you applied for any scholarships?</h6>
                            <p><select id="myInput1" name="IsApplied">
                                    <option selected>Select...</option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </p>
                            <div class="d-flex" style="float:right;">
                                <button type="button" onclick="goAhead1()"><i class="fa fa-angle-double-right"></i></button>
                            </div>
                        </div>

                        <div class="form-step">
                            <h6>Which academic year did you apply for the scholarship?</h6>
                            <p><input type="text" placeholder="format: 2022-23" id="myInput2" name="sch-year"></p>
                            <div class="d-flex" style="float:right;">
                                <button type="button" class="mx-2 prevBtn"><i class="fa fa-angle-double-left"></i></button>
                                <button type="button" class="nextBtn" id="myBtn2" onclick="goAhead2()"><i class="fa fa-angle-double-right"></i></button>
                            </div>
                        </div>

                        <div class="form-step">
                            <h6>What's the scholarship name?</h6>
                            <p><input type="text" placeholder="eg. National Scholarship Portal" id="myInput3" name="sch-name"></p>
                            <div class="d-flex" style="float:right;">
                                <button type="button" class="mx-2 prevBtn"><i class="fa fa-angle-double-left"></i></button>
                                <button type="button" class="nextBtn" id="myBtn3" onclick="goAhead3()"><i class="fa fa-angle-double-right"></i></button>
                            </div>
                        </div>

                        <div class="form-step">
                            <h6>Name the scholarship provider, please.</h6>
                            <p><input type="text" placeholder="eg. Central Government" id="myInput4" name="sch-provider"></p>
                            <div class="d-flex" style="float:right;">
                                <button type="button" class="mx-2 prevBtn"><i class="fa fa-angle-double-left"></i></button>
                                <button type="button" class="nextBtn" id="myBtn4" onclick="goAhead4()"><i class="fa fa-angle-double-right"></i></button>
                            </div>
                        </div>

                        <div class="form-step">
                            <h6>Have you received your scholarship?</h6>
                            <p><select id="myInput5" name="IsReceived">
                                    <option selected value="">Select...</option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </p>
                            <div class="d-flex" style="float:right;">
                                <button type="button" class="mx-2 prevBtn"><i class="fa fa-angle-double-left"></i></button>
                                <button type="button" class="nextBtn" onclick="goAhead5()"><i class="fa fa-angle-double-right"></i></button>
                            </div>
                        </div>

                        <div class="form-step">
                            <h6>Please include a copy of your bank's proof of scholarship award receipt. <small class="text-danger d-block">(allowed: pdf, jpeg, jpg, png of File size: 10 kb to 300 kb)</small></h6>
                            <p><input type="file" id="myInput6" name="sch-proof" accept=".pdf, .jpeg, .jpg, .png"></p>
                            <input type="hidden" name="MAX_FILE_SIZE" value="307200" />
                            <div class="d-flex" style="float:right;">
                                <button type="button" class="mx-2 prevBtn"><i class="fa fa-angle-double-left"></i></button>
                                <button type="button" class="nextBtn" onclick="goAhead6()"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </span>
        </div>
        <!-- End of Content -->
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script>
    const prevBtns = document.querySelectorAll('.prevBtn');
    const progress = document.getElementById('progress');
    const formSteps = document.querySelectorAll('.form-step');
    const progressSteps = document.querySelectorAll('.progress-step');

    let formStepsNum = 0;

    var input = document.getElementById("myInput2");
    input.addEventListener("keypress", function(event) {
        if (event.key === "Enter") {
            event.preventDefault();
            document.getElementById("myBtn2").click();
        }
    });

    var input = document.getElementById("myInput3");
    input.addEventListener("keypress", function(event) {
        if (event.key === "Enter") {
            event.preventDefault();
            document.getElementById("myBtn3").click();
        }
    });

    var input = document.getElementById("myInput4");
    input.addEventListener("keypress", function(event) {
        if (event.key === "Enter") {
            event.preventDefault();
            document.getElementById("myBtn4").click();
        }
    });

    function goAhead1() {
        var select = document.getElementById('myInput1');
        var text = select.options[select.selectedIndex].value;
        if (text === "yes") {
            formStepsNum++;
            updateFormSteps();
            updateProgressbar();
        } else if (text === "no") {
            // const list = document.getElementById("text-message").classList;
            // list.add("form-step-active");
            alert("Thank you; please apply for a relevant scholarship.");
            window.location.href = 'scholarship.php';
        } else {
            alert("Please choose one of the options.");
        }
    }

    function goAhead2() {
        var inputtxt = document.getElementById('myInput2');
        if (inputtxt.value.length != 7) {
            alert("Please match the requested format.");
        } else {
            formStepsNum++;
            updateFormSteps();
            updateProgressbar();
        }
    }

    function goAhead3() {
        var inputtxt = document.getElementById('myInput3');
        if (inputtxt.value.length > 4) {
            formStepsNum++;
            updateFormSteps();
            updateProgressbar();
        } else {
            alert("Please type the scholarship's complete name.");
        }
    }

    function goAhead4() {
        var inputtxt = document.getElementById('myInput4');
        if (inputtxt.value.length > 4) {
            formStepsNum++;
            updateFormSteps();
            updateProgressbar();
        } else {
            alert("Name the scholarship provider, please.");
        }
    }

    function goAhead5() {
        var select = document.getElementById('myInput5');
        var text = select.options[select.selectedIndex].value;
        if (text === "yes") {
            formStepsNum++;
            updateFormSteps();
            updateProgressbar();
        } else if (text === "no") {
            document.getElementById('regForm').submit();
            // window.location.href = 'scholarship.php';
        } else {
            alert("Please choose one of the options.");
        }
    }

    function goAhead6() {
        var file = document.getElementById("myInput6");
        if (file.files.length == 0) {
            alert("No files selected");
        } else {
            document.getElementById('regForm').submit();
        }
    }

    prevBtns.forEach(btn => {
        btn.addEventListener("click", () => {
            formStepsNum--;
            updateFormSteps();
            updateProgressbar();
        });
    });

    function updateFormSteps() {
        formSteps.forEach((formStep) => {
            formStep.classList.contains("form-step-active") && formStep.classList.remove("form-step-active");
        });
        formSteps[formStepsNum].classList.add("form-step-active");
    }

    function updateProgressbar() {
        progressSteps.forEach((progressStep, idx) => {
            if (idx < formStepsNum + 1) {
                progressStep.classList.add("progress-step-active");
            } else {
                progressStep.classList.remove("progress-step-active");
            }
        });
        // const progressActive = document.querySelectorAll(".progress-step-active");

        // progress.style.width = ((progressActive.length - 1) / (progressSteps.length - 1)) * 100 + '%';
    }
</script>