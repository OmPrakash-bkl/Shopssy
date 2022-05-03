<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");

if(isset($_SERVER['REQUEST_METHOD'])) {
  // Category Data Insertion Section

  $inputData = json_decode(file_get_contents('php://input'), true);
 
  $p_and_q_id = $inputData['p_and_q_id'];
  $prod_faq_ques = $inputData['prod_faq_ques'];
  $prod_faq_ans = $inputData['prod_faq_ans'];
  $prod_faq_ques_status = $inputData['prod_faq_ques_status'];
 
  $prod_faq_ques = stripcslashes($prod_faq_ques);
  $prod_faq_ans = stripcslashes($prod_faq_ans);
  $prod_faq_ques_status = stripcslashes($prod_faq_ques_status);

  $prod_faq_ques = mysqli_real_escape_string($conn, $prod_faq_ques);
  $prod_faq_ans = mysqli_real_escape_string($conn, $prod_faq_ans);
  $prod_faq_ques_status = mysqli_real_escape_string($conn, $prod_faq_ques_status);

 
  $data_insert_query = "UPDATE `product_questions_and_answers` SET `p_ques` = '$prod_faq_ques', `p_ans` = '$prod_faq_ans', `status` = '$prod_faq_ques_status' WHERE `p_q_and_a_id` = $p_and_q_id;";
  $data_insert_result = mysqli_query($conn, $data_insert_query);
 
  echo "Inserted Successfully!";


}


?>