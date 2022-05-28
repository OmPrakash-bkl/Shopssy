<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");
$inputData = json_decode(file_get_contents('php://input'), true);

if(isset($_SERVER['REQUEST_METHOD'])) {
   
        $check_email_id = $inputData['subscriber_email_id'];
        $check_email_id_avail_check_query = "SELECT * FROM `email_subscription` WHERE `user_email` = '$check_email_id';";
        $check_email_id_avail_check_result = mysqli_query($conn, $check_email_id_avail_check_query);
        $check_email_id_avail_count = mysqli_num_rows($check_email_id_avail_check_result);
        echo $check_email_id_avail_count;
    
}


?>