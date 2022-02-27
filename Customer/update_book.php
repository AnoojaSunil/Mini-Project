<?php
session_start();

if ($_SESSION['id'])
{


?>
<?php 
include 'main_header.php';
 include 'sales_head.php'; 
 $id=$_SESSION['id'];
 $book_id = $_GET['bid'];
 include '../DB_connect.php';
            $sel="SELECT *  FROM `book` WHERE `book_id`='$book_id'";

            $mys = mysqli_query($conn,$sel);

            $raw=mysqli_fetch_assoc($mys);
?>


<!-- Contact Start -->
    <div class="container-xxl py-5" style="text-align: center;">

        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                
                <h1 class="mb-5">Update Your Book</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    
                </div>
                
                <div class="col-lg-4 col-md-12 wow fadeInUp" style="width: 700px;margin-left: -100px;" data-wow-delay="0.5s">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="row g-3">
                            <div class="col-12">
                                <div class="form-floating">

                                    <input type="text" class="form-control" value="<?php echo $raw['b_name'] ?>" name="name"  required id="name" placeholder="Your Name">
                                    <label for="name">Book Name</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" value="<?php echo $raw['b_author'] ?>" name="author"  required id="email" placeholder="Your Email">
                                    <label for="email">Author</label>
                                </div>
                            </div>
                            
                            
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="number" name="num" pattern="[0-9]{14}" title="Number only" required class="form-control" value="<?php echo $raw['b_isbn'] ?>" id="subject" placeholder="ISBN Number">
                                    <label for="subject">ISBN Number</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="number" name="price" required class="form-control" value="<?php echo $raw['b_price'] ?>" id="subject" placeholder="Price">
                                    <label for="subject">Price in rupees</label>
                                </div>
                            </div>
                            
                            <input type="hidden" value="<?php echo $raw['book_id'] ?>" name="bid">
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" name="pub" type="submit">Update</button>
                            </div>
                            <a style="display: inline;" href="sales_index.php"><label style="display: inline;color: black;">---</label>Cancel</a>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

    <script type="text/javascript">

        var field = document.getElementById('upfile');
        field.style.display='none';
        
        function ModeSelector() {
            var mode = document.getElementById('mode').value;
            var field = document.getElementById('upfile');
            if (mode=='Soft Copy') {

                field.style.display='block';
                

            }
            else{
                field.style.display='none';
                document.querySelector('#upload').required = false;
                // field.div.input.required='required';
            }
        }
    </script>



<?php 

if (isset($_POST['pub'])) {

    include '../DB_connect.php';

    $na=$_POST['name'];
    $pr=$_POST['price'];
    $au=$_POST['author'];
    $num=$_POST['num'];
    $book_id=$_POST['bid'];
    
    
    // if ($mode =='Hard Copy') {
        
    //     $sql ="INSERT INTO `book`(`b_name`, `b_price`, `b_author`, `b_cat`, `b_isbn`, `b_img`, `pub_status`, `rent_status`, `mode_status`, `soft_copy_file`,`login_id`) VALUES ('$na','$pr','$au','$cat','None','$image','Not','In','$mode','Null','$id')";
    // }else{ 

    //     $upload = $_FILES['upload']['name'];
    // move_uploaded_file($_FILES['upload']['tmp_name'], '../Upload/'.$upload);

    


        $sql ="UPDATE `book` SET `b_name`='$na',`b_price`='$pr',`b_author`='$au',`b_isbn`='$num' WHERE `book_id`='$book_id'";

     
   

    

    mysqli_query($conn,$sql)or die(mysqli_error($conn));
        
        echo "<script> alert('Updated Successfully..');window.location.href='on_sale_books.php'</script>";

}




?>



<?php 
    include 'footer.php';
}
else
{
  header('location:../index.php');
}
?>


