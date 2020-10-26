<?php include('header.inc.php');
    if(isset($_GET['type']) && $_GET['type']!=''){
        $id = $_GET['id'];
        // extract($_GET);
        // print_r($_GET);
        if($_GET['type']=='change'){
            if($_GET['option']=='active'){
                $status = 1;
            }
            else{
                $status= 0;
            }
            $res = mysqli_query($conn,"UPDATE `products` SET  `status`='$status' WHERE `id`='$id'");
        }
        if($_GET['type']=='delete'){
            $res = mysqli_query($conn,"DELETE FROM `products` WHERE `id`='$id'");

        }
    }
        
      include('side.inc.php');    
?>
      

      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header mb-3">
          <h1 class="pull-left">
            Products
          </h1>
          <a href="addproduct.php?action=add"><button class="btn btn-primary pull-right " style="margin-bottom:10px">Add products</button></a>
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
                <!-- <form id="form1"  method="POST"> -->
                  <div class="box-body">
                  
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th></th>
                          <th>Id</th>
                          <th>Name</th>
                          <th>Image</th>
                          <th>Price</th>
                          <th>Sale Price</th>
                          <th>Wholesale Price</th>
                          <th>Sort Description</th>
                          <th>Status</th>
                          <th>Popular</th>
                          <th>Feature</th>
                          <th>Latest</th>
                          <th>Operation</th>
                        </tr>
                      </thead>
                      <tbody>
                      <tr>
                          <th><input type="checkbox" id="checkbox_all"></th>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th></th>
                      </tr>
                      <?php $q = "SELECT * FROM `products` ORDER BY name ASC";
                          $res = mysqli_query($conn, $q);
                          $uid = 1;
                          while($row = mysqli_fetch_assoc($res)){ ?>
                                  <tr>
                                  <td><input type="checkbox" class="checkitem" name="pro_id[]" value="<?php echo $row['id']; ?>"></td>
                                  <td><?php echo $uid;  ?></td>
                                  <td><?php echo $row['name'] ?></td>
                                  <td><?php
                                      $image = isset($row['image'])?$row['image']:'';
                                      if($image!=''){ ?>
                                              <img src="../media/product/<?php echo $image?>" alt="image" width="65px" height="65px">
                                    <?php }else{echo 'Null'; } 
                                  ?></td>
                                  <td><?php echo $row['price'] ?></td>
                                  <td><?php echo $row['sell_price'] ?></td>
                                  <td><?php echo $row['wholesale'] ?></td>
                                  <td><?php echo $row['shot_desc'] ?></td>
                                  <td><?php  if($row['status']=='1'){echo 'Active';}else{echo 'Inactive';} ?></td>

                                  <td><?php  if($row['popular']=='1'){echo '<i class="fa fa-fw fa-check"></i>';}else{echo '<i class="fa fa-fw fa-times"></i>';} ?></td>
                                  <td><?php  if($row['feature']=='1'){echo '<i class="fa fa-fw fa-check"></i>';}else{echo '<i class="fa fa-fw fa-times"></i>';} ?></td>
                                  <td><?php  if($row['latest']=='1'){echo '<i class="fa fa-fw fa-check"></i>';}else{echo '<i class="fa fa-fw fa-times"></i>';} ?></td>
                                  
                                  <td><?php
                                      if($row['status']=='1'){ ?>
                                          <a href="product.php?type=change&option=diactive&id=<?php echo $row['id'];?>"><button class="btn btn-danger">Disactive</button></a>
                                  <?php }else{ ?>  
                                      <a href="product.php?type=change&option=active&id=<?php echo $row['id'];?>"><button class="btn btn-primary">Active</button></a>
                                  <?php } ?>
                                  <a onClick=" return confirm('are you sure ?');" href="product.php?type=delete&id=<?php echo $row['id'];?>"><button class="btn btn-danger">Delete</button></a>
                                  <a  href="addproduct.php?action=update&id=<?php echo $row['id'];?>"><button class="btn btn-primary">Edit</button></a>
                              </td>
                                  
                              </tr>
                      <?php $uid++; } ?>
                      
                      </tbody>
                      <tfoot>
                        <tr>
                          <th></th>
                          <th>Id</th>
                          <th>Name</th>
                          <th>Image</th>
                          <th>Price</th>
                          <th>Sell Price</th>
                          <th>Sort Description</th>
                          <th>Status</th>
                          <th>Popular</th>
                          <th>Feature</th>
                          <th>Latest</th>
                          <th>Operation</th>
                        </tr>
                      </tfoot>
                    </table>
                    <!-- <button class="btn btn-primary btn-sm" type="submit" name="popular">Popular</button> -->
                    <button class="btn btn-primary btn-sm" id="popular" name="popular">Popular</button>
                    <!-- <button class="btn btn-primary btn-sm" type="submit" name="feature">Feature</button> -->
                    <button class="btn btn-primary btn-sm" id="feature" name="feature">Feature</button>
                    <!-- <button class="btn btn-primary btn-sm" type="submit" name="latest">Latest</button> -->
                    <button class="btn btn-primary btn-sm" id="latest" name="latest">Latest</button>
                  
                  </div><!-- /.box-body -->
                <!-- </form> -->
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
      });
    </script>
    <script>
      $(document).ready(function(){

          $('#checkbox_all').click(function(){
            $("input[type='checkbox']").prop('checked',this.checked); //checkitem
            // if($(this).is(":checked")){
            //   $('.checkitem').props('checked',true);
            // }else{
            //   $('.checkitem').props('checked',false);
            // }
          }); 
          $('#popular').click(function(){            
            var ids = [];
            $('.checkitem').each(function(){
              if($(this).prop("checked")==true){
                ids.push($(this).val());
              }
            });
            $.ajax({
              url:'addPopular.php',
              method:'POST',
              data:{key:'popular',data:ids},
              success:function(res){
                window.location.href= window.location.href;
              }
            })
            // alert(ids);
          })
          $('#feature').click(function(){            
            var ids = [];
            $('.checkitem').each(function(){
              if($(this).prop("checked")==true){
                ids.push($(this).val());
              }
            });

            $.ajax({
              url:'addPopular.php',
              method:'POST',
              data:{key:'feature',data:ids},
              success:function(res){
                window.location.href= window.location.href;
              }
            })
            // alert(ids);
          })
          $('#latest').click(function(){            
            var ids = [];
            $('.checkitem').each(function(){
              if($(this).prop("checked")==true){
                ids.push($(this).val());
              }
            });
            $.ajax({
              url:'addPopular.php',
              method:'POST',
              data:{key:'latest',data:ids},
              success:function(res){
                window.location.href= window.location.href;
              }
            })
            // alert(ids);

          })       

      })
    </script>
  </body>
</html>
