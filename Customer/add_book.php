<?php
session_start();

if ($_SESSION['id'])
{


?>
<?php 
include 'main_header.php';
 include 'sales_head.php'; 
 $id=$_SESSION['id'];
?>


<!-- Contact Start -->
    <div class="container-xxl py-5" style="text-align: center;">

        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                
                <h1 class="mb-5">Rent Your Book</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    
                </div>
                
                <div class="col-lg-4 col-md-12 wow fadeInUp" style="width: 700px;margin-left: -100px;" data-wow-delay="0.5s">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="row g-3">
                            <div class="col-12">
                                <div class="form-floating">

                                    <input type="text" class="form-control" name="name" pattern="[a-zA-Z\s]+" required id="name" placeholder="Your Name" title="Text only">
                                    <label for="name">Book Name</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" pattern="[a-zA-Z\s]+" title="Text only" name="author"  required id="email" placeholder="Your Email">
                                    <label for="email">Author</label>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <div class="form-floating">
                                    <!-- <textarea class="form-control" name="addr"  required placeholder="Leave a message here" id="message" style="height: 150px"></textarea> -->
                                    <select class="form-control" name="cat"  required placeholder="Select Category" id="message">
                                        
                                        <option value="">--------</option>
                                        <option value="Fiction">Fiction</option>
                                        <option value="Non fiction">Non fiction</option>
                                        <option value="Romance">Romance</option>

                                        <option value="Fantacy">Fantacy</option>
                                        <option value="Sports">Sports</option>
                                        <option value="Politics">Politics</option>

                                        <option value="Children">Children</option>

                                        <option value="Poetry">Poetry</option>
                                         <option value="Autobiography">Autobiography</option>                                       
                                                                            
                                        <option value="Mystery">Mystery</option>  
                                        <option value="Horror Novel">Horror Novel</option>
                                        <option value="Crime Thriller">Crime Thriller</option>
                                        </select> 
                                 <label for="message">Select Category</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <!-- <textarea class="form-control" name="addr"  required placeholder="Leave a message here" id="message" style="height: 150px"></textarea> -->
                                    <select class="form-control" name="mode" id="mode" onchange="ModeSelector();" required placeholder="Select Book Mode" id="message">
                                        
                                        <option value="">--------</option>
                                        <option value="Hard Copy">Hard Copy</option>
                                        <option value="Soft Copy">Soft Copy</option>
                                        
                                        </select> 
                                 <label for="message">Select Book Mode</label>
                                </div>
                            </div>
                            <div class="col-12" id="upfile">
                                <div class="form-floating">
                                    <input type="file" name="upload" accept =".pdf" required class="form-control" id="upload" placeholder="Upload Soft Copy">
                                    <label for="upload">Upload Soft Copy</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" name="num" pattern="[0-9]{13,14}" title="Number only" required class="form-control" id="subject" placeholder="ISBN Number">
                                    <label for="subject">ISBN Number</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="number" name="price" required class="form-control" id="subject" placeholder="Price">
                                    <label for="subject">Price in rupees</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="file" name="image" required accept="Image/*" class="form-control" id="subject" placeholder="Upload image">
                                    <label for="subject">Upload image</label>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" name="pub" type="submit">Post</button>
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
    $cat=$_POST['cat'];
    $num=$_POST['num'];
    $mode=$_POST['mode'];

    $rent = $pr/2;
    

    $image = $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], '../Upload/'.$image);
    
    if ($mode =='Hard Copy') {
        
        $sql ="INSERT INTO `book`(`b_name`, `b_price`, `rent_price`,  `b_author`, `b_cat`, `b_isbn`, `b_img`, `pub_status`, `rent_status`, `mode_status`, `soft_copy_file`,`login_id`) VALUES ('$na','$pr','$rent','$au','$cat','$num','$image','Not','In','$mode','Null','$id')";
    }else{ 

        $upload = $_FILES['upload']['name'];
    move_uploaded_file($_FILES['upload']['tmp_name'], '../Upload/'.$upload);
        $sql ="INSERT INTO `book`(`b_name`, `b_price`, `rent_price`,  `b_author`, `b_cat`, `b_isbn`, `b_img`, `pub_status`, `rent_status`,`mode_status`, `soft_copy_file`, `login_id`) VALUES ('$na','$pr','$rent','$au','$cat','$num','$image','Not','In','$mode','$upload','$id')";

     }
   

    

    mysqli_query($conn,$sql)or die(mysqli_error($conn));
        
        echo "<script> alert('Added Successfully..');window.location.href='add_book.php'</script>";

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


