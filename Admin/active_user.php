<?php
session_start();

if ($_SESSION['id'])
{


?>
<?php 
include 'header.php';
?>


<!-- Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5 page-header" style="background-image: url(../Assets/img/photo.jpeg);">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    
                                <h1 class="display-3 text-white animated slideInDown">Active Customer List</h1>
                                
                    
                </div>
            </div>
        </div>
    </div>

<div class="w3-container">
<div class="w3-responsive">
  <h2>Active Customer List</h2>
  <p>---------------------</p>

  <table class="w3-table-all w3-card-4 w3-xlarge">
    <tr>
      <th>First Name</th>
      <th>Address</th>
      <th>Email</th>
        <th>Phone</th>
         <th>Terms Acceptance</th>
        
        <th>Deactivate</th>
    </tr>

<?php 
            
            include '../DB_connect.php';
            $query = "select * from register w,login l where w.login_id=l.login_id and l.status='1'";
            $result = mysqli_query($conn, $query);
            
            while ($data = mysqli_fetch_assoc($result)) {

                ?>



    <tr>
      <td><?php echo $data['name'];?></td>
      <td><?php echo $data['address'];?></td>

      <td><?php echo $data['email'];?></td>
        <td><?php echo $data['phone'];?></td>
        <td><?php echo $data['terms'];?><br>
        <a href="../Upload/<?php echo $data['document'];?>" target="_blank">Document</a></td>
        
                                <td class="table_td">
                                <form method="POST" action="account_acion.php">
                                    <input type="hidden" value="<?php echo $data['login_id'];?>" name="account_id">
                                    <button name="btn_rej" type="submit" class="btn-secondary">Reject</button>
                                </form>
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