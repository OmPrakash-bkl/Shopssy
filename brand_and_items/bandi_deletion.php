<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");
header("Access-Control-Allow_Methods: DELETE");

    if(isset($_SERVER['REQUEST_METHOD'])) {
    
    $brand_id = $_GET['brand_id'];
    $brand_delete_query = "DELETE FROM `brand_and_item_list` WHERE  `brand_id` = $brand_id;";
    mysqli_query($conn, $brand_delete_query); 
    echo "Brand&Items Deleted Successfully!";
   
}


?>