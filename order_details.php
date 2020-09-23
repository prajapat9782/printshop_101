<?php
 include('header.php');
//  include('function.php');
//  Pre($_SESSION);
if(!isset($_GET['oid']) && $_GET['oid']==''){
    ?>
        <script>window.location.href='index.php';</script>
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
                          <th>#</th>
                                                 
                          <th>Product Image</th>
                          <th>Product Image</th>
                          <th>Quantity</th>
                          <th>Sub Total</th>
                        
                          
                        </tr>
                      </thead>
                      <tbody>
                        <?php   $uid =1;
                                $order_id = $_GET['oid'];    
                                                   
                                $res = mysqli_query($conn, "SELECT order_details.*,products.* FROM `order_details` INNER JOIN `products` ON order_details.product_id = products.id  WHERE order_details.order_id ='$order_id' ORDER BY order_details.id DESC");
                                while($row=mysqli_fetch_assoc($res)){
                        ?>
                        <tr>
                          <td><?php echo $uid?></td>                          
                          <td><a href="product-detail.php?pid=<?php echo $row['id']?>"><?php echo $row['name']?></a></td>
                          <td><img src="media/product/<?php echo $row['image']?>" alt="product image"></td>
                          <td><?php echo $row['qty']?></td>
                          <td><?php echo $row['sub_total']?></td>
                          
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