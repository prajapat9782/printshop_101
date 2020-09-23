<?php
 include('header.php');
//  include('function.php');
//  Pre($_SESSION);

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
                          <th>#</th>
                                                 
                          <th>Billing Name</th>
                          <th>Totle</th>
                          <th>Payment type</th>
                          <th>Payment Status</th>
                          <th>Order Status</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        <?php   $uid =1;
                                $user_id = $_SESSION['user']['login_id'];                          
                                $res = mysqli_query($conn, "SELECT * FROM `order` WHERE `user_id` = '$user_id' ORDER BY id   DESC");
                                while($row=mysqli_fetch_assoc($res)){
                        ?>
                        <tr>
                          <td><?php echo $uid?></td>
                          <td><a href="order_details.php?oid=<?php echo $row['id']?>" title="order details"><?php echo $row['bill_name']?></a></td>                         
                          <td><?php echo $row['order_amount']?></td>
                          <td><?php echo $row['payment_type']?></td>
                          <td><?php echo $row['payment_statue']?></td>
                          <td><?php echo $row['order_statue']?></td>
                          
                        </tr>
                      <?php $uid++; }?>
                      
                        
                        </tbody>
                    </table>
                 
                </div>
              
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->


 <?php include('footer.php'); ?>