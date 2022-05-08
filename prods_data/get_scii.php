<?php 


include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");

if(isset($_SERVER['REQUEST_METHOD'])) {
 

  $inputData = json_decode(file_get_contents('php://input'), true);
 
  $tab_name = $inputData['tab_name'];

  $specific_table_data_retrieve_query = "SELECT `subs_cat_identification_id` FROM `{$tab_name}`;";
  $specific_table_data_retrieve_result = mysqli_query($conn, $specific_table_data_retrieve_query);
  $given_table_results = mysqli_fetch_assoc($specific_table_data_retrieve_result);
 
  echo json_encode($given_table_results);

}


?>
