<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");
header("Access-Control-Allow_Methods: DELETE");

    if(isset($_SERVER['REQUEST_METHOD'])) {
    
    $p_id = $_GET['p_id'];
    $p_delete_query = "DELETE FROM `products` WHERE  `p_id` = $p_id;";
    mysqli_query($conn, $p_delete_query); 
    echo "Product Deleted Successfully!";
   
}


?>