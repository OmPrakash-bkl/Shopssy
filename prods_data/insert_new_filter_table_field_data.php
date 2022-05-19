<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");

if(isset($_SERVER['REQUEST_METHOD'])) {
  // Category Data Insertion Section

  $inputData = json_decode(file_get_contents('php://input'), true);
  
  $filter_table_primary_id_name = $inputData['filter_table_primary_id_name'];
  $subs_category = $inputData['subs_category'];
  $filter_table_primary_id_name = $filter_table_primary_id_name."_id";
  $table_name = $inputData['table_name'];
  $field_names = $inputData['field_names'];
  $subs_category = stripslashes($subs_category);
  $table_name = stripcslashes($table_name);

  $subs_cat_id_retrieve_query = "SELECT `sub_cat_identification_id_two` FROM `sub_category` WHERE `subs_cat_title` LIKE '%$subs_category%';";
  $subs_cat_id_retrieve_result = mysqli_query($conn, $subs_cat_id_retrieve_query);
  $row = mysqli_fetch_assoc($subs_cat_id_retrieve_result);
  $sub_cat_id = $row['sub_cat_identification_id_two'];

   $external_field_name = "";

  foreach($field_names as $key => $val) {
      if($key == 0 || $key == 1) {
          continue;
      }
        $val = stripcslashes($val);
        $val = strtoupper($val);
        $external_field_name = $external_field_name.$val." varchar(150), ";   
  }
  $external_field_name = rtrim($external_field_name, ", ");


   $data_insert_query = "CREATE TABLE $table_name ($filter_table_primary_id_name int(100) AUTO_INCREMENT, pro_id int(100), subs_cat_identification_id int(100), $external_field_name ,primary key($filter_table_primary_id_name));";
 $data_insert_result = mysqli_query($conn, $data_insert_query);
 $data_insert_query2 = "INSERT INTO $table_name(`subs_cat_identification_id`) VALUES ('$sub_cat_id')";
 $data_insert_result2 = mysqli_query($conn, $data_insert_query2);
  echo "Inserted Successfully!";

}


?>