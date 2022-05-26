<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");
$inputData = json_decode(file_get_contents('php://input'), true);

if(isset($_SERVER['REQUEST_METHOD'])) {
        $newsletter_title = $inputData['newsletter_title'];
        $newsletter_title_avail_check_query = "SELECT * FROM `newsletter` WHERE `title` = '$newsletter_title';";
        $newsletter_title_avail_check_result = mysqli_query($conn, $newsletter_title_avail_check_query);
        $newsletter_title_avail_count = mysqli_num_rows($newsletter_title_avail_check_result);
        echo $newsletter_title_avail_count;
}


?>