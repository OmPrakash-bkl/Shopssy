<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");
header("Access-Control-Allow_Methods: DELETE");

    if(isset($_SERVER['REQUEST_METHOD'])) {
    
    $sub_pro_id = $_GET['sub_pro_id'];
    $sub_pro_id_delete_query = "DELETE FROM `products_sub` WHERE  `products_sub_id` = $sub_pro_id;";
    mysqli_query($conn, $sub_pro_id_delete_query); 
    echo "Category Deleted Successfully!";
   
}


?>