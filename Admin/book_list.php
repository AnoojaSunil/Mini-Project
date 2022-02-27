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
                    
                                <h1 class="display-3 text-white animated slideInDown">Pubilished Book List</h1>
                                
                    
                </div>
            </div>
        </div>
    </div>

<div class="w3-container">
<div class="w3-responsive">
  <h2>Pubilished Book List</h2>
  <p>---------------------</p>
  <style type="text/css">
      table tr td{
        margin: 50px;
      }
  </style>

  <table class="w3-table-all w3-card-4 w3-xlarge">
    <tr>
        <th>Image</th>
      <th>Name</th>
      <th>Price</th>
      <th>Author</th>
        <th>Category</th>
        <th>ISBN</th>
        <th>Status</th>
        <th>Added User</th>
        <th>Publish</th>
        <th>User Review</th>

    </tr>

    

<?php 
            
            include '../DB_connect.php';
            $query = "select * from book b,register r where b.pub_status='Published' and b.login_id=r.login_id";
            $result = mysqli_query($conn, $query);
            
            while ($data = mysqli_fetch_assoc($result)) {

                ?>



    <tr>
        <td><img src="../Upload/<?php echo $data['b_img'];?>" width=100px></td>
      <td><?php echo $data['b_name'];?></td>
      <td><?php echo $data['b_price'];?></td>

      <td><?php echo $data['b_author'];?></td>
        <td><?php echo $data['b_cat'];?></td>
        <td><?php echo $data['b_isbn'];?></td>
        <td>Published :<?php echo $data['pub_status'];?><br>
       Rent: <?php echo $data['rent_status'];?><br>
       Mode: <?php echo $data['mode_status'];?></td>
        <td><?php echo $data['name'];?><br>
            <?php echo $data['address'];?><br>
            <?php echo $data['email'];?><br>
            <?php echo $data['phone'];?>

        </td>
        
                                <td class="table_td">
                                <form method="POST" action="account_acion.php">
                                    <input type="hidden" value="<?php echo $data['book_id'];?>" name="b_id">
                                    <button name="btn_un_pub" type="submit" class="btn-secondary">Unpublish</button>
                                </form>
                                </td>
                                <td class="table_td">
                                <form method="POST" action="view_book_review.php">
                                    <input type="hidden" value="<?php echo $data['b_name'];?>" name="na">
                                    <input type="hidden" value="<?php echo $data['book_id'];?>" name="b_id">
                                    <button name="btn_un_pub" type="submit" class="btn-secondary">User Review</button>
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