<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");
header("Access-Control-Allow_Methods: POST");

if(isset($_SERVER['REQUEST_METHOD'])) {
   
    $inputData = json_decode(file_get_contents('php://input'), true);

    $order_id = $inputData['search_keyword'];
    

        $table_of_ordered_user_data_query = "SELECT * FROM `orders_table` WHERE `p_status` = 'processed' AND `order_id` LIKE '$order_id';";
    
        $table_of_ordered_user_data_result = mysqli_query($conn, $table_of_ordered_user_data_query);
        while($row = mysqli_fetch_assoc($table_of_ordered_user_data_result)) {
            $ordered_id = $row['order_id'];
            $sub_query = "SELECT * FROM `orders_sub_table` WHERE `order_id` = $ordered_id;";
            $sub_result = mysqli_query($conn, $sub_query);
            while($row2 = mysqli_fetch_assoc($sub_result)) {
                $sub_data[] = $row2;
            }
            $table_of_ordered_user_data_rows[] = $row;
        }
        $final_result[0] = $table_of_ordered_user_data_rows;
        $final_result[1] = $sub_data;
        
        header("content-type: Content-Type: application/json");
        echo json_encode($final_result);
       
}


?>