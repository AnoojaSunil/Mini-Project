<?php

if (isset($_POST['btn']))
{


	include 'DB_connect.php';

	$loc = $_POST['loc'];

	$fname = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$addr=$_POST['addr'];
	$pass = $_POST['pass'];
	$up = $_FILES['up']['name'];
    move_uploaded_file($_FILES['up']['tmp_name'], 'Upload/'.$up);
	$terms = $_POST['terms'];
	

	$data = json_decode($loc, true);
	$lat = $data['lat'];
	$lng = $data['lng'];



	$se="SELECT * FROM login WHERE username='$email'";
		$r=mysqli_query($conn,$se);
		$count=mysqli_num_rows($r);
	if ($count>0) 
	{
		echo "<script> alert('Username already exists!');window.location.href='index.php'</script>";
	}
	else{

		
		$lquary ="INSERT INTO `login`(`username`, `password`, `type`, `status`) VALUES ('$email','$pass','user','0')";

		mysqli_query($conn,$lquary)or die(mysqli_error($conn));

		$sel="SELECT * FROM login WHERE username='$email' AND password='$pass'";
		$rs=mysqli_query($conn,$sel);
		$ar=mysqli_fetch_assoc($rs) ;
		$logid=$ar['login_id'];

		$wquary ="INSERT INTO `register`(`name`, `phone`, `email`, `address`, `latitude`, `longitude`, `terms`, `document`, `login_id`) VALUES ('$fname','$phone','$email','$addr','$lat','$lng','$terms','$up','$logid')";
		mysqli_query($conn,$wquary)or die(mysqli_error($conn));
		
		echo "<script> alert('Registration Successfully Completed..');window.location.href='index.php'</script>";
	}
}


?>