<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");
header("Access-Control-Allow_Methods: POST");

$inputData = json_decode(file_get_contents('php://input'), true);

if(isset($_SERVER['REQUEST_METHOD'])) {

    $like_array = array();
    $dislike_array = array();
    $like_and_dislike_array = array();

    for($i = 0; $i < count($inputData); $i++) {
        $like_check_query = "SELECT COUNT(is_like) AS `like_cou` FROM `sub_reviews` WHERE `review_id` = $inputData[$i] AND `is_like` = 1;";
        $like_check_result = mysqli_query($conn, $like_check_query);
        $like_check_result_value = mysqli_fetch_assoc($like_check_result);
        $like_array[$i] = $like_check_result_value['like_cou'];
    }

    for($i = 0; $i < count($inputData); $i++) {
        $dislike_check_query = "SELECT COUNT(is_dislike) AS `dislike_cou` FROM `sub_reviews` WHERE `review_id` = $inputData[$i] AND `is_dislike` = 1;";
        $dislike_check_result = mysqli_query($conn, $dislike_check_query);
        $dislike_check_result_value = mysqli_fetch_assoc($dislike_check_result);
        $dislike_array[$i] = $dislike_check_result_value['dislike_cou'];
    }
    $like_and_dislike_array[0] = $like_array;
    $like_and_dislike_array[1] = $dislike_array;

    header("content-type: Content-Type: application/json");
    echo json_encode($like_and_dislike_array);
       
}


?>