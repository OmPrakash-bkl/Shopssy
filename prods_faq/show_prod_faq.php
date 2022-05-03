<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");

if(isset($_SERVER['REQUEST_METHOD'])) {

    $data_of_prod_faq_query = "SELECT * FROM `product_questions_and_answers`;";

    $data_of_prod_faq_result = mysqli_query($conn, $data_of_prod_faq_query);
    while($row = mysqli_fetch_assoc($data_of_prod_faq_result)) {
        $data_of_prod_faq[] = $row; 
    }
    header("content-type: Content-Type: application/json");
    echo json_encode($data_of_prod_faq);
       
}


?>