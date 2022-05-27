<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");

if(isset($_SERVER['REQUEST_METHOD'])) {
    $id = $_GET['id'];
    $require_admin_id_query = "SELECT * FROM `admin` WHERE `a_id`= '$id';";
    $require_admin_id_result = mysqli_query($conn, $require_admin_id_query);
    $admin_id_data = "";
    while($row = mysqli_fetch_assoc($require_admin_id_result)) {
        $admin_id_data = $row;
    }
    header("content-type: Content-Type: application/json");
    echo json_encode($admin_id_data);
       
}


?>