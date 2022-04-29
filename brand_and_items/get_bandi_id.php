<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");
$inputData = json_decode(file_get_contents('php://input'), true);

if(isset($_SERVER['REQUEST_METHOD'])) {
 
        $sub_cat_identification_id = $inputData['sub_cat_identification_id'];
        $bandi_get_query1 = "SELECT `subs_cat_identification_id_two`, `b_and_i_identification_id` FROM `brand_and_item_list` WHERE `subs_cat_identification_id` LIKE '$sub_cat_identification_id';";
        $bandi_get_result = mysqli_query($conn, $bandi_get_query1);
        $b_and_i_identification_id = 0;
        $subs_cat_identification_id_two = 0;
        while($row = mysqli_fetch_assoc($bandi_get_result)) {
            $subs_cat_identification_id_two = $row['subs_cat_identification_id_two'];
            $b_and_i_identification_id = $row['b_and_i_identification_id'];
        }
        $max_val_of_subs_cat_identification_id_query = "SELECT MAX(subs_cat_identification_id_two) AS `subs_cat_identification_id_two_count_val` FROM `brand_and_item_list`";
        $max_val_of_subs_cat_identification_id_result = mysqli_query($conn, $max_val_of_subs_cat_identification_id_query);
        $result["subs_cat_identification_id_two_count_val"] = mysqli_fetch_assoc($max_val_of_subs_cat_identification_id_result);
        $result["subs_cat_identification_id_two"] = $subs_cat_identification_id_two;
        $result["b_and_i_identification_id"] = $b_and_i_identification_id;
        
        echo json_encode($result);
}


?>