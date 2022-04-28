<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");
header("Access-Control-Allow_Methods: DELETE");

    if(isset($_SERVER['REQUEST_METHOD'])) {
    
    $subcat_id = $_GET['subcat_id'];
    $subcat_delete_query = "DELETE FROM `sub_category` WHERE  `sub_cat_id` = $subcat_id;";
    mysqli_query($conn, $subcat_delete_query); 
    echo "Sub Category Deleted Successfully!";
   
}


?>