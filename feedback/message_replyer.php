<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");
header("Access-Control-Allow_Methods: POST");

$inputData = json_decode(file_get_contents('php://input'), true);

if(isset($_SERVER['REQUEST_METHOD'])) {

  $feedback_id = $inputData['feedback_id'];
  $feedbacker_email = $inputData['feedbacker_email'];
  $feedbacker_name = $inputData['feedbacker_name'];
  $feedbacker_feedback = $inputData['feedbacker_feedback'];
  $admin_reply = $inputData['admin_reply'];
  $feedbacker_name = stripcslashes($feedbacker_name);
  $admin_reply = stripcslashes($admin_reply);
  $feedbacker_name = stripcslashes($feedbacker_name);
  // $admin_reply = mysqli_real_escape_string($conn, $admin_reply);
  $feedbacker_name = mysqli_real_escape_string($conn, $feedbacker_name);

  if(isset($feedbacker_email)) {

    require "../Mail/phpmailer/PHPMailerAutoload.php";
    $mail = new PHPMailer;
    $mail -> isSMTP();
    $mail -> Host = 'smtp.gmail.com';
    $mail -> Port = 587;
    $mail -> SMTPAuth = true;
    $mail -> SMTPSecure = 'tls';

    $mail -> Username = 'shopssyz@gmail.com';
    $mail -> Password = 'Shopssy$@#123';

    $mail -> setFrom('shopssyz@gmail.com', 'Thank You!');
    $mail -> addAddress($feedbacker_email);

    $mail -> isHTML(true);
    $mail -> Subject = 'Reply from Shopssy!';
    $mail -> Body = "<b style='color: black;'>Dear {$feedbacker_name},</b> <p style='color: black;'>Thankyou for contacting us with feedback message. you asked us, '{$feedbacker_feedback}'.</p>
    <p style='color: black;'>{$admin_reply}</p>
    <br><br>
    <p style='color: black;'>With regards,</p>
    <b style='color: black;'>Shopssy - The Online Shopping Site.</b>";

    if(!$mail -> send()) {
        echo "Mail failed!";
    }
}

$feedback_data_update_query = "UPDATE `contact_us` SET `status` = 'readed' WHERE `id` = $feedback_id;";

mysqli_query($conn, $feedback_data_update_query);
echo "Replied Successfully!";

}


?>