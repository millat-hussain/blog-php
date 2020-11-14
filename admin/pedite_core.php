
<?php 
include "../config/config.php";
include "../lib/Database.php";

$db = new Database();

 ?>
 <?php 

if (isset($_GET['edite'])) {

    $editid=$_GET['edite'];
 }
  ?>
<?php
if ($_SERVER['REQUEST_METHOD']=='POST') {

	$title =$_POST['title'];
	$description=$_POST['description'];
	$postby=$_POST['postby'];
// // Image upload
// 	$imgname =$_FILES['image']['name'];
// 	$tmp_name =$_FILES['image']['tmp_name'];
// 	$upload ="upload/".$tmp_name;
// 	move_uploaded_file($imgname, $upload);

// // Image upload

	$query ="UPDATE blog_post SET title='$title',postbody='$description',postby = '$postby' 	 )";

	$upload= $db->update($query);

	if ($upload==true) {

		echo "Data upload success";
		# code...
	}




}



 ?>