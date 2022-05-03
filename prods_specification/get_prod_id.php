<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");
$inputData = json_decode(file_get_contents('php://input'), true);

if(isset($_SERVER['REQUEST_METHOD'])) {
   
        $prods_id = $inputData['prods_id'];
        $prods_id_avail_check_query = "SELECT * FROM `products_specification` WHERE `p_id` = '$prods_id';";
        $prods_id_avail_check_result = mysqli_query($conn, $prods_id_avail_check_query);
        $prods_id_avail_count = mysqli_num_rows($prods_id_avail_check_result);
        echo $prods_id_avail_count;
    
}


?>