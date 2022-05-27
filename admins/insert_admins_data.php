<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");

if(isset($_SERVER['REQUEST_METHOD'])) {
  // Category Data Insertion Section

  $inputData = json_decode(file_get_contents('php://input'), true);
 
  $admin_email_id = $inputData['admin_email_id'];
  $admin_password = $inputData['admin_password'];
  $admin_name = $inputData['admin_name'];
  $admin_photo = $inputData['admin_photo'];
  $admin_phone_number = $inputData['admin_phone_number'];
  $admin_address = $inputData['admin_address'];
  $admin_type = $inputData['admin_type'];
  
 
  $admin_email_id = stripcslashes($admin_email_id);
  $admin_password = stripcslashes($admin_password);
  $admin_name = stripcslashes($admin_name);
  $admin_phone_number = stripcslashes($admin_phone_number);
  $admin_address = stripcslashes($admin_address);
  $admin_type = stripcslashes($admin_type);

  $admin_name = mysqli_real_escape_string($conn, $admin_name);
  $admin_phone_number = mysqli_real_escape_string($conn, $admin_phone_number);
  $admin_type = mysqli_real_escape_string($conn, $admin_type);
  

  $data_insert_query = "INSERT INTO `admin` (`email`, `password`, `name`, `photo`, `ph_number`, `address`, `admin_type`) VALUES ('$admin_email_id', '$admin_password', '$admin_name', '$admin_photo', '$admin_phone_number', '$admin_address', '$admin_type');";
  $data_insert_result = mysqli_query($conn, $data_insert_query);
 
  echo "Inserted Successfully!";


}


?>