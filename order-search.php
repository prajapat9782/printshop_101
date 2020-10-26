<?php
include('config.php');
if($_SERVER['REQUEST_METHOD']=='POST'){
    extract($_POST);
}else{
    extract($_GET);
}
$res = mysqli_query($conn, "SELECT `order`.*, `order_status`.`staus_name` as orderStatus FROM `order` INNER JOIN `order_status` on `order`.`order_statue`=`order_status`.`sn` WHERE `order`.`id`='$orderid'");
$count = mysqli_num_rows($res);
if($count==0){
    echo json_encode(['status'=>'failed','message'=>'No record found']);
}else{
    $details = mysqli_fetch_assoc($res);
    echo json_encode(['status'=>'success','detail'=>$details]);
}