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
        
            <div class="row">
                <div class="col-md-6 mx-auto">
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