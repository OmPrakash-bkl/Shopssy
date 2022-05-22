<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");

if(isset($_SERVER['REQUEST_METHOD'])) {

    $inputData = json_decode(file_get_contents('php://input'), true);

    $search_keyword = $inputData['search_keyword'];
    
    if(is_numeric($search_keyword)) {
        $require_user_data_query = "SELECT * FROM `register` WHERE `user_id` LIKE '%$search_keyword%';";
    } else {
     $require_user_data_query = "SELECT * FROM `register` WHERE `f_name` LIKE '%$search_keyword%' OR `l_name` LIKE '%$search_keyword%' OR `email` LIKE '%$search_keyword%';"; 
    }
    
    $require_user_data_result = mysqli_query($conn, $require_user_data_query);
    $registered_data = [];
    while($row = mysqli_fetch_assoc($require_user_data_result)) {
        $registered_data[] = $row;
    }
    header("content-type: Content-Type: application/json");
    echo json_encode($registered_data);
       
}


?>