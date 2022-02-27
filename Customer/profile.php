<?php
session_start();

if ($_SESSION['id'])
{


?>
<?php 
include 'main_header.php';

?>
<!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="sales_index.php" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="m-0 text-primary"><i class="fa fa-book me-3"></i>reBook</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="choose_home.php" class="nav-item nav-link active">Home</a>
                
                
               <a href="logout.php" class="nav-item nav-link">Logout</a>
            </div>
            <a href="" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Join Now<i class="fa fa-arrow-right ms-3"></i></a>
        </div>
    </nav>
    <!-- Navbar End -->

  <?php
                        include '../DB_connect.php';
                         $id=$_SESSION['id'];
                        $sel="SELECT * FROM register,login WHERE login.login_id='$id' and register.login_id='$id'";
                        $res=mysqli_query($conn,$sel);
                        $row=mysqli_fetch_assoc($res);
                        ?>

<!-- Contact Start -->
    <div class="container-xxl py-5" style="text-align: center;">

        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                
                <h1 class="mb-5">Profile</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    
                </div>
                
                <div class="col-lg-4 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                    <form action="update_profile.php" method="post" enctype="multipart/form-data">
                        <div class="row g-3">
                            <div class="col-12">
                                <div class="form-floating">

                                    <input type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>" required id="name" placeholder="Your Name">
                                    <label for="name">Your Name</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="email" class="form-control" name="email" value="<?php echo $row['email']; ?>" required id="email" placeholder="Your Email">
                                    <label for="email">Your Email</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" pattern="[6-9]{1}[0-9]{9}" name="phone" value="<?php echo $row['phone']; ?>" required class="form-control" id="subject" placeholder="Your Phone">
                                    <label for="subject">Your Phone</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" name="addr" value="" required placeholder="Leave a message here" id="message" style="height: 150px"><?php echo $row['address']; ?></textarea>
                                    <label for="message">Address</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" name="pass"  required class="form-control" id="pass" placeholder="Enter Password" value="<?php echo $row['password']; ?>">
                                    <label for="pass">Current Password</label>
                                </div>
                            </div>
                        <div class="col-12">
                                <div class="form-floating">
                            <label style="color:white;">Current location</label><br>
                        <input type="hidden" name="lat" id="lat" readonly class="form-control" value="<?php echo $row['latitude'];?>">
                            <input type="hidden" name="lng" id="lng" readonly class="form-control" value="<?php echo $row['longitude'];?>">
                        <div id="mapon" style="width: 500px;height:500px"></div>
                    </div>
                </div>


                        <script type="text/javascript">
                                function initMap() {

                                    var curr_lat = parseFloat(document.getElementById('lat').value);
                                    var curr_lng  = parseFloat(document.getElementById('lng').value);


                          const myLatlng = { lat: curr_lat, lng: curr_lng };
                      
                          const map = new google.maps.Map(document.getElementById("mapon"), {
                            zoom: 15,
                            center: myLatlng,
                          });
                          var latitude = document.getElementById('latitude');
                          
                          map.addListener("click", (mapsMouseEvent) => {

                            var latitude = document.getElementById('latitude');



                            latitude.value = JSON.stringify(mapsMouseEvent.latLng, null, 2);
                            alert('Location Selected Successfully..');
                            return false;

                          });
                        }
                            </script>

                            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD7tc_GW33VVRccZlpKEdIlBdhUaRMV6nM&callback=initMap&v=weekly" async="false" defer></script>
                        <!-- 
                        <script src="https://code.jquery.com/jquery.js"></script> 
                        <script async defer src="https://maps.googleapis.com/maps/api/js?v=3.exp&callback=initMap"></script> -->

                            <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
                            <link rel="stylesheet" type="text/css" href="./style.css" />
                            <script src="./index.js"></script>
                            
                           <input type="hidden" name="location" id="latitude" placeholder="Enter location"  required="" class="form-control">
                           <input type="hidden" name="login_id" value="<?php echo $id ;?>">


                            
                                    
                                    
                                </div>
                            

                            

                            <div class="col-12">
                                <br>
                                <button class="btn btn-primary w-100 py-3" onclick="return check()" name="btn" type="submit">Update</button>
                            </div>
                            
                        </div>
                    </form>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function check() {
            // body...
            if(document.getElementById('latitude').value=='')
            {
                alert('Please select one location');
                return false;
            }
            else{
                
                return true;
            }
        }
    </script>


    
    
    <!-- Contact End -->


<?php 
    include 'footer.php';
}
else
{
  header('location:../index.php');
}
?>


