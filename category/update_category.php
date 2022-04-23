<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");
header("Access-Control-Allow_Methods: POST");

$inputData = json_decode(file_get_contents('php://input'), true);

if(isset($_SERVER['REQUEST_METHOD'])) {

        $cat_id = $inputData['cat_id'];
        $cat_title = $inputData['cat_title'];
        $cat_image_name = $inputData['cat_image_name'];
        $cat_icon_name = $inputData['cat_icon_name'];
        $cat_desc = $inputData['cat_desc'];

        $cat_id = stripcslashes($cat_id);
        $cat_title = stripcslashes($cat_title);
        $cat_image_name = stripcslashes($cat_image_name);
        $cat_icon_name = stripcslashes($cat_icon_name);
        $cat_desc = stripcslashes($cat_desc);
        $cat_id = mysqli_real_escape_string($conn, $cat_id);
        $cat_title = mysqli_real_escape_string($conn, $cat_title);
        $cat_image_name = mysqli_real_escape_string($conn, $cat_image_name);
        $cat_icon_name = mysqli_real_escape_string($conn, $cat_icon_name);
        $cat_desc = mysqli_real_escape_string($conn, $cat_desc);
       
        $category_data_update_query = "UPDATE `category` SET `cat_title` = '$cat_title', `cat_image_name` = '$cat_image_name', `cat_icon_name` = '$cat_icon_name', `cat_name_description` = '$cat_desc' WHERE `cat_id` = $cat_id;";
         mysqli_query($conn, $category_data_update_query);
         echo "Updated Successfully!";
}


?>