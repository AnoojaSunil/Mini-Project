<?php
session_start();

if ($_SESSION['id'])
{
$myid = $_SESSION['id'];

?>
<?php 
include 'header.php';

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
                    
                                <h1 class="display-3 text-white animated slideInDown">Completed Transaction List</h1>
                                
                    
                </div>
            </div>
        </div>
    </div>

<div class="w3-container" id="blur">
<div class="w3-responsive">
  <h2> List</h2>
  <p>---------------------</p>

  <table class="w3-table-all w3-card-4 w3-xlarge">
    <tr>
      <th>Book Details</th>
      <th>Requester Details</th>
      <th>Request Details</th>
      
        <th>Publisher Details</th>
         <th>Actions</th>
        
        
    </tr>

<?php 
            
            include '../DB_connect.php';
            $query = "select * from book_request br,book b,register r where br.book_id=b.book_id and r.login_id=b.login_id and br.req_status='Completed'";
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
    $query1 = "select * from book_request br,register r where br.req_id='$id' and r.login_id=br.login_id and req_status='Completed'";
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
                                  <?php if ($data['req_status']=='Completed') {
                                                          // code...
                                                          $id=$data['req_id'];
                                  $qu = "select * from rent where req_id='$id'";
                                  $re = mysqli_query($conn, $qu);
                                  
                                $da = mysqli_num_rows($re);

                                if ($da>0) {
                                  $val = mysqli_fetch_assoc($re);
                                  
                                        echo '<div style="">';
                                    echo 'Pay Amount: Rs.' .$val['pay_amt'] . '<br>';
                                    echo 'Issue date: '.$val['issue_date']. '<br>';
                                    echo 'Return date: '.$val['expire_date']. '<br>';
                                    
                                    echo '</div>';

                                      }

                                   ?>
                                   

                                   
                              

                              
                                <?php } ?>
                                
                              
                                </td>
                                <td>
                                  <?php 
                                  if ($data['req_status']=='Completed') {
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
                                    echo "No responds";
                                  }
                                  else{
                                      echo 'Status: '.$com['com_status'].'<br>';
                                    echo 'Responded Date: '.$com['res_date'].'<br>';
                                  }
                                }
                                else{
                                  echo "";
                                }
                              }
                                  ?>
                                
                                </td>
                                <td>
                                 <?php if ($data['req_status']=='Completed') { 
                                  $retn = "SELECT * FROM `return_fine` WHERE `rent_id`='$rent'";

                                  $core = mysqli_query($conn, $retn);
                                  $comre = mysqli_fetch_assoc($core);

                                  echo 'Return Date: '.$comre['return_date'].'<br>';
                                  echo 'Fine Amount: '.$comre['fine_amt'].'<br>';
                                  ?>

                                  <h2>Return Completed</h2>

                                  <?php }?>
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