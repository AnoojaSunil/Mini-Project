<?php 

if (isset($_POST['pub'])) {

    include '../DB_connect.php';

    $req=$_POST['req'];
    $pr=$_POST['price'];

    $card = $_POST['card'];
    $number = $_POST['number'];

    $na = $_POST['name'];

    $user =  ($pr/100)*60;


    $admin = ($pr/100)*40;
    
    $td = date('d-m-Y');

    $readd= date('d-m-Y', strtotime($td. ' + 30 days'));



    
        $sql ="INSERT INTO `rent`(`pay_amt`, `admin_amt`, `user_amt`, `issue_date`, `expire_date`, `pay_date`, `req_id`, `rent_status`) VALUES ('$pr','$admin','$user','$td','$readd','$td','$req','Rented')";


    mysqli_query($conn,$sql)or die(mysqli_error($conn));
        
        echo "<script>window.location.href='payment_confirm.php?card=".$card."&num=".$number."&amo=".$pr."&na=".$na."'</script>";

}




?>