<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");
header("Access-Control-Allow_Methods: POST");

$inputData = json_decode(file_get_contents('php://input'), true);

if(isset($_SERVER['REQUEST_METHOD'])) {

  $notify_id = $inputData['notify_id'];
  $notification_title = $inputData['notification_title'];
  $notification_content = $inputData['notification_content'];
  $notify_for_who = $inputData['notify_for_who'];
  $notify_link = $inputData['notify_link'];
  $notification_title = stripcslashes($notification_title);
  $notification_content = stripcslashes($notification_content);
  $notify_for_who = stripcslashes($notify_for_who);

  $notification_title = stripcslashes($notification_title);
  $notification_content = stripcslashes($notification_content);
  $notify_for_who = stripcslashes($notify_for_who);
  $notify_for_who = mysqli_real_escape_string($conn, $notify_for_who);

$notification_data_update_query = "UPDATE `notification` SET `n_title` = '$notification_title', `n_content` = '$notification_content', `noti_for_who` = '$notify_for_who', `link` = '$notify_link' WHERE `n_id` = $notify_id;";

mysqli_query($conn, $notification_data_update_query);
echo "Updated Successfully!";

}


?>