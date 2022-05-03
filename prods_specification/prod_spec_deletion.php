<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");
header("Access-Control-Allow_Methods: DELETE");

    if(isset($_SERVER['REQUEST_METHOD'])) {
    
    $products_spec_id = $_GET['products_spec_id'];
    $products_spec_delete_query = "DELETE FROM `products_specification` WHERE  `p_spec_id` = $products_spec_id;";
    mysqli_query($conn, $products_spec_delete_query); 
    echo "Product Specification Deleted Successfully!";
   
}


?>