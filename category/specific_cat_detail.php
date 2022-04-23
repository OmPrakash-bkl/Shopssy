<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");

if(isset($_SERVER['REQUEST_METHOD'])) {
    $cat_id = $_GET['cat_id'];
    $require_cat_id_query = "SELECT * FROM `category` WHERE `cat_id`= $cat_id;";
    $require_cat_id_result = mysqli_query($conn, $require_cat_id_query);
    $cat_id_data = "";
    while($row = mysqli_fetch_assoc($require_cat_id_result)) {
        $cat_id_data = $row;
    }
    header("content-type: Content-Type: application/json");
    echo json_encode($cat_id_data);
       
}


?>