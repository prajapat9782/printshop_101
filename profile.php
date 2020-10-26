<?php include('header.php'); ?>
<!-- style -->
<style>
    #profile-page .profile-top{
        padding-top:10rem;
    }
    #profile-page .profile-main{
        margin:100px auto;
        text-align:center;
    }
    #profile-page .profile-title{
        text-transform:uppercase;
        color: #4e979a;
        font-weight:700;  
        letter-spacing: 2px;
    }
    .profile-card{
        height:auto;
    }
    .user-image{
        max-width:50px;        
        border:1px solid #ccc;
        position:absolute;
        top:20%;
        left:30%;
    }
    .user-image img{
        width:50px;        
        border-radius:50%
    }
    .profile-block{
        margin: 30px auto;
    }
    /* profile-left style */
    .profile-left{
        margin:0px 10px;
        /* border:2px solid red; */
        box-shadow:0 2px 3px #ccc;
        padding:30px 0px;
    }
    .profile-left h4{
        margin-bottom:35px;
        margin-top:10px;
        /* padding:10px auto; */
        padding:0px
        font-size:23px;
        font-weight:600;
        text-transform:uppercase;
    }
    .profile-left .profile-img{
        /* max-width:65px; */
        
        margin:0 auto;        
    }
    .profile-left .profile-img img{
        border-radius: 50%;
        width:85px
    }
    .profile-left .user-personal{
        margin:20px auto;
        color:#757373;     
        border-bottom:1px dashed #969191;   
    }
    .profile-left .user-personal h5{
        margin-bottom:0;
        font-weight:600;
        font-size:18px;
        padding-bottom:0;
    }
    .profile-left .user-personal p{
        color:#887b7b;        
    }
    .profile-left .account-urls{
        width:100%;
        list-style:none;
        margin-bottom:0px;        
    }
    .profile-left .account-urls li{
        margin: 10px auto;
        padding:10px 0;
        line-height:25px;
        width:100%;
        
    }
    .profile-left .account-urls li a{
        width:100%;
    }
    /* .profile-left .account-urls li:last-child{        
        border-bottom:2px solid rgba(0,0,0,0.1);
    } */
    .profile-left .account-urls li:hover{
        border-left:3px solid #ccc;
        border-bottom:2px solid rgba(0,0,0,0.1);
    }
    /* profile-right style */
    .profile-right{        
        margin:0px 10px;
        /* border:2px solid red; */
        box-shadow:0 2px 3px #ccc;
        padding: 25px 0px 60px 0px;
    }
    .profile-right h4{
        margin:0 0 20px 15px;
        /* margin-bottom:35px; */
        text-align:left;
        font-size:18px;
        color:#000;
        font-weight:600;
        text-transform:uppercase;
    }
    .profile-right h4 #edit-button{
        color:#0d6cfb;
        font-size:18px;
    }
    .profile-right h4 #edit-button a{
        color:#0d6cfb;
    }
    .profile-right .personal-info{
        width:100%;        
    }
    .profile-right input[type='text'],input[type='email']{
        padding:8px;
        margin:0px 12px;
        margin-bottom:10px;
        outline:none;    
        width:85%;    
        border:1px solid #ccc;
        color: #868484;
        font-size:15px;
        /* float:left; */
        border-radius:4px;
    }
    /* .profile-right input[type='text']{
        float:left;
    } */
    .profile-right .gender-info{
        clear:both;
        width:100%;
        margin:15px 15px;
        text-align: left;
    }
    .profile-right .gender-info .gender-label{
        width:100%;
    }
    .profile-right .gender-info input[type='radio']{
        margin:0 10px;
    }
    .email-div{
        width:100%;
        margin:10px 0px;
    }
    .mobile-div{
        width:100%
    }
    .mobile-div {
        width:100px;
        margin-bottom:15px
    }    
    #chage-pass{
        margin:10px 15px;
        padding-top:10px;
        text-align:right;
    }
    #changePass{
        color:#7575f5;
        font-size:18px;
        text-decoration:underline;
    }
    #passModal{
        max-width:50%;
        /* background:#ecefed; */
    }
    #passModal input[type='password']{
        width:90%;
        padding:10px;
        margin:15px 25px;
        outline:none;
        border-radius:6px;
        border:1px solid rgba(0,0,0,0.1);
        box-shadow: 1px 2px 3px #ccc;
    }
    #passModal button{
        width:90%;
        /* padding:5 */
        margin:auto 25px;
        font-size:16px;
        text-transform:uppercase;
    }
    #passModal input:focus {       
        border:1.5px solid rgba(0,0,0,0.3);
    }
    #change-heading{
        color:rgba(0,0,0,0.7);
        font-weight:600;
        font-size:20px;
    }
</style>

