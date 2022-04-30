<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");

if(isset($_SERVER['REQUEST_METHOD'])) {
  // Category Data Insertion Section

  $inputData = json_decode(file_get_contents('php://input'), true);
 
  $cats_ids = $inputData['cats_ids'];
  $sub_cat_identy_ids = $inputData['sub_cat_identy_ids'];
  $sub_cat_identy_ids_two = $inputData['sub_cat_identy_ids_two'];
  $b_and_i_ids = $inputData['b_and_i_ids'];
  $b_titles = $inputData['b_titles'];
  $b_sub_titles = $inputData['b_sub_titles'];
  $b_sub_title_two = $inputData['b_sub_title_two'];
  
  $b_titles = stripcslashes($b_titles);
  $b_sub_titles = stripcslashes($b_sub_titles);
  $b_sub_title_two = stripcslashes($b_sub_title_two);

 
  $b_titles = mysqli_real_escape_string($conn, $b_titles);
  $b_sub_titles = mysqli_real_escape_string($conn, $b_sub_titles);
  $b_sub_title_two = mysqli_real_escape_string($conn, $b_sub_title_two);

 
  $data_insert_query = "INSERT INTO `brand_and_item_list` (`cats_id`, `subs_cat_identification_id`, `subs_cat_identification_id_two`, `b_and_i_identification_id`, `b_title`, `b_sub_title`, `b_sub_title_two`) VALUES ('$cats_ids', '$sub_cat_identy_ids', '$sub_cat_identy_ids_two', '$b_and_i_ids', '$b_titles', '$b_sub_titles', '$b_sub_title_two');";
  $data_insert_result = mysqli_query($conn, $data_insert_query);
 
  echo "Inserted Successfully!";


}


?>