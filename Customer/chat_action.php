<?php



if (isset($_POST['chat'])) {
	// code...

include '../DB_connect.php';

$dateTime = new DateTime('now', new DateTimeZone('Asia/Kolkata')); 
$post =  $dateTime->format("d/m/y  H:i A"); 

$myid = $_POST['myid'];

$req = $_POST['req'];

$send_id = $_POST['send_id'];

$message = $_POST['message'];

            $query = "INSERT INTO `chat`(`message`, `date_of_post`, `sender_id`, `reciver_id`, `req_id`) VALUES ('$message','$post','$myid','$send_id','$req')";
            $result = mysqli_query($conn, $query);
            

            echo "<script>window.location='chat.php?req_id=".$req."'</script>";
}

if (isset($_POST['re_chat'])) {
	// code...

include '../DB_connect.php';

$dateTime = new DateTime('now', new DateTimeZone('Asia/Kolkata')); 
$post =  $dateTime->format("d/m/y  H:i A"); 

$myid = $_POST['myid'];

$req = $_POST['req'];

$send_id = $_POST['send_id'];

$message = $_POST['message'];

            $query = "INSERT INTO `chat`(`message`, `date_of_post`, `sender_id`, `reciver_id`, `req_id`) VALUES ('$message','$post','$myid','$send_id','$req')";
            $result = mysqli_query($conn, $query);
            

            echo "<script>window.location='reciver_chat.php?req_id=".$req."'</script>";
}

?>