<!-- profile order form start -->
<section id="profile-page">
    <div class="profile-top"></div>
    
    <div class="container profile-main">
            <h1 class="profile-title"><u ></u></h1>
            <div class="row profile-block">
                <div class="col-md-4 col-sm-6 col-xs-12">                     
                    <div class="profile-left">
                        <h4 class="profile-name">profile</h4>
                        <div class="profile-img">
                            <img src="img/user.jpg" alt="">
                        </div>
                        <div class="user-personal">
                            <h5>Vishal</h5>
                            <p>nick name</p>
                        </div>
                        <div class="account-urls">
                            <ul class="urls">
                                <li class="urls-items">
                                    <a href="javascript:void(0)">My Orders</a>
                                </li>
                                <li class="urls-items">Account Setting</li>
                                <li class="urls-items">Payments</li>
                                <li class="urls-items">My Notification</li>
                                <li class="urls-items">Logout</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-sm-6 col-xs-12">
                    <div class="profile-right">
                        <?php 
                            $user_id = $_SESSION['user']['login_id'];
                            $userData = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `user` WHERE id = '$user_id' "));
                        ?>
                        <form method="POST">
                            <p id="update-success" style="color:#258e30;font-size:15px"></p>
                            <p id="update-error" style="color:#ff8d8d;font-size:15px"></p>
                            
                            <h4>Personal information </h4>
                                <div class="personal-info">
                                    <input type="text" name="fname" value="<?php echo $userData['fname']?>" placeholder="Enter your first name">
                                    <input type="text" name="lname" value="<?php echo $userData['lname']?>" placeholder="Enter your last name">
                                </div>
                                <!-- <div class="gender-info">
                                    <label for="gender" class="gender-label">Your Gender</label>
                                    <input type="radio" name="gender" id="" value="male"> <label for="">Male</label>
                                    <input type="radio" name="gender" id="" value="female"> <label for="">Female</label>
                                </div> -->
                                <div class="email-div">
                                    <h4>Email Address</h4>
                                    <input type="email" name="email" id="" value="<?php echo $userData['email']?>" >
                                </div>
                                <div class="email-div">
                                    <h4>Mobile Number</h4>
                                    <input type="text" name="phone" id="" value="<?php echo $userData['mobile']?>" >
                                </div>
                                <div id="chage-pass">
                                    <a href="javascript:void(0)" id="changePass">Change password</a>
                                </div>
                                <button class="btn btn-primary btn-change" type="submit" name="profileUpdate">Submit Update</button>
                        </form>
                    </div>
                </div>
            </div>
    </div>
    <!-- password modal start -->
    <!-- Modal -->
        <div class="modal fade" id="password-change" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <!-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> -->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <div class="row">
                   <!-- <div class="col-5">
                      .
                   </div> -->
                  <div class="container">
                 
                       <h5 id="change-heading">Change Password</h5>
                        <div id="passModal">
                                
                                <input type="password" name="oldpass" id="oldpass" placeholder="Current Password" required>
                                <label  style="color:#ff8d8d;font-size:13px" id="oldError" ></label>
                                
                                <input type="password" name="pass" id="pass" placeholder="New Password" required>
                                <label  style="color:#ff8d8d;font-size:13px" id="newError" ></label>
                                
                                <input type="password" name="conpass" id="conpass" placeholder="Retype New Password" required>   
                                <label  style="color:#ff8d8d;font-size:13px" id="misError" ></label>
                                <label  style="color:#84c325;;font-size:13px" id="success" ></label>

                                <button class="btn btn-primary my-2" id="change-btn">change password</button>                    
                        </div>
                 
                  </div>
               </div>
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div> -->
            </div>
        </div>
        </div>
    <!-- password modal end -->
</section>
<hr>
<!-- profile order form end -->
<?php include('footer.php');  ?>
<script>
    $(document).ready(function(){
        $('#changePass').click(function(){
            $('#password-change').modal('show');
        })
        $('#change-btn').click(function(){
            
            $('#oldError').html('');
            $('#newError').html('');
            $('#misError').html('');
            $('#oldpass').css('border','1px solid rgba(0,0,0,0.1)');
            $('#pass').css('border','1px solid rgba(0,0,0,0.1)');
            $('#conpass').css('border','1px solid rgba(0,0,0,0.1)');

            var oldpass = $('#oldpass').val();
            var pass = $('#pass').val();
            var conpass = $('#conpass').val();
            var isChange = true;
            if(oldpass==''){
                $('#oldError').html('Please fill out this field.');
                $('#oldpass').css('border','1px solid #ff8d8d');
                isChange = false;
            }
            if(pass==''){
                $('#newError').html('Please fill out this field.');
                $('#pass').css('border','1px solid #ff8d8d');
                isChange = false;
            }
            if(conpass==''){
                $('#misError').html('Please fill out this field.');
                $('#conpass').css('border','1px solid #ff8d8d');
                isChange = false;
            }
            if(pass!=conpass){                
                $('#misError').html('Password change failed. New Passwords do not match');
                $('#conpass').css('border','1px solid #ff8d8d');
                isChange = false;
            }
            if(pass.length<=4){
                $('#newError').html('password grether than 4 charactor.');
                $('#pass').css('border','1px solid #ff8d8d');
                isChange = false;
            }
            
            
            if(isChange){
                $.ajax({
                    url:'passChange.php',
                    method:'POST',
                    data:{oldpass:oldpass,pass:pass},
                    success:function(res){
                        var data = JSON.parse(res);
                        if(data.code==201){
                            $('#oldError').html(data.message);
                            $('#oldpass').css('border','1px solid #ff8d8d');
                        }else if(data.code==200){
                            alert(data.message);
                            window.location.href = window.location.href; 
                            // $('#success').html(data.message);
                        }
                    }
                });
            }
        });
        
    });
</script>
<?php
if(isset($_POST['profileUpdate'])){
    extract($_POST);    
   $res = mysqli_query($conn, "UPDATE `user` SET `fname`='$fname',`lname`='$lname', `email`='$email',`mobile`='$phone' WHERE id = $user_id");
   if($res){    
    $_SESSION['profile']['success']='Profile Update Successfully';
    ?><script>document.getElementById('update-success').innerHTML = 'Profile Update Successfully';</script><?php
   }else{
    $_SESSION['profile']['error']='Something Went Wrong';
    ?><script>document.getElementById('update-error').innerHTML = 'Something Went Wrong';</script><?php
   }
}

?>