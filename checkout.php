<?php
 include('header.php');
//  Pre($_SESSION);
 if(!isset($_SESSION['cart']) || count($_SESSION['cart'])==0){
  ?>
  <script>
   window.location.href='index.php';
  </script>
  <?php
}


if(isset($_POST['place_order'])){
  if(!isset($_SESSION['user']['login_id'])){
    $_SESSION['check_out_error']='first login/register*';
    ?>
    <script>window.location.href='register.php'</script>
    <?php
  }else{
        extract($_POST);
        // print_r($_POST);
        $user_id = $_SESSION['user']['login_id'];
        $bill_name = get_safe_value($conn,$bill_name);
        $bill_email = get_safe_value($conn,$bill_email);
        $bill_num = get_safe_value($conn,$bill_num);
        $bill_address = get_safe_value($conn,$bill_address);
        $bill_city = get_safe_value($conn,$bill_city);
        $bill_state = get_safe_value($conn,$bill_state);
        $bill_pin = get_safe_value($conn,$bill_pin);
        $payment_option = get_safe_value($conn,$payment_option);
        $payment_statue = 'pending';
        
        if($payment_option=='cod'){
          $payment_statue = 'success';
        }
        $order_statue = 'pending';

          $subtotle = 0;
        foreach($_SESSION['cart'] as $x => $val){
          
          $q = "select * FROM products WHERE id ='$x'";
          $res = mysqli_query($conn, $q);
          $data = mysqli_fetch_assoc($res);                            
          $qty = $val['qty'];
          $subtotle+= ($data['sell_price']*$qty);
        }

        $q = "INSERT INTO `order`( `user_id`, `bill_name`, `bill_email`, `bill_contact`, `address`, `city`, `state`, `zipcode`, `order_amount`, `order_statue`, `payment_type`, `payment_statue` ) VALUES ('$user_id','$bill_name','$bill_email','$bill_num','$bill_address','$bill_city','$bill_state','$bill_pin','$subtotle','$order_statue','$payment_option','$payment_statue')";
        mysqli_query($conn, $q);
        $order_id= mysqli_insert_id($conn);
      


        if($payment_option=='on'){
          // require('pay.php');
          ?><script>
          var JSvar = "<?= $order_id; ?>";
          window.location.href='pay.php?order_id='+JSvar;
          </script><?php
        }
       else{
          foreach($_SESSION['cart'] as $x => $val){     
            $q = "select * FROM products WHERE id ='$x'";
            $res = mysqli_query($conn, $q);
            $data = mysqli_fetch_assoc($res);                            
            $qty = $val['qty'];
            $totle= ($data['sell_price']*$qty);
            echo "INSERT INTO `order_details`( `order_id`, `product_id`, `qty`, `sub_total`) VALUES ('$order_id','$x','$qty','$totle')";
            mysqli_query($conn, "INSERT INTO `order_details`( `order_id`, `product_id`, `qty`, `sub_total`) VALUES ('$order_id','$x','$qty','$totle')");
          }

          unset($_SESSION['cart']);
          ?><script>window.location.href='thank_you.php'</script><?php
        }
       
        
  }
}

