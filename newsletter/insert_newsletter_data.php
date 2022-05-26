<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");

if(isset($_SERVER['REQUEST_METHOD'])) {
  // Category Data Insertion Section

  $inputData = json_decode(file_get_contents('php://input'), true);
  
  $html_data = $inputData['html_data'];
  $newsletter_title = $inputData['newsletter_title'];
  $newsletter_subject = $inputData['newsletter_subject'];

  $newsletter_title = stripcslashes($newsletter_title);
  $newsletter_subject = stripcslashes($newsletter_subject);
  $html_data = stripcslashes($html_data);
 
  $newsletter_title = mysqli_real_escape_string($conn, $newsletter_title);
  $newsletter_subject = mysqli_real_escape_string($conn, $newsletter_subject);
  $html_data = mysqli_real_escape_string($conn, $html_data);

  
  $data_insert_query = "INSERT INTO `newsletter` (`html_data`, `title`, `subject`) VALUES ('$html_data', '$newsletter_title', '$newsletter_subject');";
  $data_insert_result = mysqli_query($conn, $data_insert_query);
  echo "Inserted Successfully!";


}


?>