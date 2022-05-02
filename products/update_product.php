<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");
header("Access-Control-Allow_Methods: POST");

$inputData = json_decode(file_get_contents('php://input'), true);

if(isset($_SERVER['REQUEST_METHOD'])) {

        $prod_id = $inputData['prod_id'];
        $prod_title = $inputData['prod_title'];
        $prod_imagename = $inputData['prod_imagename'];
        $rate_of_prod = $inputData['rate_of_prod'];
        $original_price = $inputData['original_price'];
        $offer_price = $inputData['offer_price'];
        $hot_deal_radio_btn = $inputData['hot_deal_radio_btn'];
       
        $prod_id = stripcslashes($prod_id);
        $prod_title = stripcslashes($prod_title);
        $prod_imagename = stripcslashes($prod_imagename);
        $rate_of_prod = stripcslashes($rate_of_prod);
        $original_price = stripcslashes($original_price);
        $offer_price = stripcslashes($offer_price);
        $hot_deal_radio_btn = stripcslashes($hot_deal_radio_btn);
      
        $prod_id = mysqli_real_escape_string($conn, $prod_id);
        $prod_title = mysqli_real_escape_string($conn, $prod_title);
        $prod_imagename = mysqli_real_escape_string($conn, $prod_imagename);
        $rate_of_prod = mysqli_real_escape_string($conn, $rate_of_prod);
        $original_price = mysqli_real_escape_string($conn, $original_price);
        $offer_price = mysqli_real_escape_string($conn, $offer_price);
        $hot_deal_radio_btn = mysqli_real_escape_string($conn, $hot_deal_radio_btn);
       
       if($hot_deal_radio_btn == "yes") {
        $prod_data_update_query = "UPDATE `products` SET `p_title` = '$prod_title', `p_image` = '$prod_imagename', `p_star_rat` = '$rate_of_prod', `p_o_price` = '$original_price', `p_a_price` = '$offer_price', `hot_deal_type` = 'yes' WHERE `p_id` = $prod_id;";
       } else {
        $prod_data_update_query = "UPDATE `products` SET `p_title` = '$prod_title', `p_image` = '$prod_imagename', `p_star_rat` = '$rate_of_prod', `p_o_price` = '$original_price', `p_a_price` = '$offer_price', `hot_deal_type` = NULL WHERE `p_id` = $prod_id;";
       }
       
       mysqli_query($conn, $prod_data_update_query);
       echo "Updated Successfully!";
}


?>