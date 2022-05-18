<?php
include("admin-layout.php");
?>
<title>SEND NOTIFICATION</title>
<div class="dash-content">
    <div class="overview">
        <div class="title">
            <i class="uil uil-tachometer-fast-alt"></i>
            <span class="text">SEND NOTIFICATION</span>
        </div>

        <!-- Add contents here -->
        <form action="" class="row g-3">
            <div class="col-md-12">
                <label for="receiver" class="form-label">To</label>
                <select class="form-select" id="myInput" onclick="recName()" aria-label="Default select example" required>
                    <option selected value="">Select...</option>
                    <option value="all">All</option>
                    <option value="personal" id="personal">Individual</option>
                </select>
            </div>
            <div class="col-md-12 mt-3">
                <input type="text" id="person-usn" name="person-usn" class="form-control" style="display:none" placeholder="Type USN">
            </div>
            <div class="col-md-12">
                <label for="receiver" class="form-label">Subject</label>
                <input type="text" class="form-control" id="receiver" placeholder="" required>
            </div>
            <div class="col-md-12">
                <label for="body" class="form-label">Body</label>
                <textarea class="form-control" id="body" rows="3" required></textarea>
            </div>
            <button type="submit" class="mx-2 btn btn-primary" style="width: 120px;">Send</button>
        </form>
        <!-- End of content  -->
    </div>
</div>
</section>

<script>
    function recName() {
        // Get the select element
        var select = document.getElementById('myInput');
        // Get the output text
        var value = select.options[select.selectedIndex].value;
        var text = document.getElementById("person-usn");

        // If the checkbox is checked, display the output text
        if (value === "personal") {
            text.style.display = "block";
        } else {
            text.style.display = "none";
        }
    }
</script>