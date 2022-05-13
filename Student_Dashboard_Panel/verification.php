<?php 
include("sidebar-layout.php");
?>

<style>
        .custom-field {
            width: 100%;
            border: 1px solid;
            border-top: none;
            margin: 32px 2px;
            padding: 8px;
        }
        .custom-field h1 {
            font: 16px normal;
            margin: -16px -8px 0;
        }
        .custom-field h1 span {
            float: left;
        }
        .custom-field h1:before {
            border-top: 1px solid;
            content: ' ';
            float: left;
            margin: 8px 2px 0 -1px;
            width: 25px;
        }
        .custom-field h1:after {
            border-top: 1px solid;
            content: ' ';
            display: block;
            height: 30px;
            left: 2px;
            margin: 0 1px 0 0;
            overflow: hidden;
            position: relative;
            top: 8px;
        }
</style>
<title>DOCS | VERIFICATION</title>
 <section>
      <div class="container p-4">        
            <h2 style="letter-spacing: 0.2rem; word-spacing: 0.5rem; background:rgba(255,255,255, 1); color: #4E4E91;">UPLOAD DOCUMENTS</h2>
            <p>Please upload documentation related to your scholarship.</p>
      <div class="custom-field">
            <h1>
                  <span>Please provide scholarship information</span>
            </h1>
            <div class="row m-3">
                  <div class="col-md-12">
                        <label for="first-name" class="form-label">Scholarship Name</label>
                        <input type="text" name="s-name" class="form-control username" id="first-name" placeholder="eg. National Scholarship Portal"
                            required />
                    </div>
                    <div class="col-md-12 mt-2">
                        <label for="first-name" class="form-label">Scholarship Academic Year</label>
                        <input type="text" name="f-name" class="form-control username" id="first-name" placeholder="eg. 2022-23"
                            required />
                    </div>
            </div>
      </div>
      <div class="input-group mb-3">
            <input type="file" class="form-control" id="aadhar">
            <label class="input-group-text bg-danger text-white" for="aadhar">Aadhar Card</label>
      </div>
      <div class="input-group mb-3">
            <input type="file" class="form-control" id="icome">
            <label class="input-group-text bg-danger text-white" for="income">Income Certificate</label>
      </div>
      <div class="input-group mb-3">
            <input type="file" class="form-control" id="aadhar">
            <label class="input-group-text bg-danger text-white" for="aadhar">SSLC & PUC MARKS</label>
      </div>
</div>
</section>