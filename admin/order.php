<?php include('header.inc.php');
      include('side.inc.php');    
?>
      

      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header mb-3">
          <h1 class="pull-left">
            Orders
          </h1>
          
          <!-- display session  -->
         
          <!-- display session end -->
        </section>
        <section style="margin:40px 0;">
          <?php 
              if(isset($_SESSION['form']['error'])){ ?>
                  <div class="alert alert-danger alert-dismissible">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <strong><?php echo $_SESSION['form']['error']; $_SESSION['form']['error']=''; ?> </strong> 
                  </div>
            <?php } 
            else if(isset($_SESSION['form']['success']) && $_SESSION['form']['success']!=''){ ?>
                  <div class="alert alert-success alert-dismissible">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <strong><?php echo $_SESSION['form']['success']; $_SESSION['form']['success']=''; ?> </strong> 
                  </div>
            <?php } ?>
        </section>
        <!-- Main content -->
        <section class="content mt-4">
          <div class="row">
            <div class="col-xs-12">
             

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title"></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Order Id</th>
                        <th>Order Date</th>
                        <th>Name</th>
                        <th>Delivery Address</th>
                        <th>Mobile No</th>                         
                        <th>Alernate no.</th>                         
                        <th>Order Amount</th>
                        <th>Payment Type</th>
                        <th>Payment Status</th>
                        <th>Order Status</th>
                        <th>Action</th>                        
                      </tr>
                    </thead>
                    <tbody>
                        <?php $uid = 1;
                            $res = mysqli_query($conn, "SELECT `order`.*, user.fname,user.lname,user.mobile,order_status.staus_name as status FROM `order` INNER JOIN user on `order`.`user_id`=user.id INNER JOIN order_status on `order`.`order_statue`=order_status.sn");
                            while($row=mysqli_fetch_assoc($res)){
                        ?>
                           <tr>
                                <td><a href="#" title="order details"><?php echo $row['id']?></a></td>
                                <td><?php echo date("d/m/Y", strtotime($row['created']))?></td>
                                <td><?php echo $row['fname']." ".$row['lname']?></td>
                                <td><?php echo $row['address']?></td>
                                <td><?php echo $row['mobile']?></td>                                
                                <td><?php echo $row['bill_contact']?></td>                                
                                <td><?php echo $row['order_amount']?></td>
                                <td><?php if($row['payment_type']=='on'){ echo "Online"; }else { echo $row['payment_type']; } ?></td>
                                <td><?php echo $row['payment_statue']?></td>
                                <td><?php echo $row['status']?></td>
                                <td><select class="form-control status" key="<?php echo $row['id']?>"  style="display:<?php if($row['status']=='Delivered' || $row['status']=='Complete'){echo 'none'; }?>">
                                <option value="">Select Status</option>
                                <?php if($row['status']=='Pending'){?>
                                     <option value="2">Confirm</option>
                                     <option value="6">Cancel</option>
                                <?php } else if($row['status']=='Confirm'){?>
                                     <option value="3">In Process</option>                                    
                                     <option value="6">Cancel</option>
                                <?php } else if($row['status']=='In Process'){?>
                                     <option value="4">Picked</option>
                                     <option value="6">Cancel</option>
                                <?php } else if($row['status']=='Out For Delivery'){?>
                                     <option value="5">Out For Delivery</option>
                                     <option value="6">Cancel</option>
                                <?php } else if($row['status']=='Picked'){?>
                                     <option value="7">Delivered</option>
                                     <option value="8">Complete</option>
                                <?php } else if($row['status']=='Cancel'){?>     
                                    <option value="2">Confirm</option>
                                <?php } ?>    
                                    
                                    
                                    
                                </select></td>
                           </tr>     
                        <?php $uid++; }?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Id</th>
                        <th>Order Date</th>
                        <th>Name</th>
                        <th>Delivery Address</th>
                        <th>Mobile No</th>                         
                        <th>Order Amount</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div>
<!-- /.content-wrapper -->

<footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0
        </div>
        <strong>Copyright &copy; 2020 printshop.com</strong> All rights reserved.
      </footer>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.3 -->
    <script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- DATA TABES SCRIPT -->
    <script src="plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
    <!-- SlimScroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <!-- <script src="dist/js/demo.js" type="text/javascript"></script> -->
    <!-- page script -->
    <script type="text/javascript">
      $(function () {
        $("#example1").dataTable();
        // $('#example2').dataTable({
        //   "bPaginate": true,
        //   "bLengthChange": false,
        //   "bFilter": false,
        //   "bSort": true,
        //   "bInfo": true,
        //   "bAutoWidth": false
        // });
        $( ".status" ).change(function() {
            var status = $(this). children("option:selected"). val();
            id= $(this).attr('key');
            
            if(status!=''){
                $.ajax({
                   url:'orderStatus.php',
                   method:'POST',
                   data:{id:id,status:status} ,
                   success:function(res){
                      window.location.reload(true);
                   }
                });
            }       
        });
      });
    </script>

  </body>
</html>
