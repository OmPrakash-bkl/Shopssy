<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");

if(isset($_SERVER['REQUEST_METHOD'])) {
    $cats_id = $_GET['cats_id'];
    $setof_subcat_details_query = "SELECT * FROM `sub_category` WHERE `cats_id`= $cats_id;";
    $setof_subcat_details_result = mysqli_query($conn, $setof_subcat_details_query);
    
    while($row = mysqli_fetch_assoc($setof_subcat_details_result)) {
        $setof_subcat_details_data[] = $row;
    }
    header("content-type: Content-Type: application/json");
    echo json_encode($setof_subcat_details_data);
       
}


?>