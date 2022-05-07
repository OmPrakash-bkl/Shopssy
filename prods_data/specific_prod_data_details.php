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

  $specific_table_data_retrieve_query = "SELECT * FROM `{$tab_name}`;";
  $specific_table_data_retrieve_result = mysqli_query($conn, $specific_table_data_retrieve_query);
  $given_table_results = array();
  while($row = mysqli_fetch_assoc($specific_table_data_retrieve_result)) {
    $given_table_results[] = $row;
  }
 
  $full_details_of_given_table[0] = $given_table_field_names;
  $full_details_of_given_table[1] = $given_table_results;

  echo json_encode($full_details_of_given_table);

}


?>