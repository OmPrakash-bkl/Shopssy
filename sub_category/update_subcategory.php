<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");
header("Access-Control-Allow_Methods: POST");

$inputData = json_decode(file_get_contents('php://input'), true);

if(isset($_SERVER['REQUEST_METHOD'])) {

        $cats_id = $inputData['cats_id'];
        $sub_cat_title = $inputData['sub_cat_title'];
        $sub_cat_image_name = $inputData['sub_cat_image_name'];
       
        $cats_id = stripcslashes($cats_id);
        $sub_cat_title = stripcslashes($sub_cat_title);
        $sub_cat_image_name = stripcslashes($sub_cat_image_name);
      
        $cats_id = mysqli_real_escape_string($conn, $cats_id);
        $sub_cat_title = mysqli_real_escape_string($conn, $sub_cat_title);
        $sub_cat_image_name = mysqli_real_escape_string($conn, $sub_cat_image_name);
       
       
        $subcategory_data_update_query = "UPDATE `sub_category` SET `subs_cat_title` = '$sub_cat_title', `sub_cat_image_name` = '$sub_cat_image_name' WHERE `sub_cat_id` = $cats_id;";
         mysqli_query($conn, $subcategory_data_update_query);
         echo "Updated Successfully!";
}


?>