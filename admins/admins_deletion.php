<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");
header("Access-Control-Allow_Methods: DELETE");

    if(isset($_SERVER['REQUEST_METHOD'])) {
    
    $admin_id = $_GET['id'];
    $admin_id_delete_query = "DELETE FROM `admin` WHERE  `a_id` = '$admin_id';";
    mysqli_query($conn, $admin_id_delete_query); 
    echo "Deleted Successfully!";
   
}


?>