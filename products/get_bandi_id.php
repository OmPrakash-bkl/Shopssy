<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");
$inputData = json_decode(file_get_contents('php://input'), true);

if(isset($_SERVER['REQUEST_METHOD'])) {
 
        $b_and_i_identification_id = $inputData['b_and_i_identification_id'];
        $subs_cat_identification_ids = $inputData['subs_cat_identification_id'];
        $bandi_get_query1 = "SELECT * FROM `products` WHERE `b_and_i_identification_id` LIKE '$b_and_i_identification_id';";
        $bandi_get_result = mysqli_query($conn, $bandi_get_query1);
        $b_and_i_identification_id = 0;
        $item_id = 0;
        $subs_cat_identification_id = 0;
        while($row = mysqli_fetch_assoc($bandi_get_result)) {
            $b_and_i_identification_id = $row['b_and_i_identification_id'];
            $item_id = $row['item_id'];
            $subs_cat_identification_id = $row['subs_cat_identification_id'];
        }
        $max_val_of_item_id_query = "SELECT MAX(item_id) AS `items_id_count_val` FROM `products` WHERE `subs_cat_identification_id` = $subs_cat_identification_ids";
        $max_val_of_item_id_result = mysqli_query($conn, $max_val_of_item_id_query);
        
        $result['subs_cat_identification_id'] = $subs_cat_identification_id;
        $result["b_and_i_identification_id"] = $b_and_i_identification_id;
        $result["item_id"] = $item_id;
        $result["max_val_of_item_id"] = mysqli_fetch_assoc($max_val_of_item_id_result);
        
        echo json_encode($result);
}


?>