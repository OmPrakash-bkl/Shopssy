<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");
header("Access-Control-Allow_Methods: DELETE");

    if(isset($_SERVER['REQUEST_METHOD'])) {
    
    $n_id = $_GET['n_id'];
    $notification_delete_query = "DELETE FROM `notification` WHERE  `n_id` = $n_id;";
    mysqli_query($conn, $notification_delete_query); 
   
    echo "Deleted Successfully!";
   
}


?>