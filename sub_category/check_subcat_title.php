<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");
$inputData = json_decode(file_get_contents('php://input'), true);

if(isset($_SERVER['REQUEST_METHOD'])) {
        $sub_cat_title = $inputData['sub_cat_title'];
        $sub_cat_title_avail_check_query = "SELECT * FROM `sub_category` WHERE `subs_cat_title` = '$sub_cat_title';";
        $sub_cat_title_avail_check_result = mysqli_query($conn, $sub_cat_title_avail_check_query);
        $sub_cat_avail_count = mysqli_num_rows($sub_cat_title_avail_check_result);
        echo $sub_cat_avail_count;
}


?>