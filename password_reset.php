<?php include 'header.php'; ?>



<!-- Contact Start -->
    <div class="container-xxl py-5" style="text-align: center;">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                
                <h1 class="mb-5">Forgot your password?</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    
                </div>
                
                <div class="col-lg-4 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                    <form action="mail.php" method="post">
                        <div class="row g-3">
                            <div class="col-12">
                                <div class="form-floating"> 
                                    <input type="email" class="form-control" name="user" id="name" required placeholder="Enter your email">
                                    <label for="name">Enter your email</label>
                                </div>
                            </div>
                            
                            
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" name="reset" type="submit">Reset password</button>
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
    <!-- Contact End -->
    <br>
    <br><br><br><br><br>

    <?php include 'footer.php'; ?>