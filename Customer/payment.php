<?php
session_start();

if ($_SESSION['id'])
{


?>
<?php 
include 'main_header.php';
 include 'by_head.php'; 
 $myid=$_SESSION['id'];
 if (isset($_POST['req_id'])) {
     
 $req = $_POST['req_id'];

 include '../DB_connect.php';
            $query = "select b.rent_price from book_request br,book b where br.req_id='$req' and br.book_id=b.book_id";
            $result = mysqli_query($conn, $query);
            
            $data = mysqli_fetch_assoc($result);
?>


<!-- Contact Start -->
    <div class="container-xxl py-5" style="text-align: center;">

        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                
                <h1 class="mb-5">Pay Now</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    
                </div>
                
                <div class="col-lg-4 col-md-12 wow fadeInUp" style="width: 700px;margin-left: -100px;" data-wow-delay="0.5s">
                    <form action="payment_action.php" method="post" enctype="multipart/form-data">
                        <div class="row g-3">
                            <div class="col-12">
                                <div class="form-floating">

                                    <input type="text" class="form-control" name="name"  required id="name" placeholder="Card holder name">
                                    <label for="name">Card holder name</label>
                                </div>
                            </div>
                                                        
                            <div class="col-12">
                                <div class="form-floating">
                                    <!-- <textarea class="form-control" name="addr"  required placeholder="Leave a message here" id="message" style="height: 150px"></textarea> -->
                                    <select class="form-control" name="card"  required placeholder="Select card type" id="message">
                                        
                                        <option value="">--------</option>
                                        <option value="Credit">Credit</option>
                                        <option value="Debit">Debit</option>

                                        </select> 
                                 <label for="message">Select card type</label>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" name="number" required class="form-control" pattern="[0-9]{14}" id="upload" placeholder="Enter card number">
                                    <label for="upload">Enter card number</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" name="num" pattern="[0-9]{4}" required class="form-control" id="subject" placeholder="CVV Number">
                                    <label for="subject">CVV Number</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="number" name="price" value="<?php echo $data['rent_price']; ?>" readonly required class="form-control" id="subject" placeholder="Price">
                                    <label for="subject">Amount to pay</label>
                                </div>
                            </div>

                            <input type="hidden" value="<?php echo $req; ?>" name="req">

                            
                            
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" name="pub" type="submit">Pay</button>
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

    include 'footer.php';
}
else
{
    echo "<script> window.location.href='by_index.php'</script>";
}

}
else
{
  header('location:../index.php');
}
?>


