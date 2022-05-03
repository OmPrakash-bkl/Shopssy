<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");

if(isset($_SERVER['REQUEST_METHOD'])) {
  // Category Data Insertion Section

  $inputData = json_decode(file_get_contents('php://input'), true);
  
  $products_id = $inputData['products_id'];
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
  
  

  $data_insert_query = "INSERT INTO `products_sub` (`p_id`, `p_image`, `p_s_image1`, `p_s_image2`, `p_s_image3`, `p_avail`, `p_tags1`, `p_tags2`, `p_tags3`, `p_desc`) VALUES ($products_id, '$main_image_name', '$sub_image_name1', '$sub_image_name2', '$sub_image_name3', '$availability', '$prod_tag1', '$prod_tag2', '$prod_tag3', '$prod_desc');";
  $data_insert_result = mysqli_query($conn, $data_insert_query);
  echo "Inserted Successfully!";


}


?>