<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");

if(isset($_SERVER['REQUEST_METHOD'])) {
    $products_spec_id = $_GET['products_spec_id'];
    $require_products_spec_id_query = "SELECT * FROM `products_specification` WHERE `p_spec_id`= $products_spec_id;";
    $require_products_spec_id_result = mysqli_query($conn, $require_products_spec_id_query);
    $products_spec_id_data = "";
    while($row = mysqli_fetch_assoc($require_products_spec_id_result)) {
        $products_spec_id_data = $row;
    }
    header("content-type: Content-Type: application/json");
    echo json_encode($products_spec_id_data);
       
}


?>