<?php 
session_start();
$conn = mysqli_connect("localhost","root","","print");
if(!$conn){
    echo "something went wrong ".mysqli_connect_error();
   exit();
}else{
    include('function.inc.php');
}