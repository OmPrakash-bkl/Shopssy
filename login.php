<?php 
session_start();
include './action.php';
$title = "Login - Shopssy";
include './header.php';

if(isset($_POST['submit1'])) {
    $userName = stripcslashes($_POST['user_email']);
    $userName = mysqli_real_escape_string($con, $userName);
    $userPassword = stripcslashes($_POST['user_pass']);
    $emailval = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
    if(preg_match($emailval, $userName)) {
        $login_query = "SELECT `email`, `password` FROM `register` WHERE `email`='$userName';";
        $login_result = mysqli_query($con, $login_query);
        if(mysqli_num_rows($login_result) === 1) {
            while($row = mysqli_fetch_assoc($login_result)) {
                $db_u_pass_word = $row['password'];
            }
            if($userPassword === $db_u_pass_word) {
                $_SESSION['user_login_id'] = $userName."Shopssy";
                $_SESSION['user_login_email'] = $userName;
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
                <div>
                    <label for="mail">Email</label> <br>
                <input type="email" id="mail" name="user_email" required>
                </div>
                <div>
                    <label for="pass">Password</label> <br>
                    <input type="password" id="pass" name="user_pass" required>
                </div>
            <center>
                <span><a href="#">Forgot your password?</a></span>
                <span><a href="#">Register?</a></span>
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