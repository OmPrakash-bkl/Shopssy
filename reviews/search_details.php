<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");

if(isset($_SERVER['REQUEST_METHOD'])) {

    $inputData = json_decode(file_get_contents('php://input'), true);

    $search_keyword = $inputData['search_keyword'];
    
    if(is_numeric($search_keyword)) {
        $require_data_query = "SELECT * FROM `reviews` WHERE `review_id` LIKE '%$search_keyword%';";
    } else {
     $require_data_query = "SELECT * FROM `reviews` WHERE `p_customer_name` LIKE '%$search_keyword%' OR `p_desc` LIKE '%$search_keyword%';"; 
    }
    
    $require_data_result = mysqli_query($conn, $require_data_query);
    $search_data = [];
    while($row = mysqli_fetch_assoc($require_data_result)) {
        $search_data[] = $row;
    }
    header("content-type: Content-Type: application/json");
    echo json_encode($search_data);
       
}


?>