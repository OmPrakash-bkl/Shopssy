<?php

include("./connection.php");

header("Access-Control-Allow-Origin: http://localhost/");
header("Access-Control-Allow_Methods: GET");

if(isset($_SERVER['REQUEST_METHOD'])) {

        $customer_id = $_GET['users_id'];
        $user_f_name = $_GET['fname'];
        $user_l_name = $_GET['lname'];
        $user_mail = $_GET['user_mail'];
        $user_pass = $_GET['user_pass'];
        $valid_user = $_GET['valid_user'];
        $user_pass = password_hash($user_pass, PASSWORD_BCRYPT);
        if($valid_user == "No") {
            $valid_user = 0;
        } else {
            $valid_user = 1;
        }
        $account_data_update_query = "UPDATE `register` SET `f_name` = '$user_f_name', `l_name` = '$user_l_name', `email` = '$user_mail', `password` = '$user_pass', `status` = '$valid_user' WHERE `user_id` = $customer_id;";
         mysqli_query($conn, $account_data_update_query);
   
}


?>