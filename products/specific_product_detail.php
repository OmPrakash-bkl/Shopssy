<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");

if(isset($_SERVER['REQUEST_METHOD'])) {
    $p_id = $_GET['p_id'];
    $require_prod_details_query = "SELECT * FROM `products` WHERE `p_id`= $p_id;";
    $require_prod_details_result = mysqli_query($conn, $require_prod_details_query);
    $prod_details_data = "";
    while($row = mysqli_fetch_assoc($require_prod_details_result)) {
        $prod_details_data = $row;
    }
    header("content-type: Content-Type: application/json");
    echo json_encode($prod_details_data);
       
}


?>