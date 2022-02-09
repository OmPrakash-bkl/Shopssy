<?php 
error_reporting(0);
ini_set('display_errors', 0);
include './db_con.php';
 session_start();
// $_SESSION['user_login_id'] = "ram@gmail.comShopssy";
// $_SESSION['user_login_email'] = "ram@gmail.com";
//  $_SESSION['user_id'] = 4;

// Email Validation Start
if(isset($_POST['user_email'])) {
  $email = test_input_data($_POST['user_email']);
  $check_query = "SELECT * FROM `email_subscription` WHERE `user_email` = '$email';";
  $check_result = mysqli_query($con, $check_query);
  $check_no_of_rows = mysqli_num_rows($check_result);
  if($check_no_of_rows >= 1) {
    ?>
    <script type="text/javascript">
    window.location.href = 'http://localhost:3000/index.php';
    </script>
    <?php
  } else {
    if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $sql = "INSERT INTO `email_subscription` (`user_email`) VALUES('$email');";
     mysqli_query($con, $sql);
  }
  ?>
<script type="text/javascript">
window.location.href = 'http://localhost:3000/index.php';
</script>
<?php
  }
 
}
function test_input_data($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
// Email Validation End

//Cart Add and Update start

if(isset($_POST['continue_shopping'])) {
  header("Location: http://localhost:3000/index.php");
}

if(isset($_POST['cart_update'])) {
  $cart_update_u_id = $_POST['u_id'];
  $cart_update_pro_tot_price = $_POST['pro_tot_price'];
  $cart_update_cart_user_desc = $_POST['cart_user_desc'];
  if(isset($_SESSION['user_login_id'])) {
      $cart_update_query = "UPDATE `cart` SET `pro_tot_price` = $cart_update_pro_tot_price, `cart_user_desc` = '$cart_update_cart_user_desc' WHERE `u_id` = $cart_update_u_id;";
  } else {
      $cart_update_produc_id = $_POST['produc_id'];
  $cart_update_query = "UPDATE `unnamed_user_cart` SET `cart_desc` = '$cart_update_cart_user_desc' WHERE `prod_id_of_cart` = $cart_update_produc_id;";
  }
  mysqli_query($con, $cart_update_query);
?>
<script type="text/javascript">
window.location.href = 'http://localhost:3000/cart.php';
</script>
<?php
}


if(isset($_POST['cart_update_and_checkout'])) {
  $cart_update_u_id = $_POST['u_id'];
  $cart_update_pro_tot_price = $_POST['pro_tot_price'];
  $cart_update_cart_user_desc = $_POST['cart_user_desc'];
  if(isset($_SESSION['user_login_id'])) {
      $cart_update_query = "UPDATE `cart` SET `pro_tot_price` = $cart_update_pro_tot_price, `cart_user_desc` = '$cart_update_cart_user_desc' WHERE `u_id` = $cart_update_u_id;";
  } else {
      $cart_update_produc_id = $_POST['produc_id'];
      $cart_update_query = "UPDATE `unnamed_user_cart` SET `cart_desc` = '$cart_update_cart_user_desc' WHERE `prod_id_of_cart` = $cart_update_produc_id;";
  }

mysqli_query($con, $cart_update_query);
?>
<script type="text/javascript">
window.location.href = 'http://localhost:3000/information.php';
</script>
<?php

}

//Cart Add and Update End

?>