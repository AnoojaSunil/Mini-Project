<?php

if (isset($_POST['btn']))
{


	include '../DB_connect.php';

	$loc = $_POST['location'];

	$fname = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$addr=$_POST['addr'];
	$pass = $_POST['pass'];
	$login_id = $_POST['login_id'];
	

	$data = json_decode($loc, true);
	$lat = $data['lat'];
	$lng = $data['lng'];



	
		
		$lquary ="UPDATE `login` SET `password`='$pass' WHERE login_id='$login_id'";

		mysqli_query($conn,$lquary)or die(mysqli_error($conn));


		$wquary ="UPDATE `register` SET `name`='$fname',`phone`='$phone',`email`='$email',`address`='$addr',`latitude`='$lat',`longitude`='$lng' WHERE login_id='$login_id'";
		mysqli_query($conn,$wquary)or die(mysqli_error($conn));
		
		echo "<script> alert('Update Successfully Completed..');window.location.href='profile.php'</script>";
	
}


?>