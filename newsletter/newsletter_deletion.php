<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");
header("Access-Control-Allow_Methods: DELETE");

    if(isset($_SERVER['REQUEST_METHOD'])) {
    
    $n_id = $_GET['id'];
    $newsletter_delete_query = "DELETE FROM `newsletter` WHERE  `s_id` = $n_id;";
    mysqli_query($conn, $newsletter_delete_query); 
   
    echo "Deleted Successfully!";
   
}


?>