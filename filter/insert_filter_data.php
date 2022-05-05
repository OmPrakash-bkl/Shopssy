<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");

if(isset($_SERVER['REQUEST_METHOD'])) {
  // Category Data Insertion Section

  $inputData = json_decode(file_get_contents('php://input'), true);
 
  $subs_cats_id = $inputData['subs_cats_id'];
  $filteres_title = $inputData['filteres_title'];
  $details_for_which_prod = $inputData['details_for_which_prod'];
  $filter_sub_title = $inputData['filter_sub_title'];
 
  $subs_cats_id = stripcslashes($subs_cats_id);
  $filteres_title = stripcslashes($filteres_title);
  $filter_sub_title = stripcslashes($filter_sub_title);
  $details_for_which_prod = stripcslashes($details_for_which_prod);

  $subs_cats_id = mysqli_real_escape_string($conn, $subs_cats_id);
  

  $data_insert_query = "INSERT INTO `filter` (`subs_cat_identification_id`, `filter_title`, `filter_sub_title`, `filter_details_category`) VALUES ($subs_cats_id, '$filteres_title', '$filter_sub_title', '$details_for_which_prod');";
  $data_insert_result = mysqli_query($conn, $data_insert_query);
 
  echo "Inserted Successfully!";


}


?>