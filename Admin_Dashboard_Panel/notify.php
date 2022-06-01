<?php
include("admin-layout.php");
require_once "../db/config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sub = htmlspecialchars(strip_tags(trim($_POST["sub"])));
    $body = htmlspecialchars(strip_tags(trim($_POST["body"])));
    $to = htmlspecialchars(strip_tags(trim($_POST["sel-to"])));
    $usn = htmlspecialchars(strip_tags(trim($_POST["person-usn"])));

    if (!empty($sub) && !empty($body)) {
        if ($to == 'all') {
            // Prepare an insert statement
            $sql1 = "SELECT username FROM users WHERE caste = 'General' OR caste = 'Minority' OR caste = 'SC/ST';";
            $result1 = $link->query($sql1);

            $sql = "INSERT INTO notification (usn, subject, msg_body) VALUES (?, ?, ?)";
            if ($stmt = $link->prepare($sql)) {
                // Bind variables to the prepared statement as parameters

                while ($row = $result1->fetch_array()) {
                    $stmt->bind_param("sss", $param_username, $param_sub, $param_msg_body);
                    // Set parameters
                    $param_username = $row['username'];
                    $param_sub = $sub;
                    $param_msg_body = $body;
                    $stmt->execute();
                }
                echo "<script>alert('Messege successfully sent.');</script>";
                // Close statement
                $stmt->close();
            }
        }
        if ($to == 'general') {
            // Prepare an insert statement
            $sql1 = "SELECT username FROM users WHERE caste = 'General';";
            $result1 = $link->query($sql1);

            $sql = "INSERT INTO notification (usn, subject, msg_body) VALUES (?, ?, ?)";
            if ($stmt = $link->prepare($sql)) {
                // Bind variables to the prepared statement as parameters

                while ($row = $result1->fetch_array()) {
                    $stmt->bind_param("sss", $param_username, $param_sub, $param_msg_body);
                    // Set parameters
                    $param_username = $row['username'];
                    $param_sub = $sub;
                    $param_msg_body = $body;
                    $stmt->execute();
                }
                echo "<script>alert('Messege successfully sent.');</script>";
                // Close statement
                $stmt->close();
            }
        }
        if ($to == 'minority') {
            // Prepare an insert statement
            $sql1 = "SELECT username FROM users WHERE caste = 'Minority';";
            $result1 = $link->query($sql1);

            $sql = "INSERT INTO notification (usn, subject, msg_body) VALUES (?, ?, ?)";
            if ($stmt = $link->prepare($sql)) {
                // Bind variables to the prepared statement as parameters

                while ($row = $result1->fetch_array()) {
                    $stmt->bind_param("sss", $param_username, $param_sub, $param_msg_body);
                    // Set parameters
                    $param_username = $row['username'];
                    $param_sub = $sub;
                    $param_msg_body = $body;
                    $stmt->execute();
                }
                echo "<script>alert('Messege successfully sent.');
                window.location.href='notify.php';</script>";
                // Close statement
                $stmt->close();
            }
        }
        if ($to == 'sc-st') {
            // Prepare an insert statement
            $sql1 = "SELECT username FROM users WHERE caste = 'SC/ST';";
            $result1 = $link->query($sql1);

            $sql = "INSERT INTO notification (usn, subject, msg_body) VALUES (?, ?, ?)";
            if ($stmt = $link->prepare($sql)) {
                // Bind variables to the prepared statement as parameters

                while ($row = $result1->fetch_array()) {
                    $stmt->bind_param("sss", $param_username, $param_sub, $param_msg_body);
                    // Set parameters
                    $param_username = $row['username'];
                    $param_sub = $sub;
                    $param_msg_body = $body;
                    $stmt->execute();
                }
                echo "<script>alert('Messege successfully sent.');
                window.location.href='notify.php';</script>";
                // Close statement
                $stmt->close();
            }
        }
        if ($to == 'personal') {
            // Prepare an insert statement
            $sql1 = "SELECT username FROM users WHERE username = '$usn';";
            $result1 = $link->query($sql1);

            $sql = "INSERT INTO notification (usn, subject, msg_body) VALUES (?, ?, ?)";
            if ($stmt = $link->prepare($sql)) {
                // Bind variables to the prepared statement as parameters

                while ($row = $result1->fetch_array()) {
                    $stmt->bind_param("sss", $param_username, $param_sub, $param_msg_body);
                    // Set parameters
                    $param_username = $row['username'];
                    $param_sub = $sub;
                    $param_msg_body = $body;
                    $stmt->execute();
                }
                echo "<script>alert('Messege successfully sent.');
                window.location.href='notify.php';</script>";
                // Close statement
                $stmt->close();
            }
        }
    }
}
?>
<title>SEND NOTIFICATION</title>
<div class="dash-content">
    <div class="overview">
        <div class="title">
            <i class="uil uil-tachometer-fast-alt"></i>
            <span class="text">SEND NOTIFICATION</span>
        </div>
        <!-- Add contents here -->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="row g-3">
            <div class="col-md-12">
                <label for="receiver" class="form-label">To</label>
                <select class="form-select" name="sel-to" id="myInput" onclick="recName()" aria-label="Default select example" required>
                    <option selected value="">Select...</option>
                    <option value="all">All</option>
                    <option value="general">General</option>
                    <option value="minority">Minority</option>
                    <option value="sc-st">SC/ST</option>
                    <option value="personal" id="personal">Individual</option>
                </select>
            </div>
            <div class="col-md-12 mt-3">
                <input type="text" id="person-usn" name="person-usn" class="form-control" style="display:none" placeholder="Enter USN">
            </div>
            <div class="col-md-12">
                <label for="sub" class="form-label">Subject</label>
                <input type="text" class="form-control" id="sub" name="sub" placeholder="" required>
            </div>
            <div class="col-md-12">
                <label for="body" class="form-label">Body</label>
                <textarea class="form-control" id="body" name="body" rows="3" required></textarea>
            </div>
            <button type="submit" class="mx-2 btn btn-primary" style="width: 120px;">Send</button>
        </form>

        <!-- End of content  -->
    </div>
</div>
</section>


<script>
    function recName() {
        // Get the select element
        var select = document.getElementById('myInput');
        // Get the output text
        var value = select.options[select.selectedIndex].value;
        var text = document.getElementById("person-usn");

        // If the checkbox is checked, display the output text
        if (value === "personal") {
            text.style.display = "block";
        } else {
            text.style.display = "none";
        }
    }
</script>