<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");
header("Access-Control-Allow_Methods: POST");

$inputData = json_decode(file_get_contents('php://input'), true);

if(isset($_SERVER['REQUEST_METHOD'])) {

        $customer_id = $inputData['users_id'];
        $user_f_name = $inputData['fname'];
        $user_l_name = $inputData['lname'];
        $user_mail = $inputData['user_mail'];
        $user_pass = $inputData['user_pass'];
        $valid_user = $inputData['valid_user'];
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