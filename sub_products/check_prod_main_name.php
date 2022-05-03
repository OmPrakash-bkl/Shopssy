<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");
$inputData = json_decode(file_get_contents('php://input'), true);

if(isset($_SERVER['REQUEST_METHOD'])) {
   
        $main_image_name = $inputData['main_image_name'];
        $main_image_name_avail_check_query = "SELECT * FROM `products_sub` WHERE `p_image` = '$main_image_name';";
        $main_image_name_avail_check_result = mysqli_query($conn, $main_image_name_avail_check_query);
        $main_image_name_avail_count = mysqli_num_rows($main_image_name_avail_check_result);
        echo $main_image_name_avail_count;
    
}


?>