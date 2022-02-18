<?php 
include './action.php';
$title = "Recover Email - Shopssy";
include './header.php';
$error_messages = "";
if(isset($_POST['recover'])) {
$email = $_POST['mail_add'];
$recover_query = "SELECT * FROM `register` WHERE `email` = '$email';";
$recover_result = mysqli_query($con, $recover_query);
$no_of_rows = mysqli_num_rows($recover_result);
$fetch = mysqli_fetch_assoc($recover_result);

if($no_of_rows <= 0){
    $error_messages = "Sorry, No Email Exists!";
}else if($fetch["status"] == 0){
    $error_messages = "Sorry, Your Account Must Verify First, Before You Recover Your Password!!";
}else{
   
    $_SESSION['emailid'] = $email;

    require "./Mail/phpmailer/PHPMailerAutoload.php";
    $mail = new PHPMailer;

    $mail->isSMTP();
    $mail->Host='smtp.gmail.com';
    $mail->Port=587;
    $mail->SMTPAuth=true;
    $mail->SMTPSecure='tls';

   
    $mail->Username='shopssyz@gmail.com';
    $mail->Password='Shopssy$#@123';

    
    $mail->setFrom('shopssyz@gmail.com', 'Password Reset');
    
    $mail->addAddress($_POST["mail_add"]);
    
    $mail->isHTML(true);
    $mail->Subject="Recover your password";
    $mail->Body="<b>Dear User</b>
    <h3>We received a request to reset your password.</h3>
    <p>Kindly click the below link to reset your password</p>
    http://localhost:3000/reset.php
    <br><br>
    <p>With regrads,</p>
    <b>Shopssy - The Online Shopping Site.</b>";

    if(!$mail->send()){
        echo "Invalid Email";
    }else{
        ?>
            <script>
                window.location.replace("notification.php");
            </script>
        <?php
    }
}

}


?>


    <!--sub navigation container start-->
    <div class="sub_navigation_container">
<center>
    <div class="sub_navigation_inner_container">
        <span><a href="./index.php">Home</a></span>
        <span><i class="fas fa-arrow-right" style="color: #666666;font-size: 12px;"></i></span>
        <span><a href="./recover.php">Recover Email</a></span>
    </div>
</center>
    </div>
    <!--sub navigation container end-->

    <!--recover container start-->
    <div class="login_register_container acc_verification_container">
    
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                <div>
                    <label for="recover">Email Address</label> <br>
                <input type="email" id="recover" name="mail_add" required autofocus>
                <p class="text_of_error_message"><?php echo $error_messages; ?></p>
                </div>
            <button type="submit" name="recover">Recover</button>
        </form>
       
    </div>
    <!--recover container end-->

    <?php 
    include "./footer.php";
    ?>
              
    <script src="./javascript/index.js"></script>
</body>
</html>