<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <link rel="stylesheet" href="../assets/style/style_admin.css">
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
                <img src="../assets/img/icon.png" alt="">
            </div>
            <span class="logo_name">A.I.E.T</span>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="dashboard.php">
                    <i class="fa-solid fa-house"></i>
                    <span class="link-name">Dahsboard</span>
                </a></li>
                <li><a href="createscholarship.php">
                    <i class="uil uil-files-landscapes"></i>
                    <span class="link-name">Add Scholarship</span>
                </a></li>
                
                <li><a href="verification.php">
                    <i class="uil uil-thumbs-up"></i>
                    <span class="link-name">Verify Docs</span>
                </a></li>
                <li><a href="view-scholarships.php">
                    <i class="uil uil-chart"></i>
                    <span class="link-name">View scholarships</span>
                </a></li>
                <li><a href="notify.php">
                    <i class="uil uil-chart"></i>
                    <span class="link-name">Notify</span>
                </a></li>
                <?php if ($_SESSION["username"] == "admin"){ 
                    echo '<li><a href="register.php">
                    <i class="fa fa-user-plus" aria-hidden="true"></i>
                    <span class="link-name">Add New Admin</span></a></li>';
                    }
                ?>
                <li><a href="reset-password.php">
                    <i class="fa fa-undo"></i>
                    <span class="link-name">Reset Password</span>
                </a></li>
            </ul>
            
            <ul class="logout-mode">
                <li><a href="../logout.php">
                    <i class="uil uil-signout"></i>
                    <span class="link-name">Logout</span>
                </a></li>

                <li class="mode">
                    <a href="#">
                        <i class="uil uil-moon"></i>
                    <span class="link-name">Dark Mode</span>
                </a>

                <div class="mode-toggle">
                  <span class="switch"></span>
                </div>
            </li>
            </ul>
        </div>
    </nav>

    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>
    
            <div class="search-box">
                <i class="uil uil-search"></i>
                <input type="text" placeholder="Search here...">
            </div>
    
            <img src="../assets/img/person.png" style="width: 50px; height: 50px;" alt="">
        </div>
    
        <!-- Js -->
    <script src="../assets/js/script_admin.js"></script>
</body>
</html>