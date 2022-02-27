<?php

include '../mail.php';

if(isset($_POST['btn_de'])){

	include '../DB_connect.php';
	$id=$_POST['b_id'];

	echo $id;

	$str="UPDATE `book` SET `pub_status`='Deleted' WHERE `book_id`='$id'";
	mysqli_query($conn, $str);
	echo "<script>alert('Book Deleted');window.location='on_sale_books.php'</script>";


}

if(isset($_POST['appr_req'])){

	include '../DB_connect.php';
	$r_id=$_POST['r_id'];
	$book = $_POST['book'];



	$str="UPDATE `book_request` SET `req_status`='Accepted' WHERE `req_id`='$r_id'";
	mysqli_query($conn, $str);

	$book = "UPDATE `book` SET `rent_status`='Out' WHERE `book_id`='$book'";
	mysqli_query($conn, $book);

	echo "<script>alert('Request accepted');window.location='recive_request.php'</script>";


}

if(isset($_POST['rej_req'])){

	include '../DB_connect.php';
	$r_id=$_POST['r_id'];

	 $acc2="select * from book_request where req_id='$r_id'";
	 $query2=mysqli_query($conn,$acc2); 
	 $ro2=mysqli_fetch_assoc($query2);
	 $reciver=$ro2['login_id'];

	 $acc5="select * from login where login_id='$reciver'";
	 $query5=mysqli_query($conn,$acc5); 
	 $ro5=mysqli_fetch_assoc($query5);
	 $respond_email=$ro5['username'];
	 

	RequestRejectMail($respond_email);


	$str="UPDATE `book_request` SET `req_status`='Rejected' WHERE `req_id`='$r_id'";
	mysqli_query($conn, $str);
	echo "<script>alert('Request rejected');window.location='recive_request.php'</script>";

}

if(isset($_POST['btn_return'])){

	include '../DB_connect.php';
	$price=$_POST['price'];
	$r_id=$_POST['req_id'];
	$book = $_POST['book_id'];
	$rent = $_POST['rent_id'];


	$to = date('d-m-Y');

	$da = $_POST['exp_date'];

	$diff = abs(strtotime($to) - strtotime($da));

	$days = floor(($diff)/ (60*60*24));
	$b=0;
	$curtimestamp1 = strtotime($to);
         $curtimestamp2 = strtotime($da);
         if ($curtimestamp2 > $curtimestamp1){

         }
         else{

         	$b = ($price/100)*5;
   //       	$i=0;
			
			// if ($days>0) {
				
			// 	while ($i<$days) {
			// 		// code...
			// 		$b=$b+10;
			// 		$i++;

			// 	}
			// }

         }

	
	if ($b>0) {
		

		echo "<script>window.location.href='return_payment.php?r_id=".$r_id."&book=".$book."&rent=".$rent."&amo=".$b."'</script>";
		
	}
	else{
		// $str="UPDATE `book_request` SET `req_status`='Completed' WHERE `req_id`='$r_id'";
		// mysqli_query($conn, $str);

		// $book = "UPDATE `book` SET `rent_status`='In' WHERE `book_id`='$book'";
		// mysqli_query($conn, $book);

		$book1 = "UPDATE `rent` SET `rent_status`='Confirm' WHERE `rent_id`='$rent'";
		mysqli_query($conn, $book1);

		$books = "INSERT INTO `return_fine`(`return_date`, `fine_amt`, `rent_id`, `reqest_id`, `books_id`) VALUES ('$to','$b','$rent','$r_id','$book')";
		mysqli_query($conn, $books);

		echo "<script>alert('Send return confirmation');window.location='posted_request.php'</script>";
	}

}
if (isset($_POST['btn_cancel'])) {

$price=$_POST['price'];
	$r_id=$_POST['req_id'];
	$book = $_POST['book_id'];
	$rent = $_POST['rent_id'];
	$book1 = "UPDATE `rent` SET `rent_status`='Refunded' WHERE `rent_id`='$rent'";
		mysqli_query($conn, $book1);

		$str="UPDATE `book_request` SET `req_status`='Canceled' WHERE `req_id`='$r_id'";
			mysqli_query($conn, $str);

			$book = "UPDATE `book` SET `rent_status`='In' WHERE `book_id`='$book'";
			mysqli_query($conn, $book);

		
		echo "<script>alert('Send return confirmation');window.location='posted_request.php'</script>";
}
if (isset($_POST['return_btn'])) {

	include '../DB_connect.php';

	$r_id=$_POST['req'];
	$book = $_POST['book'];
	$rent = $_POST['rent'];
	$price = $_POST['price'];
	$number = $_POST['number'];
	$card = $_POST['card'];
	$na = $_POST['name'];

	$to = date('d-m-Y');

	// $str="UPDATE `book_request` SET `req_status`='Completed' WHERE `req_id`='$r_id'";
	// 	mysqli_query($conn, $str);

	// 	$book = "UPDATE `book` SET `rent_status`='In' WHERE `book_id`='$book'";
	// 	mysqli_query($conn, $book);

		$book1 = "UPDATE `rent` SET `rent_status`='Confirm' WHERE `rent_id`='$rent'";
		mysqli_query($conn, $book1);

		$books = "INSERT INTO `return_fine`(`return_date`, `fine_amt`, `rent_id`, `reqest_id`, `books_id`) VALUES ('$to','$price','$rent','$r_id','$book')";
		mysqli_query($conn, $books);

		echo "<script>alert('Send return confirmation');window.location.href='payment_confirm.php?card=".$card."&num=".$number."&amo=".$price."&na=".$na."'</script>";

		// echo "<script>alert('Send return confirmation');window.location='posted_request.php'</script>";
	
}

if (isset($_POST['btn_confirm'])) {

	include '../DB_connect.php';
	
	$rent = $_POST['rent_id'];

	$sel = "SELECT * FROM `return_fine` WHERE `rent_id`='$rent'";

	$my = mysqli_query($conn,$sel);

	$da = mysqli_fetch_assoc($my);

	$r_id=$da['reqest_id'];
	$book=$da['books_id'];

		$str="UPDATE `book_request` SET `req_status`='Completed' WHERE `req_id`='$r_id'";
			mysqli_query($conn, $str);

			$book = "UPDATE `book` SET `rent_status`='In' WHERE `book_id`='$book'";
			mysqli_query($conn, $book);

		$book1 = "UPDATE `rent` SET `rent_status`='Returned' WHERE `rent_id`='$rent'";
		mysqli_query($conn, $book1);

		echo "<script>alert('Returned successfull');window.location='recive_request.php'</script>";
}
if (isset($_POST['pubdddaf'])) {

	include '../DB_connect.php';

    $req=$_POST['req'];
    $com=$_POST['com'];
    
    $da = date('d-m-Y');
        
        $sql ="INSERT INTO `complaint`(`descri`, `com_date`, `res_date`, `com_status`, `rent_id`) VALUES ('$com','$da','Null','Post','$req')";
    
   
    mysqli_query($conn,$sql)or die(mysqli_error($conn));
        
        echo "<script> alert('Posted Successfully..');window.location.href='recive_request.php'</script>";

}
?>