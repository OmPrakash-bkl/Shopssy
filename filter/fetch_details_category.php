<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");

if(isset($_SERVER['REQUEST_METHOD'])) {

    $data_of_filter_query = "SELECT table_name AS `filter_details_category`
    FROM information_schema.tables WHERE TABLE_NAME LIKE '%filter_detail_for%';";

    $data_of_filter_result = mysqli_query($conn, $data_of_filter_query);
    while($row = mysqli_fetch_assoc($data_of_filter_result)) {
        $data_of_filter[] = $row; 
    }
    header("content-type: Content-Type: application/json");
    echo json_encode($data_of_filter);
       
}


?>