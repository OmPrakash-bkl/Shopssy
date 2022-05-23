<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");

if(isset($_SERVER['REQUEST_METHOD'])) {

    $inputData = json_decode(file_get_contents('php://input'), true);

    $search_keyword = $inputData['search_keyword'];
    
    if(is_numeric($search_keyword)) {
        $require_cat_data_query = "SELECT * FROM `category` WHERE `cat_id` LIKE '%$search_keyword%';";
    } else {
     $require_cat_data_query = "SELECT * FROM `category` WHERE `cat_title` LIKE '%$search_keyword%' OR `cat_icon_name` LIKE '%$search_keyword%' OR `cat_image_name` LIKE '%$search_keyword%' OR `cat_name_description` LIKE '%$search_keyword%';"; 
    }
    
    $require_cat_data_result = mysqli_query($conn, $require_cat_data_query);
    $search_data = [];
    while($row = mysqli_fetch_assoc($require_cat_data_result)) {
        $search_data[] = $row;
    }
    header("content-type: Content-Type: application/json");
    echo json_encode($search_data);
       
}


?>