<?php

include("./connection.php");

header("Access-Control-Allow-Origin: http://localhost/");


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
    $account_identity = $_POST['account_id'];

    $account_update_query = "UPDATE `account` SET `f_name` = '$fir_name', `l_name` = '$las_name', `my_name` = '$my_full_name', `street` = '$street', `city` = '$city', `state` = '$state', `zip` = '$zip', `phone`= '$phone', `country` = '$country', `status` = '$address_type' WHERE `acc_id` = $account_identity;";
    mysqli_query($conn, $account_update_query);
    echo "Updated Successfully";



?>