<?php
include '../connection.php';
if(isset($_POST['command'])) {
    // Email Checking Section
    if($_POST['command'] == "checking") {
        $user_email_id = $_POST['user_email'];
        $email_avail_check_query = "SELECT * FROM `register` WHERE `email` = '$user_email_id';";
        $email_avail_check_result = mysqli_query($conn, $email_avail_check_query);
        $email_avail_count = mysqli_num_rows($email_avail_check_result);
        echo $email_avail_count;
    }
    // User Data Insertion Section
    if($_POST['command'] == "insert") {
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

    if($_POST['command'] == "insertIntoAccount") {
    $fir_name = $_POST['fname'];
    $las_name = $_POST['lname'];
    $my_full_name = $_POST['full_name'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $phone = $_POST['phone'];
    $address_type =  $_POST['add_type'];
    $user_identity = $_POST['user_id'];
    $account_insert_query = "INSERT INTO `account` (`user_id`, `f_name`, `l_name`, `my_name`, `street`, `city`, `state`, `zip`, `phone`, `country`, `status`) VALUES ($user_identity, '$fir_name', '$las_name', '$my_full_name', '$street', '$city', '$state', '$zip', '$phone', '$country', '$address_type');";
    $account_insert_result = mysqli_query($conn, $account_insert_query);
    echo $conn->insert_id;
    }
    
}


?>