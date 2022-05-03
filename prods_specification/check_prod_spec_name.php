<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");
$inputData = json_decode(file_get_contents('php://input'), true);

if(isset($_SERVER['REQUEST_METHOD'])) {
   
        $spec_name = $inputData['spec_name'];
        $spec_name_avail_check_query = "SELECT * FROM `products_specification` WHERE `p_spec_title` = '$spec_name';";
        $spec_name_avail_check_result = mysqli_query($conn, $spec_name_avail_check_query);
        $spec_name_avail_count = mysqli_num_rows($spec_name_avail_check_result);
        echo $spec_name_avail_count;
    
}


?>