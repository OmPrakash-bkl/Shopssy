<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");
header("Access-Control-Allow_Methods: DELETE");

    if(isset($_SERVER['REQUEST_METHOD'])) {
    
    $filter_sub_id = $_GET['filter_sub_id'];
    $filter_sub_id_delete_query = "DELETE FROM `filter_sub` WHERE  `filter_sub_id` = $filter_sub_id;";
    mysqli_query($conn, $filter_sub_id_delete_query); 
    echo "Filter Data Deleted Successfully!";
   
}


?>