<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");

if(isset($_SERVER['REQUEST_METHOD'])) {
    $sub_filter_id = $_GET['sub_filter_id'];
    $require_filter_details_query = "SELECT * FROM `filter_sub` WHERE `filter_sub_id`= '$sub_filter_id';";
    $require_filter_details_result = mysqli_query($conn, $require_filter_details_query);
    $filter_details_data = "";
    while($row = mysqli_fetch_assoc($require_filter_details_result)) {
        $filter_details_data = $row;
    }
    header("content-type: Content-Type: application/json");
    echo json_encode($filter_details_data);
       
}


?>