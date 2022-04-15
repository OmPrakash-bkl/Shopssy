<?php
include '../connection.php';
if(isset($_GET['show_me'])) {
    $table_of_user_data_query = "SELECT register.user_id, register.f_name, register.l_name, register.email, register.status AS `r_status`, account.my_name, account.street, account.city, account.state, account.zip, account.phone, account.country, register.status AS `r_status` FROM `register` INNER JOIN `account` ON register.user_id = account.user_id";

$table_of_user_data_result = mysqli_query($conn, $table_of_user_data_query);
while($row = mysqli_fetch_assoc($table_of_user_data_result)) {
    $table_of_users_data_rows[] = $row;
    
   
}
echo json_encode($table_of_users_data_rows);
}

if(isset($_GET['show_registered_user_details_to_me'])) {
    $table_of_user_data_query = "SELECT * FROM `register`;";

    $table_of_user_data_result = mysqli_query($conn, $table_of_user_data_query);
    while($row = mysqli_fetch_assoc($table_of_user_data_result)) {
        $table_of_users_data_rows[] = $row;
        
       
    }
    echo json_encode($table_of_users_data_rows);
}

?>  