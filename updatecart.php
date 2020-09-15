<?php 
include('config.php');
include('function.php');
include('cart.inc.php');
extract($_POST);
// print_r($_POST);
// die;

$pid = get_safe_value($conn, $_POST['pid']);
$qty = get_safe_value($conn, isset($_POST['qty'])?$_POST['qty']:0);
$type = get_safe_value($conn, $_POST['type']);




$cart = new add_to_cart();


if($type=='add'){   
    $cart->addproduct($pid,$qty);
}
if($type=='remove'){
    $cart->removeProduct($pid);
}
if($type=='update'){
    $cart->updateProduct($pid,$qty);
}
if($type=='empty'){
    $cart->emptycart();
}
echo $cart->countProduct();
die;