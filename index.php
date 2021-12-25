<!DOCTYPE html>
<html lang="en">

<?php 
    
    include 'core/header.php';
    include 'core/dbconf.php';

 ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>BldMgmt</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Contact-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="assets/css/Registration-Form-with-Photo.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    
    <!-- Start: Contact Form Clean -->
    <section class="contact-clean">
        <form method="post">
            <h2 class="text-center">Check Blood Availability</h2>
            <select class="form-select chkgrp" style="margin-top: 0px;margin-bottom: 20px;">
                <option value="no-selection" selected="" disabled>Select an option</option>
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
            </select>
            <!-- Start: Success Example -->
            <div class="mb-3"><input class="form-control chkgrpdist" type="text" name="district" placeholder="Enter District"></div>
            <!-- End: Success Example -->
            <!-- Start: Success Example -->
            <div class="mb-3"><input class="form-control chkgrpstate" type="text" name="state" placeholder="Enter State"></div>
            <!-- End: Success Example -->
            <div class="text-center mb-3"><button class="btn btn-primary chkavail" type="button" style="color: var(--bs-white);background: var(--bs-red);">check availability</button></div>

            <p class="showavl" style="color:black; text-align:center;"></p>
        </form>
        
    </section><!-- End: Contact Form Clean -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>

    <script type="text/javascript">
        
        $(document).ready(function(){
            $('.chkavail').click(function(){

                var bldgrpchk = $('.chkgrp').val();
                var bldgrpchkdist = $('.chkgrpdist').val();
                var bldgrpchkstate = $('.chkgrpstate').val();

                /*alert(bldgrpchk+" near "+bldgrpchkdist+", "+bldgrpchkstate);*/

                $.post("check-availability.php", {group:bldgrpchk,district:bldgrpchkdist,state:bldgrpchkstate}, function(data){
                    $('.showavl').html(data);
                });

            });
        });

    </script>

</body>

</html>