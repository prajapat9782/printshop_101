<?php
 include('header.php');
//  include('function.php');
//  Pre($_SESSION);s
 if(!isset($_SESSION['cart']) || count($_SESSION['cart'])==0){
   ?>
   <script>
    window.location.href='index.php';
   </script>
   <?php
 }
 ?>
 
 

 <!-- Cart view section -->
 <section id="cart-view">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="cart-view-area">
           <div class="cart-view-table">
           
               <div class="table-responsive">
              
                    <table class="table">
                      <thead>
                        <tr>
                          <th></th>                          
                          <th>Product Name</th>
                          <th>Price</th>
                          <th>Quantity</th>
                          <th>Subtotal</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php $subtotle = 0;
                          foreach($_SESSION['cart'] as $x => $val){
                              
                              $q = "select * FROM products WHERE id ='$x'";
                              $res = mysqli_query($conn, $q);
                              $data = mysqli_fetch_assoc($res);                            
                              $qty = $val['qty'];
                              if(isset($_SESSION['user']['wholesaler'])){
                              if($_SESSION['user']['wholesaler']=='1'){
                                $subtotle+= ($data['wholesale']*$qty);  
                              }else{
                                $subtotle+= ($data['sell_price']*$qty);
                              }
                            }else{
                                $subtotle+= ($data['sell_price']*$qty);
                              }
                              
                          ?>
                        <tr>
                          
                          <td><a href="#"><img src="media/product/<?php echo $data['image']?>" alt="img"></a></td>
                          <td><a class="aa-cart-title" href="#"><?php echo $data['name']?></a></td>
                          <td>$                          
                            <?php
                            if(isset($_SESSION['user']['wholesaler'])){ 
                                if($_SESSION['user']['wholesaler']=='1'){
                                echo $data['wholesale'];  
                                }else{
                                  echo $data['sell_price'];  
                                }
                              }else{
                                  echo $data['sell_price'];  
                                }
                            ?></td>
                          <td>
                              <input class="aa-cart-quantity" type="number" id="<?php echo $x?>qty" min="1" max="6" value="<?php echo $qty ;?>"><br>
                              <a href="javascript:void(0)" class="btn btn-secondry" onclick="manage_cart(<?php echo $x ?>,'update')">update</a>
                          </td>
                          <td>$<?php if(isset($_SESSION['user']['wholesaler'])){ if($_SESSION['user']['wholesaler']=='1'){
                                echo $data['wholesale']*$qty;  
                                }else{
                                  echo $data['sell_price']*$qty;  
                                }
                              }else{
                                   echo $data['sell_price']*$qty;  
                                }?></td>
                          <td><a class="remove_product" href="javascript:void(0)" pid="<?php echo $x ?>"><fa class="fa fa-trash"></fa></a></td>
                        </tr>
                      <?php }?>
                      
                        <!-- <tr>
                          <td colspan="6" class="aa-cart-view-bottom">
                            <div class="aa-cart-coupon">
                              <input class="aa-coupon-code" type="text" placeholder="Coupon">
                              <input class="aa-cart-view-btn" type="submit" value="Apply Coupon">
                            </div>
                            <input class="aa-cart-view-btn" type="submit" value="Update Cart">
                          </td>
                        </tr> -->
                        </tbody>
                    </table>
                 
                </div>
                <?php if( !count($_SESSION['cart'])==0 ){ ?>
             <!-- Cart Total view -->
             <div class="cart-view-total">
               <h4>Cart Totals</h4>
               <table class="aa-totals-table">
                 <tbody>
                   <tr>
                     <th>Total</th>
                     <td>$<?php echo isset($subtotle)?$subtotle:0 ?></td>
                   </tr>
                   <!-- <tr>
                     <th>Total</th>
                     <td>$450</td>
                   </tr> -->
                 </tbody>
               </table>
               <a href="checkout.php" class="aa-cart-view-btn">Proced to Checkout</a>
             </div>
                <?php }?>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->


 <?php include('footer.php'); ?>