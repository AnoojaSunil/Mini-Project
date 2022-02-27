<?php
session_start();

if ($_SESSION['id'])
{
$myid = $_SESSION['id'];

?>
<?php 
include 'main_header.php';
 include 'by_head.php'; 
?>
<style>


/* Button used to open the contact form - fixed at the bottom of the page */
.open-button {
  background-color: #555;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
  bottom: 23px;
  right: 28px;
  width: 280px;
}

/* The popup form - hidden by default */
.form-popup {
  display: none;
  border-radius: 10px;
  position: fixed;
  bottom: 200px;
  right: 25px;
  border: 3px solid #f1f1f1;
  z-index: 9;
  background-color: black;
}

/* Add styles to the form container */
.form-container {
  width: 300px;
  padding: 10px;
  background-color: #414444;
  border-radius: 10px;
}

/* Full-width input fields */
.form-container input[type=text], .form-container input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

/* When the inputs get focus, do something */
.form-container input[type=text]:focus, .form-container input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/login button */
.form-container .btn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
</style>


<!-- Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5 page-header" style="background-image: url(../Assets/img/photo.jpeg);">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    
                                <h1 class="display-3 text-white animated slideInDown">Request List</h1>
                                
                    
                </div>
            </div>
        </div>
    </div>

<div class="w3-container" id="blur">
<div class="w3-responsive">
  <h2>Request List</h2>
  <p>---------------------</p>

  <table class="w3-table-all w3-card-4 w3-xlarge">
    <tr>
      <th>Book Details</th>
      <th>Request Details</th>
      
        <th>Publisher Details</th>
         <th>Actions</th>
        
        
    </tr>

<?php 
            
            include '../DB_connect.php';
            $query = "select * from book_request br,book b,register r where br.login_id='$myid' and br.book_id=b.book_id and r.login_id=b.login_id and (br.req_status='Accepted' or br.req_status='Request')";
            $result = mysqli_query($conn, $query);
            
            while ($data = mysqli_fetch_assoc($result)) {
            $val=0;
                ?>



    <tr>
      <td>
        <img src="../Upload/<?php echo $data['b_img'];?>" width="100px"><br>
        Title: <?php echo $data['b_name'];?><br>
      Rent Price: Rs.<?php echo $data['rent_price'];?><br>
      Category: <?php echo $data['b_cat'];?><br>
    Author: <?php echo $data['b_author'];?><br>
  ISBN: <?php echo $data['b_isbn'];?><br>
</td>
<td>
        
        Date: <?php echo $data['req_date'];?><br>
      Status: <?php echo $data['req_status'];?><br>
      
</td>

      
        <td>Name: <?php echo $data['name'];?><br>Address: <?php echo $data['address'];?><br>Email: <?php echo $data['email'];?><br>Contact: <?php echo $data['phone'];?></td>
        
        
                                <td class="table_td">
                                  <?php if ($data['req_status']=='Accepted') {
                                                          // code...
                                                          $id=$data['req_id'];
                                  $qu = "select * from rent where req_id='$id'";
                                  $re = mysqli_query($conn, $qu);
                                  
                                $da = mysqli_num_rows($re);

                                if ($da>0) {
                                  $val = mysqli_fetch_assoc($re);
                                  $enddate  = $val['expire_date'];
                                  $today=date("Y-m-d");
                                  $curtimestamp1 = strtotime($enddate);
                                   $curtimestamp2 = strtotime($today);
                                   if ($curtimestamp2 > $curtimestamp1){
                                    echo '<div style="background-color: red;color:white;">';
                                    echo 'Pay Amount: Rs.' .$val['pay_amt'] . '<br>';
                                    echo 'Issue date: '.$val['issue_date']. '<br>';
                                    echo 'Expire date: '.$val['expire_date']. '<br>';
                                    
                                    echo '<h3 style="background-color: white;"">Return date over!</h3></div>';
                                      }
                                      else{
                                        echo '<div style="">';
                                    echo 'Pay Amount: Rs.' .$val['pay_amt'] . '<br>';
                                    echo 'Issue date: '.$val['issue_date']. '<br>';
                                    echo 'Expire date: '.$val['expire_date']. '<br>';
                                    
                                //     echo '</div><form method="POST" action="action.php">
                                //     <input type="hidden" name="price" value="'.  $val['pay_amt'].'">
                                //     <input type="hidden" value="'.  $data['req_id'].'" name="req_id">
                                //     <input type="hidden" value="'.  $data['book_id'].'" name="book_id">
                                //     <input type="hidden" value="'.  $val['rent_id'].'" name="rent_id">
                                //     <input type="hidden" value="'.  $val['expire_date'].'" name="exp_date">
                                //     <button name="btn_cancel" type="submit" class="btn-primary">Cancel Request</button>
                                // </form>';

                                      }

                                   ?>
                                   <br>
                                   <?php if ($val['rent_status']=='Confirm') {
                                     
                                      echo "<h3>Confirmation sent</h3>";

                                   }else{ ?>
                                   <form method="POST" action="action.php">
                                    <input type="hidden" name="price" value="<?php echo $val['pay_amt'];?>">
                                    <input type="hidden" value="<?php echo $data['req_id'];?>" name="req_id">
                                    <input type="hidden" value="<?php echo $data['book_id'];?>" name="book_id">
                                    <input type="hidden" value="<?php echo $val['rent_id'];?>" name="rent_id">
                                    <input type="hidden" value="<?php echo $val['expire_date'];?>" name="exp_date">
                                    <button name="btn_return" type="submit" class="btn-primary">Return Now</button>
                                </form><br>
                                
                              <?php }

                                $pat_rent=$val['rent_id'];

                                $pat = "SELECT * FROM `rating` WHERE `rent_id`='$pat_rent'";
                                $pat_sql = mysqli_query($conn,$pat);
                                $pat_count = mysqli_num_rows($pat_sql);
                                if ($pat_count>0) {
                                  // code...
                                  echo "<h5>Thank you for rating</h5>";
                                }else{



                               ?>

                                <div class="form-popup" id="myForm">
                                <form action="rate_action.php" method="post" class="form-container">
                                  <h1 style="color: white;">Rate Now</h1>

                                  <img src="../Upload/<?php echo $data['b_img'];?>" style="margin-left: 30%;" width="100px"><br>
                                  <label style="color: white;margin-left: 17%;"><?php echo $data['b_name'];?></label><br><br>


                                

                                  
                                  <select name="rate" required style="border-radius: 10px;width: 100%;">
                                    <option value="">--Select rate--</option>
                                    <option value="5">5<small class="fa fa-star text-primary"></small></option>
                                    <option value="4">4<small class="fa fa-star text-primary"></small></option>
                                    <option value="3">3<small class="fa fa-star text-primary"></small></option>
                                    <option value="2">2<small class="fa fa-star text-primary"></small></option>
                                    <option value="1">1<small class="fa fa-star text-primary"></small></option>
                                  </select>
                                  <br><br>
                                  <input type="" name="re" style="border-radius: 10px;width: 100%;background-color: rgb(219 220 221);color: black;" required placeholder="Type your review"><br><br>
                                  <input type="hidden" value="<?php echo $data['book_id'];?>" name="book_id">
                                  <input type="hidden" value="<?php echo $val['rent_id'];?>" name="rent_id">

                                  <button type="submit" class="btn">Rate</button>
                                  <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
                                </form>
                              </div>

                                <br>
                                  
                                    <button name="btn_rej" type="submit" onclick="openForm()" class="btn-primary">Rate this book</button>
                                    <br>
                                <!-- </form> -->
                              <?php } ?>

                                   
                              <?php } else{ ?>
                                <form method="POST" action="payment.php">
                                    <input type="hidden" value="<?php echo $data['req_id'];?>" name="req_id">
                                    <button name="btn_rej" type="submit" class="btn-secondary">Pay Now</button>
                                </form>
                              <?php } ?>
                                <br>
                            
                                <a href="chat.php?req_id=<?php echo $data['req_id'];?>" target="_blank"><button  class="btn-secondary">Go to Chat</button></a>

                              
                                <?php }if ($data['req_status']=='Completed') { ?>

                                  <h2>Return Completed</h2>

                                  <?php }if ($data['req_status']=='Rejected') { ?>
                                
                                    <button name="appr_req" type="submit" style="background-color: red;" class="btn-primary">Rejected</button>
                                
                                
                              <?php }if ($data['req_status']=='Request') { ?>
                                None change of request
                              <?php } ?> 
                                
                              
                                </td>
                                <td>
                                  <?php 
                                  if ($data['req_status']=='Accepted') {
                                    if ($val==0) {
                                      echo "";
                                    }
                                    else{
                                          $rent = $val['rent_id'];
                                          $cm = "select * from complaint where rent_id='$rent'";
                                          $co = mysqli_query($conn, $cm); 
                                          $comda = mysqli_num_rows($co);
                                          if ($comda>0) {
                                            // code...
                                          
                                            $com = mysqli_fetch_assoc($co);
                                            echo 'Complaint:<br> '.$com['descri'].'<br>';
                                            echo 'Post date: '.$com['com_date'].'<br>';
                                            
                                            if ($com['res_date']=='Null') {
                                              
                                              echo "No responds";
                                            }
                                            if ($com['com_status']=='Post' and $com['res_date']!='Null') {
                                              // code...
                                        
                                                echo 'Warring message send(15 days for return -<br> days from respond date).';
                                                echo 'Respond Date: '.$com['res_date'].'<br>';
                                                
                                            }
                                            if ($com['com_status']=='Completed') {
                                             echo 'Respond Date: '.$com['res_date'].'<br>';
                                            echo '<h3>Complaint Going to legally<h3>';
                                          }
                                          }
                                    }
                                  }
                                  ?>
                                
                                </td>
    </tr>
    

<?php } ?>

  </table>
</div>
</div>

<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
  // document.getElementById('blur').style.filter = "blur(10px)";
  // document.getElementById("myForm").style.filter = "blur(20px)";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>

    



<?php 
include 'footer.php';
}
else
{
  header('location:../index.php');
}
?>