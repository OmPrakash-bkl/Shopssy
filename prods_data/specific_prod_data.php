<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");

if(isset($_SERVER['REQUEST_METHOD'])) {
    $field_name = $_GET['proper_name'];
    $field_val = $_GET['proper_val'];
    $tab_name = $_GET['tab_name'];
    $require_prods_details_query = "SELECT * FROM $tab_name WHERE $field_name = '$field_val';";
    $require_prods_details_result = mysqli_query($conn, $require_prods_details_query);
    $prods_details_data = "";
    while($row = mysqli_fetch_assoc($require_prods_details_result)) {
        $prods_details_data = $row;
    }
    header("content-type: Content-Type: application/json");
    echo json_encode($prods_details_data);
       
}


?>