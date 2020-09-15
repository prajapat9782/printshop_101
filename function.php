<?php


function get_safe_value($conn, $str){
    return mysqli_real_escape_string($conn, $str);
}

function Pre($solo){
    echo '<pre>';
    print_r($solo);
} 
?>