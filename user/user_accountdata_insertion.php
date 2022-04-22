<?php

include("./connection.php");

header("Access-Control-Allow-Origin: http://localhost/");

if(isset($_SERVER['REQUEST_METHOD'])) {

    // User Account Data Insertion Section
    
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


?>