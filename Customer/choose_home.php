<?php
session_start();

if ($_SESSION['id'])
{


?>
<?php 
include 'main_header.php';
?>

<!-- 404 Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <i class="bi bi-exclamation-triangle display-1 text-primary"></i>
                    <h1 class="display-1">------------</h1>
                    <h1 class="mb-4">Continue account as</h1>
                    <p class="mb-4"></p>
                    <a class="btn btn-primary rounded-pill py-3 px-5" href="sales_index.php">Go To Rental Account</a>
                    <a class="btn btn-primary rounded-pill py-3 px-5" href="by_index.php">Go To Purchase Account</a>
                </div>
            </div>
        </div>
    </div>
    <!-- 404 End -->



<?php 

}
else
{
  header('location:../index.php');
}
?>