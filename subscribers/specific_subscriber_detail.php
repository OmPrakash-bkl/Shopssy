<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");

if(isset($_SERVER['REQUEST_METHOD'])) {
    $id = $_GET['id'];
    $require_subscriber_query = "SELECT * FROM `email_subscription` WHERE `id`= '$id';";
    $require_subscriber_result = mysqli_query($conn, $require_subscriber_query);
    $cat_id_data = "";
    while($row = mysqli_fetch_assoc($require_subscriber_result)) {
        $subscriber_data = $row;
    }
    header("content-type: Content-Type: application/json");
    echo json_encode($subscriber_data);
       
}


?>