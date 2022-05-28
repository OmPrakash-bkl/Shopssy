<?php
session_start();

include './connection.php';

if(!isset($_SESSION['user_login_id'])) {
    ?>
   <script type="text/javascript">
   window.location.href = 'http://localhost:3000/login.php';
   </script>
   <?php
}

$user_id = $_SESSION['user_id'];
$cart_details_query = "SELECT * FROM `cart` WHERE `u_id` = $user_id;";
$cart_details__result = mysqli_query($conn, $cart_details_query);
$cart_count_checking = mysqli_num_rows($cart_details__result);
if($cart_count_checking == 0) {
 ?>
 <script type="text/javascript">
 window.location.href = 'http://localhost:3000/index.php';
 </script>
 <?php
}

if($_SESSION['pqaeyvmmecndtisluacwcqevsbs'] == "failer") {
    if(isset($_SESSION['pqaeyvmmecndtisluacwcqevsbs'])) {
        if(isset($_SESSION['ueswernOtrhdnesrCmoluxndt'])) {
            if(isset($_SESSION['ddeetcafillxs_yaorye_zfbialvlserd'])) {
                if(isset($_SESSION['psarynmielnat_fqtienayl_sxeacgigown'])) {
                    $_SESSION['pqaeyvmmecndtisluacwcqevsbs'] = "success";
                    ?>
                     <script type="text/javascript">
                     window.location.href = 'http://localhost:3000/success.php';
                     </script>
                     <?php
                }
            }
        }
    }
}

?>