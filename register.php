<?php 
include './action.php';
$title = "Create Account - Shopssy";
include './header.php';

if(isset($_POST['submit'])) {
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $nameval = "/^[a-zA-Z ]+$/";
    $emailval = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
    $numberval = "/^[0-9]+$/";
    $f_name = stripcslashes($f_name);
    $l_name = stripcslashes($l_name);
    $pass = stripcslashes($email);
    $f_name = mysqli_real_escape_string($con, $f_name);
    $l_name = mysqli_real_escape_string($con, $l_name);
    $pass = mysqli_real_escape_string($con, $pass);

    if(preg_match($nameval, $f_name) and preg_match($nameval, $l_name) and preg_match($emailval, $email)) {
       $register_query = "INSERT INTO `register` (`f_name`, `l_name`, `email`, `password`, `full_name`, `address`, `city`, `zip`, `phone_number`, `country`) VALUES ('$f_name', '$l_name', '$email', '$pass', '', '', '', '', '', '');";
       mysqli_query($con, $register_query);

    }
}

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
                <input type="text" id="first" name="f_name" required>
                </div>
                <div>
                    <label for="last">Last Name</label> <br>
                    <input type="text" id="last" name="l_name" required>
                </div>
                <div>
                    <label for="mail">Email</label> <br>
                    <input type="email" id="mail" name="email" required>
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