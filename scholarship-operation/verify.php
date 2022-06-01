 <?php
    session_start();
    $pattern = "/4(al)[0-9]{2}[A-Za-z]{2}[0-9]{3}/i";
    if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || preg_match($pattern, $_SESSION["username"])) {
        header("location: ../index.php");
        exit;
    }
    require_once("../db/config.php");

    $path    = './';
    $files = scandir($path);
    $files = array_diff(scandir($path), array('.', '..'));

    $pattern1 =  "/.jpg/i";
    $pattern2 = "/.jpeg/i";
    $pattern3 = "/.png/i";
    $pattern4 = "/.pdf/i";
    $pattern5 = "/.zip/i";

    foreach ($files as $file) {
        if (file_exists($file) && (preg_match($pattern1, $file) || preg_match($pattern2, $file) || preg_match($pattern3, $file) || preg_match($pattern4, $file) || preg_match($pattern5, $file))) {
            echo $file;
            unlink($file);
        }
    }


    if (isset($_GET['FileId'])) {
        $FileNo = $_GET['FileId'];

        $query = "SELECT * FROM upload_sch_docs WHERE uid='$FileNo'";
        $result = $link->query($query);
        list($id, $usn, $sch_name, $sch_applied_year) = mysqli_fetch_array($result);

        $q = "UPDATE `upload_sch_docs` SET `is_verified` = 'Verified' WHERE uid = '$FileNo';";
        $link->query($q);

        $subject = "Scholarship Verified";
        $message = "Your scholarship application <b>" . $sch_name . "</b> for academic year <b>" . $sch_applied_year . "</b> has been successfully verified at college level.";

        // Prepare an insert statement
        $sql1 = "SELECT username FROM users WHERE username = '$usn';";
        $result1 = $link->query($sql1);

        $sql = "INSERT INTO notification (usn, subject, msg_body) VALUES (?, ?, ?)";
        if ($stmt = $link->prepare($sql)) {
            // Bind variables to the prepared statement as parameters

            while ($row = $result1->fetch_array()) {
                $stmt->bind_param("sss", $param_username, $param_sub, $param_msg_body);
                // Set parameters
                $param_username = $usn;
                $param_sub = $subject;
                $param_msg_body = $message;
                $stmt->execute();
            }
            echo "<script>window.location.href='../Admin_Dashboard_Panel/verify-docs.php'</script>";
        }
    }
