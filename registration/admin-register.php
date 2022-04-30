<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTER</title>
    <link rel="icon" href="../assets/img/icon.png" type="image/icon type">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap" rel="stylesheet">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    body{
    font-family: 'Lato', sans-serif;
    font-weight: 700;
    background: url("../assets/img/bg.png") no-repeat center center / cover !important;
}
.bg-opacity {
    background-color: rgba(255, 255, 255, 0.7);
    box-shadow: 13px 13px 20px #f4f5f7, -13px -13px 20px #ffffff;
}
    .wrapper {
    background-color: rgba(255, 255, 255, 0.7);
    margin-top: 20px;
    margin-left: 100px;
    margin-right: 100px;
    margin-bottom: 20px;
    padding: 60px;
}  
@media (max-width: 768px) {
    .wrapper {
    margin: 10px;
    padding: 10px;
    }
}
</style>
</head>
<body>
    <div class="row">
        <nav class="navbar navbar-light bg-opacity">
            <div class="container-fluid">
                <div class="navbar-brand">
                    <img src="../assets/img/icon.png" alt="Alva's Icon" width="30" height="30"
                        class="d-inline-block align-text-top">
                    Alva's Institute of Engineering and Technology
                </div>
            </div>
        </nav>

        <div class="col-md-12">
            <div class="wrapper">
                <div class="form-title font-weight-bold" style="font-size: 25px;">Administrator Registration
                    <i class="fa-regular fa-pen-to-square"></i>
                </div>
                <br>
                <form action="../cred-validation/register-admin.php" method="post" class="row g-3 ">
                    <div class="col-md-6">
                        <label for="first-name" class="form-label">First Name</label>
                        <input type="text" name="f-name" class="form-control username" id="first-name"
                            placeholder="YOUR FIRST NAME" required />
                    </div>
                    <div class="col-md-6">
                        <label for="first-name" class="form-label">Last Name</label>
                        <input type="text" name="l-name" class="form-control username" id="first-name"
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
            </div>
        </div>
    </div>
</body>

</html>