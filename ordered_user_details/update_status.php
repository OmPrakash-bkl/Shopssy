
<?php

include("../connection.php");
header("Access-Control-Allow-Origin: http://localhost/");
header("Access-Control-Allow_Methods: POST");

$date = new DateTime('', new DateTimezone("Asia/Kolkata"));
$orders_date = $date->format('d/m/y');

$inputData = json_decode(file_get_contents('php://input'), true);

    $order_id = $inputData['order_id'];
    
    $order_update_query = "UPDATE `orders_table` SET `p_status` = 'processed' WHERE `order_id` = $order_id;";
    mysqli_query($conn, $order_update_query);

    $order_tracker_update_query = "UPDATE `order_tracker` SET `process_date` = '$orders_date' WHERE `order_id` = '$order_id';";
    mysqli_query($conn, $order_tracker_update_query);

    echo "Updated Successfully";



?>