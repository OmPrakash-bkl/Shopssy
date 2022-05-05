<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");

if(isset($_SERVER['REQUEST_METHOD'])) {
  // Category Data Insertion Section

  $inputData = json_decode(file_get_contents('php://input'), true);
 
  $filteres_id = $inputData['filteres_id'];
  $sub_filter_data = $inputData['sub_filter_data'];
 
 
  $filteres_id = stripcslashes($filteres_id);
  $sub_filter_data = stripcslashes($sub_filter_data);

  $filteres_id = mysqli_real_escape_string($conn, $filteres_id);
  

  $data_insert_query = "INSERT INTO `filter_sub` (`filters_id`, `filter_datas`) VALUES ($filteres_id, '$sub_filter_data');";
  $data_insert_result = mysqli_query($conn, $data_insert_query);
 
  echo "Inserted Successfully!";


}


?>