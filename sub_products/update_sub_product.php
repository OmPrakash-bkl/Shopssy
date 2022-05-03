<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");
header("Access-Control-Allow_Methods: POST");

$inputData = json_decode(file_get_contents('php://input'), true);

if(isset($_SERVER['REQUEST_METHOD'])) {

    $sub_pro_id = $inputData['sub_pro_id'];
    $main_image_name = $inputData['main_image_name'];
    $sub_image_name1 = $inputData['sub_image_name1'];
    $sub_image_name2 = $inputData['sub_image_name2'];
    $sub_image_name3 = $inputData['sub_image_name3'];
    $availability = $inputData['availability'];
    $prod_tag1 = $inputData['prod_tag1'];
    $prod_tag2 = $inputData['prod_tag2'];
    $prod_tag3 = $inputData['prod_tag3'];
    $prod_desc = $inputData['prod_desc'];

    $main_image_name = stripcslashes($main_image_name);
    $sub_image_name1 = stripcslashes($sub_image_name1);
    $sub_image_name2 = stripcslashes($sub_image_name2);
    $sub_image_name3 = stripcslashes($sub_image_name3);
    $availability = stripcslashes($availability);
    $prod_tag1 = stripcslashes($prod_tag1);
    $prod_tag2 = stripcslashes($prod_tag2);
    $prod_tag3 = stripcslashes($prod_tag3);
    $prod_desc = stripcslashes($prod_desc);
  
    $main_image_name = mysqli_real_escape_string($conn, $main_image_name);
    $sub_image_name1 = mysqli_real_escape_string($conn, $sub_image_name1);
    $sub_image_name2 = mysqli_real_escape_string($conn, $sub_image_name2);
    $sub_image_name3 = mysqli_real_escape_string($conn, $sub_image_name3);
    $availability = mysqli_real_escape_string($conn, $availability);
    $prod_tag1 = mysqli_real_escape_string($conn, $prod_tag1);
    $prod_tag2 = mysqli_real_escape_string($conn, $prod_tag2);
    $prod_tag3 = mysqli_real_escape_string($conn, $prod_tag3);
    $prod_desc = mysqli_real_escape_string($conn, $prod_desc);
       
        $sub_products_data_update_query = "UPDATE `products_sub` SET `p_image` = '$main_image_name', `p_s_image1` = '$sub_image_name1', `p_s_image2` = '$sub_image_name2', `p_s_image3` = '$sub_image_name3', `p_avail` = '$availability', `p_tags1` = '$prod_tag1', `p_tags2` = '$prod_tag2', `p_tags3` = '$prod_tag3', `p_desc` = '$prod_desc' WHERE `products_sub_id` = $sub_pro_id;";
         mysqli_query($conn, $sub_products_data_update_query);
         echo "Updated Successfully!";

}


?>