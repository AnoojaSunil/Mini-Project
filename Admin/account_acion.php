<?php

include '../mail.php';

if(isset($_POST['btn_de'])){

	include '../DB_connect.php';
	$id=$_POST['account_id'];

	$str="update login set status='2' where login_id ='$id'";
	mysqli_query($conn, $str);
	echo "<script>alert('Account Deactivated');window.location='index.php'</script>";


}


if(isset($_POST['btn_pub'])){

    include '../DB_connect.php';
    $id=$_POST['b_id'];

    $str="update book set pub_status='Published' where book_id ='$id'";
    mysqli_query($conn, $str);
    echo "<script>alert('Book Published');window.location='new_book.php'</script>";


}

if(isset($_POST['btn_un_pub'])){

    include '../DB_connect.php';
    $id=$_POST['b_id'];

    $str="update book set pub_status='Unpublished' where book_id ='$id'";
    mysqli_query($conn, $str);
    echo "<script>alert('Book Unpublished');window.location='book_list.php'</script>";


}


if(isset($_POST['btn_pub_rej'])){

    include '../DB_connect.php';
    $id=$_POST['b_id'];

    $str="update book set pub_status='Publishing Rejected' where book_id ='$id'";
    mysqli_query($conn, $str);
    echo "<script>alert('Book Publishing blocked..');window.location='new_book.php'</script>";


}

if(isset($_POST['btn_delete'])){

    include '../DB_connect.php'; 
     $a=$_POST['account_id'];
     $acc="delete from login where login_id='$a'";
     $query=mysqli_query($conn,$acc); 

     $acc1="delete from register where login_id='$a'";
     $query=mysqli_query($conn,$acc1); 
     echo "<script> alert(' Account data deleted..');window.location.href='index.php'</script>";


}





if(isset($_POST['btn_acc']))
{
 include '../DB_connect.php'; 
 $a=$_POST['account_id'];
 $acc="update login set status='1' where login_id='$a'";
 $query=mysqli_query($conn,$acc); 

 $acc1="select * from login where login_id='$a'";
 $query1=mysqli_query($conn,$acc1); 
 $ro=mysqli_fetch_assoc($query1);

 $uname=$ro['username'];

 ApproveMail($uname);

 echo "<script> alert(' Account Approved..');window.location.href='index.php'</script>";
	
}



if(isset($_POST['btn_rej']))
{
 include '../DB_connect.php'; 
 $a=$_POST['account_id'];
 $acc="update login set status='2' where login_id='$a'";
 $query=mysqli_query($conn,$acc); 

  $acc1="select * from login where login_id='$a'";
 $query1=mysqli_query($conn,$acc1); 
 $ro=mysqli_fetch_assoc($query1);

 $uname=$ro['username'];

 RejectMail($uname);

 echo "<script> alert(' Account Rejected..');window.location.href='index.php'</script>";
}



if (isset($_POST['btn_respond'])) {
    include '../DB_connect.php'; 
 $me=$_POST['me'];
 $a=$_POST['co_id'];
 $to = date('d-m-Y');

 $readd= date('d-m-Y', strtotime($to. ' + 15 days'));

 $acc="select * from complaint where com_id='$a'";
 $query=mysqli_query($conn,$acc); 
 $ro=mysqli_fetch_assoc($query);
 $rent=$ro['rent_id'];

 $acc1="select * from rent where rent_id='$rent'";
 $query1=mysqli_query($conn,$acc1); 
 $ro1=mysqli_fetch_assoc($query1);
 $req=$ro1['req_id'];

 $acc2="select * from book_request where req_id='$req'";
 $query2=mysqli_query($conn,$acc2); 
 $ro2=mysqli_fetch_assoc($query2);
 $reciver=$ro2['login_id'];
 $respond=$ro2['book_id'];

 $acc3="select * from login where login_id='$reciver'";
 $query3=mysqli_query($conn,$acc3); 
 $ro3=mysqli_fetch_assoc($query3);
 $warring_email=$ro3['username'];


 $acc4="select * from book where book_id='$respond'";
 $query4=mysqli_query($conn,$acc4); 
 $ro4=mysqli_fetch_assoc($query4);
 $res=$ro4['login_id'];


 $acc5="select * from login where login_id='$res'";
 $query5=mysqli_query($conn,$acc5); 
 $ro5=mysqli_fetch_assoc($query5);
 $respond_email=$ro5['username'];

 echo $respond_email;
 echo $warring_email;

 

 $acc="update complaint set com_status='$me',res_date='$to' where com_id='$a'";
 $query=mysqli_query($conn,$acc); 
 WarringMail($warring_email,$respond_email,$readd);

 RespondsMail($warring_email,$respond_email,$readd);
 echo "<script> alert(' Complaint Approved..');window.location.href='index.php'</script>";

}



if(isset($_POST['btn_block'])){

    include '../DB_connect.php';
    $com=$_POST['com'];
    $email=$_POST['email'];

    AccountBlockMail($email);

    $str1="update complaint set com_status='Completed' where com_id ='$com'";
    mysqli_query($conn, $str1);

    $str="update login set status='3' where username ='$email'";
    mysqli_query($conn, $str);
    echo "<script>alert('Account Blocked');window.location='index.php'</script>";


}
if(isset($_POST['site'])){

    include '../DB_connect.php';
    $res=$_POST['res'];

    $id=$_POST['id'];

    $str="update site_complaint set responds='$res' where com_id ='$id'";
    mysqli_query($conn, $str);
    echo "<script>alert('Complaint responsed');window.location='index.php'</script>";


}
?>

