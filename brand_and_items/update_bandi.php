<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");
header("Access-Control-Allow_Methods: POST");

$inputData = json_decode(file_get_contents('php://input'), true);

if(isset($_SERVER['REQUEST_METHOD'])) {

    $brand_id = $inputData['brand_id'];
    $b_titles = $inputData['b_titles'];
    $b_sub_titles = $inputData['b_sub_titles'];
    $b_sub_title_two = $inputData['b_sub_title_two'];
       
        $brand_id = stripcslashes($brand_id);
        $b_titles = stripcslashes($b_titles);
        $b_sub_titles = stripcslashes($b_sub_titles);
        $b_sub_title_two = stripcslashes($b_sub_title_two);
      

        $brand_id = mysqli_real_escape_string($conn, $brand_id);
        $b_titles = mysqli_real_escape_string($conn, $b_titles);
        $b_sub_titles = mysqli_real_escape_string($conn, $b_sub_titles);
        $b_sub_title_two = mysqli_real_escape_string($conn, $b_sub_title_two);
       
       
        $bandi_data_update_query = "UPDATE `brand_and_item_list` SET `b_title` = '$b_titles', `b_sub_title` = '$b_sub_titles', `b_sub_title_two` = '$b_sub_title_two' WHERE `brand_id` = $brand_id;";
         mysqli_query($conn, $bandi_data_update_query);
         echo "Updated Successfully!";
}


?>