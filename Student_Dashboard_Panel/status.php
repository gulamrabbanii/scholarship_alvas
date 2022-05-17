<?php
include("sidebar-layout.php");
?>
<link rel="stylesheet" href="../assets/style/nav-style.css">
<style>
    #regForm {
        margin: 0px auto;
        font-family: Raleway;
        padding: 40px 40px 70px 40px;
        border-radius: 10px
    }

    #register {
        color: #9c5cc4;
    }

    #regForm h2 {
        text-align: center;
        margin-bottom: 30px;
    }

    select,
    input {
        display: block;
        padding: 8px;
        width: 100%;
        font-size: 17px;
        font-family: Raleway;
        border: 1px solid #aaaaaa;
        border-radius: 10px;
        -webkit-appearance: none;
        margin-bottom: 20px;
    }

    .form-step input:focus,
    .form-step select:focus {
        border: 1px solid #6a1b9a !important;
        outline: none;
    }

    .form-step {
        margin-top: 4rem;
        display: none;
    }

    .form-step-active {
        display: block;
    }

    .progressbar {
        position: relative;
        display: flex;
        justify-content: center;
        counter-reset: step;
    }

    .progress-step,
    progress {
        width: 3rem;
        height: 3rem;
        margin: 1rem 0.7rem;
        background-color: #dcdcdc;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 1rem;
        z-index: 1;
    }

    /* .progressbar::before, .progress {
    content: '';
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    height: 8px;
    width: 70%;
    background-color: #dcdcdc;
} */
    .progress-step::before {
        counter-increment: step;
        content: counter(step);
    }

    .progress-step-active {
        background-color: #6A1B9A;
        color: white;
    }

    .progress {
        background-color: #6A1B9A;
        width: 0%;
        position: absolute;
        left: -1;
    }

    button {
        background-color: #6A1B9A;
        color: #ffffff;
        border: none;
        border-radius: 50%;
        padding: 20px 20px;
        font-size: 17px;
        font-family: Raleway;
        cursor: pointer;
        margin: 2rem 0;
        height: 55px;
    }

    button:hover {
        opacity: 0.8
    }

    button:focus {
        outline: none !important;
    }

    .card {
        background: rgba(255, 255, 255, 0.4);
    }
</style>
<title>SCHOLARSHIP | RESULT</title>
<section>
    <div class="container p-4">
        <h2 style="letter-spacing: 0.2rem; word-spacing: 0.5rem; background:rgba(255,255,255, 1); color: #4E4E91;">
            SCHOLARSHIP APPLICATION RESULT</h2>
        <!-- Content -->
        <div class="btn-1 card mt-4">
            <span class="row d-flex justify-content-center align-items-center">
                <div class="col-md-8">
                    <form id="regForm" action="#">
                        <h2 id="register">Update Scholarship Result</h2>
                        <div class="progressbar">
                            <div class="progress" id="progress"></div>
                            <div class="progress-step progress-step-active"></div>
                            <div class="progress-step"></div>
                            <div class="progress-step"></div>
                            <div class="progress-step"></div>
                            <div class="progress-step"></div>
                            <div class="progress-step"></div>
                        </div>

                        <div class="form-step form-step-active">
                            <h6>Have you applied for any scholarships?</h6>
                            <p><select id="myInput1" name="applied">
                                    <option selected>Select...</option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </p>
                            <div class="d-flex" style="float:right;">
                                <button type="button" onclick="goAhead1()"><i class="fa fa-angle-double-right"></i></button>
                            </div>
                        </div>

                        <div class="form-step">
                            <h6>Which academic year did you apply for the scholarship?</h6>
                            <p><input type="text" placeholder="format: 2022-23" id="myInput2" name="sch-year"></p>
                            <div class="d-flex" style="float:right;">
                                <button type="button" class="mx-2 prevBtn"><i class="fa fa-angle-double-left"></i></button>
                                <button type="button" class="nextBtn" id="myBtn2" onclick="goAhead2()"><i class="fa fa-angle-double-right"></i></button>
                            </div>
                        </div>

                        <div class="form-step">
                            <h6>What's the scholarship name?</h6>
                            <p><input type="text" placeholder="eg. National Scholarship Portal" id="myInput3" name="sch-name"></p>
                            <div class="d-flex" style="float:right;">
                                <button type="button" class="mx-2 prevBtn"><i class="fa fa-angle-double-left"></i></button>
                                <button type="button" class="nextBtn" id="myBtn3" onclick="goAhead3()"><i class="fa fa-angle-double-right"></i></button>
                            </div>
                        </div>

                        <div class="form-step">
                            <h6>Name the scholarship provider, please.</h6>
                            <p><input type="text" placeholder="eg. Central Government" id="myInput4" name="sch-provider"></p>
                            <div class="d-flex" style="float:right;">
                                <button type="button" class="mx-2 prevBtn"><i class="fa fa-angle-double-left"></i></button>
                                <button type="button" class="nextBtn" id="myBtn4" onclick="goAhead4()"><i class="fa fa-angle-double-right"></i></button>
                            </div>
                        </div>

                        <div class="form-step">
                            <h6>Have you received your scholarship?</h6>
                            <p><select id="myInput5" name="received">
                                    <option selected value="">Select...</option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </p>
                            <div class="d-flex" style="float:right;">
                                <button type="button" class="mx-2 prevBtn"><i class="fa fa-angle-double-left"></i></button>
                                <button type="button" class="nextBtn" onclick="goAhead5()"><i class="fa fa-angle-double-right"></i></button>
                            </div>
                        </div>

                        <div class="form-step">
                            <h6>Please include a copy of your bank's proof of scholarship award receipt.</h6>
                            <p><input type="file" id="myInput6" name="sch-proof"></p>
                            <div class="d-flex" style="float:right;">
                                <button type="button" class="mx-2 prevBtn"><i class="fa fa-angle-double-left"></i></button>
                                <button type="submit" class="nextBtn" onclick="goAhead6()"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </span>
        </div>
        <!-- End of Content -->
    </div>
