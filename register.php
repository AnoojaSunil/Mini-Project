<?php include 'header.php'; ?>

  

<!-- Contact Start -->
    <div class="container-xxl py-5" style="text-align: center;">

        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                
                <h1 class="mb-5">Create Account</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    
                </div>
                
                <div class="col-lg-4 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                    <form action="reg_action.php" method="post" enctype="multipart/form-data">
                        <div class="row g-3">
                            <div class="col-12">
                                <div class="form-floating">

                                    <input type="text" class="form-control" pattern="[a-zA-Z\s]+" title="Text only" name="name"  required id="name" placeholder="Your Name">
                                    <label for="name">Your Name</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="email" class="form-control" name="email"  required id="email" placeholder="Your Email">
                                    <label for="email">Your Email</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" pattern="[6-9]{1}[0-9]{9}" name="phone" required class="form-control" id="subject" placeholder="Your Phone">
                                    <label for="subject">Your Phone</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" name="addr"  required placeholder="Leave a message here" id="message" style="height: 150px"></textarea>
                                    <label for="message">Address</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" name="pass"  required class="form-control" id="pass" placeholder="Enter Password">
                                    <label for="pass">Enter Password</label>
                                </div>
                            </div>
            
                            <?php include 'map_one.php'; ?>


                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="hidden" id="latitude" name="loc" value=""  required class="form-control" placeholder="Location">
                                    
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="checkbox" name="terms" value="Terms Accepted" style="float: left;display: inline;" required id="terms" >
                                    
                                </div>
                            </div>
                            <label><a style="float: left;" target="_blank" href="terms.php">Terms & Conditions</a></label>
                            <br>

                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="file" name="up" style="float: left;display: inline;" required id="" accept=".pdf,.jpg,.png">
                                    
                                </div>
                            </div>
                            <label><a style="float: left;" download="" href="Assets/self_declaration.pdf">Download the file and fill it and upload</a></label>
                            <br>

                            <div class="col-12">
                                <br>
                                <button class="btn btn-primary w-100 py-3" onclick="return check()" name="btn" type="submit">Sign Up</button>
                            </div>
                            <a style="display: inline;" href="login.php"><label style="display: inline;color: black;">Already have an account?</label>Login</a>
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

    <?php include 'footer.php'; ?>


