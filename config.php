<?php
if(session_id() == '') {
    session_start();
}
$host = "localhost";
$usrname ="root";
$password ="";
$db_name = "print";


$conn = mysqli_connect($host, $usrname, $password, $db_name);

if(mysqli_connect_errno()){
    echo "something went wrong ".mysqli_connect_errno();
    die;
    
}
