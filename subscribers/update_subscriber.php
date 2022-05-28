<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");
header("Access-Control-Allow_Methods: POST");

$inputData = json_decode(file_get_contents('php://input'), true);

if(isset($_SERVER['REQUEST_METHOD'])) {

        $subscriber_id = $inputData['subscriber_id'];
        $subscriber_email_id = $inputData['subscriber_email_id'];
     
       
        $subscriber_data_update_query = "UPDATE `email_subscription` SET `user_email` = '$subscriber_email_id' WHERE `id` = '$subscriber_id';";
         mysqli_query($conn, $subscriber_data_update_query);
         echo "Updated Successfully!";
}


?>