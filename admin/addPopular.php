<?php
include('config.php');
if($_SERVER['REQUEST_METHOD']=='POST'){
    extract($_POST);
}else{
    extract($_GET);
}

if($key=='popular'){
    
    foreach($data as $value){        
        mysqli_query($conn, "UPDATE `products` set popular = '1' where id = '$value' ");        
    }
    echo 'success';
}
else if($key=='feature'){
    foreach($data as $value){        
        mysqli_query($conn, "UPDATE `products` set feature = '1' where id = '$value' ");        
    }
    echo 'success';
}
else if($key=='latest'){
    foreach($data as $value){        
        mysqli_query($conn, "UPDATE `products` set latest = '1' where id = '$value' ");        
    }
    echo 'success';
}
else{
    echo 'failed';
}