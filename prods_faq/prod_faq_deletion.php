<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");
header("Access-Control-Allow_Methods: DELETE");

    if(isset($_SERVER['REQUEST_METHOD'])) {
    
    $products_faq_id = $_GET['products_faq_id'];
    $products_faq_delete_query = "DELETE FROM `product_questions_and_answers` WHERE  `p_q_and_a_id` = $products_faq_id;";
    mysqli_query($conn, $products_faq_delete_query); 
    $products_sub_faq_delete_query = "DELETE FROM `sub_question_and_answers` WHERE  `ques_id` = $products_faq_id;";
    mysqli_query($conn, $products_sub_faq_delete_query); 
    echo "Product FAQ Deleted Successfully!";
   
}


?>