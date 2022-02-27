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
                    
                                <h1 class="display-3 text-white animated slideInDown">Rent List</h1>
                                
                    
                </div>
            </div>
        </div>
    </div>

<div class="w3-container" id="blur">
<div class="w3-responsive">
  <h2>Rent List</h2>
  <p>---------------------</p>

  <table class="w3-table-all w3-card-4 w3-xlarge">
    <tr>
      <th>Book Details</th>
      <th>Requester Details</th>
      <th>Request Details</th>
      
        <th>Publisher Details</th>
        
         <th>More Details</th>
        
        
    </tr>

<?php 
            
            include '../DB_connect.php';
            $query = "select * from book_request br,book b,register r where br.book_id=b.book_id and r.login_id=b.login_id and req_status='Accepted'";
            $result = mysqli_query($conn, $query);
            
            while ($data = mysqli_fetch_assoc($result)) {

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
<td>
        
        Date: <?php echo $data['req_date'];?><br>
      Status: <?php echo $data['req_status'];?><br>
      
</td>

      
        <td>Name: <?php echo $data['name'];?><br>Address: <?php echo $data['address'];?><br>Email: <?php echo $data['email'];?><br>Contact: <?php echo $data['phone'];?></td>
        
        
                                <td class="table_td">
                                  <?php if ($data['req_status']=='Accepted') {
                                                          // code...
                                                          
                                  $qu = "select * from rent where req_id='$id' and rent_status='Rented'";
                                  $re = mysqli_query($conn, $qu);
                                  
                                $da = mysqli_num_rows($re);

                                if ($da>0) {
                                  $val = mysqli_fetch_assoc($re);
                                  $enddate  = $val['expire_date'];
                                  $today=date("Y-m-d");
                                  $curtimestamp1 = strtotime($enddate);
                                   $curtimestamp2 = strtotime($today);
                                   if ($curtimestamp2 > $curtimestamp1){

                                    echo '<div style="background-color: #06BBCC;color:white;">';
                                    echo 'Pay Amount: Rs.' .$val['pay_amt'] . '<br>';
                                    echo 'Admin Amount(40%): Rs.' .$val['admin_amt'] . '<br>';
                                    echo 'User Amount(60%): Rs.'.$val['user_amt']. '<br>';
                                    
                                    echo '</div>';

                                    echo '<div style="background-color: red;color:white;">';
                                    
                                    echo 'Issue date: '.$val['issue_date']. '<br>';
                                    echo 'Expire date: '.$val['expire_date']. '<br>';
                                    echo '<h3 style="background-color: white;"">Return date over!</h3></div>';
                                      }
                                      else{
                                        echo '<div style="background-color: #06BBCC;color:white;">';
                                        echo 'Pay Amount: Rs.' .$val['pay_amt'] . '<br>';
                                    echo 'Admin Amount(40%): Rs.' .$val['admin_amt'] . '<br>';
                                    echo 'User Amount(60%): Rs.'.$val['user_amt']. '<br>';
                                    
                                    echo '</div>';
                                        echo '<div style="">';
                                    
                                    echo 'Issue date: '.$val['issue_date']. '<br>';
                                    echo 'Return date: '.$val['expire_date']. '<br>';
                                    
                                    echo '</div>';

                                      }

                                   ?>
                                   

                                   
                              <?php } ?>
                                
                              <?php } ?> 
                                
                              
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