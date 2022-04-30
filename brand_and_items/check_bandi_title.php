<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");
$inputData = json_decode(file_get_contents('php://input'), true);

if(isset($_SERVER['REQUEST_METHOD'])) {
        $b_titles = $inputData['b_titles'];
        $b_titles_avail_check_query = "SELECT * FROM `brand_and_item_list` WHERE `b_title` = '$b_titles';";
        $b_titles_avail_check_result = mysqli_query($conn, $b_titles_avail_check_query);
        $b_titles_avail_count = mysqli_num_rows($b_titles_avail_check_result);
        echo $b_titles_avail_count;
}


?>