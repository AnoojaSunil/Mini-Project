<?php

if (isset($_POST['reset']))
{


    include 'DB_connect.php';



    $username = $_POST['us'];
    $new = $_POST['pass'];

    echo $username;
    echo $new;

    $sql = "UPDATE `login` SET `password`='$new' WHERE `username`='$username'";

    mysqli_query($conn,$sql);
    echo "<script> alert('Password reset successfully..');window.location.href='login.php'</script>";
}
?>