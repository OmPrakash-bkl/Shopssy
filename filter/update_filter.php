<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");
header("Access-Control-Allow_Methods: POST");

$inputData = json_decode(file_get_contents('php://input'), true);

if(isset($_SERVER['REQUEST_METHOD'])) {

    $subs_cats_id = $inputData['subs_cats_id'];
    $filters_id = $inputData['filters_id'];
    $filteres_title = $inputData['filteres_title'];
    $details_for_which_prod = $inputData['details_for_which_prod'];
    $filter_sub_title = $inputData['filter_sub_title'];
       
    $filters_id = stripcslashes($filters_id);
    $filteres_title = stripcslashes($filteres_title);
    $filter_sub_title = stripcslashes($filter_sub_title);
    $details_for_which_prod = stripcslashes($details_for_which_prod);
    $subs_cats_id = stripcslashes($subs_cats_id);

    $subs_cats_id = stripcslashes($subs_cats_id);
    $filters_id = mysqli_real_escape_string($conn, $filters_id);
       
       
    $filter_data_update_query = "UPDATE `filter` SET `subs_cat_identification_id` = $subs_cats_id,`filter_title` = '$filteres_title', `filter_sub_title` = '$filter_sub_title', `filter_details_category` = '$details_for_which_prod' WHERE `filter_id` = $filters_id;";
    mysqli_query($conn, $filter_data_update_query);
    echo "Updated Successfully!";
}


?>