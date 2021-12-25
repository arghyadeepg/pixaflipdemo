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

<?php
    
    if(isset($_POST['submit'])){
        $name = mysqli_real_escape_string($conn,$_POST['name']);
        $district = mysqli_real_escape_string($conn,$_POST['district']);
        $state = mysqli_real_escape_string($conn,$_POST['state']);
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $bloodgrp = mysqli_real_escape_string($conn,$_POST['bloodgrp']);
        $comborities = mysqli_real_escape_string($conn,$_POST['comborities']);

        $file = $_FILES['identity']['name'];
        $file_loc = $_FILES['identity']['tmp_name'];
        $folder = "./uploads/";

        move_uploaded_file($file_loc,$folder.$file);

        $query = "INSERT INTO users(name,email,district,state,type,bloodgroup,comborities,identity) VALUES('{$name}','{$email}','{$district}','{$state}','donor','{$bloodgrp}','{$comborities}','{$file}')";

        $sql = mysqli_query($conn,$query);

        if(!$sql){
            echo "<script>alert('Error');</script>";
        }else{
            echo "<script>alert('Success!');</script>";
        }

    }

?>

<body>
    <!-- Start: Registration Form -->
    <section class="register-photo">
        <!-- Start: Form Container -->
        <div class="form-container">
            <!-- Start: Image -->
            <div class="image-holder"></div><!-- End: Image -->
            <form method="post" enctype="multipart/form-data">
                <h2 class="text-center"><strong>Register for Blood Donation</strong></h2>
                <div class="mb-3"><input class="form-control" type="text" name="name" placeholder="Name" style="background: rgb(255,255,255);" required=""></div>
                <div class="mb-3"><input class="form-control" type="email" name="email" placeholder="Email" style="background: rgb(255,255,255);" required=""></div>
                <div class="mb-3"><input class="form-control" type="text" name="district" placeholder="District" style="background: rgb(255,255,255);" required=""></div>
                <div class="mb-3"><input class="form-control" type="text" name="state" placeholder="State" style="background: rgb(255,255,255);" required=""></div>
                <div class="mb-3"><select class="form-select" style="margin-top: 20px;margin-bottom: 20px;" required="" name="bloodgrp">
                        <option value="no selection" selected="">Select your Blood Group</option>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                    </select><select class="form-select" style="margin-top: 20px;margin-bottom: 20px;" name="comborities">
                        <option value="no selection" selected="" disabled>Do you have Comborities?</option>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select></div>
                <div><label class="form-label">Upload Identity Proof</label>
                <!-- Start: Upload Identity Proof -->
                <input class="form-control identity" type="file" name="identity" required>
                <!-- End: Upload Identity Proof -->
                </div>
                <div class="mb-3"></div>
                <div class="mb-3">
                    <div class="form-check"><label class="form-check-label"><input class="form-check-input" type="checkbox">I agree to the terms and conditions.</label></div>
                </div>
                <div class="mb-3"><input class="btn btn-primary d-block w-100" type="submit" name="submit"></div>
            </form>
        </div><!-- End: Form Container -->
    </section><!-- End: Registration Form with Photo -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>