
<section id="aa-subscribe" style="display:<?php if(isset($_SESSION['subscribe'])){if($_SESSION['subscribe']){echo "none";}}?>">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-subscribe-area">
            <h3 id="sub_heading">Subscribe our newsletter </h3>            
            <form class="aa-subscribe-form">                         
               <input type="email"  id="sub_email" class="form-control" placeholder="Enter your Email">            
              <!-- <input type="button" style id="sub_btn" value="Subscribe"> -->
              <button type="button" class="btn btn-info btn-block font-weight-bold" style="margin-top:5px;outline:none" id="sub_btn"> Subscribe </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Subscribe section -->

  <!-- footer -->  
  <footer id="aa-footer">
    <!-- footer bottom -->
    <div class="aa-footer-top">
     <div class="container">
        <div class="row">
        <div class="col-md-12">
          <div class="aa-footer-top-area">
            <div class="row">
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <h3>Main Menu</h3>
                  <ul class="aa-footer-nav">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Our Services</a></li>
                    <li><a href="#">Our Products</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Contact Us</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3>Knowledge Base</h3>
                    <ul class="aa-footer-nav">
                      <li><a href="#">Delivery</a></li>
                      <li><a href="#">Returns</a></li>
                      <li><a href="#">Services</a></li>
                      <li><a href="#">Discount</a></li>
                      <li><a href="#">Special Offer</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3>Useful Links</h3>
                    <ul class="aa-footer-nav">
                      <li><a href="#">Site Map</a></li>
                      <li><a href="#">Search</a></li>
                      <li><a href="#">Advanced Search</a></li>
                      <li><a href="#">Suppliers</a></li>
                      <li><a href="#">FAQ</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3>Contact Us</h3>
                    <address>
                      <p> 25 Astor Pl, NY 10003, USA</p>
                      <p><span class="fa fa-phone"></span>+1 212-982-4589</p>
                      <p><span class="fa fa-envelope"></span>printwale@gmail.com</p>
                    </address>
                    <div class="aa-footer-social">
                      <a href="#"><span class="fa fa-facebook"></span></a>
                      <a href="#"><span class="fa fa-twitter"></span></a>
                      <a href="#"><span class="fa fa-google-plus"></span></a>
                      <a href="#"><span class="fa fa-youtube"></span></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
     </div>
    </div>
    <!-- footer-bottom -->
    <div class="aa-footer-bottom">
      <div class="container">
        <div class="row">
        <div class="col-md-12">
          <div class="aa-footer-bottom-area">
            <p>Designed by <a href="http://www.freshbrigade.com/">freshbrigade.com</a></p>
            <div class="aa-footer-payment">
              <span class="fa fa-cc-mastercard"></span>
              <span class="fa fa-cc-visa"></span>
              <span class="fa fa-paypal"></span>
              <span class="fa fa-cc-discover"></span>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
  </footer>
  <!-- / footer -->

  <!-- Login Modal -->  
  <!-- <div class="modal fade bg-info" style="border-radius:4px" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">                      
        <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4>Login or Register</h4>
          <form class="aa-login-form" method="POST">
            <div class="form-group">
              <label for="">Username or Email address<span>*</span></label>
              <input type="text" placeholder="Username or email" class="form-control">
            </div>
            <div class="form-group">
              <label for="">Password<span>*</span></label>
              <input type="password" placeholder="Password" class="form-control">
            </div>
            <button class=" btn btn-primary" type="submit">Login</button><br> <br> -->
            <!-- <label for="rememberme" class="rememberme"><input type="checkbox" id="rememberme"> Remember me </label> -->
            <!-- <p class="aa-lost-password"><a href="#">Lost your password?</a></p> -->
            <!-- <div class="aa-register-now "><b>
              Don't have an account? </b><a href="register.php" style="color:blue">Register now!</a>
            </div>
          </form>
        </div>                         -->
    <!--  </div> /.modal-content 
    </div>/.modal-dialog
  </div>     -->


