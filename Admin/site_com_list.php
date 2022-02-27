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
      <th>Complaint Details</th>
      <th>User Details</th>
      
        <th>Date Posted</th>
        <th>Action</th>
         
        
        
    </tr>

<?php 
            
            include '../DB_connect.php';
            $query = "select * from site_complaint s, register r where s.user_id=r.login_id";
            $result = mysqli_query($conn, $query);
            
            while ($data = mysqli_fetch_assoc($result)) {

                ?>



    <tr>
      <td>
        
       <?php echo $data['dsecri'];?><br>
  
</td>
<td>
   <?php echo $data['name'];?><br>
   <?php echo $data['email'];?><br>
</td>
<td>
        
        Date: <?php echo $data['com_date'];?><br>
      
      
</td>
<td>
  <?php if ($data['responds']=='Null') {
    // code...
   ?>
   <form action="account_acion.php" method="post">
    <input type="hidden" value="<?php echo $data['com_id'] ?>" name="id"><br><br>
    <input type="" name="res"><br><br>
    <button type="submit" name="site">Respond</button>
  </form>
   <?php 
  }else{ echo $data['responds']; ?>

  
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