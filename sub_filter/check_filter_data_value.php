<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");
$inputData = json_decode(file_get_contents('php://input'), true);

if(isset($_SERVER['REQUEST_METHOD'])) {
        $filteres_id = $inputData['filteres_id'];
        $sub_filter_data = $inputData['sub_filter_data'];
        $filteres_data_avail_check_query = "SELECT * FROM `filter_sub` WHERE `filter_datas` = '$sub_filter_data' AND `filters_id` = $filteres_id;";
        $filteres_data_avail_check_result = mysqli_query($conn, $filteres_data_avail_check_query);
        $filteres_data_avail_count = mysqli_num_rows($filteres_data_avail_check_result);
        echo $filteres_data_avail_count;
}


?>