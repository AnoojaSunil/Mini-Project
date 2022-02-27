<?php 
session_start();


$myid = $_SESSION['id'];
include '../DB_connect.php';

	$rate=$_POST['rate'];
	$book_id=$_POST['book_id'];
	$rent_id=$_POST['rent_id'];

	$re=$_POST['re'];



$sql = "INSERT INTO `rating`(`rate`, `feedback`, `cust_id`, `book_id`,`rent_id`) VALUES ('$rate','$re','$myid','$book_id','$rent_id')";
	mysqli_query($conn, $sql);
	echo "<script>alert('Thank you for rating');window.location='posted_request.php'</script>";


?>