?>
 <!-- Cart view section -->
 <section id="checkout">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
        <div class="checkout-area">
          <!-- <form method="POST"> -->
            <div class="row">
              <div class="col-md-8">
                <div class="checkout-left">
                  <div class="panel-group" id="accordion">
                    <!-- Coupon section -->
                    <!-- <div class="panel panel-default aa-checkout-coupon">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                            Have a Coupon?
                          </a>
                        </h4>
                      </div>
                      <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="panel-body">
                          <input type="text" placeholder="Coupon Code" class="aa-coupon-code">
                          <input type="submit" value="Apply Coupon" class="aa-browse-btn">
                        </div>
                      </div>
                    </div> -->
                    
                    <?php $open = 'in';
                     if(!isset($_SESSION['user'])){
                      $open = '';   
                     ?>
                    <!-- Login section -->
                    <div class="panel panel-default aa-checkout-login">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                            Authorization 
                          </a>
                        </h4>
                      </div>
                      <div id="collapseTwo" class="panel-collapse collapse in">
                        <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6">
                              <div class="login border" >
                                  <fieldset>
                                    <legend>Login</legend>
                                      <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="email" class="form-control" id="check_out_email" placeholder="Email" required>
                                        <span style="color:red" class="check_error" id="check_email"></span>
                                      </div>
                                      <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="password" class="form-control" id="check_out_password" placeholder="Password" required>
                                        <span style="color:red" class="check_error" id="check_password"></span>
                                        <span style="color:red" class="check_error" id="check_common"></span>
                                      </div>
                                      <a  onclick="login_user()" class="btn btn-primary" >Login</a>
                                      <p class="aa-lost-password"><a href="#">Lost your password?</a></p>
                                  </fieldset>
                              </div>                            
                            </div>
                            <div class="col-md-6">
                              <div class="register">
                                  <fieldset>
                                    <legend>Register</legend>
                                  <!-- register -->
                                      <!-- name details start -->
                                      <div class="row" >
                                        <div class="col-md-6" >
                                          <div class="form-group">
                                            <label for="">First Name<span>*</span></label>
                                            <input type="text" id="check_fname" class="form-control" placeholder="First Name" required>                                        
                                          </div>
                                        </div>
                                        <div class="col-md-6">
                                          <div class="form-group">
                                            <label for="">Last Name<span>*</span></label>
                                            <input type="text" id="check_lname" class="form-control" placeholder="Last Name">                                        
                                          </div>
                                        </div>
                                      </div>
                                      <!-- nam details end -->
                                      <div class="form-group">
                                        <label for="">Mobile No</label>
                                        <input type="text" id="check_mobile" class="form-control" placeholder="Mobile No" required>                                    
                                      </div>
                                      <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="email" id="check_email_register" class="form-control" placeholder="Email" required>                                    
                                      </div>
                                      <div class="form-group">
                                        <label for="">Password</label>
                                        <input type="password" id="check_pass" class="form-control" placeholder=" Password" required>                                    
                                      </div>
                                      <p id="register_check" style="color:red;margin-bottom:5px"></p>  

                                      <a  onclick="check_register()" class="btn btn-primary" >Register</a>
                                    <!-- register  -->
                                </fieldset>
                              </div>
                            </div>
                          </div> 
                          
                          
                        </div>
                      </div>
                    </div>
                    <?php }?>
                    
                    <form method="POST">
                    <!-- Billing Details -->
                    <div class="panel panel-default aa-checkout-billaddress">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                            Billing Details
                          </a>
                        </h4>
                      </div>
                      <div id="collapseThree" class="panel-collapse collapse <?php echo $open?>">
                        <div class="panel-body">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="aa-checkout-single-bill">
                                <input type="text" name="bill_name" placeholder="Billing Name*" required>
                              </div>                             
                            </div>
                            
                          </div> 
                          
                          <div class="row">
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="email" name="bill_email" placeholder="Contact Address">
                              </div>                             
                            </div>
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="tel" name="bill_num" placeholder="Alternative Phone">
                              </div>
                            </div>
                          </div> 
                          <div class="row">
                            <div class="col-md-12">
                              <div class="aa-checkout-single-bill">
                                <textarea cols="8" name="bill_address" rows="2" required placeholder="Delivery Address"></textarea>
                              </div>                             
                            </div>                            
                          </div>   
                         
                          <div class="row">                           
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="text" name="bill_city" placeholder="City / Town*" required>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="text" name="bill_state" placeholder="State*" required>
                              </div>                             
                            </div>
                          </div>   
                          <div class="row">
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="text" name="bill_pin" placeholder="Postcode / ZIP*" required>
                              </div>
                            </div>
                          </div>                                    
                        </div>
                      </div>
                    </div>
                    <!-- Shipping Address -->
                    <!-- <div class="panel panel-default aa-checkout-billaddress">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                            Shippping Address
                          </a>
                        </h4>
                      </div>
                      <div id="collapseFour" class="panel-collapse collapse">
                        <div class="panel-body">
                         <div class="row">
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="text" placeholder="First Name*">
                              </div>                             
                            </div>
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="text" placeholder="Last Name*">
                              </div>
                            </div>
                          </div> 
                          <div class="row">
                            <div class="col-md-12">
                              <div class="aa-checkout-single-bill">
                                <input type="text" placeholder="Company name">
                              </div>                             
                            </div>                            
                          </div>  
                          <div class="row">
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="email" placeholder="Email Address*">
                              </div>                             
                            </div>
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="tel" placeholder="Phone*">
                              </div>
                            </div>
                          </div> 
                          <div class="row">
                            <div class="col-md-12">
                              <div class="aa-checkout-single-bill">
                                <textarea cols="8" rows="3">Address*</textarea>
                              </div>                             
                            </div>                            
                          </div>   
                          <div class="row">
                            <div class="col-md-12">
                              <div class="aa-checkout-single-bill">
                                <select>
                                  <option value="0">Select Your Country</option>
                                  <option value="1">Australia</option>
                                  <option value="2">Afganistan</option>
                                  <option value="3">Bangladesh</option>
                                  <option value="4">Belgium</option>
                                  <option value="5">Brazil</option>
                                  <option value="6">Canada</option>
                                  <option value="7">China</option>
                                  <option value="8">Denmark</option>
                                  <option value="9">Egypt</option>
                                  <option value="10">India</option>
                                  <option value="11">Iran</option>
                                  <option value="12">Israel</option>
                                  <option value="13">Mexico</option>
                                  <option value="14">UAE</option>
                                  <option value="15">UK</option>
                                  <option value="16">USA</option>
                                </select>
                              </div>                             
                            </div>                            
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="text" placeholder="Appartment, Suite etc.">
                              </div>                             
                            </div>
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="text" placeholder="City / Town*">
                              </div>
                            </div>
                          </div>   
                          <div class="row">
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="text" placeholder="District*">
                              </div>                             
                            </div>
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="text" placeholder="Postcode / ZIP*">
                              </div>
                            </div>
                          </div> 
                           <div class="row">
                            <div class="col-md-12">
                              <div class="aa-checkout-single-bill">
                                <textarea cols="8" rows="3">Special Notes</textarea>
                              </div>                             
                            </div>                            
                          </div>              
                        </div>
                      </div>
                    </div> -->
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="checkout-right">
                  <h4>Order Summary</h4>
                  <div class="aa-order-summary-area">
                    <table class="table table-responsive">
                      <thead>
                        <tr>
                          <th>Product</th>
                          <th>Total</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php $subtotle = 0;
                         foreach($_SESSION['cart'] as $x => $val){
                            
                            $q = "select * FROM products WHERE id ='$x'";
                            $res = mysqli_query($conn, $q);
                            $data = mysqli_fetch_assoc($res);                            
                            $qty = $val['qty'];
                            $subtotle+= ($data['sell_price']*$qty);
                        ?>
                        <tr>
                          <td><?php echo $data['name']?><strong> x <?php echo $qty;?></strong></td>
                          <td>$<?php echo $data['sell_price']*$qty?></td>
                        </tr>
                         <?php }?> 
                      </tbody>
                      <tfoot>                        
                         <tr>
                          <th>Subtotle</th>
                          <th>$<?php echo $subtotle?></th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                  <h4>Payment Method</h4>
                  <div class="aa-payment-method">                    
                    <label for="cashdelivery"><input type="radio" id="cashdelivery" name="payment_option" value="cod" checked required> Cash on Delivery </label>
                    <label for="paypal"><input type="radio" id="paypal" name="payment_option"  required> Via Paypal </label>
                    <img src="https://www.paypalobjects.com/webstatic/mktg/logo/AM_mc_vs_dc_ae.jpg" border="0" alt="PayPal Acceptance Mark">    
                    <input type="submit" name="place_order" value="Place Order" class="aa-browse-btn">                
                  </div>
                </div>
              </div>
            </div>
          </form>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->
 <?php include('footer.php');?>
 