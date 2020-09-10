<?php
require('config.php');
require('function.php');
extract($_POST);
$email = get_safe_value($conn,$email);
$password = get_safe_value($conn,$password);
$res = mysqli_query($conn, "select * from user where email= '$email' and password = '$password'");
$count = mysqli_num_rows($res);
if($count>0){
    echo "accept";
}else{
    echo "reject";
}
