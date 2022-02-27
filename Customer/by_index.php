<?php
session_start();

if ($_SESSION['id'])
{

$myid = $_SESSION['id'];

?>
<?php 
include 'main_header.php';
 include 'by_head.php'; 
?>


<!-- Header Start -->
<!--     <div class="container-fluid bg-primary py-5 mb-5 page-header" style="background-image: url(Assets/img/book.jpg);">
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
    </div> -->

    


    <div class="container-xxl py-5" style="text-align: center;">

        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                
                <h1 class="mb-5">Book Advanced Search</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <form action="" method="post" name="advance_search_submit" enctype="multipart/form-data" value="<?php echo $advance_search_submit; ?>">
                        <div class="row g-3">
                            
                            
                            <div class="col-12">
                                <div class="form-floating">
                                    <!-- <textarea class="form-control" name="addr"  required placeholder="Leave a message here" id="message" style="height: 150px"></textarea> -->
                                    <select class="form-control" name="search[cat]"   placeholder="Select Category" id="message">
                                        
                                        <option value="">--------</option>
                                        <option value="Fiction" >Fiction</option>
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
                                    <select class="form-control" name="search[mode]" id="mode"  placeholder="Select Book Mode" id="message">
                                        
                                        <option value="">--------</option>
                                        <option value="Hard Copy">Hard Copy</option>
                                        <option value="Soft Copy">Soft Copy</option>
                                        
                                        </select>  
                                 <label for="message">Select Mode</label>
                                </div>
                            </div>
                            
                            
                            
                            <!-- <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" name="pub" type="submit">Search By Rating</button>
                            </div> -->
                            
                        </div>
                    <!-- </form> -->
                    
                </div>
                
                <div class="col-lg-4 col-md-12 wow fadeInUp" style="" data-wow-delay="0.5s">
                    <!-- <form action="" method="post" enctype="multipart/form-data"> -->
                        <div class="row g-3">
                            <div class="col-12">
                                <div class="form-floating">

                                    <input type="text" class="form-control" name="search[with_any_one_of]"   id="name" placeholder="Your Name">
                                    <label for="name">Book title ,author ,etc..</label>
                                </div>
                            </div>
                            
                            
                            
                            
                            <div class="col-12">
                                <label>Price Range</label>
                                <div class="form-floating">

                                    <input type="range"  onchange="Result1()" value="100" name="search[price1]" id="value1" max="10000" min="10" list="tickmarks">
                                   
                                    
                                    <input type="range"  style="display: inline;" value="500" onchange="Result2()" name="search[price2]" id="value2" max="10000" min="10" list="tickmarks">
                                   <br>
                                    <label style="position: relative;" id="result1">0</label> to <label style="position: relative;" id="result2">0</label>
                                </div>
                            </div>
                            <script type="text/javascript">
                                function Result1() {

                                    const selectElement = document.getElementById('value1').value;

                                    
                                    document.getElementById('result1').innerHTML = selectElement;
                                    
                                }
                                function Result2() {

                                    const selectElement = document.getElementById('value2').value;

                                    
                                    document.getElementById('result2').innerHTML = selectElement;
                                    
                                }
                                

                                
                            </script>
                            
                            
                            <!-- <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" name="pub" onclick="Result1()" type="submit">Search</button>
                            </div> -->
                            
                        </div>
                    <!-- </form> -->
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <!-- <form action="" method="post" enctype="multipart/form-data"> -->
                        <div class="row g-3">
                            
                            
                            
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" name="search[user]"  class="form-control" id="subject" placeholder="User name">
                                    <label for="subject">User name</label>
                                </div>
                            </div>
                            <!-- <div class="col-12">
                                <div class="form-floating">
                                    <select class="form-control" name="" id=""  placeholder="Select rating" id="message">
                                        
                                        <option value="">--------</option>
                                        <option value="Hard Copy">Hard Copy</option>
                                        <option value="Soft Copy">Soft Copy</option>
                                        
                                        </select>  
                                 <label for="message">Sort Result By</label>
                                </div>
                            </div> -->
                            
                            
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" name="btn" type="submit">Search Book</button>
                            </div>
                            
                        </div>
                    </form>
                    
                </div>
                
            </div>
        </div>
    </div>


    

<?php 
include '../DB_connect.php';
$my_array = array();
$count=0;
$sect=0;
function distance($lat1, $lon1, $lat2, $lon2, $unit) 
{
  if (($lat1 == $lat2) && ($lon1 == $lon2)) {
    return 0;
  }
  else {
    $theta = $lon1 - $lon2;
    $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
    $dist = acos($dist);
    $dist = rad2deg($dist);
    $miles = $dist * 60 * 1.1515;
    $unit = strtoupper($unit);

    if ($unit == "K") {
      return ($miles * 1.609344);
    } else if ($unit == "N") {
      return ($miles * 0.8684);
    } else {
      return $miles;
    }
  }
}
if (isset($_POST['btn'])) {

    $my_sql = "SELECT * FROM register WHERE login_id='$myid'";

    $my_query = mysqli_query($conn,$my_sql);

    $my_raw=mysqli_fetch_assoc($my_query);

    $my_lat = $my_raw['latitude'];

    $my_lng = $my_raw['longitude'];


    $other_sql = "SELECT * FROM register WHERE  login_id NOT LIKE '".$myid."'";

    $other_query = mysqli_query($conn,$other_sql);

    while($other_raw=mysqli_fetch_assoc($other_query))
    {
        $other_lat = $other_raw['latitude'];

        $other_lng = $other_raw['longitude'];

        $other_id = $other_raw['login_id'];

        

        // if(distance($my_lat, $my_lng, $other_lat, $other_lng, "K") < 10)
        // {

          $with_any_one_of = "";
            $with_the_exact_of = "";
            $without = "";
            $starts_with = "";
            $search_in = "";
            $advance_search_submit = "";
            
            $queryCondition = "";
            if(!empty($_POST["search"])) {
                // $advance_search_submit = $_POST["advance_search_submit"];
                foreach($_POST["search"] as $k=>$v){
                    if(!empty($v)) {

                        $queryCases = array("with_any_one_of","cat","mode","price1","price2","user");
                        if(in_array($k,$queryCases)) {
                            if(!empty($queryCondition)) {
                                $queryCondition .= " AND ";
                            } else {
                                $queryCondition .= " WHERE ";
                            }
                        }
                        switch($k) {
                            case "with_any_one_of":
                                $queryCondition .= "(b.b_name LIKE '%" . $v . "%' OR b.b_author LIKE '%" . $v . "%')";
                                
                                break;
                            case "cat":
                                
                                    $queryCondition .= "(b.b_cat LIKE '%" . $v . "%')";
                                
                                break;
                            case "mode":
                                
                                    $queryCondition .= "(b.mode_status LIKE '%" . $v . "%')";
                                
                                break;
                            case "price1":
                                    
                                    $queryCondition .= "(b.b_price BETWEEN '" . $v . "'";
                                
                                
                                break;
                            case "price2":
                                    
                                    $queryCondition .= "'" . $v . "')";
                                
                                
                                break;
                            case "user":
                                $queryCondition .= "(r.name LIKE '%" . $v . "%')";
                                break;
                        }
                    }
                }
            }
            $orderby = " ORDER BY id desc"; 
            $sql = "SELECT * FROM book b,register r " . $queryCondition . "AND (b.pub_status='Published' AND b.rent_status='In') AND r.login_id=".$other_id." AND b.login_id=".$other_id."";
            $result = mysqli_query($conn,$sql);
            // echo $sql;
            array_push($my_array, $sql);
            

            $count=mysqli_num_rows($result);
            if ($count>0) {
                // code...
                $_SESSION['search']='1';
                $sect = $sect+1;
            }
            
        // }


            
    }
    if ($sect==0) {
        // code...
        $_SESSION['empty']='1';
    }
}
if(isset($_SESSION['empty']))
{
echo '<div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                
                <h1 class="mb-5">Books are not available</h1>
            </div>   </div>
        </div>
    </div>';
unset($_SESSION['empty']);
}
if (isset($_SESSION['search'])) {
    // code...

 ?>
    <!-- Courses Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Books</h6>
                <h1 class="mb-5">Books Available</h1>
            </div>
            <div class="row g-4 justify-content-center">
                <?php 
                $wordsCount = count($my_array);
                
                        for($is=0;$is<$wordsCount;$is++) {
           
            $sel=$my_array[$is];
            

            $mys = mysqli_query($conn,$sel);

            while($raw=mysqli_fetch_assoc($mys))
            {
                $ot_id = $raw['login_id'];

                $other_sql1 = "SELECT * FROM register WHERE  login_id='$ot_id'";

                $other_query1 = mysqli_query($conn,$other_sql1);

                $other_raw1=mysqli_fetch_assoc($other_query1);
                $other_lat1 = $other_raw1['latitude'];

                $other_lng1 = $other_raw1['longitude'];

                $dist = distance($my_lat, $my_lng, $other_lat1, $other_lng1, "K");

            ?>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="course-item bg-light">
                        <div class="position-relative overflow-hidden" style="text-align: center;">
                            <img class="img-fluid" style="max-width: 200px" src="../Upload/<?php echo $raw['b_img']; ?>" alt="">
                            <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                                <?php if($raw['mode_status']=='Soft Copy'){ ?>
                                <a href="../Upload/<?php echo $raw['soft_copy_file']; ?>" download class="flex-shrink-0 btn btn-sm btn-primary px-3 border-end" style="border-radius: 30px 30px;background-color: #ff5e00;">Download Now</a>
                                <?php }else{
                                 ?>
                                 <a href="book_more.php?book_id=<?php echo $raw['book_id']; ?>&dist=<?php echo round($dist); ?>" target="_blank" class="flex-shrink-0 btn btn-sm btn-primary px-3 border-end" style="border-radius: 30px 0 0 30px;background-color: #ff5e00;">View More</a>
                                
                                
                                <a href="request_action.php?book_id=<?php echo $raw['book_id']; ?>" class="flex-shrink-0 btn btn-sm btn-primary px-3 border-end" style="border-radius: 0 30px 30px 0;background-color: #ff5e00;">Sent Request</a>
                            <?php } ?>
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
                                            
                                            echo "<img src='../Assets/star.jpg' width='20px'>";
                                            $i=$i+1;

                                        }
                                        
                                    }
                                ?> 
                               
                                
                            </div>

                            <h5 class="mb-4"><?php echo $raw['b_name']; ?></h5>
                        </div>
                        <div class="d-flex border-top">
                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-user-tie text-primary me-2"></i><?php echo $raw['b_author']; ?></small>
                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-clock text-primary me-2"></i><?php echo $raw['b_cat']; ?></small>
                            <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i><?php echo $raw['b_isbn']; ?></small>
                        </div>
                    </div>
                </div>

            <?php }
        } ?>
            </div>
        </div>
    </div>
    <?php }unset($_SESSION['search']); ?>


<?php 
    include 'footer.php';
}
else
{
  header('location:../index.php');
}
?>