<?php 
session_start();
$conn = mysqli_connect("localhost","root","","print");
if(mysqli_connect_errno()){
    echo "something went wrong ".mysqli_connect_errno();
   exit();
}
include('function.inc.php');