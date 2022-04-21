<?php

include("./connection.php");

header("Access-Control-Allow-Origin: http://localhost/");
header("Access-Control-Allow_Methods: GET");


    $fir_name = $_GET['fname'];
    $las_name = $_GET['lname'];
    $my_full_name = $_GET['full_name'];
    $street = $_GET['street'];
    $city = $_GET['city'];
    $country = $_GET['country'];
    $state = $_GET['state'];
    $zip = $_GET['zip'];
    $phone = $_GET['phone'];
    $address_type =  $_GET['add_type'];
    $account_identity = $_GET['account_id'];

    $account_update_query = "UPDATE `account` SET `f_name` = '$fir_name', `l_name` = '$las_name', `my_name` = '$my_full_name', `street` = '$street', `city` = '$city', `state` = '$state', `zip` = '$zip', `phone`= '$phone', `country` = '$country', `status` = '$address_type' WHERE `acc_id` = $account_identity;";
    $res = mysqli_query($conn, $account_update_query);
    echo "Updated Successfully".$_GET['account_id']." ".$_GET['add_type'];



?>