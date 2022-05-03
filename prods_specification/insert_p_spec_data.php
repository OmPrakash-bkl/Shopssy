<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");

if(isset($_SERVER['REQUEST_METHOD'])) {
  // Category Data Insertion Section

  $inputData = json_decode(file_get_contents('php://input'), true);
  
  $products_id = $inputData['products_id'];
  $spec_name = $inputData['spec_name'];
  $spec_value = $inputData['spec_value'];

  $products_id = stripcslashes($products_id);
  $spec_name = stripcslashes($spec_name);
  $spec_value = stripcslashes($spec_value);

  $products_id = mysqli_real_escape_string($conn, $products_id);
  $spec_name = mysqli_real_escape_string($conn, $spec_name);
  $spec_value = mysqli_real_escape_string($conn, $spec_value);
  

  $data_insert_query = "INSERT INTO `products_specification` (`p_id`, `p_spec_title`, `p_spec_details`) VALUES ($products_id, '$spec_name', '$spec_value');";
  $data_insert_result = mysqli_query($conn, $data_insert_query);
  echo "Inserted Successfully!";


}


?>