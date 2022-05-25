<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");
header("Access-Control-Allow_Methods: DELETE");

    if(isset($_SERVER['REQUEST_METHOD'])) {
    
    $f_id = $_GET['f_id'];
    $feedback_delete_query = "DELETE FROM `contact_us` WHERE  `id` = $f_id;";
    mysqli_query($conn, $feedback_delete_query); 
   
    echo "Deleted Successfully!";
   
}


?>