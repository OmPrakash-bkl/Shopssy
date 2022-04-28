<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");

if(isset($_SERVER['REQUEST_METHOD'])) {
    $sub_cat_id = $_GET['subcat_id'];
    $require_subcat_id_query = "SELECT * FROM `sub_category` WHERE `sub_cat_id`= $sub_cat_id;";
    $require_subcat_id_result = mysqli_query($conn, $require_subcat_id_query);
    $subcat_id_data = "";
    while($row = mysqli_fetch_assoc($require_subcat_id_result)) {
        $subcat_id_data = $row;
    }
    header("content-type: Content-Type: application/json");
    echo json_encode($subcat_id_data);
       
}


?>