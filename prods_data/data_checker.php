<?php 


include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");

if(isset($_SERVER['REQUEST_METHOD'])) {
 

  $inputData = json_decode(file_get_contents('php://input'), true);
 
  $tab_name = $inputData['table_name_of_filter'];
  $prod_id = $inputData['product_id'];

  $specific_table_data_retrieve_query = "SELECT * FROM `{$tab_name}` WHERE `pro_id` = '$prod_id';";
  $specific_table_data_retrieve_result = mysqli_query($conn, $specific_table_data_retrieve_query);
  $given_table_data_count = mysqli_num_rows($specific_table_data_retrieve_result);
 
  echo $given_table_data_count;

}


?>
