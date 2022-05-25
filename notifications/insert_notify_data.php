<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");

if(isset($_SERVER['REQUEST_METHOD'])) {
  // Category Data Insertion Section

  $inputData = json_decode(file_get_contents('php://input'), true);
  
  $notification_title = $inputData['notification_title'];
  $notification_content = $inputData['notification_content'];
  date_default_timezone_set("Asia/Calcutta");
  $notify_date = date("d/m/y h:i A");
  $notify_for_who = $inputData['notify_for_who'];
  $notify_link = $inputData['notify_link'];
  $notification_title = stripcslashes($notification_title);
  $notification_content = stripcslashes($notification_content);
  $notify_for_who = stripcslashes($notify_for_who);
 
  // $notification_title = mysqli_real_escape_string($conn, $notification_title);
  // $notification_content = mysqli_real_escape_string($conn, $notification_content);
  $notify_for_who = mysqli_real_escape_string($conn, $notify_for_who);
  
  $data_insert_query = "INSERT INTO `notification` (`n_title`, `n_content`, `n_time`, `noti_for_who`, `link`, `pro_id`) VALUES ('$notification_title', '$notification_content', '$notify_date', '$notify_for_who', '$notify_link', 0);";
  $data_insert_result = mysqli_query($conn, $data_insert_query);
  echo "Inserted Successfully!";


}


?>