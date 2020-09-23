<?php include('header.php');
  if(!isset($_SESSION['user']['login'])){ ?>
    <script>window.location.href='index.php';</script>
<?php  }

?>

 <!-- Cart view section -->
 <section id="aa-myaccount">
   <div class="container">
     <div class="row">
       <div class="col-md-12 my-5" style="height:500px;text-align:center">
            <h1 class="text-center" style="margin-top:50px">Thank you for shopping</h1>
            <a href="index.php" class="text-center" style="color:blue">continue shopping-></a>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->

 <?php include('footer.php');?>

 