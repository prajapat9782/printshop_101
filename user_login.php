<?php
require('config.php');
require('function.php');
extract($_POST);
$email = get_safe_value($conn,$email);
$password = get_safe_value($conn,$password);
$res = mysqli_query($conn, "select * from user where email= '$email'");
$count = mysqli_num_rows($res);
if($count>0){
    $data=mysqli_fetch_assoc($res);
    if($data['password']==$password){
        $_SESSION['user']['login']=true;
        $_SESSION['user']['login_id']= $data['id'];
        $_SESSION['user']['wholesaler']= $data['wholesaler'];
        echo "accept";
    }
    else{
        echo 'missmatch';
    }
}else{
    echo "reject";
}
