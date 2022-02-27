<?php
session_start();

if ($_SESSION['id'])
{


?>
<?php 
include 'header.php';
?>


<!-- Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5 page-header" style="background-image: url(../Assets/img/alfons-morales.jpg);">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h5 class="text-primary text-uppercase mb-3 animated slideInDown">Best Online Book Store</h5>
                                <h1 class="display-3 text-white animated slideInDown">Welcome Admin</h1>
                                <p class="fs-5 text-white mb-4 pb-2">Escape the Reality!
Pleasure, Knowledge & Character Building</p>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            
                            <a href="" class="btn btn-light py-md-3 px-md-5 animated slideInRight">GET YOUR BOOKS</a>
                        </ol>
                    </nav>
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