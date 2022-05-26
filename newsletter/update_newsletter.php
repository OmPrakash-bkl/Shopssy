<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");
header("Access-Control-Allow_Methods: POST");

$inputData = json_decode(file_get_contents('php://input'), true);

if(isset($_SERVER['REQUEST_METHOD'])) {

  $newsletter_id = $inputData['newsletter_id'];
  $html_data = $inputData['html_data'];
  $newsletter_title = $inputData['newsletter_title'];
  $newsletter_subject = $inputData['newsletter_subject'];
  
  $html_data = stripcslashes($html_data);
  $newsletter_title = stripcslashes($newsletter_title);
  $newsletter_subject = stripcslashes($newsletter_subject);

  $html_data = mysqli_real_escape_string($conn, $html_data);
  $newsletter_title = mysqli_real_escape_string($conn, $newsletter_title);
  $newsletter_subject = mysqli_real_escape_string($conn, $newsletter_subject);


$newsletter_data_update_query = "UPDATE `newsletter` SET `html_data` = '$html_data', `title` = '$newsletter_title', `subject` = '$newsletter_subject' WHERE `s_id` = '$newsletter_id';";

mysqli_query($conn, $newsletter_data_update_query);
echo "Updated Successfully!";

}


?>