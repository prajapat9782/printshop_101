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
    if(isset($_POST['popular'])){       
      // print_r($_POST['pro_id']);
      extract($_POST);
      foreach($pro_id as $value){
        mysqli_query($conn, "UPDATE `products` set popular = '1' where id = '$value' ");        
      }
    }
    if(isset($_POST['feature'])){       
      // print_r($_POST['pro_id']);
      extract($_POST);
      foreach($pro_id as $value){
        mysqli_query($conn, "UPDATE `products` set feature = '1' where id = '$value' ");        
      }
    }
    if(isset($_POST['latest'])){ 
      // print_r($_POST['pro_id']);
      extract($_POST);
      foreach($pro_id as $value){
        mysqli_query($conn, "UPDATE `products` set latest = '1' where id = '$value' ");        
      }
    }    
      include('side.inc.php');    
?>
      

      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header mb-3">
          <h1 class="pull-left">
          Notification
          </h1>
          <a href="sendNotify.php"><button class="btn btn-primary pull-right " style="margin-bottom:10px">Send Notification</button></a>
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
                            <th>#</th>
                            <th>Title</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Time</th>
                            <th>Opration</th>                          
                        </tr>
                      </thead>
                      <tbody>
                      
                      <?php $q = "SELECT * FROM `notification` WHERE status = '1' ORDER BY id DESC";
                          $res = mysqli_query($conn, $q);
                          $uid = 1;
                          while($row = mysqli_fetch_assoc($res)){ ?>
                                  <tr>                                  
                                    <td><?php echo $uid;  ?></td>
                                    <td><?php echo $row['title']; ?></td>
                                    <td><?php echo $row['subject']; ?></td>
                                    <td><?php echo $row['mgs']; ?></td>                                    
                                    <td class="text-primary" style="font-weight:700"><?php echo date('d/m/Y  h:m:a',strtotime($row['created'])); ?></td>                                    
                                    <td>
                                    <button class="btn btn-danger btn-sm " id="delete_notification" >Delete</button>
                                    <a href="detailsNotification.php?id=<?php echo $row['id']; ?>"><button class="btn btn-info btn-sm " id="delete_notification" > View</button></a>
                                    
                                    </td>
                                                                     
                              </tr>
                        <?php $uid++; } ?>
                      
                      </tbody>
                      <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Time</th>
                            <th>Opration</th>                          
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
        <strong>Copyright &copy; 2020 printhub.ind.in</strong> All rights reserved.
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

        //   $('#checkbox_all').click(function(){
        //     $("input[type='checkbox']").prop('checked',this.checked); //checkitem
        //     // if($(this).is(":checked")){
        //     //   $('.checkitem').props('checked',true);
        //     // }else{
        //     //   $('.checkitem').props('checked',false);
        //     // }
        //   });        

      })
    </script>
  </body>
</html>
