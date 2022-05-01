<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");
$inputData = json_decode(file_get_contents('php://input'), true);

if(isset($_SERVER['REQUEST_METHOD'])) {
        $prod_title = $inputData['prod_title'];
        $p_titles_avail_check_query = "SELECT * FROM `products` WHERE `p_title` = '$prod_title';";
        $p_titles_avail_check_result = mysqli_query($conn, $p_titles_avail_check_query);
        $p_titles_avail_count = mysqli_num_rows($p_titles_avail_check_result);
        echo $p_titles_avail_count;
}


?>