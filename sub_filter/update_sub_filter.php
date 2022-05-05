<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");
header("Access-Control-Allow_Methods: POST");

$inputData = json_decode(file_get_contents('php://input'), true);

if(isset($_SERVER['REQUEST_METHOD'])) {

    $sub_filter_id = $inputData['sub_filter_id'];
    $filteres_id = $inputData['filteres_id'];
    $sub_filter_data = $inputData['sub_filter_data'];
   
       
    $sub_filter_id = stripcslashes($sub_filter_id);
    $filteres_id = stripcslashes($filteres_id);
    $sub_filter_data = stripcslashes($sub_filter_data);

    //$sub_filter_id = stripcslashes($sub_filter_id);
    $filteres_id = mysqli_real_escape_string($conn, $filteres_id);
       
       
    $sub_filter_data_update_query = "UPDATE `filter_sub` SET `filter_datas` = '$sub_filter_data' WHERE `filter_sub_id` = $sub_filter_id;";
    mysqli_query($conn, $sub_filter_data_update_query);
    echo "Updated Successfully!";
}


?>