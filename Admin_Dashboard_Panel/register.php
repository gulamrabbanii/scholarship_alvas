<?php
include("admin-layout.php")
?>
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
                            placeholder="YOUR E-MAIL ID" />
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="phone" class="form-label">Mobile Number</label>
                            <input type="tel" name="phone" class="form-control" id="phone"
                                placeholder="10-DIGIT MOBILE NUMBER" pattern="[0-9]{10}" min-lenght="10" max-length="10" required />
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

                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary">Sign in</button>
                    </div>
                </form>

<!-- End of content  -->

        </div>
    </section>
        