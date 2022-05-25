<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");
$inputData = json_decode(file_get_contents('php://input'), true);

if(isset($_SERVER['REQUEST_METHOD'])) {
   
        $new_notification_avail_check_query = "SELECT * FROM `contact_us` WHERE `status` = 'unread';";
        $new_notification_avail_check_result = mysqli_query($conn, $new_notification_avail_check_query);
        $new_notification_avail_count = mysqli_num_rows($new_notification_avail_check_result);
        echo $new_notification_avail_count;
    
}


?>