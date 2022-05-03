<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");
header("Access-Control-Allow_Methods: DELETE");

    if(isset($_SERVER['REQUEST_METHOD'])) {
    
    $products_review_id = $_GET['products_review_id'];
    $products_review_delete_query = "DELETE FROM `reviews` WHERE  `review_id` = $products_review_id;";
    mysqli_query($conn, $products_review_delete_query); 
    echo "Product Review Deleted Successfully!";
   
}


?>