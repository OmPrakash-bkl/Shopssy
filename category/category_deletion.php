<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");
header("Access-Control-Allow_Methods: DELETE");

    if(isset($_SERVER['REQUEST_METHOD'])) {
    
    $cat_id = $_GET['cat_id'];
    $cat_delete_query = "DELETE FROM `category` WHERE  `cat_id` = $cat_id;";
    mysqli_query($conn, $cat_delete_query); 
    echo "User Deleted Successfully!";
   
}


?>