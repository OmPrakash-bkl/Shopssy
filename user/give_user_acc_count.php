<?php

include("../connection.php");
header("Access-Control-Allow-Origin: http://localhost/");

if(isset($_SERVER['REQUEST_METHOD'])) {

   
        $users_id = $_GET['user_id'];
        $fetch_specified_user_addcount_query = "SELECT `acc_id` FROM `account` WHERE `user_id` = $users_id;";
        $fetch_specified_user_addcount_result = mysqli_query($conn, $fetch_specified_user_addcount_query);
        while($row = mysqli_fetch_assoc($fetch_specified_user_addcount_result)) {
            $addressed_data[] = $row;
        }
        echo json_encode($addressed_data);
   

}


?>