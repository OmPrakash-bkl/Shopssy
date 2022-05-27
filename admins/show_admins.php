<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");

if(isset($_SERVER['REQUEST_METHOD'])) {

    $data_of_admin_query = "SELECT * FROM `admin`;";

    $data_of_admin_result = mysqli_query($conn, $data_of_admin_query);
    while($row = mysqli_fetch_assoc($data_of_admin_result)) {
        $data_of_admin[] = $row; 
    }
    header("content-type: Content-Type: application/json");
    echo json_encode($data_of_admin);
       
}


?>