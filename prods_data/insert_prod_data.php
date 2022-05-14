<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");

if(isset($_SERVER['REQUEST_METHOD'])) {
  // Category Data Insertion Section

  $inputData = json_decode(file_get_contents('php://input'), true);
  
  $products_id = $inputData['product_id'];
  $subs_cat_id = $inputData['sub_cat_iden_id_of_filter_table'];
  $table_name_of_filter = $inputData['table_name_of_filter'];

  
  $field_name = "(`pro_id`, `subs_cat_identification_id`, ";
  $field_value = "('$products_id', '$subs_cat_id', ";
  $count = 0;
  foreach($inputData as $key => $val) {
      $count = $count + 1;
      if($count > 4) {
        $key = stripcslashes($key);
        $val = stripcslashes($val);
        $field_name = $field_name."`".$key."`, ";   
        $field_value = $field_value."'".$val."', ";
      }
  }
  $field_name = rtrim($field_name, ", ");
  $field_value = rtrim($field_value, ", ");
  $field_name = $field_name.")";
  $field_value = $field_value.")";
 


  $data_insert_query = "INSERT INTO  $table_name_of_filter $field_name VALUES  $field_value;";
  $data_insert_result = mysqli_query($conn, $data_insert_query);
  echo "Inserted Successfully!";


}


?>