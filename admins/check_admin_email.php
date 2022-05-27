<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");
$inputData = json_decode(file_get_contents('php://input'), true);

if(isset($_SERVER['REQUEST_METHOD'])) {
    
        $admin_email_id = $inputData['admin_email_id'];
        $admin_email_id_avail_check_query = "SELECT * FROM `admin` WHERE `email` = '$admin_email_id';";
        $admin_email_id_avail_check_result = mysqli_query($conn, $admin_email_id_avail_check_query);
        $admin_email_id_avail_count = mysqli_num_rows($admin_email_id_avail_check_result);
        echo $admin_email_id_avail_count;
}


?>