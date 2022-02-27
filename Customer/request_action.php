<?php 

session_start();

include '../DB_connect.php';

$myid = $_SESSION['id'];

$book_id = $_GET['book_id'];

$today = date('d-m-Y');

$test="SELECT * FROM `book_request` WHERE `login_id`='$myid' and `book_id`='$book_id' and `req_status`='Request'";
$test_ex=mysqli_query($conn, $test);
$count = mysqli_num_rows($test_ex);

if ($count>0) {
	// code...

	echo "<script>alert('Request already sent!');window.location='by_index.php'</script>";
}
else{

$sql = "INSERT INTO `book_request`(`req_date`, `req_status`, `login_id`, `book_id`) VALUES ('$today','Request','$myid','$book_id')";

mysqli_query($conn, $sql);
echo "<script>alert('Request sent successfully');window.location='by_index.php'</script>";
}
?>