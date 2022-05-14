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
                  <span class="fw-bold" style="color: #4E4E91;">Please provide scholarship information</span>
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
      <p class="fw-bold" style="color: #4E4E91;">Please only choose documents that are relevant to your scholarship.</p>
      <div class="input-group mb-3">
            <input type="file" class="form-control" id="govt-id">
            <label class="input-group-text bg-danger w-50 text-white" for="govt-id">Government ID Proof (eg. Aadhar Card, Driving License)</label>
      </div>
      <div class="input-group mb-3">
            <input type="file" class="form-control" id="domicile">
            <label class="input-group-text w-50 bg-danger text-white" for="domicile">Domicile/Residential Certificate</label>
      </div>
      <div class="input-group mb-3">
            <input type="file" class="form-control" id="income">
            <label class="input-group-text w-50 bg-danger text-white" for="income">Income Certificate</label>
      </div>
      <div class="input-group mb-3">
            <input type="file" class="form-control" id="pwd-cert">
            <label class="input-group-text w-50 bg-danger text-white" for="pwd-cert">PwD Certificate</label>
      </div>
      <div class="input-group mb-3">
            <input type="file" class="form-control" id="bonafide">
            <label class="input-group-text w-50 bg-danger text-white" for="bonafide">Bonafide Certificate</label>
      </div>
      <div class="input-group mb-3">
            <input type="file" class="form-control" id="caste-cert">
            <label class="input-group-text w-50 bg-danger text-white" for="caste-cert">Caste Certificate</label>
      </div>
      <div class="input-group mb-3">
            <input type="file" class="form-control" id="parent-aadhar">
            <label class="input-group-text w-50 bg-danger text-white" for="parent-aadhar"> Aadhar Card of Mother & Father/Guardian</label>
      </div>
      <div class="input-group mb-3">
            <input type="file" class="form-control" id="bank-passbook">
            <label class="input-group-text w-50 bg-danger text-white" for="bank-passbook">Bank Passbook of Student</label>
      </div><div class="input-group mb-3">
            <input type="file" class="form-control" id="college-fee">
            <label class="input-group-text w-50 bg-danger text-white" for="college-fee">College Fee Receipt</label>
      </div>
      <div class="input-group mb-3">
            <input type="file" class="form-control" id="sslc-puc">
            <label class="input-group-text w-50 bg-danger text-white" for="sslc-puc">10<sup>th</sup> or 12<sup>th</sup> Marks Cards</label>
      </div>
      <div class="input-group mb-3">
            <input type="file" class="form-control" id="sem-marks">
            <label class="input-group-text w-50 bg-danger text-white" for="sem-marks">Previous 2 Semester Marks Card</label>
      </div>
      <div class="input-group mb-3">
            <input type="file" class="form-control" id="diploma-cert">
            <label class="input-group-text w-50 bg-danger text-white" for="diploma-cert">Admission Letter to Diploma</label>
      </div>
      <div class="input-group mb-3">
            <input type="file" class="form-control" id="self-decl">
            <label class="input-group-text w-50 bg-danger text-white" for="self-decl">Self Declaration Minority Certificate</label>
      </div>
      <div class="input-group mb-3">
            <input type="file" class="form-control" id="ration-card">
            <label class="input-group-text w-50 bg-danger text-white" for="ration-card">Ration Card</label>
      </div>
</div>
</section>