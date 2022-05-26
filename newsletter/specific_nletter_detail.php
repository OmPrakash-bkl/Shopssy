<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");

if(isset($_SERVER['REQUEST_METHOD'])) {
    $id = $_GET['id'];
    $require_n_id_query = "SELECT * FROM `newsletter` WHERE `s_id`= '$id';";
    $require_n_id_result = mysqli_query($conn, $require_n_id_query);
    $n_id_data = "";
    while($row = mysqli_fetch_assoc($require_n_id_result)) {
        $n_id_data = $row;
    }
    header("content-type: Content-Type: application/json");
    echo json_encode($n_id_data);
       
}


?>