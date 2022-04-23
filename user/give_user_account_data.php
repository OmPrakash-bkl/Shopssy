<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");

if(isset($_SERVER['REQUEST_METHOD'])) {

        $accs_id = $_POST['acc_id'];
        $fetch_specified_user_add_query = "SELECT * FROM `account` WHERE `acc_id` LIKE $accs_id;";
       
        $fetch_specified_user_add_result = mysqli_query($conn, $fetch_specified_user_add_query);
        $addressed_data = "";
        
        while($row = mysqli_fetch_assoc($fetch_specified_user_add_result)) {
            $addressed_data = $row;
        }
        echo json_encode($addressed_data);
}


?>