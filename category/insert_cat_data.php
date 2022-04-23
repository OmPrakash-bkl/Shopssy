<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");

if(isset($_SERVER['REQUEST_METHOD'])) {
  // Category Data Insertion Section

  $inputData = json_decode(file_get_contents('php://input'), true);
  
  $cat_title = $inputData['cat_title'];
  $cat_image_name = $inputData['cat_image_name'];
  $cat_icon_name = $inputData['cat_icon_name'];
  $cat_desc = $inputData['cat_desc'];
  $cat_title = stripcslashes($cat_title);
  $cat_image_name = stripcslashes($cat_image_name);
  $cat_icon_name = stripcslashes($cat_icon_name);
  $cat_desc = stripcslashes($cat_desc);
  $cat_title = mysqli_real_escape_string($conn, $cat_title);
  $cat_image_name = mysqli_real_escape_string($conn, $cat_image_name);
  $cat_icon_name = mysqli_real_escape_string($conn, $cat_icon_name);
  $cat_desc = mysqli_real_escape_string($conn, $cat_desc);

  

  $data_insert_query = "INSERT INTO `category` (`cat_title`, `cat_image_name`, `cat_icon_name`, `cat_name_description`) VALUES ('$cat_title', '$cat_image_name', '$cat_icon_name', '$cat_desc');";
  $data_insert_result = mysqli_query($conn, $data_insert_query);
  echo "Inserted Successfully!";


}


?>