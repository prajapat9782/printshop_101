<?php
require('config.php');
require('function.php');
extract($_POST);
// print_r($_POST);
$fname = get_safe_value($conn,$fname);
$lname = get_safe_value($conn,$lname);
// $email = get_safe_value($email);
$email = get_safe_value($conn,$email);
$password = get_safe_value($conn,$password);

$res = mysqli_query($conn, "select * from user where email= '$email'");
$count = mysqli_num_rows($res);
if($count>0){
    echo "reject";
}else{
    $q = "INSERT INTO `user`(`fname`, `lname`, `email`, `mobile`, `password`) VALUES ('$fname','$lname','$email','$mobile','$password')";
    $create = mysqli_query($conn, $q);
    $_SESSION['user']['login']=true;
    $_SESSION['user']['login_id']= mysqli_insert_id($conn);
    $_SESSION['user']['name']  = $fname." ".$lname;    
}
