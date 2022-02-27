

<?php include 'header.php'; ?>

<!-- Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5 page-header" style="background-image: url(Assets/img/photo.jpeg);">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h5 class="text-primary text-uppercase mb-3 animated slideInDown">Best Online Book Store</h5>
                                <h1 class="display-3 text-white animated slideInDown">The Best Online Reused Book Platform</h1>
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

    


    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-child text-primary mb-4"></i>
                            <h5 class="mb-3">Childrens</h5>
                            <p>Diam elitr kasd sed at elitr sed ipsum justo dolor sed clita amet diam</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-building text-primary mb-4"></i>
                            <h5 class="mb-3">Crime Thiriller</h5>
                            <p>Diam elitr kasd sed at elitr sed ipsum justo dolor sed clita amet diam</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-heart text-primary mb-4"></i>
                            <h5 class="mb-3">Romance</h5>
                            <p>Diam elitr kasd sed at elitr sed ipsum justo dolor sed clita amet diam</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-book-open text-primary mb-4"></i>
                            <h5 class="mb-3">Fiction</h5>
                            <p>Diam elitr kasd sed at elitr sed ipsum justo dolor sed clita amet diam</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->


    


    <!-- Courses Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Books</h6>
                <h1 class="mb-5">Popular Books Available</h1>
            </div>
            <div class="row g-4 justify-content-center">
                 <?php 
            include 'DB_connect.php';
            $sel="SELECT *  FROM `book` WHERE `pub_status`='Published' LIMIT 10 ";

            $mys = mysqli_query($conn,$sel);

            while($raw=mysqli_fetch_assoc($mys))
            {

            ?>
               <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="course-item bg-light">
                        <div class="position-relative overflow-hidden" style="text-align: center;">
                            <img class="img-fluid" style="max-width: 200px" src="Upload/<?php echo $raw['b_img']; ?>" alt="">
                            <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                                <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3 border-end" style="border-radius: 30px 0 0 30px;">View More</a>
                                <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0;">By Now</a>
                            </div>
                        </div>
                        <?php 
                        $idme = $raw['book_id'];
                            $fac="SELECT * FROM `rating` WHERE `book_id`='$idme'";
                    $fa=mysqli_query($conn,$fac);
                    $counts=mysqli_num_rows($fa);
                    if ($counts>0) {
                        // code...

                        $trate=0;
                        while($ro=mysqli_fetch_assoc($fa)){

                            $trate=$ro['rate']+$trate;
                            


                        }
                        
                            $total=$counts*5;
                        
                            $avg=($trate/$total)*5;
                            
                    }
                    else{

                            $avg="No rating";
                    }


                        ?>
                        <div class="text-center p-4 pb-0">
                            <h3 class="mb-0">Rs.<?php echo $raw['rent_price']; ?></h3>
                            <div class="mb-3">
                                <?php  

                                if ($avg>0) {
                                    // code...

                                        $i=0;
                                        while($avg>$i){
                                            
                                            echo "<img src='Assets/star.jpg' width='20px'>";
                                            $i=$i+1;

                                        }
                                        
                                    }
                                ?> 
                               
                                
                            </div>

                            <h5 class="mb-4"><?php echo $raw['b_name']; ?></h5>
                        </div>
                       <!--  <div class="d-flex border-top">
                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-user-tie text-primary me-2"></i><?php echo $raw['b_author']; ?></small>
                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-clock text-primary me-2"></i>1.49 Hrs</small>
                            <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>30 Students</small>
                        </div> -->
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- Courses End -->


        

    <?php include 'footer.php'; ?>