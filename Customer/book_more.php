<?php
session_start();

if ($_SESSION['id'])
{

$myid = $_SESSION['id'];

$book_id = $_GET['book_id'];

$dist = $_GET['dist'];

?>
<?php 
include 'main_header.php';
 include 'by_head.php'; 

 include '../DB_connect.php';
            $query = "select * from book b,register r where b.book_id='$book_id' and r.login_id=b.login_id";
            $result = mysqli_query($conn, $query);
            $data = mysqli_fetch_assoc($result);
?>

<div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="img-fluid position-absolute" src="../Upload/<?php echo $data['b_img']; ?>" alt="" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    
                    <h1 class="mb-4"><?php echo $data['b_name']; ?></h1>
                    <p class="mb-4"><b>Price:</b> Rs.<?php echo $data['rent_price']; ?><br><b>Author:</b> <?php echo $data['b_author']; ?><br><b>Category:</b> <?php echo $data['b_cat']; ?></p>
                    <p class="mb-4"><b>ISBN:</b> <?php echo $data['b_isbn']; ?></p>
                    <div class="row gy-2 gx-4 mb-4">
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Publisher Details</p>
                        </div>
                        <p class="mb-4"><b>Name:</b> <?php echo $data['name']; ?></p>
                        <p class="mb-4"><b>Address:</b> <?php echo $data['address']; ?></p><br>
                        <p class="mb-4"><b>Email:</b> <?php echo $data['email']; ?></p><br>
                        <p class="mb-4"><b>Contact:</b> <?php echo $data['phone']; ?></p><br>
                        <p class="mb-4"><b>Distance:</b> <?php echo $dist; ?> Km</p><br>
                        
                    </div>
                    <form target="_blank" action="view_book_review.php" method="post">
                        <input type="hidden" name="b_id" value="<?php echo $data['book_id']; ?>">
                        <input type="hidden" name="na" value="<?php echo $data['b_name']; ?>">
                        <button class="btn btn-primary" type="submit">More User Review</button>
                    </form>
                    <a class="btn btn-primary py-3 px-5 mt-2" href="request_action.php?book_id=<?php echo $data['book_id']; ?>">Sent Request</a>
                </div>
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