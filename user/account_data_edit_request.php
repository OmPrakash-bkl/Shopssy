<?php

include("../connection.php");
header("Access-Control-Allow-Origin: http://localhost/");
header("Access-Control-Allow_Methods: POST");

$inputData = json_decode(file_get_contents('php://input'), true);

    $fir_name = $inputData['fname'];
    $las_name = $inputData['lname'];
    $my_full_name = $inputData['full_name'];
    $street = $inputData['street'];
    $city = $inputData['city'];
    $country = $inputData['country'];
    $state = $inputData['state'];
    $zip = $inputData['zip'];
    $phone = $inputData['phone'];
    $address_type =  $inputData['add_type'];
    $account_identity = $inputData['accounts_id'];

    $account_update_query = "UPDATE `account` SET `f_name` = '$fir_name', `l_name` = '$las_name', `my_name` = '$my_full_name', `street` = '$street', `city` = '$city', `state` = '$state', `zip` = '$zip', `phone`= '$phone', `country` = '$country', `status` = '$address_type' WHERE `acc_id` = $account_identity;";
    $res = mysqli_query($conn, $account_update_query);
    echo "Updated Successfully";



?>