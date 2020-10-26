<?php
include('config.php');
if($_SERVER['REQUEST_METHOD']=='POST'){
    extract($_POST);
}else{
    extract($_GET);
}
$user_id = $_SESSION['user']['login_id'];
$details = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `user` where id='$user_id'"));
if($details['password']!=$oldpass){
    echo json_encode(['code'=>201,'status'=>'failed','message'=>'Incorrect old password']);
}else{
    $res= mysqli_query($conn, "UPDATE `user` SET `password`='$pass' WHERE id = '$user_id' ");
    if($res){
        echo json_encode(['code'=>200,'status'=>'success','message'=>'Password Successfully update']);
    }else{
        echo json_encode(['code'=>201,'status'=>'success','message'=>'Something Went Wrong']);
    }
}