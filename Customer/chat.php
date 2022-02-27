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
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<style type="text/css">

*{
  font-family: 'Nunito', sans-serif;
}
    .container{max-width:670px; margin:auto;}
img{ max-width:100%;}
.inbox_people {
  background: #484545 none repeat scroll 0 0;
  float: left;
  overflow: hidden;
  width: 100%; border-right:1px solid #000000;

}
.inbox_msg {
  border: 1px solid #050101;
  clear: both;
  overflow: hidden;
  background-color: #a5a3a3;
  border-radius: 10px;
}
.top_spac{ margin: 20px 0 0;}


.recent_heading {float: left; width:100%;}
.srch_bar {
  display: inline-block;
  text-align: right;
  width: 60%; padding:
}
.headind_srch{ padding:10px 29px 10px 20px; overflow:hidden; border-bottom:1px solid #090202;}

.recent_heading h4 {
  color: #05728f;
  font-size: 21px;
  margin: auto;
}
.srch_bar input{ border:1px solid #cdcdcd; border-width:0 0 1px 0; width:80%; padding:2px 0 4px 6px; background:none;}
.srch_bar .input-group-addon button {
  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
  border: medium none;
  padding: 0;
  color: #070202;
  font-size: 18px;
}
.srch_bar .input-group-addon { margin: 0 0 0 -27px;}

.chat_ib h5{ font-size:15px; color:#464646; margin:0 0 8px 0;}
.chat_ib h5 span{ font-size:13px; float:right;}
.chat_ib p{ font-size:14px; color:#989898; margin:auto}
.chat_img {
  float: left;
  width: 11%;
}
.chat_ib {
  float: left;
  padding: 0 0 0 15px;
  width: 88%;
}

.chat_people{ overflow:hidden; clear:both;}
.chat_list {
  border-bottom: 1px solid #c4c4c4;
  margin: 0;
  padding: 18px 16px 10px;
}
.inbox_chat { height: 550px; overflow-y: scroll;}

.active_chat{ background:#ebebeb;}

.incoming_msg_img {
  display: inline-block;
  width: 6%;
}
.received_msg {
  display: inline-block;
  padding: 0 0 0 10px;
  vertical-align: top;
  width: 92%;
 }
 .received_withd_msg p {
  background: #484545 none repeat scroll 0 0;
  border-radius: 3px;
  color: #fff;
  font-size: 17px;
  margin: 0;
  padding: 5px 10px 5px 12px;
  width: 100%;
}
.time_date {
  color: #fff;
  display: block;
  font-size: 13px;
  margin: 8px 0 0;
}
.received_withd_msg { width: 57%;}
.mesgs {
  float: left;
  padding: 30px 15px 0 25px;
  width: 90%;
}

 .sent_msg p {
  background: #2e7c47; none repeat scroll 0 0;
  border-radius: 3px;
  font-size: 17px;
  margin: 0; color:#fff;
  padding: 5px 10px 5px 12px;
  width:100%;
}
.outgoing_msg{ overflow:hidden; margin:26px 0 26px;}
.sent_msg {
  float: right;
  width: 46%;
}
.input_msg_write input {
  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
  border: medium none;
  color: #4c4c4c;
  font-size: 15px;
  min-height: 48px;
  width: 100%;
}

.type_msg {border-top: 1px solid #c4c4c4;position: relative;}
.msg_send_btn {
  background: #11cbd7; none repeat scroll 0 0;
  border: medium none;
  border-radius: 50%;
  color: red;
  cursor: pointer;
  font-size: 17px;
  height: 33px;
  position: absolute;
  right: 10;
  top: 9px;
  width: 33px;
}
.messaging { padding: 0 0 50px 0;}
.msg_history {
  height: 516px;
  overflow-y: auto;
}
    </style>


<?php 

if(isset($_GET['req_id']))
{

  $req_id = $_GET['req_id'];
}
    else{
      echo "<script>window.location='by_index.php'</script>";
    }

include '../DB_connect.php';
            $query = "select b.login_id, r.name from book_request br,book b,register r where br.req_id='$req_id' and br.book_id=b.book_id and r.login_id=b.login_id";
            $result = mysqli_query($conn, $query);
            
            $data = mysqli_fetch_assoc($result);
            


?>


        <section class="popular-course-area section-gap">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-70 col-lg-8">
							<div class="title text-center">
<!-- {#								<h1 class="mb-10">Chat With Your Group Members</h1>#}
{#								<p>MEMBERS</p>#} -->
							</div>
						</div>
					</div>


<!-- {#    <h3 class=" text-center">MESSAGE YOUR GROUP MEMBERS</h3>#} -->

<div class="messaging">
      <div class="inbox_msg">
        <div class="inbox_people">
          <div class="headind_srch">
            <div class="recent_heading">
              <!-- <div style="display: inline-flex;"><i class="material-icons" style="font-size:26px">arrow_back</i></div> -->
              <div style="display: inline-flex;"><img src="../Assets/avatar.png" style="vertical-align: middle;border-radius: 50%;width: 40px;height: 40px;"></div>
              <div><h4><a href="" style="text-decoration: none;display: inline-flex;position: absolute;transform: translate(0,-140%);left: 830px;color: white;"><?php echo $data['name']; ?></a></h4></div>
            </div>
          </div>
        </div>
        <div class="mesgs">
          <div class="msg_history" id="scroll" >

              <?php 

                $chat_sql = "select * from chat where req_id='$req_id'";

                $chat = mysqli_query($conn,$chat_sql);

                while($chat_data = mysqli_fetch_assoc($chat))
                {
                  if ($chat_data['sender_id']==$myid) {
                    // code...
                  
              ?>
            
                
                    <div class="outgoing_msg">
                        <div class="sent_msg">
                            <span class="time_date">Me</span>
                            <p><?php echo $chat_data['message'] ?></p>
                            <span class="time_date"><?php echo $chat_data['date_of_post'] ?></span>
                        </div>
                    </div>
               <?php }else{ ?>
                    <div class="incoming_msg">
<!-- {#                        <div class="incoming_msg_img">  </div>#} -->
                        <div class="received_msg">
                            <div class="received_withd_msg">
                                <span class="time_date"><?php echo $data['name']; ?></span>
                                <p><?php echo $chat_data['message'] ?></p>
                                <span class="time_date"><?php echo $chat_data['date_of_post'] ?></span>
                            </div>
                        </div>
                    </div>
                <?php }} ?>

          </div>
          <div class="type_msg">
            <div class="input_msg_write">

                <form method="post" action="chat_action.php">
                   
                  <input type="text" name="message" style="color: white;background-color: #484545;border-radius: 50px;font-size: 18px;" required class="write_msg" placeholder="Type a message" autocomplete="off" />
                <input type="hidden" name="send_id"  value="<?php echo $data['login_id']; ?>"/>
                <input type="hidden" name="myid"  value="<?php echo $myid; ?>"/>
                <input type="hidden" name="req"  value="<?php echo $req_id; ?>"/>

                  <button class="msg_send_btn" style="position: absolute;transform: translate(0,-10%);left: 500px;top: 10px;" name="chat" type="submit"><i class="fas fa-paper-plane" style="color: #484545;" aria-hidden="true"></i></button>
                </form>
            </div>

          </div>
        </div>
      </div>
    </div>
<!-- {#</div>#} -->
    <script>
        setInterval(updateScroll,10000);
        var scrolled = false;
        function updateScroll(){
            if(!scrolled){
                var element = document.getElementById("scroll");
                element.scrollTop = element.scrollHeight;
            }
        }
        $("#scroll").on('scroll', function(){
            scrolled=true;
        });

    </script>
                </div>
    </section>

<?php 

    
}
else
{
  header('location:../index.php');
}
?>


