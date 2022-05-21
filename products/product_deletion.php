<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");
header("Access-Control-Allow_Methods: DELETE");

    if(isset($_SERVER['REQUEST_METHOD'])) {
    
    $p_id = $_GET['p_id'];
    $p_delete_query = "DELETE FROM `products` WHERE  `p_id` = $p_id;";
    mysqli_query($conn, $p_delete_query); 
    $p_delete_query = "DELETE FROM `products_sub` WHERE `p_id` = $p_id;";
    mysqli_query($conn, $p_delete_query);
    $p_delete_query = "DELETE FROM `products_specification` WHERE `p_id` = $p_id;";
    mysqli_query($conn, $p_delete_query);
    $p_select_query = "SELECT `review_id` FROM `reviews` WHERE `p_id` = $p_id;";
   $p_select_result = mysqli_query($conn, $p_select_query);
   while($row = mysqli_fetch_assoc($p_select_result)) {
       $review_id = $row['review_id'];
       $sub_review_delete_query = "DELETE FROM `sub_reviews` WHERE `review_id` = $review_id;";
       mysqli_query($conn, $sub_review_delete_query);
   }
   $p_delete_query = "DELETE FROM `reviews` WHERE `p_id` = $p_id;";
    mysqli_query($conn, $p_delete_query);

    $p_select_query = "SELECT `p_q_and_a_id` FROM `product_questions_and_answers` WHERE `p_id` = $p_id;";
    $p_select_result = mysqli_query($conn, $p_select_query);
    while($row = mysqli_fetch_assoc($p_select_result)) {
        $p_q_and_a_id = $row['p_q_and_a_id'];
        $sub_ques_delete_query = "DELETE FROM `sub_question_and_answers` WHERE `ques_id` = $p_q_and_a_id;";
        mysqli_query($conn, $sub_ques_delete_query);
    }
    $p_delete_query = "DELETE FROM `product_questions_and_answers` WHERE `p_id` = $p_id;";
     mysqli_query($conn, $p_delete_query);


    echo "Product Deleted Successfully!";
   
}


?>