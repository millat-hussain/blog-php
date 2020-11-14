
<?php 

if (isset($_GET['logout'])) {

	setcookie("userlogin","$username",time()-(86400*50));
	header("Location: login.php");








}

 ?>