<?php
session_start();
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



if (isset($_POST['reset'])) {
    include 'DB_connect.php';

    $uname = $_POST['user'];
    $str="select * from login where username='$uname'";
    $result=  mysqli_query($conn, $str);
    $count=mysqli_num_rows($result);
    // code...

    if ($count>0) {
        // code...
        SimpleMail($uname);
    }
    else{

        
       echo "<script>alert('Username does not exist!...');window.location.href='password_reset.php'</script>";
    }
    
}



function SimpleMail($uname) {

require 'Mailer/PHPMailer.php';
require 'Mailer/Exception.php';
require 'Mailer/SMTP.php';
  
$mail = new PHPMailer(true);
try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'rebooksystem123@gmail.com';                     //SMTP username
    $mail->Password   = 'rebook@123';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('rebooksystem123@gmail.com', 'reBook..');
    $mail->addAddress($uname);     //Add a recipient

    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Please reset your password';
    $mail->Body    = '<style type="text/css">
        *{
            font-family: "Poppins", Arial, sans-serif;
        }
    </style>
    <div style="width: 400px;height: 500px;margin: 100px auto;background-color: white;position: relative;border-radius: 5px;border:1px solid;box-shadow: 5px 10px 18px #a9a4a4;border-color: #a9a4a4;">
        <div style="width: 100%;height: 10px;background-color: white;position: relative;"></div>
        <h3 style="margin-top: 0;text-align: center;position: relative;top: 2%;">reBook</h3>
        <hr style="color: red;">
        <h2 style="margin-left: 20px;margin-top: 30px;">Hello '.$uname.'</h2>
        <div style="text-align: center;position: relative;top: 25%;transform: translateY(-50%);">
            
        
        <p style="margin: 40px;">You have requested to change your password. You can change it through the link below.<br><br>

If you have not requested it, please ignore this email.<br><br>

Your password wont change until you donot access the link below and create a new one.</p>

<form action="http://localhost/reBook/reset_pass.php" method="POST">

        <input type="hidden" value="'.$uname.'" name="uname">
        <button style="border-radius: 10px;height: 50px;width: 200px;background-color: #767a75;border: none;color:white;" name="change" type="submit">Change my password</button>
        
    </form>

    
        </div>
        <br>
        
        <hr>
        <h5 style="text-align: center;">@reBook<br>
        rebook.com | Unsubscribed</h5>
        
    </div>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();

        echo "<script>alert('Please ckeck your mail!...');window.location.href='index.php'</script>";
} catch (Exception $e) {
    
        echo "<script>alert('Make sure the system is connected to network!...');window.location.href='password_reset.php'</script>";
}
}

function ApproveMail($uname) {

require 'Mailer/PHPMailer.php';
require 'Mailer/Exception.php';
require 'Mailer/SMTP.php';
  
$mail = new PHPMailer(true);
try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'rebooksystem123@gmail.com';                     //SMTP username
    $mail->Password   = 'rebook@123';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('rebooksystem123@gmail.com', 'reBook..');
    $mail->addAddress($uname);     //Add a recipient

    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Account action';
    $mail->Body    = '<style type="text/css">
        *{
            font-family: "Poppins", Arial, sans-serif;
        }
    </style>
    <div style="width: 400px;height: 500px;margin: 100px auto;background-color: white;position: relative;border-radius: 5px;border:1px solid;box-shadow: 5px 10px 18px #a9a4a4;border-color: #a9a4a4;">
        <div style="width: 100%;height: 10px;background-color: white;position: relative;"></div>
        <h3 style="margin-top: 0;text-align: center;position: relative;top: 2%;">reBook</h3>
        <hr style="color: red;">
        <h2 style="margin-left: 20px;margin-top: 30px;">Hello '.$uname.'</h2>
        <div style="text-align: center;position: relative;top: 25%;transform: translateY(-50%);">
            
        
        <p style="margin: 40px;">Your account is approved.<br><br>

Login now.</p>



    
        </div>
        <br>
        
        <hr>
        <h5 style="text-align: center;">@reBook<br>
        rebook.com | Unsuscribed</h5>
        
    </div>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();

        
} catch (Exception $e) {
    
        echo "<script>alert('Make sure the system is connected to network!...');window.location.href='non_active_user.php'</script>";
}
}


