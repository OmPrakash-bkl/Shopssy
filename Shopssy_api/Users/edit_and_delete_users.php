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
}


?>