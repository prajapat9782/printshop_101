<?php include('header.php');
  if(isset($_SESSION['user']['login'])){ ?>
    <script>window.location.href='index.php';</script>
<?php  }

?>

 <!-- Cart view section -->
 <section id="aa-myaccount">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
        <div class="aa-myaccount-area">         
            <div class="row">
                <div class="col-md-6">
                  <div class="aa-myaccount-register">                 
                  <h4>Register</h4>
                  <form id="register_user" method="POST" class="aa-login-form">
                  <p id="register_error" style="color:red;margin-bottom:5px"></p>  
                    <!-- name details start -->
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          
                          <label for="">First Name<span>*</span></label>
                          <input type="text" id="register_fname" class="form-control" placeholder="First Name">
                          <label style="color:red;margin:2px 0;"  class="clear-all" id="reg_fname_error"></label>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="">Last Name<span>*</span></label>
                          <input type="text" id="register_lname" class="form-control" placeholder="Last Name">
                          <label style="color:red;margin:2px 0;" class="clear-all"  id="reg_lname_error"></label>
                        </div>
                      </div>
                    </div>
                    <!-- nam details end -->
                    <div class="form-group">
                      <label for="">Mobile No</label>
                      <input type="text" id="register_mobile" class="form-control" placeholder="Mobile No">
                      <label style="color:red;margin:2px 0;" class="clear-all" id="reg_mobile_error"></label>
                    </div>
                    <div class="form-group">
                      <label for="">Email</label>
                      <input type="email" id="register_email" class="form-control" placeholder="Email">
                      <label style="color:red;margin:2px 0;" class="clear-all" id="reg_email_error"></label>
                    </div>
                    <div class="form-group">
                      <label for="">Password</label>
                      <input type="password" id="register_pass" class="form-control" placeholder=" Password">
                      <label style="color:red;margin:2px 0;" class="clear-all" id="reg_pass_error"></label>
                    </div>
                    <div class="form-group">
                      <label for="">Confirm Password</label>
                      <input type="password" id="register_pass_con" class="form-control" placeholder="Confirm Password">
                      <label style="color:red;margin:2px 0;" class="clear-all" id="reg_con_pass_error"></label>
                      <!-- <label style="color:red;margin:2px 0;" class="clear-all" id="reg_same_error"></label> -->
                    </div>

                    <button class="btn btn-primary">Register</button>
                    </form>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="aa-myaccount-login">
                  <h4>Login</h4>
                  <form  id="login_form" method="POST" class="aa-login-form">
                  <p id="login_error" style="color:red;margin-bottom:5px"></p>  
                    <label for="">Username or Email address<span>*</span></label>
                    <input type="email" id="login_email" class="form-control"  placeholder="Username or email" required>                    
                    <label for="">Password<span>*</span></label>
                    <input type="password" id="login_password" class="form-control" placeholder="Password" required>                      
                      <!-- <a href="#" style="color:blue">reset password?</a><br> -->
                      <!-- <button   onclick="user_login()" class="aa-browse-btn">Login</button> <br><br> -->
                      <button class="btn btn-primary"  id="login_form">Login</button>
                      <!-- <label class="rememberme" for="rememberme"><input type="checkbox" id="rememberme"> Remember me </label> -->
                      
                      <hr>
                    </form>
                  </div>
                </div>
            </div>          
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->

 <?php include('footer.php');?>

 <?php 
//  if(isset($_POST['register'])){
//    extract($_POST);
//    print_r($_POST);
//    die;
//  }
//  if(isset($_POST['login'])){
//    extract($_POST);
//    echo $_POST['username'];
//    echo md5($_POST['password']);
   
//    die;
//  }
 ?>