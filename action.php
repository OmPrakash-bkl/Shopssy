<?php 
include './db_con.php';
// session_start();
// $_SESSION['user_login_id'] = "ram@gmail.comShopssy";
// $_SESSION['user_login_email'] = "ram@gmail.com";
//  $_SESSION['user_id'] = 4;

// Email Validation Start
if(isset($_POST['user_email'])) {
  $email = test_input_data($_POST['user_email']);
  if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $sql = "INSERT INTO `email_subscription` (`user_email`) VALUES('$email');";
     mysqli_query($con, $sql);
     
  }
}
function test_input_data($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
// Email Validation End

?>