<?php
include '../connection.php';
$user_email_id = $_POST['user_email'];
$email_avail_check_query = "SELECT * FROM `register` WHERE `email` = '$user_email_id';";
$email_avail_check_result = mysqli_query($conn, $email_avail_check_query);
$email_avail_count = mysqli_num_rows($email_avail_check_result);
echo $email_avail_count;
?>