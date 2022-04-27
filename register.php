<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTER</title>
    <link rel="icon" href="./assets/img/icon.png" type="image/icon type">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/style/style.css">
    <link rel="stylesheet" href="./assets/style/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    
</head>
<body>
<div class="row">
    <div class="navbar-container w-100">
        <nav class="navbar navbar-light bg-light">
                <a class="navbar-brand" href="#">
                    <img src="./assets/img/icon.png" alt="Alva's Icon" width="30" height="30"
                        class="d-inline-block">
                   <span style="position: relative;
  top: 4px;"> Alva's Institute of Engineering and Technology</span>
                </a>
        </nav>
    </div>
       
        <div class="col-md-12">
            <div class="wrapper p-5">
            <div class="form-title">Registration
            <i class="glyphicon glyphicon-pencil d-inline-block"></i>
            </div>
            <br>
    <form class="row g-3 ">
        <div class="col-md-6">
            <label for="first-name" class="form-label">First Name</label>
            <input type="text" class="form-control username" id="first-name" placeholder="YOUR FIRST NAME">
        </div>
                <div class="col-md-6">
            <label for="first-name" class="form-label">Last Name</label>
            <input type="text" class="form-control username" id="first-name" placeholder="YOUR LAST NAME">
        </div>
        <div class="col-md-12">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" placeholder="YOUR USN" minlength="10" maxlength="10" pattern = "^[4][alAL]{2}[0-9]{2}[a-zA-Z]{2}[0-9]{3}" required/>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="branch" class="form-label">Branch</label>
                <select id="inputState" class="form-control">
                    <option selected>Choose...</option>
                    <option>Artificial Intelligence and Machine Learning Engineering</option>
                    <option>Civil Engineering</option>
                    <option>Computer Science and Engineering</option>
                    <option>Electronics and Communication Engineering</option>
                    <option>Information Science Engineering</option>
                    <option>Mechanical Engineering</option>
                </select>
            </div>
        </div>
        <div class="col-md-12">
            <label for="current-year" class="form-label">Current Year</label>
            <input type="number" min="1" max="4" class="form-control" id="current-year" placeholder="eg. 3">
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="gender" class="form-label">Gender</label>
                <select id="inputState" class="form-control">
                    <option selected>Choose...</option>
                    <option>Male</option>
                    <option>Female</option>
                    <option>Other</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <label for="passwd" class="form-label">Password</label>
            <input type="password" class="form-control" id="passwd" minlength="6" maxlength="20" placeholder="Password">
        </div>
        <div class="col-md-6">
            <label for="confirm-paaswd" class="form-label">Confirm Password</label>
            <input type="password" id="confirm-paaswd" class="form-control" placeholder="CONFIRM PASSWORD">
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
        <div class="col-md-1">
            <button type="submit" class="btn btn-primary">Sign in</button>
        </div>
        <div class="col-md-1">
            <a href="index.php">
            <button type="button" class="btn btn-danger">Cancel</button>
            </a>
        </div>
    </form>
    </div>
    </div>
    </div>
</body>
</html>