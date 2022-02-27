<?php
session_start();

if ($_SESSION['id'])
{

$id=$_SESSION['id'];

?>
<?php 
include 'main_header.php';
 include 'sales_head.php'; 
?>

<div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">---</h6>
                <h1 class="mb-5">On Rent Books</h1>
            </div>



            <div class="row g-4">
                <?php 
            include '../DB_connect.php';
            $sel="SELECT *  FROM `book` WHERE `login_id`='$id' AND (`pub_status`='Not' OR `pub_status`='Published')";

            $mys = mysqli_query($conn,$sel);

            while($raw=mysqli_fetch_assoc($mys))
            {

            ?>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden w3-container" style="text-align: center;">
                            <?php if($raw['pub_status']=='Not'){  ?>
                                <button class="w3-btn w3-red" style="background-color: red;">Not published yet.
                                    <span class="w3-badge w3-margin-left">--</span>
                                </button>
                            <?php }  ?>
                            <img class="img-fluid" src="../Upload/<?php echo $raw['b_img']; ?>" alt="" width="200px">
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                <a class="btn  btn-primary mx-1" href="update_book.php?bid=<?php echo $raw['book_id']; ?>">Update</i></a>
                                <form method="POST" action="action.php">
                                    <input type="hidden" value="<?php echo $raw['book_id'];?>" name="b_id">
                                    <button name="btn_de" type="submit" class="btn  btn-primary mx-1">Delete</button>
                                </form>
                                <!-- <a  href=""></a> -->
                                <a class="btn  btn-primary mx-1" href="">Rs. <?php echo $raw['b_price']; ?></a>
                            </div>
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0"><?php echo $raw['b_name']; ?></h5>
                            <small><?php echo $raw['b_author']; ?></small>
                            <small></small>
                        </div>
                        <form method="POST" action="view_book_review.php">
                                    <input type="hidden" value="<?php echo $raw['b_name'];?>" name="na">
                                    <input type="hidden" value="<?php echo $raw['book_id'];?>" name="b_id">
                                    <button name="btn_un_pub" type="submit" class="btn-secondary">User Review</button>
                                </form>
                    </div>
                </div>
                <?php } ?>
            </div>
        

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