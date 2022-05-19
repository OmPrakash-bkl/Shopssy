<?php 


include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");

if(isset($_SERVER['REQUEST_METHOD'])) {
 

  $inputData = json_decode(file_get_contents('php://input'), true);
 
  $table_name = $inputData['table_name'];
 

  $specific_table_name_retrieve_query = "SELECT table_name 
  FROM information_schema.tables WHERE TABLE_NAME = '$table_name';";
  $specific_table_name_retrieve_result = mysqli_query($conn, $specific_table_name_retrieve_query);
  $given_table_name_count = mysqli_num_rows($specific_table_name_retrieve_result);
 
  echo $given_table_name_count;

}


?>
