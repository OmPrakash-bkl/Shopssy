<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");
$inputData = json_decode(file_get_contents('php://input'), true);

if(isset($_SERVER['REQUEST_METHOD'])) {
   
        $cats_id = $inputData['cats_id'];
        $sciidandsciidit_get_query1 = "SELECT `sub_cat_identification_id` FROM `sub_category` WHERE `cats_id` LIKE '$cats_id';";
        $sciidandsciidit_get_result1 = mysqli_query($conn, $sciidandsciidit_get_query1);
        $sub_cat_identification_id = 0;
        while($row = mysqli_fetch_assoc($sciidandsciidit_get_result1)) {
            $sub_cat_identification_id = $row['sub_cat_identification_id'];
        }
      
        $sub_cat_identification_id_and_sub_cat_identification_id_two[0] = $sub_cat_identification_id;
        $sciidandsciidit_get_query2 = "SELECT MAX(sub_cat_identification_id_two) AS `last_sub_cat_identification_id_two` FROM `sub_category`;";
        $sciidandsciidit_get_result2 = mysqli_query($conn, $sciidandsciidit_get_query2);
        $sciidandsciidit_get_result2 = mysqli_fetch_assoc($sciidandsciidit_get_result2);
        $sub_cat_identification_id_and_sub_cat_identification_id_two[1] = $sciidandsciidit_get_result2;
        echo json_encode($sub_cat_identification_id_and_sub_cat_identification_id_two);
}


?>