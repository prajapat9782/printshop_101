<?php include('include/header.php'); ?>
       
        <div class="page-wrapper">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-body">
                            <h4 class="card-title">Create User</h4>                          
                            <form class="form-horizontal m-t-40" action="create_area.php" method="POST" enctype="multipart/form-data">                                                               
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="user name.." required>
                                </div>
                                 <div class="form-group">
                                    <label>Mobile Number</label>
                                    <input type="text" class="form-control" name="mob" placeholder="Mobile number" required>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="pass" required placeholder="********">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" required placeholder="user@gmail.com">
                                </div>
                                <div class="form-group">
                                    <label>Area</label>
                                    <select name="area" >
                                        <?php $Aquery= mysqli_query($conn, "select * from areas where status = '1'");
                                            while($row = mysqli_fetch_query($Aquery)){
                                        ?>
                                                <option value="<?php echo $row['id'] ?>"><?php echo $row['areasname'] ?></option>
                                        <?php } ?>
                                    </select>
                                    
                                </div>
                                <div class="form-group">
                                    <label>Area Status</label>
                                    <!-- <input type="text" class="form-control" placeholder="area status.."> -->
                                    <select class="form-control" name="status" >
                                        <option value="">select</option>
                                        <option value="1">active</option>
                                        <option value="2">inactive</option>
                                    </select>
                                </div>
                                <button type="submit" name ="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                                <a class="btn btn-inverse waves-effect waves-light" href="index.php">Cancel</a> 
                            </form>
                        </div>
                    </div>
            </div>        
        </div>
                <!-- Row -->
               
            <footer class="footer"> © 2020 Dhanuinfo.com </footer>
            </div>
         </div>
     <?php include('include/footer.php');?>

     <?php
        if(isset($_POST['submit'])){
            extract($_POST);
            print_r($_POST);

        

         if($result){
                echo "<script>alert('successfully Added');</script>";
            }else{
               echo "<script>alert('error');</script>";
            }
        }

?>