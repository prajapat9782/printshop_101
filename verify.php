<?php

require('razor.config.php');
require('config.php');
require('function.php');

require('razorpay-php/Razorpay.php');
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

$success = true;

$error = "Payment Failed";
print_r($_POST);

if (empty($_POST['razorpay_payment_id']) === false)
{
    $api = new Api($keyId, $keySecret);

    try
    {
       
        $user_id = $_SESSION['user']['login_id'];
        $order_d = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `order` WHERE `user_id`='$user_id' ORDER BY id DESC  LIMIT 1"));
        $attributes = array(
            'razorpay_order_id' => $order_d['razor_pay_order_id'],
            'razorpay_payment_id' => $_POST['razorpay_payment_id'],
            'razorpay_signature' => $_POST['razorpay_signature']
        );

        $api->utility->verifyPaymentSignature($attributes);
    }
    catch(SignatureVerificationError $e)
    {
        $success = false;
        $error = 'Razorpay Error : ' . $e->getMessage();
    }
}

if ($success === true)
{
    // $html = "<p>Your payment was successful</p>
    //          <p>Payment ID: {$_POST['razorpay_payment_id']}</p>";

             $payment_id = get_safe_value($conn,$_POST['razorpay_payment_id']);
             $order_payment_id = get_safe_value($conn,$_POST['razorpay_order_id']);  
             mysqli_query($conn, "UPDATE `order` SET `payment_statue`='success',`razor_pay_payment_id`='$payment_id' WHERE `razor_pay_order_id`='$order_payment_id'");
            $orderDetails = mysqli_fetch_assoc(mysqli_query($conn, "SELECT id FROM `order` WHERE `razor_pay_order_id`='$order_payment_id'"));
            $order_id = $orderDetails['id'];
             foreach($_SESSION['cart'] as $x => $val){     
                $q = "select * FROM products WHERE id ='$x'";
                $res = mysqli_query($conn, $q);
                $data = mysqli_fetch_assoc($res);                            
                $qty = $val['qty'];
                $totle= ($data['sell_price']*$qty);
                mysqli_query($conn, "INSERT INTO `order_details`( `order_id`, `product_id`, `qty`, `sub_total`) VALUES ('$order_id','$x','$qty','$totle')");
              }
              unset($_SESSION['cart']);


             ?>
             <script>window.location.href='thank_you.php'</script>
             <?php             
}
else
{
    $html = "<p>Your payment failed</p>
             <p>{$error}</p>";
            
}

echo $html;
