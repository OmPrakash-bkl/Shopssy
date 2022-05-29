<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");

if(isset($_SERVER['REQUEST_METHOD'])) {
    $id = $_GET['id'];
    $c_order_status_update_query = "UPDATE `cancelled_orders` SET `status` = 'viewed' WHERE `c_o_id` = '$id';";
    mysqli_query($conn, $c_order_status_update_query);
    echo "Changed status to viewd.";
       
}


?>