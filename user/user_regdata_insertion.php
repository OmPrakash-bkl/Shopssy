<?php

include("./connection.php");

header("Access-Control-Allow-Origin: http://localhost/");

if(isset($_SERVER['REQUEST_METHOD'])) {

     // User Reg Data Insertion Section
        $user_f_name = $_POST['fname'];
        $user_l_name = $_POST['lname'];
        $user_email = $_POST['user_mail'];
        $user_password = $_POST['user_pass'];
        $user_f_name = stripcslashes($user_f_name);
        $user_l_name = stripcslashes($user_l_name);
        $user_email = stripcslashes($user_email);
        $user_f_name = mysqli_real_escape_string($conn, $user_f_name);
        $user_l_name = mysqli_real_escape_string($conn, $user_l_name);
        $user_password = mysqli_real_escape_string($conn, $user_password);

        if($_POST['valid_user'] == "Yes") {
            $valid_user = 1;
        } else {
            $valid_user = 0;
        }

        $user_password = password_hash($user_password, PASSWORD_BCRYPT);
        $data_insert_query = "INSERT INTO `register` (`f_name`, `l_name`, `email`, `password`, `full_name`, `street`, `city`, `zip`, `phone_number`, `country`, `status`) VALUES ('$user_f_name', '$user_l_name', '$user_email', '$user_password', '', '', '', '', '', '', $valid_user);";
        $data_insert_result = mysqli_query($conn, $data_insert_query);
        echo $conn->insert_id;
   
    
}


?>