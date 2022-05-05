<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");

if(isset($_SERVER['REQUEST_METHOD'])) {
    $sub_cat_id = $_GET['sub_cat_id'];
    $require_filter_id_query = "SELECT * FROM `filter` WHERE `subs_cat_identification_id`= $sub_cat_id;";
    $require_filter_id_result = mysqli_query($conn, $require_filter_id_query);
    $filter_id_data = array();
    while($row = mysqli_fetch_assoc($require_filter_id_result)) {
        $filter_id_data[] = $row;
    }
    header("content-type: Content-Type: application/json");
    echo json_encode($filter_id_data);
       
}


?>