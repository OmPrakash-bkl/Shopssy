<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");
$inputData = json_decode(file_get_contents('php://input'), true);

if(isset($_SERVER['REQUEST_METHOD'])) {
        $notification_title = $inputData['notification_title'];
        $notification_title_avail_check_query = "SELECT * FROM `notification` WHERE `n_title` = '$notification_title';";
        $notification_title_avail_check_result = mysqli_query($conn, $notification_title_avail_check_query);
        $notification_title_avail_count = mysqli_num_rows($notification_title_avail_check_result);
        echo $notification_title_avail_count;
}


?>