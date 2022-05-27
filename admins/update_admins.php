<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");
header("Access-Control-Allow_Methods: POST");

$inputData = json_decode(file_get_contents('php://input'), true);

if(isset($_SERVER['REQUEST_METHOD'])) {

  $admin_management_id = $inputData['admin_management_id'];
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
       
       
    $admin_data_update_query = "UPDATE `admin` SET `email` = '$admin_email_id',`password` = '$admin_password', `name` = '$admin_name', `photo` = '$admin_photo', `ph_number` = '$admin_phone_number', `address` = '$admin_address', `admin_type` = '$admin_type' WHERE `a_id` = '$admin_management_id';";
    mysqli_query($conn, $admin_data_update_query);
    echo "Updated Successfully!";
}


?>