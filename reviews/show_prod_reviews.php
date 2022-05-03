<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");

if(isset($_SERVER['REQUEST_METHOD'])) {

    $data_of_review_query = "SELECT * FROM `reviews`;";

    $data_of_review_result = mysqli_query($conn, $data_of_review_query);
    while($row = mysqli_fetch_assoc($data_of_review_result)) {
        $data_of_review[] = $row; 
    }
    header("content-type: Content-Type: application/json");
    echo json_encode($data_of_review);
       
}


?>