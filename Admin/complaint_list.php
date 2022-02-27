<?php
session_start();

if ($_SESSION['id'])
{
$myid = $_SESSION['id'];

?>
<?php 
include 'header.php';

?>



<!-- Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5 page-header" style="background-image: url(../Assets/img/photo.jpeg);">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    
                                <h1 class="display-3 text-white animated slideInDown">Complaint List</h1>
                                
                    
                </div>
            </div>
        </div>
    </div>

<div class="w3-container">
<div class="w3-responsive">
  <h2> List</h2>
  <p>---------------------</p>

  <table class="w3-table-all w3-card-4 w3-xlarge">
    <tr>
      <th>Book Details</th>
      <th>Request Details</th>
      
        <th>Requester Details</th>
        <th>Owner Details</th>
         <th>Rent Details</th>
         <th>Complaint Details</th>
         <th>Action</th>
        
        
    </tr>

<?php 
            
            include '../DB_connect.php';
            $query = "select * from complaint co,rent rn,book_request br,book b,register r where br.book_id=b.book_id and r.login_id=b.login_id  and rn.req_id=br.req_id and co.rent_id=rn.rent_id";
            $result = mysqli_query($conn, $query);
            $com_des=0;
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
<td>
  <?php 
    $id=$data['req_id'];
    $query1 = "select * from book_request br,register r where br.req_id='$id' and r.login_id=br.login_id and req_status='Accepted'";
            $result1 = mysqli_query($conn, $query1);
            $da1 = mysqli_num_rows($result1);

                                if ($da1>0) {
            $data1 = mysqli_fetch_assoc($result1);
            echo 'Name: '.$data1['name'].'<br>';
            echo 'Address: '.$data1['address'].'<br>';
            echo 'Contact: '.$data1['phone'].'<br>';
            echo 'Email: '.$data1['email'].'<br>';
          }
  ?>
  
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
                                    echo 'Expire date: '.$val['expire_date']. '<br>';
                                    echo 'Return date: '.$val['return_date']. '<br>';
                                    echo 'Status: '.$val['rent_status']. '<br>';
                                      echo '<h3 style="background-color: white;"">Returned successfully!</h3></div>';
                                    }else{
                                   if ($curtimestamp2 > $curtimestamp1){

                                    echo '<div style="background-color: black;color:white;">';
                                    echo 'Pay Amount: Rs.' .$val['pay_amt'] . '<br>';
                                    echo 'Admin Amount(40%): Rs.' .$val['admin_amt'] . '<br>';
                                    echo 'User Amount(60%): Rs.'.$val['user_amt']. '<br>';
                                    echo 'Issue date: '.$val['issue_date']. '<br>';
                                    echo 'Expire date: '.$val['expire_date']. '<br>';
                                    echo 'Status: '.$val['rent_status']. '<br>';
                                    echo '<h3 style="background-color: white;"">Return date over!</h3></div>';
                                      
                                      ?>
                                      
                                      <?php }
                                      else{
                                        echo '<div style="">';
                                    echo 'Pay Amount: Rs.' .$val['pay_amt'] . '<br>';
                                    echo 'Admin Amount(40%): Rs.' .$val['admin_amt'] . '<br>';
                                    echo 'User Amount(60%): Rs.'.$val['user_amt']. '<br>';
                                    echo 'Issue date: '.$val['issue_date']. '<br>';
                                    echo 'Expire date: '.$val['expire_date']. '<br>';
                                    echo 'Status: '.$val['rent_status']. '<br>';
                                    echo '</div>';

                                      }

                                   ?>
                                 
                                   
                                <br>
                              
                              <?php }}


                               ?>
                                
                                  
                              <?php  } ?> 
                                </td>
                                <td>
                                  <?php 
                                  $rent = $val['rent_id'];
                                  $cm = "select * from complaint where rent_id='$rent';";
                                  $co = mysqli_query($conn, $cm); 
                                  $comda = mysqli_num_rows($co);
                                  if ($comda>0) {
                                    // code...
                                  
                                  $com = mysqli_fetch_assoc($co);
                                  echo 'Complaint:<br> '.$com['descri'].'<br>';
                                  echo 'Post date: '.$com['com_date'].'<br>';
                                  
                                  if ($com['res_date']=='Null') {
                                    // code...
                                    echo "No responds";
                                  }
                                  else{
                                    echo 'Status: '.$com['com_status'].'<br>';
                                    echo 'Responded Date: '.$com['res_date'].'<br>';
                                    $com_des = $com['res_date'];
                                    


                                    }
                                  }
                                
                                
                                  ?>
                                  
                                
                                </td>
                                <td>
                                  
                                  <?php if($com['com_status']=='Post') { ?>
                                 
                                    <form method="POST" action="account_acion.php">
                                      <textarea class="form-control" name="me"  required placeholder="Pass some warrnig message" id="message" style="height: 50px"></textarea>

                                    <!-- <input type="text" placeholder="" name="me" required> -->
                                    <input type="hidden" value="<?php echo $com['com_id'];?>" name="co_id"><br><br>
                                    <button name="btn_respond" type="submit"  class="btn-secondary">Respond</button>
                                </form>
                              <?php }

                              
                                if ($com['com_status']=='Completed') {
                                  
                                    echo "Complaint Going to legally";
                                }if ($com['com_status']=='Completed' OR $com['com_status']=='Post') 
                                  // code...
                                {

                                }
                                else{
                               
                                $curtimestamp3 = $com['res_date'];


                                    $readd= date('d-m-Y', strtotime($curtimestamp3. ' + 15 days'));

                                    $curtimestamp4 = strtotime($readd);

                                   

                                    if ($curtimestamp2 > $curtimestamp4){

                                      echo '<h3 style="background-color: red;"">Warring period is over</h3><br><form method="POST" action="account_acion.php">
                                      
                                        <input type="hidden" value="'.$com['com_id'].'" name="com">
                                   
                                    <input type="hidden" value="'.$data1['email'].'" name="email"><br><br>
                                    <button name="btn_block" type="submit"  class="btn-secondary">Block user now</button>
                                </form>';
                              }
                              }

                               ?>
                                  
                                </td>
    </tr>
    

<?php  } ?>

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