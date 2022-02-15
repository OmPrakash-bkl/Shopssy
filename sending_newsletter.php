<?php

$newsletter_retrieve_query = "SELECT * FROM `newsletter`;";
$newsletter_retrieve_result = mysqli_query($con, $newsletter_retrieve_query);

while($row = mysqli_fetch_assoc($newsletter_retrieve_result)) {
$newsletter_s_id = $row['s_id'];
$newsletter_html_data = $row['html_data'];
$newsletter_title = $row['title'];
$newsletter_subject = $row['subject'];
}

if(!isset($_COOKIE['N32SL33673R'])) {
    $token_of_newsletter = "N32SL33673R";
    setcookie($token_of_newsletter, 0, time() + (86400 * 730));    
}

if($_COOKIE['N32SL33673R'] != $newsletter_s_id) {
    
    require "./Mail/phpmailer/PHPMailerAutoload.php";
    $mail = new PHPMailer;
    $mail -> isSMTP();
    $mail -> Host = 'smtp.gmail.com';
    $mail -> Port = 587;
    $mail -> SMTPAuth = true;
    $mail -> SMTPSecure = 'tls';

    $mail -> Username = 'shopssyz@gmail.com';
    $mail -> Password = 'Shopssy$#@123';

    $mail -> setFrom('shopssyz@gmail.com', "$newsletter_title");
    $mail -> addAddress($_SESSION['user_login_email']);

    $mail -> isHTML(true);
    $mail -> Subject = "$newsletter_subject";
    $mail -> Body = "$newsletter_html_data";

    if(!$mail -> send()) {
        echo "Sending Mail is Failed, Invalid Email";
    } else {
        $token_of_newsletter = "N32SL33673R";
        setcookie($token_of_newsletter, $newsletter_s_id, time() + (86400 * 730), '/');  
        
    }
}

?>