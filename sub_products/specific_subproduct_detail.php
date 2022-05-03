<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");

if(isset($_SERVER['REQUEST_METHOD'])) {
    $sub_pro_id = $_GET['sub_pro_id'];
    $require_sub_pro_id_query = "SELECT * FROM `products_sub` WHERE `products_sub_id`= $sub_pro_id;";
    $require_sub_pro_id_result = mysqli_query($conn, $require_sub_pro_id_query);
    $sub_pro_id_data = "";
    while($row = mysqli_fetch_assoc($require_sub_pro_id_result)) {
        $sub_pro_id_data = $row;
    }
    header("content-type: Content-Type: application/json");
    echo json_encode($sub_pro_id_data);
       
}


?>