<?php

error_reporting(0);
ini_set('display_errors', 0);

session_start();
include "../db_con.php";

$error_messages = "";
if(isset($_POST['admin_login_form_submission'])) {
    $userName = stripcslashes($_POST['admin_username']);
    $userName = mysqli_real_escape_string($con, $userName);
    $userPassword = stripcslashes($_POST['admin_password']);
    $emailval = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
    if(preg_match($emailval, $userName)) {
        $login_query = "SELECT * FROM `admin` WHERE `email`='$userName';";
        $login_result = mysqli_query($con, $login_query);
        if(mysqli_num_rows($login_result) === 1) {
            while($row = mysqli_fetch_assoc($login_result)) {
                $db_u_user_id = $row['email'];
                $db_u_user_pass = $row['password'];
                $db_u_user_unique_id = $row['a_id'];
                $db_u_user_type = $row['admin_type'];
            }
            if(isset($db_u_user_id)) {
               if($db_u_user_id == $userName && $db_u_user_pass == $userPassword) {
                $_SESSION['user_login_id'] = $db_u_user_id."Shopssy";
                $_SESSION['admin_login_id'] = $db_u_user_unique_id;
                $_SESSION['db_u_user_type'] = $db_u_user_type;
                ?>
               <script type="text/javascript">
               window.location.href = "http://localhost/my_clg_shopssy_project/admin/index.php";
               </script>
               <?php
               } else {
                $error_messages = "Email or Password Invalid, Please Try Again.";
            }
            } else {
                $error_messages = "Email or Password Invalid, Please Try Again.";
            }
        } else {
            $error_messages = "Email or Password Invalid, Please Try Again.";
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Shopssy</title>
    <link rel="icon" href="../images/favicon1.png">
    <script src="https://kit.fontawesome.com/628c629a17.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Ceviche+One&family=Josefin+Sans:wght@700&family=Lobster&family=Pacifico&display=swap" rel="stylesheet">
<link rel="stylesheet" href="./css/admin_login.css">
</head>
<body>
    <!-- Parent Container Start -->

    <div class="parent_container">
    
    <!-- Login Box Start -->

    <div class="login_box_container">

    <center>
    <h1 class="company_name">Shopssy</h1>
    <p class="text_of_error_message"><?php echo $error_messages; ?></p>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <input type="email" name="admin_username" class="input_form_boxes" placeholder="username" required autofocus> <br>
        <input type="password" name="admin_password" class="input_form_boxes" placeholder="password" required> <br>
        <button type="submit" id="admin_login_form_submission" name="admin_login_form_submission">LOGIN</button>
    </form>
    <span class="forgot_password_link"><a href="http://localhost:3000/recover.php?r3C0obvEtrgfioarnAtdlmpixn=1">Forgot your password?</a></span>
    </center>

    </div>

    <!-- Login Box End -->
    
    </div>

    <!-- Parent Container End -->
</body>
</html>