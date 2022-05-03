<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");

if(isset($_SERVER['REQUEST_METHOD'])) {
    $prod_faq_id = $_GET['prod_faq_id'];
    $prod_faq_id_query = "SELECT * FROM `product_questions_and_answers` WHERE `p_q_and_a_id`= $prod_faq_id;";
    $require_prod_faq_id_result = mysqli_query($conn, $prod_faq_id_query);
    $prod_faq_id_data = "";
    while($row = mysqli_fetch_assoc($require_prod_faq_id_result)) {
        $prod_faq_id_data = $row;
    }
    header("content-type: Content-Type: application/json");
    echo json_encode($prod_faq_id_data);
       
}


?>