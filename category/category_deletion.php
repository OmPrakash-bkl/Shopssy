<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");
header("Access-Control-Allow_Methods: DELETE");

    if(isset($_SERVER['REQUEST_METHOD'])) {
    
    $cat_id = $_GET['cat_id'];
    $cat_delete_query = "DELETE FROM `category` WHERE  `cat_id` = $cat_id;";
    mysqli_query($conn, $cat_delete_query); 

    $sub_cat_select_query = "SELECT `sub_cat_identification_id_two` FROM `sub_category` WHERE `cats_id` = '$cat_id';";
   $sub_cat_select_result = mysqli_query($conn, $sub_cat_select_query);
   while($row = mysqli_fetch_assoc($sub_cat_select_result)) {
       $sub_cat_identification_id_two = $row['sub_cat_identification_id_two'];

       $sub_cat_select_query = "SELECT `filter_id` FROM `filter` WHERE `subs_cat_identification_id` = $sub_cat_identification_id_two;";
   $sub_cat_select_result = mysqli_query($conn, $sub_cat_select_query);
   while($row = mysqli_fetch_assoc($sub_cat_select_result)) {
       $filter_id = $row['filter_id'];
       $sub_filter_delete_query = "DELETE FROM `filter_sub` WHERE `filters_id` = $filter_id;";
       mysqli_query($conn, $sub_filter_delete_query);
   }

       $filter_delete_query = "DELETE FROM `filter` WHERE `subs_cat_identification_id` = $sub_cat_identification_id_two;";
       mysqli_query($conn, $filter_delete_query);
   }

    $cat_delete_query = "DELETE FROM `sub_category` WHERE  `cats_id` = $cat_id;";
    mysqli_query($conn, $cat_delete_query); 
    $cat_delete_query = "DELETE FROM `brand_and_item_list` WHERE  `cats_id` = $cat_id;";
    mysqli_query($conn, $cat_delete_query); 

    $p_select_query = "SELECT `p_id` FROM `products` WHERE `cats_id` = '$cat_id';";
    $p_select_result = mysqli_query($conn, $p_select_query);
    while($row = mysqli_fetch_assoc($p_select_result)) {

        $p_id = $row['p_id'];
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

     $table_names_query = "SELECT TABLE_NAME AS `mytables` from information_schema.tables WHERE TABLE_NAME LIKE '%filter_detail_for%';";

     $table_names_result = mysqli_query($conn, $table_names_query);
     while($row = mysqli_fetch_assoc($table_names_result)) {
         $tables_names_of_grp_of_tables = $row['mytables']; 
        $p_delete_query = "DELETE FROM $tables_names_of_grp_of_tables WHERE `pro_id` = $p_id;";
        mysqli_query($conn, $p_delete_query);
     }

    }

    $p_delete_query = "DELETE FROM `products` WHERE  `cats_id` = $cat_id;";
    mysqli_query($conn, $p_delete_query); 
    
    echo "Category Deleted Successfully!";
   
}


?>