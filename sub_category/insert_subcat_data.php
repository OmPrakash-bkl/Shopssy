<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");

if(isset($_SERVER['REQUEST_METHOD'])) {
  // Category Data Insertion Section

  $inputData = json_decode(file_get_contents('php://input'), true);
 
  $cats_id = $inputData['cats_id'];
  $sub_cat_identification_id = $inputData['sub_cat_identification_id'];
  $sub_cat_identification_id_two = $inputData['sub_cat_identification_id_two'];
  $sub_cat_title = $inputData['sub_cat_title'];
  $sub_cat_image_name = $inputData['sub_cat_image_name'];
  $sub_cat_title = stripcslashes($sub_cat_title);
  $sub_cat_image_name = stripcslashes($sub_cat_image_name);
 
  $sub_cat_title = mysqli_real_escape_string($conn, $sub_cat_title);
  $sub_cat_image_name = mysqli_real_escape_string($conn, $sub_cat_image_name);
 
  $data_insert_query = "INSERT INTO `sub_category` (`cats_id`, `sub_cat_identification_id`, `sub_cat_identification_id_two`, `subs_cat_title`, `sub_cat_image_name`) VALUES ('$cats_id', '$sub_cat_identification_id', '$sub_cat_identification_id_two', '$sub_cat_title', '$sub_cat_image_name');";
  $data_insert_result = mysqli_query($conn, $data_insert_query);
 
  echo "Inserted Successfully!";


}


?>