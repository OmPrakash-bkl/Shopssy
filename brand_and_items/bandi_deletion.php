<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");
header("Access-Control-Allow_Methods: DELETE");

    if(isset($_SERVER['REQUEST_METHOD'])) {
    
    $brand_id = $_GET['brand_id'];

    $sub_cat_identification_id_two = $_GET['subcat_id'];
        if($sub_cat_identification_id_two > 123) {
            $sub_cat_identification_id_two = $sub_cat_identification_id_two + 1;
        }
        $sub_cat_select_query = "SELECT `filter_id` FROM `filter` WHERE `subs_cat_identification_id` = '$sub_cat_identification_id_two';";
   $sub_cat_select_result = mysqli_query($conn, $sub_cat_select_query);
 
   while($row = mysqli_fetch_assoc($sub_cat_select_result)) {
       $filter_id = $row['filter_id'];
       echo "filter_id".$filter_id;
       $sub_filter_delete_query = "DELETE FROM `filter_sub` WHERE `filters_id` = '$filter_id';";
       mysqli_query($conn, $sub_filter_delete_query);
     
   }
       $filter_delete_query = "DELETE FROM `filter` WHERE `subs_cat_identification_id` = '$sub_cat_identification_id_two';";
       mysqli_query($conn, $filter_delete_query);
  
        $b_and_i_identification_id_query = "SELECT `b_and_i_identification_id` FROM `brand_and_item_list` WHERE `subs_cat_identification_id_two` = '$sub_cat_identification_id_two';";
        $b_and_i_identification_id_result = mysqli_query($conn, $b_and_i_identification_id_query);

   while($row = mysqli_fetch_assoc($b_and_i_identification_id_result)) {
       $b_and_i_identification_id = $row['b_and_i_identification_id'];
       echo "b_and_i_identification_id".$b_and_i_identification_id;
       $select_prod_id_query = "SELECT `p_id` FROM `products` WHERE `b_and_i_identification_id` LIKE '%$b_and_i_identification_id%';";
       $select_prod_id_result = mysqli_query($conn, $select_prod_id_query);
     
       while($row = mysqli_fetch_assoc($select_prod_id_result)) {
        $p_id = $row['p_id'];
        echo "p_id".$p_id;
        $p_delete_query = "DELETE FROM `products_sub` WHERE `p_id` = '$p_id';";
        mysqli_query($conn, $p_delete_query);
       
        $p_delete_query = "DELETE FROM `products_specification` WHERE `p_id` = '$p_id';";
        mysqli_query($conn, $p_delete_query);
        $p_select_query = "SELECT `review_id` FROM `reviews` WHERE `p_id` = '$p_id';";
       $p_select_result = mysqli_query($conn, $p_select_query);
    
       while($row = mysqli_fetch_assoc($p_select_result)) {
           $review_id = $row['review_id'];
           echo "review_id".$review_id;
           $sub_review_delete_query = "DELETE FROM `sub_reviews` WHERE `review_id` = '$review_id';";
           mysqli_query($conn, $sub_review_delete_query);
         
       }
       $p_delete_query = "DELETE FROM `reviews` WHERE `p_id` = '$p_id';";
        mysqli_query($conn, $p_delete_query);
      
        $p_select_query = "SELECT `p_q_and_a_id` FROM `product_questions_and_answers` WHERE `p_id` = $p_id;";
        $p_select_result = mysqli_query($conn, $p_select_query);
        while($row = mysqli_fetch_assoc($p_select_result)) {
           
            $p_q_and_a_id = $row['p_q_and_a_id'];
            echo "p_q_and_a_id".$p_q_and_a_id;
            $sub_ques_delete_query = "DELETE FROM `sub_question_and_answers` WHERE `ques_id` = '$p_q_and_a_id';";
            mysqli_query($conn, $sub_ques_delete_query);
          
        }
        $p_delete_query = "DELETE FROM `product_questions_and_answers` WHERE `p_id` = '$p_id';";
         mysqli_query($conn, $p_delete_query);
       
         $table_names_query = "SELECT TABLE_NAME AS `mytables` from information_schema.tables WHERE TABLE_NAME LIKE '%filter_detail_for%';";
    
         $table_names_result = mysqli_query($conn, $table_names_query);
         while($row = mysqli_fetch_assoc($table_names_result)) {
             $tables_names_of_grp_of_tables = $row['mytables']; 
            $p_delete_query = "DELETE FROM $tables_names_of_grp_of_tables WHERE `pro_id` = '$p_id';";
           
            mysqli_query($conn, $p_delete_query);
         }
         $p_delete_query = "DELETE FROM `products` WHERE  `p_id` = '$p_id';";
         mysqli_query($conn, $p_delete_query); 
       
    }

    $brand_delete_query = "DELETE FROM `brand_and_item_list` WHERE  `brand_id` = $brand_id;";
    mysqli_query($conn, $brand_delete_query); 

    $bandi_delete_query = "DELETE FROM `brand_and_item_list` WHERE `b_and_i_identification_id` = '$b_and_i_identification_id';";
       mysqli_query($conn, $bandi_delete_query);
    

   }

    echo "Brand&Items Deleted Successfully!";
   
}


?>