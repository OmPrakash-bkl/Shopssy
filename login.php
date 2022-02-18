<?php 
include './action.php';
$title = "Login - Shopssy";
include './header.php';
$error_messages = "";
if(isset($_POST['submit1'])) {
    $userName = stripcslashes($_POST['user_email']);
    $userName = mysqli_real_escape_string($con, $userName);
    $userPassword = stripcslashes($_POST['user_pass']);
    $emailval = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
    if(preg_match($emailval, $userName)) {
        $login_query = "SELECT `email`, `password`, `user_id`, `status` FROM `register` WHERE `email`='$userName';";
        $login_result = mysqli_query($con, $login_query);
        if(mysqli_num_rows($login_result) === 1) {
            while($row = mysqli_fetch_assoc($login_result)) {
                $db_u_hash_pass_word = $row['password'];
                $db_u_user_id = $row['user_id'];
                $db_u_status = $row['status'];
            }
            if($db_u_status == 0) {
                $error_messages = "Please Verify Email Address Before Login.";
            } else if(password_verify($userPassword, $db_u_hash_pass_word)) {
                $_SESSION['user_login_id'] = $userName."Shopssy";
                $_SESSION['user_login_email'] = $userName;
                $_SESSION['user_id'] = $db_u_user_id;
                ?>
               <script type="text/javascript">
               window.location.href = "http://localhost:3000/index.php";
               </script>
               <?php
            } else {
                $error_messages = "Email or Password Invalid, Please Try Again.";
            }
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
        <span><a href="./login.php">Login</a></span>
    </div>
</center>
    </div>
    <!--sub navigation container end-->

    <!--login container start-->
    <div class="login_register_container">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
            <p class="text_of_error_message"><?php echo $error_messages; ?></p>
                <div>
                    <label for="mail">Email</label> <br>
                <input type="email" id="mail" name="user_email" required>
                </div>
               
                <div>
                    <label for="pass">Password</label> <br>
                    <input type="password" id="pass" name="user_pass" required>
                </div>
                
            <center>
                <span><a href="./recover.php">Forgot your password?</a></span>
                <span><a href="./register.php">Register?</a></span>
            </center>
            <button type="submit" name="submit1">SIGN IN</button>
        </form>
       
    </div>
    <!--login container end-->

    <?php 
    include "./footer.php";
    ?>
              
    <script src="./javascript/index.js"></script>
</body>
</html>