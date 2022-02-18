<?php 
include './action.php';
$title = "Verification - Shopssy";
include './header.php';

$error_messages = "";
if(isset($_POST['verify'])) {
    $otp = $_SESSION['OTP'];
    $email = $_SESSION['EMAIL'];
    $otp_code = $_POST['otp_code'];

    if($otp != $otp_code) { 
    $error_messages = "Invalid OTP code";
    } else {
        $update_register_query = "UPDATE `register` SET `status` = 1 WHERE `email` = '$email';";
        mysqli_query($con, $update_register_query);
        ?>
             <script>
                 alert("Verfication of Account Done, You may Signin now");
                   window.location.replace("login.php");
             </script>
             <?php
    }

}


?>


    <!--sub navigation container start-->
    <div class="sub_navigation_container">
<center>
    <div class="sub_navigation_inner_container">
        <span><a href="./index.php">Home</a></span>
        <span><i class="fas fa-arrow-right" style="color: #666666;font-size: 12px;"></i></span>
        <span><a href="./verification.php">Verification Account</a></span>
    </div>
</center>
    </div>
    <!--sub navigation container end-->

    <!--verification container start-->
    <div class="login_register_container acc_verification_container">
    
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                <div>
                    <label for="veri">OTP Code</label> <br>
                <input type="text" id="veri" name="otp_code" required autofocus>
                <p class="text_of_error_message"><?php echo $error_messages; ?></p>
                </div>
            <button type="submit" name="verify">Verify</button>
        </form>
       
    </div>
    <!--verification container end-->

    <?php 
    include "./footer.php";
    ?>
              
    <script src="./javascript/index.js"></script>
</body>
</html>