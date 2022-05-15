<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");

if(isset($_SERVER['REQUEST_METHOD'])) {
  // Category Data Insertion Section

  $inputData = json_decode(file_get_contents('php://input'), true);
  
  $filter_data_id = $inputData['filter_table_primary_id'];
  $products_id = $inputData['product_id'];
  $subs_cat_id = $inputData['sub_cat_iden_id_of_filter_table'];
  $table_name_of_filter = $inputData['table_name_of_filter'];
 $primary_field_name = $inputData['primary_field_name'];
 
 $field_name_and_value = "`pro_id`"."="."'".$products_id."'".", "."`subs_cat_identification_id`"."=".$subs_cat_id.", ";

  $count = 0;
  foreach($inputData as $key => $val) {
      $count = $count + 1;
      if($count > 5) {
        $key = stripcslashes($key);
        $val = stripcslashes($val);
        $field_name_and_value = $field_name_and_value."`".$key."`"."="."'".$val."'".", ";
      }
  }
 $field_name_and_value = rtrim($field_name_and_value, ", ");



  $data_update_query = "UPDATE `$table_name_of_filter` SET $field_name_and_value WHERE $primary_field_name = '$filter_data_id';";
  $data_insert_result = mysqli_query($conn, $data_update_query);
  echo "Updated Successfully!";


}


?>