<?php 
include './action.php';
$title = "Reset Password - Shopssy";
include './header.php';

// Password Updation Fun Start

$error_messages = "";
if(isset($_POST['reset']) || isset($_POST['resetOfAdmin'])) {


    if(isset($_POST['reset'])) {

        $psw = $_POST["password"];
        $Email = $_SESSION['emailid'];

        $hash = password_hash($psw , PASSWORD_BCRYPT);

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
        } else {
            ?>
            <script>
               $error_messages = "Please Try Again!";
            </script>
            <?php
        }
    }
    if(isset($_POST['resetOfAdmin'])) {

        $psw = $_POST["password"];
        $Email = $_SESSION['emailid'];

        if($Email){
            $update_new_pass_query = "UPDATE `admin` SET `password` = '$psw' WHERE `email` = '$Email';";
            mysqli_query($con, $update_new_pass_query);

            ?>
            <script>
                window.location.replace("http://localhost/my_clg_shopssy_project/admin/admin.php");
                alert("<?php echo "Your Password Has Been Reseted Successfully."?>");
            </script>
            <?php
        } else {
            ?>
            <script>
               $error_messages = "Please Try Again!";
            </script>
            <?php
        }

    }

}

// Password Updation Fun End

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
                <p class="text_of_error_message"><?php echo $error_messages; ?></p>
                </div>
                <?php
                if(isset($_GET['rredswegtbfmogRmAjdvmxiln'])) {
                    ?>
                    <button type="submit" name="resetOfAdmin">Reset</button>
                    <?php
                } else {
                    ?>
                    <button type="submit" name="reset">Reset</button>
                    <?php
                }
                ?>
            
        </form>
       
    </div>
    <!--reset password container end-->

    <?php 
    include "./footer.php";
    ?>
              
    <script src="./javascript/index.js"></script>
</body>
</html>