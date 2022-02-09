<?php 
include './action.php';
$title = "Reset Password - Shopssy";
include './header.php';

if(isset($_POST['reset'])) {

        $psw = $_POST["password"];

        $Email = $_SESSION['emailid'];

        $hash = password_hash($psw , PASSWORD_BCRYPT);

        $reset_query = "SELECT * FROM `register` WHERE `email` = '$Email';";
        $reset_result = mysqli_query($con, $reset_query);
        $row_count = mysqli_num_rows($reset_result);
  	    $fetch = mysqli_fetch_assoc($reset_result);

        if($Email){
            $new_pass = $hash;
            $update_new_pass_query = "UPDATE `register` SET `password` = '$new_pass' WHERE `email` = '$Email';";
            mysqli_query($con, $update_new_pass_query);

            ?>
            <script>
                window.location.replace("login.php");
                alert("<?php echo "Your Password Has Been Reseted Successfully."?>");
            </script>
            <?php
        } else{
            ?>
            <script>
                alert("<?php echo "Please Try Again!"?>");
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
        <span><a href="./reset.php">Reset Password</a></span>
    </div>
</center>
    </div>
    <!--sub navigation container end-->

    <!--reset password container start-->
    <div class="login_register_container acc_verification_container">
    
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                <div>
                    <label for="newpass">New Password</label> <br>
                <input type="password" id="newpass" name="password" required autofocus>
                </div>
            <button type="submit" name="reset">Reset</button>
        </form>
       
    </div>
    <!--reset password container end-->

    <?php 
    include "./footer.php";
    ?>
              
    <script src="./javascript/index.js"></script>
</body>
</html>