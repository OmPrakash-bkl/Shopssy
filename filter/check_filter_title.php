<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");
$inputData = json_decode(file_get_contents('php://input'), true);

if(isset($_SERVER['REQUEST_METHOD'])) {
        $filteres_title = $inputData['filteres_title'];
        $subs_cats_id = $inputData['subs_cats_id'];
        $filteres_title_avail_check_query = "SELECT * FROM `filter` WHERE `filter_title` = '$filteres_title' AND `subs_cat_identification_id` = $subs_cats_id;";
        $filteres_title_avail_check_result = mysqli_query($conn, $filteres_title_avail_check_query);
        $filteres_title_avail_count = mysqli_num_rows($filteres_title_avail_check_result);
        echo $filteres_title_avail_count;
}


?>