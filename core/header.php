<?php

/*session_start();*/

$baseuri = "http://localhost/testwebphp/bloodmgmt/";

/*if(!defined("bld")){
	header('location: '.$baseuri.'index.php');
	die();
}*/
include 'dbconf.php';

?>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- Start: Navigation Clean -->
    <nav class="navbar navbar-light navbar-expand-md navigation-clean" style="box-shadow: 0px 0.1px 15px 0px;">
        <div class="container"><a class="navbar-brand" href="index.php">Pixaflip Demo Blood Bank</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Request for Blood</a></li>
                    <li class="nav-item"><a class="nav-link" href="register-donor.php">Donor Register</a></li>
                    <li class="nav-item"><a class="nav-link" href="register-recipent.php">Recipent Register</a></li>
                </ul>
            </div>
        </div>
    </nav>
<!-- End: Navigation Clean -->