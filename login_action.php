<?php
include 'DB_connect.php';

session_start();
if(isset($_POST['login']))
{

	$name=$_POST["user"];
	$pass=$_POST["pass"];
	$str="select * from login where username='$name' and password='$pass'";
	$result=  mysqli_query($conn, $str);
	$count=mysqli_num_rows($result);
	$row=mysqli_fetch_assoc($result);

	if($count>0)
	{
	  // $_SESSION['log']=true;
	  if($row['type']=='admin' )    
	  {
	  	  
	    	$_SESSION['id']=$row['login_id'];
			    header("location:Admin/index.php");


	  }
	  elseif ($row['type']=='user' && $row['status']=='1')
	  {
	  	
	    $_SESSION['id']=$row['login_id'];
	    header("location:Customer/choose_home.php");
	  }
	  
	  else
	  {
	    echo "<script> alert('Account not Activated Yet!...');window.location.href='login.php'</script>";
	  }
	  
	}

	else 
	{
	 	echo"<script>alert('Invalid username or password!...'); 
	           window.location.href='login.php';                             </script>";

		
	           
	}
}

?>


