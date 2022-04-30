<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");

if(isset($_SERVER['REQUEST_METHOD'])) {
    $bandi_id = $_GET['bandi_id'];
    $require_bandi_details_query = "SELECT * FROM `brand_and_item_list` WHERE `brand_id`= $bandi_id;";
    $require_bandi_details_result = mysqli_query($conn, $require_bandi_details_query);
    $bandi_details_data = "";
    while($row = mysqli_fetch_assoc($require_bandi_details_result)) {
        $bandi_details_data = $row;
    }
    header("content-type: Content-Type: application/json");
    echo json_encode($bandi_details_data);
       
}


?>