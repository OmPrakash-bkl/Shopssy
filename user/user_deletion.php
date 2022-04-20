<?php

include("./connection.php");

header("Access-Control-Allow-Origin: http://localhost/");

    if(isset($_SERVER['REQUEST_METHOD'])) {
    
    $customer_id = $_POST['user_id'];
    $user_delete_req1_query = "DELETE FROM `account` WHERE  `user_id` = $customer_id;";
    $user_delete_req1_result = mysqli_query($conn, $user_delete_req1_query);
    if($user_delete_req1_result) {
    $user_delete_req2_query  = "DELETE FROM `register` WHERE `user_id` = $customer_id;";
    $user_delete_req2_result = mysqli_query($conn, $user_delete_req2_query);
    echo "User Deleted Successfully!";
    }   
   
}


?>