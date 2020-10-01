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
            <h3 class="text-center text-uppercase mt-2 mb-0 font-weight-bold" style="color:red"><?php if(isset($_SESSION['check_out_error'])){echo $_SESSION['check_out_error']; $_SESSION['check_out_error']='';}?></h3>
          <div class="aa-myaccount-area">         
        
            <!-- <div class="row justify-content-md-center">
                <div class="col-md-6 offset-md-4">
                  <div class="aa-myaccount-login">
                  <h4>Affiliate Login</h4>
                  <form method="POST" class="aa-login-form">
                  <p id="login_error" style="color:red;margin-bottom:5px"></p>  
                    <label for="">Email <span>*</span></label>
                    <input type="email" name="email" class="form-control"  placeholder="Email" required>                    
                    <label for="">Password<span>*</span></label>
                    <input type="password" name="pass"  class="form-control" placeholder="Password" required>                      
                      <button class="btn btn-primary" name="aff_login" >Login</button>
                      <hr>
                    </form>
                  </div>
                </div>
            </div>    -->
                   <!--  -->
                   <div class="container  mx-auto" style="padding:15px;margin:20px auto;">
                      <div class="row">
                          <div class="col-md-6">
                            <div class="card justify-content-md-center" style="padding:15px;color:#fff; max-width:600px;background:#0a303c">
                                <div class="card-header">
                                    <h3 class="text-center " style="font-weight:600;color:#fff">Login</h3>
                                </div>
                                <div class="error-box">
                                    <p style="color:#fff;background:red; display:<?php if($_SESSION['log']==''){echo "none";}?>" >
                                        <span class="fa fa-exclamation-triangle" style="margin-right:10px ;padding:10px"></span> 
                                        <?php echo $_SESSION['log']; $_SESSION['log']="";?>
                                    </p>
                                </div>
                                <div class="card-body">
                                <form method="POST" class="aa-login-form">                                     
                                        <label for="">Email <span>*</span></label>
                                        <input type="email" name="email_log" class="form-control"  placeholder="Email" required>                    
                                        <label for="">Password<span>*</span></label>
                                        <input type="password" name="pass_log"  class="form-control" placeholder="Password" required>                      
                                        <button class="btn btn-primary" name="aff_login" >Login</button><br><br>
                                        <hr><br>
                                        </form>
                                </div>
                                <div class="card-footer">
                                <button class="btn btn-block btn-primary"  style="font-weight:500;color:#fff">
                                <span class="fa fa-facebook" style="margin-right:10px"></span>    
                                Sign up with Facebook</button>
                                <button class="btn btn-block btn-primary"  style="font-weight:500;color:#fff">
                                <span class="fa fa-google" style="margin-right:10px"></span>    
                                Sign up with Google</button>
                                <hr>
                                </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                          <div class="card justify-content-md-center" style="padding:15px;color:#fff; max-width:600px;background:#0a303c">
                           <div class="card-header">
                               <h3 class="text-center " style="font-weight:600;color:#fff">Sign Up</h3>
                           </div>
                           <div class="error-box">
                               <p  style="color:#fff;background:red; display:<?php if($_SESSION['sign']==''){echo "none";}?>" >
                                    <span class="fa fa-exclamation-triangle" style="margin-right:10px ;padding:10px"></span> 
                                    <?php echo $_SESSION['sign']; $_SESSION['sign']="";?>
                                </p>
                           </div>
                           <div class="card-body">
                           <form method="POST" class="aa-login-form">                                     
                                <label for="" >Email <span>*</span></label>
                                <input type="email" name="email_sign" class="form-control"  placeholder="Email" required>                                                    
                                <label for="">Password<span>*</span></label>
                                <input type="password" name="pass_sign"  class="form-control" placeholder="Password" required>                      
                                <button class="btn btn-primary" name="aff_signup" >Sign up</button><br><br>
                                <hr><br>
                                </form>
                           </div>
                           <div class="card-footer">
                            <button class="btn btn-block btn-primary" style="font-weight:500;color:#fff">
                            <span class="fa fa-facebook" style="margin-right:10px"></span>    
                            Sign up with Facebook</button>
                            <button class="btn btn-block btn-primary" style="font-weight:500;color:#fff">
                            <span class="fa fa-google" style="margin-right:10px"></span>    
                            Sign up with Google</button>
                            <hr>
                           </div>
                       </div>
                          </div>
                      </div>
                   </div>
                   <!--  -->
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->

 <?php include('footer.php');?>

 <?php 
 if(isset($_POST['aff_login'])){
     
     
    extract($_POST);
    print_r($_POST);
    
  $email = get_safe_value($conn, $email_log);
  $pass = get_safe_value($conn, $pass_log);

  $pass = md5($pass);
  echo $q = "SELECT * FROM `aff_login` WHERE `email`='$email'";
   $res = mysqli_query($conn, $q);
   $count = mysqli_num_rows($res);
  if($count){      
    $data = mysqli_fetch_assoc($res);
    if($data['password']==$pass){
        $_SESSION['user']['login']=true;
        $_SESSION['user']['login_id']= $data['id'];        
        ?><script>window.location.href='aff/dashboard.php'</script><?php
    }else{        
        $_SESSION['log']='Wrong password,';        
        ?><script>window.location.href='aff_login.php'</script><?php
    }
  }else{    
    $_SESSION['log']='details not found with these email ';
    ?><script>window.location.href='aff_login.php'</script><?php
  }

 }
 if(isset($_POST['aff_signup'])){
    
   extract($_POST);
   print_r($_POST);

    $email = get_safe_value($conn, $email_sign);
    $pass = get_safe_value($conn, $pass_sign);
    $pass = md5($pass);

    $q = "SELECT * FROM `aff_login` WHERE `email`='$email'";
    $res = mysqli_query($conn, $q);
    $count=mysqli_num_rows($res);
    if($count){        
        $_SESSION['sign']='These email already exists, please try new one';
        ?><script>window.location.href='aff_login.php'</script><?php      
    }else{
    $res = mysqli_query($conn, "INSERT INTO `aff_login`( `password`, `email`, `paid`, `status`) VALUES ('$pass','$email',0,'1')");
    $lid = mysqli_insert_id($conn);
        if($res){
            $_SESSION['user']['login']=true;
            $_SESSION['user']['login_id']= $lid;
            ?><script>window.location.href='aff/dashboard.php'</script><?php
        }else{
            $_SESSION['sign']='something went wrong!';
            ?><script>window.location.href='aff_login.php'</script><?php    
        }
    }
 }
 ?>