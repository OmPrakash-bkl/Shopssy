<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");

if(isset($_SERVER['REQUEST_METHOD'])) {
 

  $inputData = json_decode(file_get_contents('php://input'), true);
 
  $tab_name = $inputData['tab_name'];

  $specific_table_field_retrieve_query = "SHOW COLUMNS FROM `{$tab_name}`;";
  $specific_table_field_retrieve_result = mysqli_query($conn, $specific_table_field_retrieve_query);
  $given_table_field_names = array();
  while($row = mysqli_fetch_assoc($specific_table_field_retrieve_result)) {
  $given_table_field_names[] = $row['Field'];
  }

  echo json_encode($given_table_field_names);

}


?>