<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- nice number  -->
  <script type="text/javascript" src="nice-number.js"></script>
  
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.js"></script>  
  <!-- SmartMenus jQuery plugin -->
  <script type="text/javascript" src="js/jquery.smartmenus.js"></script>
  <!-- SmartMenus jQuery Bootstrap Addon -->
  <script type="text/javascript" src="js/jquery.smartmenus.bootstrap.js"></script>  
  <!-- To Slider JS -->
  <script src="js/sequence.js"></script>
  <script src="js/sequence-theme.modern-slide-in.js"></script>  
  <!-- Product view slider -->
  <script type="text/javascript" src="js/jquery.simpleGallery.js"></script>
  <script type="text/javascript" src="js/jquery.simpleLens.js"></script>
  
  <!-- slick slider -->
  <script type="text/javascript" src="js/slick.js"></script>
  <!-- Price picker slider -->
  <script type="text/javascript" src="js/nouislider.js"></script>
  <!-- Custom js -->
  <script src="js/custom.js"></script> 
  <!-- Slick Slider JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>

<script>
$(document).ready(function(){
  // alert('working or not');
  $('#sub_btn').click(function(){
    var email = $('#sub_email').val();
    // alert('subascribe button click'+email);
    var atposition=email.indexOf("@");  
    var dotposition=email.lastIndexOf(".");  
    if(atposition<1 || dotposition<atposition+2 || dotposition+2>=email.length){  
      alert("Please enter a valid e-mail address ");
    }
    else
    {
      $.ajax({
          url:'subscribe.php',
          method:'POST',
          data:{email:email},
          success:function(res){            
              $('#sub_email').css('display','none');
              $('#sub_heading').html('Thank you for Subscribe');
              $(this).removeClass("btn-info");
              $(this).addClass("btn-primary");
              $(this).html('Subscribed');
          }
      });
    }
  });
// sendEmail()=>{
//     $.ajax({
      
//     })
//   }


  // alert(1);
  $('#login_form').submit(function(e){
  e.preventDefault();
  var email = $('#login_email').val();
  var password = $('#login_password').val();
    if(email==''){
      alert('email not be null');
    } else if(password==''){
      alert('password not be null');
    }
    if(email!='' && password!=''){
      $.ajax({
        url:'user_login.php',
        method:'POST',
        data:{email:email,password:password},
        success:function(res){
          // alert(res);
          if(res=='reject'){
            $('#login_error').html('Please provide currect login details');
          }if(res=='missmatch'){
            $('#login_error').html('Wrong password! please try again');
          }
          if(res=='accept') {
            // alert('login successfully');
            window.location.href = window.location.href;
          }
        }
      })
    }
  // alert(email);
  });

  $('#register_user').submit(function(e){
    // alert(15246);
  e.preventDefault();
  var fname = $('#register_fname').val();
  var lname = $('#register_lname').val();
  var mobile = $('#register_mobile').val();
  var email = $('#register_email').val();
  var pass = $('#register_pass').val();
  var con_pass = $('#register_pass_con').val();
  
    var error_code = true;
    $('.clear-all').html('');
  
    if(fname==''){
      $('#reg_fname_error').html('First name not be null');
      error_code= false;
    } if(lname==''){      
      $('#reg_lname_error').html('Last name not be null');
      error_code= false;
    } if(mobile==''){     
      $('#reg_mobile_error').html('mobile not be null');
      error_code= false;
    }if(email==''){     
      $('#reg_email_error').html('email not be null');
      error_code= false;
    } if(pass==''){     
      $('#reg_pass_error').html('password not be null');
      error_code= false;
    }if(con_pass==''){     
      $('#reg_con_pass_error').html('con password not be null');
      error_code= false;
    }
    else if(pass!=con_pass){
      $('#reg_con_pass_error').html('password or confirm password should be same!');
      error_code= false;
    }
      if(error_code){
        // alert('ajax called');
        $.ajax({
          url:'register_user.php',
          method:'POST',
          data:{fname:fname,lname:lname,mobile:mobile,email:email,password:pass},
          success:function(res){
            if(res=='reject'){
              $('#register_error').html('This email already in use, please try another one');
            }else{
              alert('register successfully');
              window.location.href=windwo.location.href;
            }
          }
        });
      }
  
  });

  $('.addtocart').click(function(){      
      var id = $(this).attr('p_id');
      var qty = $('#productcount').val();
      // alert(qty+" "+id);
      if(qty==undefined){
        qty = 1;
      }
      // alert(qty);
      $.ajax({
          url: "updatecart.php",
          method: "POST",          
          data: {pid: id,qty:qty,type: "add"},
          success: function(res){
            // alert(res);
            window.location.href=window.location.href;
          }
        
      });
      
    })




  $('.remove_product').click(function(){
    var id = $(this).attr('pid');
    $.ajax({
          url: "updatecart.php",
          method: "POST",          
          data: {pid: id,type: "remove"},
          success: function(res){
              // alert(res);
              window.location.href=window.location.href;
          }
        
      });
  });



})


