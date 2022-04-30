<?php
include("admin-layout.php")
?>
<!-- CSS only -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
    
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<title>Register | Admin</title>

        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="fa-regular fa-pen-to-square"></i>
                    <div class="text">Administrator Registration</div>
                </div>    
            </div> 
<!-- Add contents here -->

           <form action="../cred-validation/register-admin.php" method="post" class="row g-3">
                    <div class="col-md-6">
                        <label for="first-name" class="form-label">First Name</label>
                        <input type="text" name="f-name" class="form-control" id="first-name"
                            placeholder="YOUR FIRST NAME" required />
                    </div>
                    <div class="col-md-6">
                        <label for="first-name" class="form-label">Last Name</label>
                        <input type="text" name="l-name" class="form-control" id="first-name"
                            placeholder="YOUR LAST NAME" required />
                    </div>
                    <div class="col-md-12">
                        <label for="username" class="form-label">Username</label>
                        <input type="email" name="username" class="form-control" id="username"
                            placeholder="YOUR e-mail ID" />
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="phone" class="form-label">Mobile Number</label>
                            <input type="tel" name="phone" class="form-control" id="phone"
                                placeholder="10-digit MOBILE NUMBER" pattern="[0-9]{10}" required />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="passwd" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="passwd" minlength="6"
                            maxlength="20" placeholder="Password">
                    </div>
                    <div class="col-md-6">
                        <label for="confirm-paaswd" class="form-label">Confirm Password</label>
                        <input type="password" name="cfpassword" id="confirm-paaswd" class="form-control"
                            placeholder="CONFIRM PASSWORD">
                        </input>
                    </div>
                    <div class="col-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck">
                            <label class="form-check-label" for="gridCheck">
                                Check me out
                            </label>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary">Sign in</button>
                    </div>
                    <div class="col-md-1">
                        <a href="../Admin_Dashboard_Panel/dashboard.php">
                            <button type="button" class="btn btn-danger">Cancel</button>
                        </a>
                    </div>
                </form>

<!-- End of content  -->

        </div>
    </section>
        