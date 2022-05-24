
<?php

include("../connection.php");
header("Access-Control-Allow-Origin: http://localhost/");
header("Access-Control-Allow_Methods: POST");

$date = new DateTime('', new DateTimezone("Asia/Kolkata"));
$orders_date = $date->format('d/m/y');

$inputData = json_decode(file_get_contents('php://input'), true);

    $order_id = $inputData['order_id'];
    $u_id = $inputData['u_id'];
    
    $order_update_query = "UPDATE `orders_table` SET `p_status` = 'ready' WHERE `order_id` = $order_id;";
    mysqli_query($conn, $order_update_query);

    $order_tracker_update_query = "UPDATE `order_tracker` SET `ready_date` = '$orders_date' WHERE `order_id` = '$order_id';";
    mysqli_query($conn, $order_tracker_update_query);

    $get_user_email_query = "SELECT `email` FROM `register` WHERE `user_id` = '$u_id';";
    $get_user_email_result = mysqli_query($conn, $get_user_email_query);
    while($row = mysqli_fetch_assoc($get_user_email_result)) {
        $user_email = $row['email'];
    }

    if(isset($user_email)) {

        require "../Mail/phpmailer/PHPMailerAutoload.php";
        $mail = new PHPMailer;
        $mail -> isSMTP();
        $mail -> Host = 'smtp.gmail.com';
        $mail -> Port = 587;
        $mail -> SMTPAuth = true;
        $mail -> SMTPSecure = 'tls';

        $mail -> Username = 'shopssyz@gmail.com';
        $mail -> Password = 'Shop$@#123';

        $mail -> setFrom('shopssyz@gmail.com', 'Alert Message!');
        $mail -> addAddress($user_email);

        $mail -> isHTML(true);
        $mail -> Subject = 'Hey, Be ready!';
        $mail -> Body = "<b style='color: black;'>Dear customer,</b> <p style='color: black;'>Your order is ready to pick up. Our distributor will call you within 2 hours. So, keep wait with your mobile phone, Thank you.</p>
        <br><br>
        <p style='color: black;'>With regards,</p>
        <b style='color: black;'>Shopssy - The Online Shopping Site.</b>";

        if(!$mail -> send()) {
            echo "Mail failed!";
        }
    }

    echo "Updated Successfully";



?>