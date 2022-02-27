<?php include 'header.php'; ?>


<!-- Contact Start -->
    <div class="container-xxl py-5" style="text-align: center;">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                
                <h1 class="mb-5">Login Here</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    
                </div>
                
                <div class="col-lg-4 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                    <form action="login_action.php" method="post">
                        <div class="row g-3">
                            <div class="col-12">
                                <div class="form-floating"> 
                                    <input type="email" class="form-control" name="user" id="name" required placeholder="Your Name">
                                    <label for="name">Email</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="Password" class="form-control" name="pass" id="pass" required placeholder="Your Email">
                                    <label for="pass">Password</label>
                                    <small style="display: none;" class="showPasswordToggle">SHOW</small><span style="padding-left: 390px;"><img style="position: absolute;right: 17px;transform: translate(0,-60%);top:45%;" class="imageass" width="20px" src="Assets/img/eye.png"></span>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" name="login" type="submit">Sign In</button>
                            </div>
                            <a href="register.php"><label style="color: black;">New account?</label> Create account</a>
                            <a href="password_reset.php"><label style="color: black;">Forgot your password?</label> Reset</a>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        
        const showPasswordToggle=document.querySelector(".showPasswordToggle");
            const imageasshow=document.querySelector(".imageass");

const passwordField =document.querySelector("#pass");


const handleToogleInput=(e)=>{
    if(showPasswordToggle.textContent==='SHOW'){
        showPasswordToggle.textContent="HIDE";
        imageasshow.src="Assets/img/hide.png";

        passwordField.setAttribute("type", "text");
    }
    else{
        imageasshow.src="Assets/img/eye.png";
        showPasswordToggle.textContent="SHOW";
        passwordField.setAttribute("type", "password");
    }


}

imageasshow.addEventListener('click',handleToogleInput);

    </script>
    <!-- Contact End -->

    <?php include 'footer.php'; ?>