<?php
session_start();

if ($_SESSION['id'])
{


?>
<?php 
include 'main_header.php';
 include 'sales_head.php'; 
 $id=$_SESSION['id'];
    include '../DB_connect.php';
 $req = $_POST['req_id'];
 $sqls = "SELECT * FROM `complaint` WHERE `rent_id`='$req'";
 $qr = mysqli_query($conn,$sqls)or die(mysqli_error($conn));
 $cont = mysqli_num_rows($qr);
 if ($cont>0) {
     // code...
     echo "<script> alert('Complaint already Posted..');window.location.href='recive_request.php'</script>";
 }

?>


<!-- Contact Start -->
    <div class="container-xxl py-5" style="text-align: center;">

        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                
                <h1 class="mb-5">Post Complaint</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    
                </div>
                
                <div class="col-lg-4 col-md-12 wow fadeInUp" style="width: 700px;margin-left: -100px;" data-wow-delay="0.5s">
                    <form action="action.php" method="post" enctype="multipart/form-data">
                        <div class="row g-3">
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" name="com"  required placeholder="Leave a message here" id="message" style="height: 150px"></textarea>
                                    <label for="message">Type complaint query</label>
                                </div>
                            </div>
                            <input type="hidden" name="req" value="<?php echo $req; ?>">
                            
                            
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" name="pubdddaf" type="submit">Post Complaint</button>
                            </div>
                        
                        </div>
                    </form>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

   



<?php 






?>



<?php 
    include 'footer.php';
}
else
{
  header('location:../index.php');
}
?>


