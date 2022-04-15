<?php
include '../connection.php';
if(isset($_GET['command'])) {
    if($_GET['command'] == "giveUserRegData") {
        $users_id = $_GET['user_id'];
        $require_user_data_query = "SELECT * FROM `register` WHERE `user_id`= $users_id;";
        $require_user_data_result = mysqli_query($conn, $require_user_data_query);
        $registered_data = "";
        while($row = mysqli_fetch_assoc($require_user_data_result)) {
            $registered_data = $row;
        }
        echo json_encode($registered_data);
    }
    if($_GET['command'] == "giveUserAddCountData") {
        $users_id = $_GET['user_id'];
        $fetch_specified_user_addcount_query = "SELECT `acc_id` FROM `account` WHERE `user_id` = $users_id;";
        $fetch_specified_user_addcount_result = mysqli_query($conn, $fetch_specified_user_addcount_query);
        while($row = mysqli_fetch_assoc($fetch_specified_user_addcount_result)) {
            $addressed_data[] = $row;
        }
        echo json_encode($addressed_data);
    }
}

if(isset($_POST['command'])) {
    if($_POST['command'] == "giveUserAddData") {
        $accs_id = $_POST['acc_id'];
        $fetch_specified_user_add_query = "SELECT * FROM `account` WHERE `acc_id` LIKE $accs_id;";
       
        $fetch_specified_user_add_result = mysqli_query($conn, $fetch_specified_user_add_query);
        $addressed_data = "";
        
        while($row = mysqli_fetch_assoc($fetch_specified_user_add_result)) {
            $addressed_data = $row;
        }
        echo json_encode($addressed_data);
    }

    if($_POST['command'] == "registerDataEditRequest") {
        
        $customer_id = $_POST['users_id'];
        $user_f_name = $_POST['fname'];
        $user_l_name = $_POST['lname'];
        $user_mail = $_POST['user_mail'];
        $user_pass = $_POST['user_pass'];
        $valid_user = $_POST['valid_user'];
        $user_pass = password_hash($user_pass, PASSWORD_BCRYPT);
        if($valid_user == "No") {
            $valid_user = 0;
        } else {
            $valid_user = 1;
        }
        $account_data_update_query = "UPDATE `register` SET `f_name` = '$user_f_name', `l_name` = '$user_l_name', `email` = '$user_mail', `password` = '$user_pass', `status` = '$valid_user' WHERE `user_id` = $customer_id;";
         mysqli_query($conn, $account_data_update_query);
       
    }

    if($_POST['command'] == "accountDataEditRequest") {
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

    }

}


?>