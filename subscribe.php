<?php
include('config.php');
if($_SERVER['REQUEST_METHOD']=='POST'){
    extract($_POST);
}else{
    extract($_GET);
}
$email = mysqli_real_escape_string($conn, $email);
if(isset($_SESSION['user']['login'])){
    $type='user';
}else{
    $type="unknow";
}
$found= mysqli_query($conn, "SELECT * FROM `subscriber` WHERE email = '$email' ");
$count = mysqli_num_rows($found);
if($count>0){
    $res = false;
}else{
    $res = mysqli_query($conn, "INSERT INTO `subscriber`(`email`, `type`) VALUES ('$email','$type')");
}
if($res){
    $_SESSION['subscribe']=true;
}else{
    $_SESSION['subscribe']=false;
}



