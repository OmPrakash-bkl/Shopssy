<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");

if(isset($_SERVER['REQUEST_METHOD'])) {
    $sub_c_i_id_two = $_GET['sub_c_i_id_two'];
    $setof_bandi_details_query = "SELECT * FROM `brand_and_item_list` WHERE `subs_cat_identification_id_two`= $sub_c_i_id_two;";
    $setof_bandi_details_result = mysqli_query($conn, $setof_bandi_details_query);
    $setof_bandi_details_data = array();
    while($row = mysqli_fetch_assoc($setof_bandi_details_result)) {
        $setof_bandi_details_data[] = $row;
    }
    header("content-type: Content-Type: application/json");
    echo json_encode($setof_bandi_details_data);
       
}


?>