<?php
include('header.php');
require('razor.config.php');
require('config.php');
require('razorpay-php/Razorpay.php');
$orderId = $_GET['order_id'];
$row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `order` WHERE id='$orderId'"));
// print_r($row);
// Create the Razorpay Order
$subtotle = $row['order_amount'];
$user_id = $row['user_id']; 
$userData = mysqli_fetch_assoc(mysqli_query($conn, "select * from user where id = '$user_id'"));
use Razorpay\Api\Api;

$api = new Api($keyId, $keySecret);

//
// We create an razorpay order using orders api
// Docs: https://docs.razorpay.com/docs/orders
//
$orderData = [
    'receipt'         => $orderId,
    'amount'          => $subtotle * 100, // 2000 rupees in paise
    'currency'        => 'INR',
    'payment_capture' => 1 // auto capture
];
    
$razorpayOrder = $api->order->create($orderData);

$razorpayOrderId = $razorpayOrder['id'];

$_SESSION['razorpay_order_id'] = $razorpayOrderId;
mysqli_query($conn,"UPDATE `order` SET `payment_statue`='pending', `razor_pay_order_id`='$razorpayOrderId' WHERE id = '$orderId'");
$displayAmount = $amount = $orderData['amount'];

if ($displayCurrency !== 'INR')
{
    $url = "https://api.fixer.io/latest?symbols=$displayCurrency&base=INR";
    $exchange = json_decode(file_get_contents($url), true);
    $displayAmount = $exchange['rates'][$displayCurrency] * $amount / 100;
}

$checkout = 'automatic';

if (isset($_GET['checkout']) and in_array($_GET['checkout'], ['automatic', 'manual'], true))
{
    $checkout = $_GET['checkout'];
}

$data = [
    "key"               => $keyId,
    "amount"            => $amount,
    "name"              => $userData['fname'],    
    "image"             => "https://s29.postimg.org/r6dj1g85z/daft_punk.jpg",
    "prefill"           => [
    "name"              => $userData['fname'],
    "email"             => $userData['email'],
    "contact"           => $userData['mobile'],
    ],
    "notes"             => [
    "merchant_order_id" => $orderId,
    ],
    "theme"             => [
        "color"         => "#F37254"
    ],
    "order_id"          => $razorpayOrderId,
];


if ($displayCurrency !== 'INR')
{
    $data['display_currency']  = $displayCurrency;
    $data['display_amount']    = $displayAmount;
}

$json = json_encode($data);

require("checkout/{$checkout}.php");
include('footer.php');