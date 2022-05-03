<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");
header("Access-Control-Allow_Methods: POST");

$inputData = json_decode(file_get_contents('php://input'), true);

if(isset($_SERVER['REQUEST_METHOD'])) {

    $p_spec_id = $inputData['p_spec_id'];
    $spec_name = $inputData['spec_name'];
    $spec_value = $inputData['spec_value'];
  
    $p_spec_id = stripcslashes($p_spec_id);
    $spec_name = stripcslashes($spec_name);
    $spec_value = stripcslashes($spec_value);
  
    $p_spec_id = mysqli_real_escape_string($conn, $p_spec_id);
    $spec_name = mysqli_real_escape_string($conn, $spec_name);
    $spec_value = mysqli_real_escape_string($conn, $spec_value);
       
    $prod_specification_data_update_query = "UPDATE `products_specification` SET `p_spec_title` = '$spec_name', `p_spec_details` = '$spec_value' WHERE `p_spec_id` = $p_spec_id;";
    mysqli_query($conn, $prod_specification_data_update_query);
    echo "Updated Successfully!";
}


?>