function RejectMail($uname) {

require 'Mailer/PHPMailer.php';
require 'Mailer/Exception.php';
require 'Mailer/SMTP.php';
  
$mail = new PHPMailer(true);
try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'rebooksystem123@gmail.com';                     //SMTP username
    $mail->Password   = 'rebook@123';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('rebooksystem123@gmail.com', 'reBook..');
    $mail->addAddress($uname);     //Add a recipient

    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Account action';
    $mail->Body    = '<style type="text/css">
        *{
            font-family: "Poppins", Arial, sans-serif;
        }
    </style>
    <div style="width: 400px;height: 500px;margin: 100px auto;background-color: white;position: relative;border-radius: 5px;border:1px solid;box-shadow: 5px 10px 18px #a9a4a4;border-color: #a9a4a4;">
        <div style="width: 100%;height: 10px;background-color: white;position: relative;"></div>
        <h3 style="margin-top: 0;text-align: center;position: relative;top: 2%;">reBook</h3>
        <hr style="color: red;">
        <h2 style="margin-left: 20px;margin-top: 30px;">Hello '.$uname.'</h2>
        <div style="text-align: center;position: relative;top: 25%;transform: translateY(-50%);">
            
        
        <p style="margin: 40px;">Your account is rejected.<br><br>

Login now.</p>



    
        </div>
        <br>
        
        <hr>
        <h5 style="text-align: center;">@reBook<br>
        rebook.com | Unsuscribed</h5>
        
    </div>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();

        
} catch (Exception $e) {
    
        echo "<script>alert('Make sure the system is connected to network!...');window.location.href='non_active_user.php'</script>";
}
}


function WarringMail($uname,$who,$last_date) {

require 'Mailer/PHPMailer.php';
require 'Mailer/Exception.php';
require 'Mailer/SMTP.php';
  
$mail = new PHPMailer(true);
try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'rebooksystem123@gmail.com';                     //SMTP username
    $mail->Password   = 'rebook@123';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('rebooksystem123@gmail.com', 'reBook..');
    $mail->addAddress($uname);     //Add a recipient

    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Warring notification from reBook';
    $mail->Body    = '<style type="text/css">
        *{
            font-family: "Poppins", Arial, sans-serif;
        }
    </style>
    <div style="width: 400px;height: 500px;margin: 100px auto;background-color: white;position: relative;border-radius: 5px;border:1px solid;box-shadow: 5px 10px 18px #a9a4a4;border-color: #a9a4a4;">
        <div style="width: 100%;height: 10px;background-color: white;position: relative;"></div>
        <h3 style="margin-top: 0;text-align: center;position: relative;top: 2%;">reBook</h3>
        <hr style="color: red;">
        <h2 style="margin-left: 20px;margin-top: 30px;">Hello '.$uname.'</h2>
        <div style="text-align: center;position: relative;top: 25%;transform: translateY(-50%);">
            
        
        <p style="margin: 40px;">A complaint is registered against you in rebook.com.<br>
        Posted: '.$who.'<br><br>

        you should return the book before '.$last_date.' otherwise legal actions might be taken.<br>

        and it leads to the action of account block.


        <br>

Login now and check the details</p>



    
        </div>
        <br>
        
        <hr>
        <h5 style="text-align: center;">@reBook<br>
        rebook.com | Unsubscribed</h5>
        
    </div>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();

        
} catch (Exception $e) {
    
        echo "<script>alert('Make sure the system is connected to network!...');window.location.href='index.php'</script>";
}
}

