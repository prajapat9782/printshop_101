<?php 
if(empty($_POST['check'])){   
   exit('something went wrong!');
}
else{
    include('config.php');
    
    extract($_POST);
    $product_id = $_POST['p_id'];
    $pdata = mysqli_fetch_assoc(mysqli_query($conn, "select * from products where id = '$product_id' limit 1"));
    $data = array('id'=> $pdata['id'],'image'=>$pdata['image'],'price'=>$pdata['price']);
    if(isset($_SESSION['items'])){
        array_push($_SESSION['items'],$data);
    }else{
        $_SESSION['items'] = $data;
    }
    
    print_r($_SESSION['items']);

   die;
    
  
    
    
}