function manage_cart(pid, type){
  // alert('manage function');
  if(type='update'){
    var qty = $('#'+pid+'qty').val();
  }
  jQuery.ajax({
    url: 'updatecart.php',
    method: 'POST',
    data: {pid: pid,qty: qty,type: 'update'},
    success: function(res){
      // alert(res);
      window.location.href=window.location.href;
    }
  });
  
}
function login_user(){
  $('.check_error').html('');
  var email = $('#check_out_email').val();
  var password = $('#check_out_password').val();
  if(email==''){
    $('#check_email').html('email not be null');      
    } else if(password==''){
      $('#check_password').html('password not be null');      
    }
    if(email!='' && password!=''){
      jQuery.ajax({
        url: 'user_login.php',
        method: 'POST',
        data:{email:email,password:password},
        success: function(res){         
          if(res=='reject'){
            $('#check_common').html('Please provide currect login details');
            e.preventDefault()
          }if(res=='missmatch'){
            $('#check_common').html('Wrong password! please try again');
          }
          if(res=='accept') {
            // alert('login successfully');
            window.location.href = window.location.href;
          }
        }
      });
    }
}


function check_register(){
  // alert('check_register');
  // e.preventDefault();
  // get value form form
  var fname = $('#check_fname').val();
  var lname = $('#check_lname').val();
  var mobile = $('#check_mobile').val();
  var email = $('#check_email_register').val();
  var pass = $('#check_pass').val();
  var error_code = true;
  var error_mgs = '';
  // alert(fname+" "+lname+" "+mobile+" "+email+" "+pass);
  $('#register_check').html('');
  
  // validation  
    if(fname==''){
      error_mgs += 'First name not be null';
      error_code= false;      
    }else if(lname==''){      
      error_mgs +='Last name not be null';
      error_code= false;      
    }else if(mobile==''){     
      error_mgs +='mobile not be null';
      error_code= false;      
    }else if(email==''){     
      error_mgs +='email not be null';
      error_code= false;      
    }else if(pass==''){     
      error_mgs +='password not be null';
      error_code= false;      
    }
    $('#register_check').html(error_mgs);
    
    
      if(error_code){
        // alert('ajax called');
        jQuery.ajax({
          url:'register_user.php',
          method:'POST',
          data:{fname:fname,lname:lname,mobile:mobile,email:email,password:pass},
          success:function(res){
            if(res=='reject'){              
              $('#register_check').html('This email already in use, please try another one');
            }else{
              alert('register successfully');
              window.location.href=windwo.location.href;
            }
          }
        });
      }
  
  
}
function clear_field(){
  $('#check_fname').html('');
  $('#check_lname').html('');
  $('#check_mobile').html('');
  $('#check_email_register').html('');
  $('#check_pass').html('');
}
function sort_by(id=''){
  var type = $('#sort_by_create').val();
  
  if(id!=''){
    window.location.href = 'http://localhost/vishal/printshop/product.php?catID='+id+'&type='+type;
  }else{
    window.location.href = window.location.href+'?type='+type;
  }
  
}
</script>

  </body>
</html>