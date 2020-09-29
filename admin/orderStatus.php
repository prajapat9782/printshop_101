<?php
include('config.php');
extract($_POST);
print_r($_POST);

$res = mysqli_query($conn, "UPDATE `order` SET `order_statue`='$status' WHERE id = '$id'");
if($res){
    $_SESSION['form']['success']='Status Successfully Changeed ';
}else{
    $_SESSION['form']['error']='something went wrong!';
}




