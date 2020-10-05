<?php include('header.inc.php');
      include('side.inc.php');   
      
      if(isset($_GET['id'])){
          $id= $_GET['id'];
          echo $value= $_GET['value'];
          if($value=='1'){
              $change ='0';
          }if($value=='0'){
              $change='1';
          }
          
          mysqli_query($conn, "UPDATE `user` SET `wholesaler`='$change' WHERE id= '$id' ");
          ?><script>window.location.href='user.php';</script><?php
      }

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
                        <th>Id</th>
                        <th>User</th>
                        <th>Status</th>
                        <th>Wholesale/User</th>                                                
                      </tr>
                    </thead>
                    <tbody>
                        <?php $uid=1;
                            $res = mysqli_query($conn, "SELECT * FROM `user`");
                            while($row= mysqli_fetch_assoc($res)){ ?>
                            <tr>
                                <td><?php echo $uid; ?></td>
                                <td><?php echo $row['fname'].' '.$row['lname']; ?></td>
                                <td><?php  if($row['status']=='1'){echo 'Avtive';}else{echo 'Inactive';} ?></td>
                                <td>
                                    <a href="user.php?id=<?php echo $row['id']?>&value=<?php echo $row['wholesaler']?>">
                                        <button class="btn btn-info btn-sm " >
                                            <?php if($row['wholesaler']=='1'){echo 'Wholesaler';}else{echo 'User';} ; ?>
                                        </button>   
                                    </a>
                                </td>
                                
                            </tr>

                        <?php $uid++; }?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Id</th>
                        <th>User</th>
                        <th>Status</th>
                        <th>Wholesale</th>                                                
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
        $( ".ws-change" ).click(function() {
            id= $(this).attr('key');
            value= $(this).attr('keyValues');            
            
                $.ajax({
                    url:'wholesale.php',
                    method:'POST',
                    data:{id:id,value:value},
                    success:fuction(res){
                        alert(res);
                    }
                });
        });

      });
    </script>

  </body>
</html>
