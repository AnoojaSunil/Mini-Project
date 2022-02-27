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
                    
                                <h1 class="display-3 text-white animated slideInDown">More User Review</h1>
                                
                    
                </div>
            </div>
        </div>
    </div>

<div class="w3-container">
<div class="w3-responsive">
  <h2>Review (<?php echo $_POST['na']; $b_id=$_POST['b_id'] ?>) </h2>
  <p>---------------------</p>

  <table class="w3-table-all w3-card-4 w3-xlarge">
    <tr>
      <th>Rating</th>
      <th>Feedback</th>
      
        <th>User</th>
        
        
        
    </tr>

<?php 
            
            include '../DB_connect.php';
            $query = "select * from rating r,register re where r.book_id='$b_id' and r.cust_id=re.login_id";
            $result = mysqli_query($conn, $query);
            
            while ($data = mysqli_fetch_assoc($result)) {

                ?>



    <tr>
            <td>
              <?php
                $i=0;
                while($data['rate']>$i){
                                            
                echo "<img src='../Assets/star.jpg' width='20px'>";
                $i=$i+1;

                }
                                        
              ?>
                

            </td>
            <td>
                
                <?php echo $data['feedback'];?><br>
              
            </td>

              
            <td>
                <?php echo $data['name'];?><br>
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