<?php include('header.php'); 
extract($_POST);
// extract($_FILES);
// print_r($_POST);
// print_r($_FILES);
$baseData = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `complaint` ORDER BY id LIMIT 1"));
$newId = '';
if(isset($baseData['ticket_id'])){
    $newId = $baseData['ticket_id']+1;
}else{
    $newId = 100;
}

if(isset($_FILES['image'])){
    $errors= array();
    $file_name = $_FILES['image']['name'];
    $file_size =$_FILES['image']['size'];
    $file_tmp =$_FILES['image']['tmp_name'];
    $file_type=$_FILES['image']['type'];
    $jfo = explode('.',$_FILES['image']['name']);
    $jos = end($jfo);
    $file_ext=strtolower($jos);
    
    $extensions= array("jpeg","jpg","png");
    
    if(in_array($file_ext,$extensions)=== false){
       $errors[]="extension not allowed, please choose a JPEG or PNG file.";
    }
    
    if($file_size > 2097152){
       $errors[]='File size must be excately 2 MB';
    }
    
    if(empty($errors)==true){
       move_uploaded_file($file_tmp,"complaint/".$file_name);       
    }else{
       print_r($errors);
    }
}

$res = mysqli_query($conn, "INSERT INTO `complaint`( `ticket_id`, `subject`, `type`, `image`, `description`,) 
                            VALUES ('$newId','$subject','$complaint','$desc')");




?>
<!-- style -->
<style>
    #profile-page .profile-top{
        padding-top:10rem;
    }
    #profile-page .profile-main{
        margin:100px auto;
        text-align:center;
    }
    .profile-block{
        margin: 30px auto;
    }
    .profile-block h3{
        color: #ccc;
        font-weight:600;
        font-size:2.5rem;
    }
    .profile-block h3 span{
        color: #000;
        font-size: 3rem;
        margin: 0px 5px;
        /* text-decoration:underline; */
    }
    .profile-block a{
        color: blue;
        text-align:left;
    }
    

</style>

<!-- profile order form start -->
<section id="profile-page">
    <div class="profile-top"></div>
    
    <div class="container profile-main">
            <h1 class="profile-title"><u ></u></h1>
            <div class="row profile-block">
                    <h3>Your Ticket Number :- <span><?php echo $newId ;?></span></h3>
                 <a href="getstatus.php">Get Status</a>
                
            </div>
    </div>
</section>
<hr>
<!-- profile order form end -->
<?php include('footer.php');  ?>
