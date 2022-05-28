<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");
header("Access-Control-Allow_Methods: DELETE");

    if(isset($_SERVER['REQUEST_METHOD'])) {
    
    $id = $_GET['id'];
    $subscriber_delete_query = "DELETE FROM `email_subscription` WHERE  `id` = '$id';";
    mysqli_query($conn, $subscriber_delete_query); 
   
    echo "Deleted Successfully!";
   
}


?>