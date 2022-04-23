<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");

if(isset($_SERVER['REQUEST_METHOD'])) {
    $table_of_user_data_query = "SELECT register.user_id, register.f_name, register.l_name, register.email, register.status AS `r_status`, account.my_name, account.street, account.city, account.state, account.zip, account.phone, account.country, register.status AS `r_status` FROM `register` INNER JOIN `account` ON register.user_id = account.user_id";

    $table_of_user_data_result = mysqli_query($conn, $table_of_user_data_query);
    while($row = mysqli_fetch_assoc($table_of_user_data_result)) {
        $table_of_users_data_rows[] = $row; 
    }
    header("content-type: Content-Type: application/json");
    echo json_encode($table_of_users_data_rows);
       
}


?>