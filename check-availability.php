<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<?php

include 'core/dbconf.php';

$groupcheck = $_POST['group'];
$statecheck = $_POST['state'];
$districtcheck = $_POST['district'];

$query = "SELECT * FROM users WHERE bloodgroup = '{$groupcheck}' AND district LIKE '%{$districtcheck}%' AND state LIKE '%{$statecheck}%'";

$sql = mysqli_query($conn,$query);
$result = mysqli_fetch_assoc($sql);
if($result > 0){

			echo "Available! :)";
			?>
			<br><button class="request btn btn-primary"><a href="register-recipent.php" target="_blank" style="color:white; text-decoration:none;">Request  <i class="fa fa-arrow-right"></i></a></button>
			<?php

			

	}else{
		echo "Not Available! :(";
	}

?>