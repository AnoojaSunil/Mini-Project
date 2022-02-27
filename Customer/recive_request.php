<?php
session_start();

if ($_SESSION['id'])
{
$myid = $_SESSION['id'];

?>
<?php 
include 'main_header.php';
 include 'sales_head.php'; 
?>



<!-- Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5 page-header" style="background-image: url(../Assets/img/photo.jpeg);">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    
                                <h1 class="display-3 text-white animated slideInDown">Received Request List</h1>
                                
                    
                </div>
            </div>
        </div>
    </div>

<div class="w3-container">
<div class="w3-responsive">
  <h2>Received Request List</h2>
  <p>---------------------</p>

  <table class="w3-table-all w3-card-4 w3-xlarge">
    <tr>
      <th>Book Details</th>
      <th>Request Details</th>
      
        <th>Requester Details</th>
         <th>Actions</th>
        
        
    </tr>

<?php 
            
            include '../DB_connect.php';
            $query = "select * from book_request br,book b,register r where br.book_id=b.book_id and r.login_id=br.login_id and b.login_id='$myid' and (br.req_status='Accepted' or br.req_status='Request')";
            $result = mysqli_query($conn, $query);
            
            while ($data = mysqli_fetch_assoc($result)) {

                ?>



    <tr>
      <td>
        <img src="../Upload/<?php echo $data['b_img'];?>" width="100px"><br>
        Title: <?php echo $data['b_name'];?><br>
      Price: Rs.<?php echo $data['b_price'];?><br>
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
                                   if ($val['rent_status']=='Return') {
                                      
                                      echo '<div style="background-color: black;color:white;">';
                                      // echo 'Pay Amount: Rs.' .$val['pay_amt'] . '<br>';
                                      echo 'Pay Amount: Rs.' .$val['pay_amt'] . '<br>';
                                    echo 'Admin Amount(40%): Rs.' .$val['admin_amt'] . '<br>';
                                    echo 'User Amount(60%): Rs.'.$val['user_amt']. '<br>';
                                    echo 'Issue date: '.$val['issue_date']. '<br>';
                                    echo 'Return date: '.$val['expire_date']. '<br>';
                                    echo 'Returned date: '.$val['return_date']. '<br>';
                                    echo 'Status: '.$val['rent_status']. '<br>';
                                      echo '<h3 style="background-color: white;"">Returned Successfully!</h3></div>';
                                    }else{
                                   if ($curtimestamp2 > $curtimestamp1){

                                    echo '<div style="background-color: red;color:white;">';
                                    echo 'Pay Amount: Rs.' .$val['pay_amt'] . '<br>';
                                    echo 'Admin Amount(40%): Rs.' .$val['admin_amt'] . '<br>';
                                    echo 'User Amount(60%): Rs.'.$val['user_amt']. '<br>';
                                    echo 'Issue date: '.$val['issue_date']. '<br>';
                                    echo 'Return date: '.$val['expire_date']. '<br>';
                                    echo 'Status: '.$val['rent_status']. '<br>';
                                    echo '<h3 style="background-color: white;"">Return date over!</h3></div>';
                                      
                                      ?>
                                      
                                      <form method="POST" action="add_complaint.php">
                                    <input type="hidden" value="<?php echo $val['rent_id'];?>" name="req_id">
                                    <button name="btn_rej" type="submit" class="btn-primary">Register Complaint</button>
                                </form>
                                <?php if ($val['rent_status']=='Confirm') { ?>
                                     <br>
                                     <h3>Make Confirm for Return</h3>
                                     <h4>Return Details</h4>

                                  
                                 <?php $rent = $val['rent_id']; 
                                  $retn = "SELECT * FROM `return_fine` WHERE `rent_id`='$rent'";

                                  $core = mysqli_query($conn, $retn);
                                  $comre = mysqli_fetch_assoc($core);

                                  echo 'Return Date: '.$comre['return_date'].'<br>';
                                  echo 'Fine Amount: '.$comre['fine_amt'].'<br>';
                                  ?>

                                  
                                
                                      <form method="POST" action="action.php">
                                    <input type="hidden" value="<?php echo $val['rent_id'];?>" name="rent_id">
                                    <button name="btn_confirm" type="submit" class="btn-primary">Cofirm Return</button>
                                </form>

                                  <?php  } ?>
                                      <?php  }
                                      else{
                                        echo '<div style="">';
                                    echo 'Pay Amount: Rs.' .$val['pay_amt'] . '<br>';
                                    echo 'Admin Amount(40%): Rs.' .$val['admin_amt'] . '<br>';
                                    echo 'User Amount(60%): Rs.'.$val['user_amt']. '<br>';
                                    echo 'Issue date: '.$val['issue_date']. '<br>';
                                    echo 'Return date: '.$val['expire_date']. '<br>';
                                    echo 'Status: '.$val['rent_status']. '<br>';
                                    echo '</div>';

                                    ?>
                                    <?php if ($val['rent_status']=='Confirm') { ?>
                                     <h3>Make Confirm for Return</h3>
                                     <?php $rent = $val['rent_id']; 
                                  $retn = "SELECT * FROM `return_fine` WHERE `rent_id`='$rent'";

                                  $core = mysqli_query($conn, $retn);
                                  $comre = mysqli_fetch_assoc($core);

                                  echo 'Returned Date: '.$comre['return_date'].'<br>';
                                  echo 'Fine Amount: '.$comre['fine_amt'].'<br>';
                                  ?>
                                      <form method="POST" action="action.php">
                                    <input type="hidden" value="<?php echo $val['rent_id'];?>" name="rent_id">
                                    <button name="btn_confirm" type="submit" class="btn-primary">Confirm Return</button>
                                </form>

                                  <?php  } ?>


                                    <?php  } ?>

                                  
                                 
                                   
                                <br>
                               <a href="reciver_chat.php?req_id=<?php echo $data['req_id'];?>" target="_blank"><button  class="btn-secondary">Go to Chat</button></a>
                              <?php }}}


                              if ($data['req_status']=='Rejected') { ?>
                                
                                    <button name="appr_req" type="submit" style="background-color: red;" class="btn-primary">Rejected</button>
                                
                                
                              <?php }if ($data['req_status']=='Request') { ?>
                                <form method="POST" action="action.php">
                                    <input type="hidden" value="<?php echo $data['req_id'];?>" name="r_id">
                                    <input type="hidden" name="book" value="<?php echo $data['book_id'];?>">
                                    <button name="appr_req" type="submit" class="btn-primary">Accept</button>
                                </form>
                                <br>
                                <form method="POST" action="action.php">
                                    <input type="hidden" value="<?php echo $data['req_id'];?>" name="r_id">
                                    <button name="rej_req" type="submit" style="background-color: red;" class="btn-secondary">Reject</button>
                                </form>
                              <?php }  ?> 
                                </td>
    </tr>
    

<?php } ?>

  </table>
</div>
</div>

    



<?php 
include 'footer.php';
}
else
{
  header('location:../index.php');
}
?>