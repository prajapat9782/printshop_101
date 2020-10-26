<?php
ini_set('display_error',1);
error_reporting( E_ALL );

 include('header.inc.php');  
 include('side.inc.php');   
?>
      

      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header mb-3" style="margin-bottom:10px;">
          
        </section>

        <!-- Main content -->
        <section class="content" >
          <div class="row">
          <div class="col-md-10 offset-2 " style="margin-top:10px">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header text-center">
                  <h3 class="box-title "><b class="text-uppercase"> Send Notification </b></h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <div class="container">
                    <form method="POST" enctype="multipart/form-data">
                    <div class="box-body">
                      <div class="row">
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" class="form-control" name="title" placeholder="Enter Title for Mail"  required>                                
                            </div>
                        </div>
                        <div class="col-xs-6">
                              <div class="form-group">
                                  <label for="exampleInputPassword1">Subject</label>
                                  <input type="text" name="subject" class="form-control"  placeholder="Enter Subject for Mail" required>
                              </div>
                        </div>
                      </div>
                      <!-- <select name="type" class="form-control">                      
                        <option value="all">ALL USER</option>                        
                        <option value="user">SINGup USER</option>                        
                        <option value="unknow">Unknow</option>                        
                      </select> -->
                      <div style="margin-top:10px">
                        <textarea name="editor" id="editor"  class="ckeditor"></textarea>
                      </div>

                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" name="notify" class="btn btn-primary">Send</button>
                    </div>
                    </form>
                </div>
              </div><!-- /.box -->

            </div><!--/.col (left) -->
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
    <!-- cdEditor script -->
    <script src="//cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
    

  </body>
</html>
<?php 
if(isset($_POST['notify'])){
    extract($_POST);
    $res = mysqli_query($conn, "SELECT * FROM `subscriber`");
    $body = $editor;    
   
    
    // mail setup
    $from = 'mymailaccount@freshbrigade.com';
    $fromName = 'printhub.ind.in';
    $to = '';
    $subject = $subject;
    $messgae = ' 
    <html> 
    <head> 
        <title>Welcome to CodexWorld</title> 
    </head> 
    <body> 
        <h1>Update With Us!</h1> 
            '.$body.'
    </body> 
    </html>';
    // echo $messgae;

    // set header
    $headers = "MIME-Version: 1.0" . "\r\n"; 
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
 
    // Additional headers 
    $headers .= 'From: '.$fromName.'<'.$from.'>' . "\r\n"; 
    // $headers .= 'Cc: welcome@example.com' . "\r\n"; 
    // $headers .= 'Bcc: welcome2@example.com' . "\r\n";

    while($row = mysqli_fetch_assoc($res)){
      echo '<pre>';
      echo   $to = $row['email'];
        // mail($to, $subject, $messgae, $headers);
    }
    
}
?>