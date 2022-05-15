<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");
header("Access-Control-Allow_Methods: DELETE");

    if(isset($_SERVER['REQUEST_METHOD'])) {
    
    $field_name = $_GET['field_name'];
    $field_val = $_GET['field_val'];
    $tab_name = $_GET['tab_name'];

    $products_data_delete_query = "DELETE FROM $tab_name WHERE  $field_name = '$field_val';";
    mysqli_query($conn, $products_data_delete_query); 
    echo "Deleted Successfully!";
   
}


?>