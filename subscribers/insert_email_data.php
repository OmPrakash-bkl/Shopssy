<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");

if(isset($_SERVER['REQUEST_METHOD'])) {
  // Category Data Insertion Section

  $inputData = json_decode(file_get_contents('php://input'), true);
  
  $subscriber_email_id = $inputData['subscriber_email_id'];

  $data_insert_query = "INSERT INTO `email_subscription` (`user_email`) VALUES ('$subscriber_email_id');";
  $data_insert_result = mysqli_query($conn, $data_insert_query);
  echo "Inserted Successfully!";


}


?>