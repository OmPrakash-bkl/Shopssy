<?php
include '../connection.php';
if(isset($_GET['command'])) {
    if($_GET['command'] == "update") {
        $users_id = $_GET['user_id'];
        $require_user_data_query = "SELECT * FROM `register` WHERE `user_id`=$users_id;";
        $require_user_data_result = mysqli_query($conn, $require_user_data_query);
        $registered_data = "";
        while($row = mysqli_fetch_assoc($require_user_data_result)) {
            $registered_data = $row;
        }
        echo json_encode($registered_data);
    }
}


?>