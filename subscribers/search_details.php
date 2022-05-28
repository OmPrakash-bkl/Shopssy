<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");

if(isset($_SERVER['REQUEST_METHOD'])) {

    $inputData = json_decode(file_get_contents('php://input'), true);

    $search_keyword = $inputData['search_keyword'];
    
    if(is_numeric($search_keyword)) {
        $require_subscriber_data_query = "SELECT * FROM `email_subscription` WHERE `id` LIKE '%$search_keyword%';";
    } else {
     $require_subscriber_data_query = "SELECT * FROM `email_subscription` WHERE `user_email` LIKE '%$search_keyword%';"; 
    }
    
    $require_subscriber_data_result = mysqli_query($conn, $require_subscriber_data_query);
    $search_data = [];
    while($row = mysqli_fetch_assoc($require_subscriber_data_result)) {
        $search_data[] = $row;
    }
    header("content-type: Content-Type: application/json");
    echo json_encode($search_data);
       
}


?>