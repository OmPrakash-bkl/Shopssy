<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");

if(isset($_SERVER['REQUEST_METHOD'])) {
  // Category Data Insertion Section

  $inputData = json_decode(file_get_contents('php://input'), true);

  $categories_id = $inputData['categories_id'];
  $sub_categories_id = $inputData['sub_categories_id'];
  $b_and_i_ids = $inputData['b_and_i_ids'];
  $item_id = $inputData['item_id'];
  $prod_title = $inputData['prod_title'];
  $prod_imagename = $inputData['prod_imagename'];
  $rate_of_prod = $inputData['rate_of_prod'];
  $original_price = $inputData['original_price'];
  $offer_price = $inputData['offer_price'];
  $hot_deal_radio_btn = $inputData['hot_deal_radio_btn'];
  
  $categories_id = stripcslashes($categories_id);
  $sub_categories_id = stripcslashes($sub_categories_id);
  $b_and_i_ids = stripcslashes($b_and_i_ids);
  $item_id = stripcslashes($item_id);
  $prod_title = stripcslashes($prod_title);
  $prod_imagename = stripcslashes($prod_imagename);
  $rate_of_prod = stripcslashes($rate_of_prod);
  $original_price = stripcslashes($original_price);
  $offer_price = stripcslashes($offer_price);
  $hot_deal_radio_btn = stripcslashes($hot_deal_radio_btn);

 
  $prod_imagename = mysqli_real_escape_string($conn, $prod_imagename);
  $rate_of_prod = mysqli_real_escape_string($conn, $rate_of_prod);
  $original_price = mysqli_real_escape_string($conn, $original_price);
  $offer_price = mysqli_real_escape_string($conn, $offer_price);
  $hot_deal_radio_btn = mysqli_real_escape_string($conn, $hot_deal_radio_btn);
if($hot_deal_radio_btn == "Yes") {
    $data_insert_query = "INSERT INTO `products` (`cats_id`, `subs_cat_identification_id`, `b_and_i_identification_id`, `item_id`, `p_title`, `p_image`, `p_star_rat`, `p_o_price`, `p_a_price`, `hot_deal_type`) VALUES ('$categories_id', '$sub_categories_id', '$b_and_i_ids', '$item_id', '$prod_title', '$prod_imagename', '$rate_of_prod', '$original_price', '$offer_price', '$hot_deal_radio_btn');";
} else {
    $data_insert_query = "INSERT INTO `products` (`cats_id`, `subs_cat_identification_id`, `b_and_i_identification_id`, `item_id`, `p_title`, `p_image`, `p_star_rat`, `p_o_price`, `p_a_price`, `hot_deal_type`) VALUES ('$categories_id', '$sub_categories_id', '$b_and_i_ids', '$item_id', '$prod_title', '$prod_imagename', '$rate_of_prod', '$original_price', '$offer_price', NULL);";
}
 
  $data_insert_result = mysqli_query($conn, $data_insert_query);
 
  echo "Inserted Successfully!";


}


?>