<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");

if(isset($_SERVER['REQUEST_METHOD'])) {
    $f_id = $_GET['f_id'];
    $require_f_id_query = "SELECT * FROM `contact_us` WHERE `id`= $f_id;";
    $require_f_id_result = mysqli_query($conn, $require_f_id_query);
    $f_id_data = "";
    while($row = mysqli_fetch_assoc($require_f_id_result)) {
        $f_id_data = $row;
    }
    header("content-type: Content-Type: application/json");
    echo json_encode($f_id_data);
       
}


?>