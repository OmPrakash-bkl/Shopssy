<?php 
include './action.php';
$title = "Create Account - Shopssy";
include './header.php';

// Register Fun Start

$error_messages = "";
if(isset($_POST['submit'])) {

    // User Input Data Sanitizing Fun Start

    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $emailval = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
    $f_name = stripcslashes($f_name);
    $l_name = stripcslashes($l_name);
    $pass = stripcslashes($pass);
    $f_name = mysqli_real_escape_string($con, $f_name);
    $l_name = mysqli_real_escape_string($con, $l_name);
    $pass = mysqli_real_escape_string($con, $pass);

     // User Input Data Sanitizing Fun End

     // Sending Mail To The User Fun Start

    if(preg_match($emailval, $email)) {
        $check_query = "SELECT * FROM `register` WHERE `email` = '$email';";
        $check_result = mysqli_query($con, $check_query);
        $check_rows = mysqli_num_rows($check_result);

        if(!empty($email) && !empty($pass)) {
            if($check_rows > 0) {
                $error_messages = "User with email is already exist!";
            } else {
                $password_hash = password_hash($pass, PASSWORD_BCRYPT);
                $register_query = "INSERT INTO `register` (`f_name`, `l_name`, `email`, `password`, `full_name`, `street`, `city`, `zip`, `phone_number`, `country`, `status`) VALUES ('$f_name', '$l_name', '$email', '$password_hash', '', '', '', '', '', '', 0);";
               $register_result = mysqli_query($con, $register_query);

               if($register_result) {
                   $otp = rand(100000, 999999);
                   $_SESSION['OTP'] = $otp;
                   $_SESSION['EMAIL'] = $email;
                   require "./Mail/phpmailer/PHPMailerAutoload.php";
                   $mail = new PHPMailer;
                   $mail -> isSMTP();
                   $mail -> Host = 'smtp.gmail.com';
                   $mail -> Port = 587;
                   $mail -> SMTPAuth = true;
                   $mail -> SMTPSecure = 'tls';

                   $mail -> Username = 'shopssyz@gmail.com';
                   $mail -> Password = 'Shop$@#123';

                   $mail -> setFrom('shopssyz@gmail.com', 'OTP Verification');
                   $mail -> addAddress($_POST['email']);

                   $mail -> isHTML(true);
                   $mail -> Subject = 'Your Verify Code';
                   $mail -> Body = "<p>Dear User, </p><h3>Your Verify OTP Code is $otp <br></h3>
                   <br><br>
                   <p>With regards,</p>
                   <b>Shopssy - The Online Shopping Site.</b>";

                   if(!$mail -> send()) {
                       ?>
                       <script>
                           alert("Registration Failed, Invalid Email");
                       </script>
                       <?php
                   } else {
                       ?>
                       <script>
                           alert("<?php echo "Register Successfully, OTP Sent to $email " ?>");
                           window.location.href = 'http://localhost:3000/verification.php';
                       </script>
                       <?php
                   }

               }

            }
        }

    }
         // Sending Mail To The User Fun End
}

// Register Fun End

?>

    <!--sub navigation container start-->
    <div class="sub_navigation_container">
<center>
    <div class="sub_navigation_inner_container">
        <span><a href="./index.php">Home</a></span>
        <span><i class="fas fa-arrow-right" style="color: #666666;font-size: 12px;"></i></span>
        <span><a href="./register.php">Create Account</a></span>
    </div>
</center>
    </div>
    <!--sub navigation container end-->

    <!--register container start-->
    <div class="login_register_container">
    
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                <div>
                    <label for="first">First Name</label> <br>
                <input type="text" id="first" name="f_name" required autofocus>
                </div>
                <div>
                    <label for="last">Last Name</label> <br>
                    <input type="text" id="last" name="l_name" required>
                </div>
                <div>
                    <label for="mail">Email</label> <br>
                    <input type="email" id="mail" name="email" required>
                    <p class="text_of_error_message"><?php echo $error_messages; ?></p>
                </div>
                <div>
                    <label for="pass">Password</label> <br>
                    <input type="password" id="pass" name="password" required>
                </div>
            
            <button type="submit" name="submit">CREATE ACCOUNT</button>
        </form>
       
    </div>
    <!--register container end-->



    <?php 
    include "./footer.php";
    ?>

   <script src="./javascript/index.js"></script>
</body>
</html>