</section>
<script>
    const prevBtns = document.querySelectorAll('.prevBtn');
    const progress = document.getElementById('progress');
    const formSteps = document.querySelectorAll('.form-step');
    const progressSteps = document.querySelectorAll('.progress-step');

    let formStepsNum = 0;

    var input = document.getElementById("myInput2");
    input.addEventListener("keypress", function(event) {
        if (event.key === "Enter") {
            event.preventDefault();
            document.getElementById("myBtn2").click();
        }
    });

    var input = document.getElementById("myInput3");
    input.addEventListener("keypress", function(event) {
        if (event.key === "Enter") {
            event.preventDefault();
            document.getElementById("myBtn3").click();
        }
    });

    var input = document.getElementById("myInput4");
    input.addEventListener("keypress", function(event) {
        if (event.key === "Enter") {
            event.preventDefault();
            document.getElementById("myBtn4").click();
        }
    });

    function goAhead1() {
        var select = document.getElementById('myInput1');
        var text = select.options[select.selectedIndex].value;
        if (text === "yes") {
            formStepsNum++;
            updateFormSteps();
            updateProgressbar();
        } else if (text === "no") {
            // const list = document.getElementById("text-message").classList;
            // list.add("form-step-active");
            alert("Thank you; please apply for a relevant scholarship.");
            window.location.href = 'scholarship.php';
        } else {
            alert("Please choose one of the options.");
        }
    }

    function goAhead2() {
        var inputtxt = document.getElementById('myInput2');
        if (inputtxt.value.length != 7) {
            alert("Please match the requested format.");
        } else {
            formStepsNum++;
            updateFormSteps();
            updateProgressbar();
        }
    }

    function goAhead3() {
        var inputtxt = document.getElementById('myInput3');
        if (inputtxt.value.length > 4) {
            formStepsNum++;
            updateFormSteps();
            updateProgressbar();
        } else {
            alert("Please type the scholarship's complete name.");
        }
    }

    function goAhead4() {
        var inputtxt = document.getElementById('myInput4');
        if (inputtxt.value.length > 4) {
            formStepsNum++;
            updateFormSteps();
            updateProgressbar();
        } else {
            alert("Name the scholarship provider, please.");
        }
    }

    function goAhead5() {
        var select = document.getElementById('myInput5');
        var text = select.options[select.selectedIndex].value;
        if (text === "yes") {
            formStepsNum++;
            updateFormSteps();
            updateProgressbar();
        } else if (text === "no") {
            // const list = document.getElementById("text-message").classList;
            // list.add("form-step-active");
            alert("Thank you; please apply for a relevant scholarship.");
            window.location.href = 'scholarship.php';
        } else {
            alert("Please choose one of the options.");
        }
    }

    function goAhead6() {
        var file = document.getElementById("myInput6");
        if (file.files.length == 0) {
            alert("No files selected");
            const form = document.querySelector("form");
            form.addEventListener('submit', function(e) {
                e.preventDefault();
            });
        } else {
            alert("Thank you for your time.");
        }
    }
    prevBtns.forEach(btn => {
        btn.addEventListener("click", () => {
            formStepsNum--;
            updateFormSteps();
            updateProgressbar();
        });
    });

    function updateFormSteps() {
        formSteps.forEach((formStep) => {
            formStep.classList.contains("form-step-active") && formStep.classList.remove("form-step-active");
        });
        formSteps[formStepsNum].classList.add("form-step-active");
    }

    function updateProgressbar() {
        progressSteps.forEach((progressStep, idx) => {
            if (idx < formStepsNum + 1) {
                progressStep.classList.add("progress-step-active");
            } else {
                progressStep.classList.remove("progress-step-active");
            }
        });
        // const progressActive = document.querySelectorAll(".progress-step-active");

        // progress.style.width = ((progressActive.length - 1) / (progressSteps.length - 1)) * 100 + '%';
    }
</script>