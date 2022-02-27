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
         <th>Rent Details</th>
         <th>Complaint Details</th>
        
        
    </tr>

<?php 
            
            include '../DB_connect.php';
            $query = "select * from complaint co,rent rn,book_request br,book b,register r where br.book_id=b.book_id and r.login_id=br.login_id and b.login_id='$myid' and rn.req_id=br.req_id and co.rent_id=rn.rent_id";
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
                                  <?php if ($data['req_status']=='Accepted' or $data['req_status']=='Completed') {
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
                                      echo '<h3 style="background-color: white;"">Returned successfully!</h3></div>';
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
                                      
                                      <?php }
                                      else{
                                        echo '<div style="">';
                                    echo 'Pay Amount: Rs.' .$val['pay_amt'] . '<br>';
                                    echo 'Admin Amount(40%): Rs.' .$val['admin_amt'] . '<br>';
                                    echo 'User Amount(60%): Rs.'.$val['user_amt']. '<br>';
                                    echo 'Issue date: '.$val['issue_date']. '<br>';
                                    echo 'Return date: '.$val['expire_date']. '<br>';
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
                                  <?php if ($data['req_status']=='Accepted' or $data['req_status']=='Completed') { ?>
                                  <?php 
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
                                    // code...
                                    echo "No response";
                                  }
                                  else{
                                      echo 'Status: Warning message send(15 days for return -<br> days from response date).<br>';
                                    echo 'Response Date: '.$com['res_date'].'<br>';
                                  }
                                }
                                else{
				
                                  echo "Not complaint yet";
                                }
                                if ($com['com_status']=='Completed') {
                                  
                                  echo '<h3>Complaint Going to legally and<br> Credited amount Rs.' . $val['admin_amt'] .' as compensation <h3>';
                                }
                                
                                  ?>
                                  <?php  } ?>
                                
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