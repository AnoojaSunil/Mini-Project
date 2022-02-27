<?php include 'header.php'; ?>

<?php $us = $_POST['uname']; ?>

<!-- Contact Start -->
    <div class="container-xxl py-5" style="text-align: center;">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                
                <h1 class="mb-5">Change your password </h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    
                </div>
                <script>
                    function check() {
                        
                       
                   if (document.getElementById('pass').value ==
                     document.getElementById('confirm_password').value) {

                     document.getElementById('message').style.color = 'green';
                     document.getElementById('r').style.display = 'block';
                     document.getElementById('message').innerHTML = 'matching';
                   } else {
                     document.getElementById('message').style.color = 'red';
                       document.getElementById('r').style.display = 'none';
                     document.getElementById('message').innerHTML = 'not matching';
                       
                   }
                 }
                     </script>
                
                <div class="col-lg-4 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                    <form action="reset_all.php" method="post">
                        <div class="row g-3">

                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="Password" class="form-control" name="pass" id="pass" required placeholder="Your Email">
                                    <label for="pass">New Password</label>
                                    <small style="display: none;" class="showPasswordToggle">SHOW</small><span style="padding-left: 390px;"><img style="position: absolute;right: 17px;transform: translate(0,-60%);top:45%;" class="imageass" width="20px" src="Assets/img/eye.png"></span>
                                </div>
                            </div>      
                            <input type="hidden" value="<?php echo $us; ?>" name="us">
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="Password" class="form-control" name="copass" oninput="check()" id="confirm_password" required placeholder="Your Email">
                                    <label for="pass">Confirm Password</label>
                                    
                                </div>
                            </div>
                            <a href="" id="message"></a>
                            
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" id="r" name="reset" type="submit">Reset password</button>
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
    <script type="text/javascript">
        
        const showPasswordToggle1=document.querySelector(".showPasswordToggle1");
            const imageasshow1=document.querySelector(".imageass1");

const passwordField1 =document.querySelector("#confirm_password");


const handleToogleInput=(e)=>{
    if(showPasswordToggle1.textContent==='SHOW'){
        showPasswordToggle1.textContent="HIDE";
        imageasshow1.src="Assets/img/hide.png";

        passwordField1.setAttribute("type", "text");
    }
    else{
        imageasshow1.src="Assets/img/eye.png";
        showPasswordToggle1.textContent="SHOW";
        passwordField1.setAttribute("type", "password");
    }


}

imageasshow1.addEventListener('click',handleToogleInput);

    </script>
    <!-- Contact End -->

    <?php include 'footer.php'; ?>