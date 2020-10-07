<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

$host = "localhost";
$usrname ="root";
$password ="";
$db_name = "print";


$conn = mysqli_connect($host, $usrname, $password, $db_name);

if(!$conn){
    echo "something went wrong ".mysqli_connect_error();
    die;    
}

