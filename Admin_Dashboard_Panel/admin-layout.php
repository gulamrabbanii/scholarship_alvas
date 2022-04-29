<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
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
                    <span class="link-name">Create Scholarship</span>
                </a></li>
                <li><a href="studentdetails.php">
                    <i class="uil uil-chart"></i>
                    <span class="link-name">Students Details</span>
                </a></li>
                <li><a href="verification.php">
                    <i class="uil uil-thumbs-up"></i>
                    <span class="link-name">Verification</span>
                </a></li>
                <li><a href="../registration/admin-register.php">
                    <i class="uil uil-comments"></i>
                    <span class="link-name">Register</span>
                </a></li>
                <!-- <li><a href="share.php">
                    <i class="uil uil-share"></i>
                    <span class="link-name"></span>
                </a></li> -->
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