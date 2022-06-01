<?php
include("sidebar-layout.php");
require_once("../db/config.php");
$username = $_SESSION['username'];
$query = "SELECT * FROM users WHERE username = '$username'";
$result = $link->query($query);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stud_id = $_POST['stud-id'];

    $first_name = htmlspecialchars(strip_tags(trim($_POST["f-name"])));
    $last_name = htmlspecialchars(strip_tags(trim($_POST["l-name"])));
    $phone = htmlspecialchars(strip_tags(trim($_POST["phone"])));
    $dept = htmlspecialchars(strip_tags(trim($_POST["sel-branch"])));
    $year = htmlspecialchars(strip_tags(trim($_POST["year"])));
    $email = htmlspecialchars(strip_tags(trim($_POST["email"])));
    $gender = htmlspecialchars(strip_tags(trim($_POST["gender"])));
    $caste = htmlspecialchars(strip_tags(trim($_POST["caste"])));
    $sem = htmlspecialchars(strip_tags(trim($_POST["sem"])));
    $section = htmlspecialchars(strip_tags(trim($_POST["section"])));

    $sql = "UPDATE `users` SET `first_name`='$first_name',`last_name`='$last_name',`gender`='$gender',`caste`='$caste',`email`='$email',`dept`='$dept',`year`='$year',`semester`='$sem',`section`='$section',`phone`='$phone' WHERE id = '$stud_id';";

    if ($link->query($sql)) {
        echo "<script>alert('Your profile has been successfully updated.');
    window.location.href='profile.php';</script>";
    } else {
        echo "<script>alert('Oops something went wrong, could not update your profile.');
    window.location.href='profile.php';</script>";
    }
}

foreach ($result as $row) {
?>
    <style>
        .card {
            display: flex;
            flex-direction: column;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
            padding-top: 20px;
            border-radius: 8px;
            padding-bottom: 15px;
            background: rgba(255, 255, 255, 0.3);
        }

        .card img {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            background-image: linear-gradient(60deg, #2AAA8A, #4169E1);
            padding: 2px;
            margin-top: -45px;
        }
    </style>

    <title>STUDENT | UPDATE PROFILE</title>
    <section>
        <div class="container p-4">
            <h2 style="letter-spacing: 0.2rem; background:rgba(255,255,255, 1); color: #413F42;">UPDATE PROFILE</h2>
            <!-- Profile Details -->
            <div class="card card-img mt-2">
                <div class="mx-5">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="row g-3">
                        <input type="text" name="stud-id" value="<?php echo ucwords($row['id']); ?>" hidden>
                        <div class="col-md-12">
                            <label for="username" class="form-label mt-3">Username</label>
                            <input type="text" name="username" class="form-control" value="<?php echo strtoupper($username); ?>" id="username" disabled readonly />
                        </div>
                        <div class="col-md-6">
                            <label for="first-name" class="form-label">First Name</label>
                            <input type="text" name="f-name" value="<?php echo ucwords($row['first_name']); ?>" class="form-control" id="first-name" placeholder="First Name" required />
                        </div>
                        <div class="col-md-6">
                            <label for="first-name" class="form-label">Last Name</label>
                            <input type="text" name="l-name" value="<?php echo ucwords($row['last_name']); ?>" class="form-control" id="first-name" placeholder="Last Name" required />
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="gender" class="form-label">Gender</label>
                                <select name="gender" id="gender" class="form-control" required>
                                    <option value="Male" <?php echo ($row['gender'] == "Male") ? 'selected' : ''; ?>>Male</option>
                                    <option value="Female" <?php echo ($row['gender'] == "Female") ? 'selected' : ''; ?>>Female</option>
                                    <option value="Other" <?php echo ($row['gender'] == "Other") ? 'selected' : ''; ?>>Other</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="caste" class="form-label">Caste</label>
                                <select name="caste" id="caste" class="form-control" required>
                                    <option value="General" <?php echo ($row['caste'] == "General") ? 'selected' : ''; ?>>General</option>
                                    <option value="Minority" <?php echo ($row['caste'] == "Minority") ? 'selected' : ''; ?>>Minority(OBC)</option>
                                    <option value="SC/ST" <?php echo ($row['caste'] == "SC/ST") ? 'selected' : ''; ?>>SC/ST</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="branch" class="form-label">Branch</label>
                                <select name="sel-branch" id="branch" class="form-control" required>
                                    <option value="AGRICULTURE ENGG" <?php echo ($row['dept'] == "AGRICULTURE ENGG") ? 'selected' : ''; ?>>Agriculture Engg</option>
                                    <option value="AIML ENGG" <?php echo ($row['dept'] == "AIML ENGG") ? 'selected' : ''; ?>>Artificial Intelligence and Machine Learning Engg</option>
                                    <option value="CIVIL ENGG" <?php echo ($row['dept'] == "CIVIL ENGG") ? 'selected' : ''; ?>>Civil Engg</option>
                                    <option value="COMPUTER SCIENCE & ENGG" <?php echo ($row['dept'] == "COMPUTER SCIENCE &amp; ENGG") ? 'selected' : ''; ?>>Computer Science & Engg</option>
                                    <option value="COMPUTER SCIENCE & DESIGN" <?php echo ($row['dept'] == "COMPUTER SCIENCE &amp; DESIGN") ? 'selected' : ''; ?>>Computer Science & Design</option>
                                    <option value="ELECTRONICS & COMMUNICATION ENGG" <?php echo ($row['dept'] == "ELECTRONICS &amp; COMMUNICATION ENGG") ? 'selected' : ''; ?>>Electronics & Communication Engg</option>
                                    <option value="INFORMATION TECHNOLOGY ENGG" <?php echo ($row['dept'] == "INFORMATION TECHNOLOGY ENGG") ? 'selected' : ''; ?>>Information Science Engg</option>
                                    <option value="MECHANICAL ENGG" <?php echo ($row['dept'] == "MECHANICAL ENGG") ? 'selected' : ''; ?>>Mechanical Engg</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="current-year" class="form-label">Current Year</label>
                            <input type="number" name="year" value="<?php echo $row['year']; ?>" min="1" max="4" class="form-control" id="current-year" placeholder="eg. 4" required>
                        </div>
                        <div class="col-md-4">
                            <label for="current-sem" class="form-label">Current Semester</label>
                            <input type="number" name="sem" value="<?php echo $row['semester']; ?>" min="1" max="8" class="form-control" id="current-sem" placeholder="eg. 7" required>
                        </div>
                        <div class="col-md-4">
                            <label for="section" class="form-label">Section</label>
                            <input type="text" name="section" value="<?php echo $row['section']; ?>" min="1" max="1" class="form-control" id="section" placeholder="eg. B" required>
                        </div>
                        <div class="col-md-12">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" value="<?php echo $row['email']; ?>" id="email" placeholder="Valid e-mail address" />

                        </div>
                        <div class="col-md-12 mb-4">
                            <div class="form-group">
                                <label for="phone" class="form-label">Mobile Number</label>
                                <input type="tel" name="phone" value="<?php echo $row['phone']; ?>" class="form-control" id="phone" placeholder="10-digit mobile number" pattern="[0-9]{10}" minlength="10" maxlength="10" required />
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <input type="submit" class="btn btn-primary" value="Update">
                            <a class="btn btn-danger" href="profile.php">Cancel</a>
                        </div>
                    </form>
                </div>
                <!-- End -->
            </div>
    </section>
<?php
    // Close connection
    $link->close();
}
?>