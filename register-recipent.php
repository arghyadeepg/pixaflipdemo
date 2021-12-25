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
    <!-- Start: Registration Form-->
    <section class="register-photo">
        <!-- Start: Form Container -->
        <div class="form-container">
            <!-- Start: Image -->
            <div class="image-holder"></div><!-- End: Image -->
            <form method="post" enctype="multipart/form-data">
                <h2 class="text-center"><strong>Register for Blood Request</strong></h2>
                <div class="mb-3"><input class="form-control" type="text" name="name" placeholder="Name" style="background: rgb(255,255,255);"></div>
                <div class="mb-3"><input class="form-control" type="email" name="email" placeholder="Email" style="background: rgb(255,255,255);"></div>
                <div class="mb-3"><input class="form-control" type="text" name="district" placeholder="District" style="background: rgb(255,255,255);" required=""></div>
                <div class="mb-3"><input class="form-control" type="text" name="state" placeholder="State" style="background: rgb(255,255,255);" required=""></div>
                <div class="mb-3"></div>


                <div class="mb-3"><select class="form-select" name="reqbldgp" style="margin-top: 20px;margin-bottom: 20px;">
                        <option value="noselection" disabled selected>Select required Blood Group</option>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                    </select></div>

                <select class="form-select" style="margin-top: 20px;margin-bottom: 20px;" name="comborities">
                        <option value="noselection" selected="" disabled>Do you have Comborities?</option>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                <div class="mb-3"></div>
                <div class="mb-3">
                    <div class="form-check"><label class="form-check-label"><input class="form-check-input" type="checkbox">I agree to the terms and conditions.</label></div>
                </div>
                <div class="mb-3"><input class="btn btn-primary d-block w-100" type="submit" name="submit"></div>
            </form>

            <?php

            if(isset($_POST['submit'])){
                $name = mysqli_real_escape_string($conn,$_POST['name']);
                $district = mysqli_real_escape_string($conn,$_POST['district']);
                $state = mysqli_real_escape_string($conn,$_POST['state']);
                $email = mysqli_real_escape_string($conn,$_POST['email']);
                $reqbldgp = mysqli_real_escape_string($conn,$_POST['reqbldgp']);
                $hascomborities = mysqli_real_escape_string($conn,$_POST['comborities']);

                $q = "SELECT * FROM users WHERE bloodgroup='{$reqbldgp}' AND district LIKE '%{$district}%'";
                $s = mysqli_query($conn,$q);
                $r = mysqli_fetch_assoc($s);
                if ($r > 0) {
                    

                    $query = "INSERT INTO recipents(name,email,type,district,state,reqbloodgroup,hascomborities,status) VALUES('{$name}','{$email}','recipent','{$district}','{$state}','{$reqbldgp}','{$hascomborities}','approved')";
                    $sql = mysqli_query($conn,$query);
                    if($sql){

                        $to      = $email;
                        $subject = 'Approval of Blood Group '.$reqbldgp;
                        $message = 'Hi,'.
                                    'Here is your Location details to collect the blood.'.
                                    'Location: XYZ Station,'.$district.', '.$state.', India'.
                                    'Blood Group: '.$reqbldgp.
                                    'Billing Name: '.$name;
                        $headers = 'From: contact@arghyadeepghosh.me'       . "\r\n" .
                                     'Reply-To: contact@arghyadeepghosh.me' . "\r\n" .
                                     'X-Mailer: PHP/' . phpversion();

                        mail($to, $subject, $message, $headers);

                        $dq = "DELETE FROM users WHERE bloodgroup = '{$reqbldgp}' ORDER BY sl DESC LIMIT 1";
                        $ds = mysqli_query($conn,$dq);

                    }else{

                        $query = "INSERT INTO recipents(name,email,type,district,state,reqbloodgroup,hascomborities,status) VALUES('{$name}','{$email}','recipent','{$district}','{$state}','{$reqbldgp}','{$hascomborities}','pending')";
                        $sql = mysqli_query($conn,$query);
                        if($sql){

                            $to      = $email;
                            $subject = 'Approval of Blood Group '.$reqbldgp;
                            $message = 'Hi,'.
                                        'Unfortunately We do not have blood of this group right now.';
                            $headers = 'From: contact@arghyadeepghosh.me'       . "\r\n" .
                                         'Reply-To: contact@arghyadeepghosh.me' . "\r\n" .
                                         'X-Mailer: PHP/' . phpversion();

                            mail($to, $subject, $message, $headers);



                    }
                }

            }
        }

            ?>

        </div><!-- End: Form Container -->
    </section><!-- End: Registration Form with Photo -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
</body>