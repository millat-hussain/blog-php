
<?php 
include "../config/config.php";
include "../lib/Database.php";
include "../helpers/helpars.php";

$db = new Database();
$fm = new formet();


 

 ?>

 <?php 
 if ($_SERVER['REQUEST_METHOD']=='POST') {

		$username = $fm->validation($_POST['username']);
		$userpass = $fm->validation(md5($_POST['password']));
		$username =mysqli_real_escape_string($db->link ,$username);
		$userpass =mysqli_real_escape_string($db->link ,$userpass);



	    $query ="SELECT * FROM  tbl_user WHERE username='$username' AND password='$userpass'";
			$rasult = $db->select($query);

			if ($rasult==true) {

				setcookie("userlogin","$username",time()+(86400*7));

		        header("Location: index.php");
		       

			
		


				
			}else{
				echo "Problems!!!!!!";
			}




	





}


  ?>


