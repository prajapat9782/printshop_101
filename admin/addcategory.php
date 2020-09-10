<?php
if(!isset($_GET['action']) || $_GET['action']==''){
    header('Location: category.php');
}
 include('header.inc.php');  
 include('side.inc.php');  
 if(isset($_GET['action']) && $_GET['action']=='update'){
   $product_id = $_GET['id'];
   $res =  mysqli_query($conn, "SELECT * FROM `category` WHERE `id` = '$product_id' LIMIT 1");
  $data = mysqli_fetch_assoc($res);
 }
?>
      

      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header mb-3" style="margin-bottom:10px;">
          
        </section>

        <!-- Main content -->
        <section class="content" >
          <div class="row">
          <div class="col-md-10 offset-2" style="margin-top:10px">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header text-center">
                  <h3 class="box-title "><b class="text-uppercase"><?php echo $_GET['action']?></b> Product Details</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <div class="container">
                    <form method="POST" enctype="multipart/form-data">
                    <div class="box-body">
                      <div class="row">
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter Name" value="<?php echo isset($data['name'])?$data['name']:''?>" required>
                                <input type="hidden" name="id" value="<?php echo isset($data['id'])?$data['id']:''?>">
                                <input type="hidden" name="action" value="<?php echo $_GET['action']?>">
                            </div>
                        </div>
                        <div class="col-xs-6">
                              <div class="form-group">
                                  <label for="exampleInputPassword1">Tags</label>
                                  <input type="text" name="tag" class="form-control"  placeholder="price" value="<?php echo isset($data['tag'])?$data['tag']:''?>" required>
                              </div>
                        </div>
                      </div>
                        
                        
                        <div class="row">
                            <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Image</label>
                                        <input type="file" name="image">                      
                                    </div>
                            </div>
                            <div class="col-xs-6">
                                    <?php if(isset($data['image'])){ ?>
                                            <img src="../media/category/<?php echo $data['image']?>" alt="category image" width="65px" height="65px">
                                  <?php  }?>
                            </div>
                           
                        </div>
                        <div class="form-group">
                          <label for="short_desc">category Status</label>
                          <select name="status" class="form-control">
                                <option value="1" <?php if(isset($data['status'])){if($data['status']=='1'){echo 'selected';}}?> >Active</option>
                                <option value="0" <?php if(isset($data['status'])){if($data['status']=='0'){echo 'selected';}}?> >Deactive</option>
                          </select>
                        </div>
                       
                       
                       
                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" name="add_category" class="btn btn-primary">Submit</button>
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
    

  </body>
</html>
<?php
if(isset($_POST['add_category'])){
  extract($_POST);
  // print_r($_POST);
  // die;
  $name = get_safe_value($conn, $name);
  
  if(isset($_FILES['image'])){
    $errors= array();
    $file_name = $_FILES['image']['name'];
    $file_size =$_FILES['image']['size'];
    $file_tmp =$_FILES['image']['tmp_name'];
    $file_type=$_FILES['image']['type'];
    $file_ect_tmp = explode('.',$_FILES['image']['name']);
    $file_ext=strtolower(end($file_ect_tmp));
    
    $extensions= array("jpeg","jpg","png");
    
    if(in_array($file_ext,$extensions)=== false){
       $errors[]="extension not allowed, please choose a JPEG or PNG file.";
    }
    
    if($file_size > 2097152){
       $errors[]='File size must be excately 2 MB';
    }
    
    if(empty($errors)==true){
       move_uploaded_file($file_tmp,"../media/category/".$file_name);
       
    }else{
       print_r($errors);
    }
 }
 if($action == 'add'){
    $q = "INSERT INTO `category`(`name`, `image`, `tag`, `status`) VALUES ('$name','$file_name','$tag','$status')";
  
    if(mysqli_query($conn, $q)){
      $_SESSION['form']['success']='Category successfully added ';
      echo "<script>window.location.href ='category.php'</script>";
    }else{
      $_SESSION['form']['error']='something went wrong!';
      echo "<script>window.location.href ='category.php'</script>";
    }
 }
 else{
    if($file_name!=''){
      $q = "UPDATE `category` SET`name`='$name',`image`='$file_name',`tag`='$tag',`status`='$status' WHERE `id`='$id' ";
    }else{
      $q = "UPDATE `category` SET`name`='$name',`tag`='$tag',`status`='$status' WHERE `id`='$id' ";
    }
    if(mysqli_query($conn, $q)){
      $_SESSION['form']['success']='Category Update ';
      echo "<script>window.location.href ='category.php'</script>";
    }else{
      $_SESSION['form']['error']='something went wrong! ';
      echo "<script>window.location.href ='category.php'</script>";
    }
 }
 
}  
?>