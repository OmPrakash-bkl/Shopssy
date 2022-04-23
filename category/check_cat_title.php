<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");
$inputData = json_decode(file_get_contents('php://input'), true);

if(isset($_SERVER['REQUEST_METHOD'])) {
   
        $cat_title = $inputData['cat_title'];
        $cat_title_avail_check_query = "SELECT * FROM `category` WHERE `cat_title` = '$cat_title';";
        $cat_title_avail_check_result = mysqli_query($conn, $cat_title_avail_check_query);
        $cat_avail_count = mysqli_num_rows($cat_title_avail_check_result);
        echo $cat_avail_count;
    
}


?>