<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Successful</title>
    <link rel="icon" href="./images/favicon1.png">
    <script src="https://kit.fontawesome.com/628c629a17.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Ceviche+One&family=Josefin+Sans:wght@700&family=Lobster&family=Pacifico&display=swap" rel="stylesheet">
<link rel="stylesheet" href="./css/style.css">
   
</head>
<body>
    <!-- Success Message Display Container Start -->

    <?php
    session_start();
    

if(isset($_SESSION['pqaeyvmmecndtisluacwcqevsbs'])) {
    if($_SESSION['pqaeyvmmecndtisluacwcqevsbs'] == "failer") {
    ?>
 <script type="text/javascript">
 window.location.href = 'http://localhost:3000/index.php';
 </script>
 <?php
    }
}
  
include './connection.php';

// Redirect If Your Not Login Fun Start

if(!isset($_SESSION['user_login_id'])) {
    ?>
   <script type="text/javascript">
   window.location.href = 'http://localhost:3000/login.php';
   </script>
   <?php
}

if(!isset($_SESSION['pqaeyvmmecndtisluacwcqevsbs']) && !isset($_SESSION['ueswernOtrhdnesrCmoluxndt'])) {
    ?>
    <script type="text/javascript">
    window.location.href = 'http://localhost:3000/cart.php';
    </script>
    <?php
}


// Redirect If Your Not Login Fun End

// Redirect If The Cart Is Empty Start

$user_id = $_SESSION['user_id'];
$cart_details_query = "SELECT * FROM `cart` WHERE `u_id` = $user_id;";
$cart_details__result = mysqli_query($conn, $cart_details_query);
$cart_count_checking = mysqli_num_rows($cart_details__result);
if($cart_count_checking == 0) {
 ?>
 <script type="text/javascript">
 window.location.href = 'http://localhost:3000/index.php';
 </script>
 <?php
} else {
    if(isset($_SESSION['pqaeyvmmecndtisluacwcqevsbs'])) {
        if($_SESSION['pqaeyvmmecndtisluacwcqevsbs'] == "success" && $_SESSION['psarynmielnat_fqtienayl_sxeacgigown'] = 1) {
            $delete_cart_after_booking = "DELETE FROM `cart` WHERE `u_id` = $user_id;";
            mysqli_query($conn, $delete_cart_after_booking);
            
    unset($_SESSION['pqaeyvmmecndtisluacwcqevsbs']);
    unset($_SESSION['ueswernOtrhdnesrCmoluxndt']);
    unset($_SESSION['ddeetcafillxs_yaorye_zfbialvlserd']);
    unset($_SESSION['psarynmielnat_fqtienayl_sxeacgigown']);

    if(isset($_SESSION['user_login_email'])) {
       
        
        require "./Mail/phpmailer/PHPMailerAutoload.php";
        $user_mail_id = "";
        $mail = new PHPMailer;
        $mail -> isSMTP();
        $mail -> Host = 'smtp.gmail.com';
        $mail -> Port = 587;
        $mail -> SMTPAuth = true;
        $mail -> SMTPSecure = 'tls';
     
        $mail -> Username = 'shopssyz@gmail.com';
        $mail -> Password = 'Shopssy$@#123';
     
        $mail -> setFrom('shopssyz@gmail.com', 'Order - Confirmation');
        $mail -> addAddress($_SESSION['user_login_email']);
     
        $mail -> isHTML(true);
        $mail -> Subject = 'Payment Successful - Your order is confirmed!';
        $mail -> Body = "
        <!DOCTYPE html>
        <html lang='en'>
        <head>
            <style>
                * {
                    margin: 0px;
                    padding: 0px;
                    box-sizing: border-box;
                    font-family: Arial, Helvetica, sans-serif;
                }
                body {
                    padding: 0px 5px;
                }
                .site_name {
                    color: #1792E9;
                    font-size: 35px;
                }
                .msg_head_text {
                    margin: 10px 0px;
                    color: rgb(6, 152, 6);
                }
                
                .info_text {
                    color: black;
                }
               
                .help_para {
                    margin: 20px 0px;
                    color: black;
                }
        
                .help_para a {
                    text-decoration: none;
                    color: #1792E9;
                }
                
     
            </style>
        </head>
        <body>
            <center>
            <h1 class='site_name'>Shopssy</h1>
            <h4>&#x60;Find it, love it, buy it&#x60;</h4> <br>
            <h2 class='msg_head_text'>Paid Successfully!</h2>
            </center>
            
            <p class='info_text'>Dear Customer, Your payment was successful! As soon as your package is on it's way, you will receive a delivery confirmation from us by email, Thankyou.</p>
            
            <p class='help_para'>If you have any questions, contact shopssy at <a href='http://localhost:3000/contactus.php'>http://localhost:3000/contactus.php</a> or call at <a href='tel: 1234567890'>+91 1234567890</a>.</p>
            
        </body>
        </html>
        ";
     
        if(!$mail -> send()) {
            echo "Sending Mail is Failed, Invalid Email";
        } else {
           ?>
<!-- Redirect To Home Page Fun Start -->
<script>
    setTimeout(function() {
        window.location.href = 'http://localhost:3000/index.php';
    }, 2000);
</script>
    <!-- Redirect To Home Page Fun End -->
           <?php
        }
     
       
     }
     

        } else {
            ?>
              <script type="text/javascript">
            window.location.href = 'http://localhost:3000/index.php';
            </script>
            <?php
        }
       
    }

}

// Redirect If The Cart Is Empty End


    
    ?>

<center>
<div class="success_page_texts">
<i class="fas fa-check-circle"></i>
<h1>Payment Complete</h1>
<p>Thank you, your payment has been successful. A confirmation email has been sent to your mail id.</p>
</div>
</center>
    <!-- Success Message Display Container End -->

</body>
</html>