function RespondsMail($uname,$who,$last_date) {

// require 'Mailer/PHPMailer.php';
// require 'Mailer/Exception.php';
// require 'Mailer/SMTP.php';
  
$mail = new PHPMailer(true);
try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'rebooksystem123@gmail.com';                     //SMTP username
    $mail->Password   = 'rebook@123';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('rebooksystem123@gmail.com', 'reBook..');
    $mail->addAddress($who);     //Add a recipient

    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Complaint responds notification';
    $mail->Body    = '<style type="text/css">
        *{
            font-family: "Poppins", Arial, sans-serif;
        }
    </style>
    <div style="width: 400px;height: 500px;margin: 100px auto;background-color: white;position: relative;border-radius: 5px;border:1px solid;box-shadow: 5px 10px 18px #a9a4a4;border-color: #a9a4a4;">
        <div style="width: 100%;height: 10px;background-color: white;position: relative;"></div>
        <h3 style="margin-top: 0;text-align: center;position: relative;top: 2%;">reBook</h3>
        <hr style="color: red;">
        <h2 style="margin-left: 20px;margin-top: 30px;">Hello '.$who.'</h2>
        <div style="text-align: center;position: relative;top: 25%;transform: translateY(-50%);">
            
        
        <p style="margin: 40px;">A complaint is registered against '.$uname.' in rebook.com.<br>
        

        he/she will return the book before '.$last_date.' otherwise  legal actions will be taken against him/her.<br>

        and it leads to the action of account block.


        <br>

Login now and check the details</p>



    
        </div>
        <br>
        
        <hr>
        <h5 style="text-align: center;">@reBook<br>
        rebook.com | Unsubscribed</h5>
        
    </div>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();

        
} catch (Exception $e) {
    
        echo "<script>alert('Make sure the system is connected to network!...');window.location.href='index.php'</script>";
}
}


function RequestRejectMail($uname) {

require 'Mailer/PHPMailer.php';
require 'Mailer/Exception.php';
require 'Mailer/SMTP.php';
  
$mail = new PHPMailer(true);
try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'rebooksystem123@gmail.com';                     //SMTP username
    $mail->Password   = 'rebook@123';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('rebooksystem123@gmail.com', 'reBook..');
    $mail->addAddress($uname);     //Add a recipient

    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Replay notification';
    $mail->Body    = '<style type="text/css">
        *{
            font-family: "Poppins", Arial, sans-serif;
        }
    </style>
    <div style="width: 400px;height: 500px;margin: 100px auto;background-color: white;position: relative;border-radius: 5px;border:1px solid;box-shadow: 5px 10px 18px #a9a4a4;border-color: #a9a4a4;">
        <div style="width: 100%;height: 10px;background-color: white;position: relative;"></div>
        <h3 style="margin-top: 0;text-align: center;position: relative;top: 2%;">reBook</h3>
        <hr style="color: red;">
        <h2 style="margin-left: 20px;margin-top: 30px;">Hello '.$uname.'</h2>
        <div style="text-align: center;position: relative;top: 25%;transform: translateY(-50%);">
            
        
        <p style="margin: 40px;">Your request has been rejected,try another.<br><br>

Login now and check the details</p>



    
        </div>
        <br>
        
        <hr>
        <h5 style="text-align: center;">@rebook<br>
        rebook.com | Unsuscribed</h5>
        
    </div>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();

        
} catch (Exception $e) {
    
        echo "<script>alert('Make sure the system is connected to network!...');window.location.href='recive_request.php'</script>";
}
}



function AccountBlockMail($uname) {

require 'Mailer/PHPMailer.php';
require 'Mailer/Exception.php';
require 'Mailer/SMTP.php';
  
$mail = new PHPMailer(true);
try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'rebooksystem123@gmail.com';                     //SMTP username
    $mail->Password   = 'rebook@123';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('rebooksystem123@gmail.com', 'reBook..');
    $mail->addAddress($uname);     //Add a recipient

    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Block notification';
    $mail->Body    = '<style type="text/css">
        *{
            font-family: "Poppins", Arial, sans-serif;
        }
    </style>
    <div style="width: 400px;height: 500px;margin: 100px auto;background-color: white;position: relative;border-radius: 5px;border:1px solid;box-shadow: 5px 10px 18px #a9a4a4;border-color: #a9a4a4;">
        <div style="width: 100%;height: 10px;background-color: white;position: relative;"></div>
        <h3 style="margin-top: 0;text-align: center;position: relative;top: 2%;">reBook</h3>
        <hr style="color: red;">
        <h2 style="margin-left: 20px;margin-top: 30px;">Hello '.$uname.'</h2>
        <div style="text-align: center;position: relative;top: 25%;transform: translateY(-50%);">
            
        
        <p style="margin: 40px;">Your account is blocked due to a complaint.<br><br>





    
        </div>
        <br>
        
        <hr>
        <h5 style="text-align: center;">@rebook<br>
        rebook.com | Unsubscribed</h5>
        
    </div>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();

        
} catch (Exception $e) {
    
        echo "<script>alert('Make sure the system is connected to network!...');window.location.href='recive_request.php'</script>";
}
}
?>
