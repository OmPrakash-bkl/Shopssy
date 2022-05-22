<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");
header("Access-Control-Allow_Methods: DELETE");

    if(isset($_SERVER['REQUEST_METHOD'])) {
    
    $filter_id = $_GET['filter_id'];
    $filter_id_delete_query = "DELETE FROM `filter` WHERE  `filter_id` = $filter_id;";
    mysqli_query($conn, $filter_id_delete_query); 
    $filter_sub_id_delete_query = "DELETE FROM `filter_sub` WHERE  `filters_id` = $filter_id;";
    mysqli_query($conn, $filter_sub_id_delete_query); 
    echo "Filter Data Deleted Successfully!";
   
}


?>