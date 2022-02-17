<?php 
session_start();

            

$_SESSION['prod_qty'] = 1;

include './action.php';
if(!isset($_SESSION['user_login_id'])) {
header("Location: http://localhost:3000/login.php");
}
if(isset($_POST['logout_request'])) {
    unset($_SESSION['user_login_id']);
    header("Location: http://localhost:3000/login.php");
}

$user_id = $_SESSION['user_id'];
$cart_details_query = "SELECT * FROM `cart` WHERE `u_id` = $user_id;";
$cart_details__result = mysqli_query($con, $cart_details_query);
$cart_count_checking = mysqli_num_rows($cart_details__result);
if($cart_count_checking == 0) {
 ?>
 <script type="text/javascript">
 window.location.href = 'http://localhost:3000/index.php';
 </script>
 <?php
}

$customer_add_details_address = "There is";
$customer_add_details_city = "No Default";
$customer_add_details_state = "Address.";
$customer_add_details_my_name = "Anonymous User";
$address_type = "default";

if(isset($_SESSION['user_login_email'])) {
    $user_id = $_SESSION['user_id'];
    $customer_add_details_query = "SELECT * FROM `account` WHERE `user_id` = $user_id AND `status` = 'default';";
    $customer_add_details_result = mysqli_query($con, $customer_add_details_query);
    While($row2 = mysqli_fetch_assoc($customer_add_details_result)) {
        $customer_add_details_my_name = $row2['my_name'];
        $customer_add_details_address = $row2['address'];
        $customer_add_details_city = $row2['city'];
        $customer_add_details_state = $row2['state'];
    }
}
$color_for_one = "#4285F4";
$color_for_two = "rgb(167, 167, 167)";
$color_for_three = "rgb(167, 167, 167)";
$status_code = "default";

if(isset($_POST['subscription_box'])){
    $user_email_id = $_SESSION['user_login_email'];
    $check_query = "SELECT * FROM `email_subscription` WHERE `user_email` = '$user_email_id';";
$check_result = mysqli_query($con, $check_query);
$check_no_of_rows = mysqli_num_rows($check_result);
if($check_no_of_rows >= 1) {
  echo "";
} else {
$subscription_query = "INSERT INTO `email_subscription` (`user_email`) VALUES ('$user_email_id');";
mysqli_query($con, $subscription_query);
}
}

if(isset($_POST['old_add'])) {
    $color_for_one = "#4285F4";
    $status_code = "default";
}

if(isset($_POST['new_add'])) {
    $color_for_two = "#4285F4";
    $color_for_one = "rgb(167, 167, 167)";
    $color_for_three = "rgb(167, 167, 167)";
    $address_type = "new";

    $address_details_country = "";
    $address_details_f_name = "";
    $address_details_l_name = "";
    $address_details_add = "";
    $address_details_phone = "";
    $address_details_city = "";
    $address_details_state = "";
    $address_details_zip = "";
}

if(isset($_POST['secon_add'])) {
    $color_for_three = "#4285F4";
    $color_for_one = "rgb(167, 167, 167)";
    $color_for_two = "rgb(167, 167, 167)";
    $status_code = "secondary";
    $address_type = "secondary";
    
}

$users_id_value = $_SESSION['user_id'];
$address_details_fetch_query = "SELECT * FROM `account` WHERE `user_id` = $users_id_value AND `status` = '$status_code';";
$address_details_fetch_result = mysqli_query($con, $address_details_fetch_query);
if(mysqli_num_rows($address_details_fetch_result) === 0) {
    $address_details_country = "";
    $address_details_f_name = "";
    $address_details_l_name = "";
    $address_details_add = "";
    $address_details_phone = "";
    $address_details_city = "";
    $address_details_state = "";
    $address_details_zip = "";
}

while($row3  = mysqli_fetch_assoc($address_details_fetch_result)) {
    $address_details_country = $row3['country'];
    $address_details_f_name = $row3['f_name'];
    $address_details_l_name = $row3['l_name'];
    $address_details_add = $row3['address'];
    $address_details_phone = $row3['phone'];
    $address_details_city = $row3['city'];
    $address_details_state = $row3['state'];
    $address_details_zip = $row3['zip'];
}

if(isset($_POST['continue_to_ship'])) {
    $fir_name = $_POST['f_name'];
    $las_name = $_POST['l_name'];
    $my_full_name = $fir_name." ".$las_name;
    $address = $_POST['address'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $phone = $_POST['mob_number'];
    $status = "secondary";
   $user_identity =  $_SESSION['user_id'];
   $address_upload_type = $_POST['add_type'];

   $nameval = "/^[a-zA-Z ]+$/";
   $numberval = "/^[0-9]+$/";
   $fir_name = stripcslashes($fir_name);
   $las_name = stripcslashes($las_name);
   $city = stripcslashes($city);
   $country = stripcslashes($country);
   $phone = stripcslashes($phone);
   $state = stripcslashes($state);
   $fir_name = mysqli_real_escape_string($con, $fir_name);
   $las_name = mysqli_real_escape_string($con, $las_name);
   $city = mysqli_real_escape_string($con, $city);
   $country = mysqli_real_escape_string($con, $country);
   $state = mysqli_real_escape_string($con, $state);

   if(preg_match($nameval, $city) and preg_match($nameval, $country) and preg_match($nameval, $state) and preg_match($numberval, $zip) and preg_match($numberval, $phone)) {

   if($address_upload_type == "default") {
   

    $users_id_value = $_SESSION['user_id'];
    $address_details_fetch_query = "SELECT * FROM `account` WHERE `user_id` = $users_id_value AND `status` = 'default';";
    if(mysqli_num_rows($address_details_fetch_result) === 0) {
        $account_uploading_query = "INSERT INTO `account` (`user_id`, `f_name`, `l_name`, `my_name`, `address`, `city`, `state`, `zip`, `phone`, `country`, `status`) VALUES ($users_id_value, '$fir_name', '$las_name', '$my_full_name', '$address', '$city', '$state', '$zip', '$phone', '$country', 'default');";
    } else {
        $account_uploading_query = "UPDATE `account` SET `f_name` = '$fir_name', `l_name` = '$las_name', `my_name` = '$my_full_name', `address` = '$address', `city` = '$city', `state` = '$state', `zip` = '$zip', `phone`= '$phone', `country` = '$country', `status` = 'default' WHERE `user_id` = $users_id_value AND `status` = 'default';";
    }
    ?>
    <script>
        var next_page_link = "http://localhost:3000/shipping.php?p=1";
    </script>
    <?php 
   }
   if($address_upload_type == "secondary") {
    $users_id_value = $_SESSION['user_id'];
    $address_details_fetch_query = "SELECT * FROM `account` WHERE `user_id` = $users_id_value AND `status` = 'secondary';";
    if(mysqli_num_rows($address_details_fetch_result) === 0) {
        $account_uploading_query = "INSERT INTO `account` (`user_id`, `f_name`, `l_name`, `my_name`, `address`, `city`, `state`, `zip`, `phone`, `country`, `status`) VALUES ($users_id_value, '$fir_name', '$las_name', '$my_full_name', '$address', '$city', '$state', '$zip', '$phone', '$country', 'secondary');";
    } else {
        $account_uploading_query = "UPDATE `account` SET `f_name` = '$fir_name', `l_name` = '$las_name', `my_name` = '$my_full_name', `address` = '$address', `city` = '$city', `state` = '$state', `zip` = '$zip', `phone`= '$phone', `country` = '$country', `status` = 'secondary' WHERE `user_id` = $users_id_value AND `status` = 'secondary';";
    }
    ?>
    <script>
        var next_page_link = "http://localhost:3000/shipping.php?p=2";
    </script>
    <?php 
   }

   if($address_upload_type == "new") {
    $account_uploading_query = "INSERT INTO `account` (`user_id`, `f_name`, `l_name`, `my_name`, `address`, `city`, `state`, `zip`, `phone`, `country`, `status`) VALUES ($users_id_value, '$fir_name', '$las_name', '$my_full_name', '$address', '$city', '$state', '$zip', '$phone', '$country', 'secondary');";
    ?>
    <script>
        var next_page_link = "http://localhost:3000/shipping.php?p=2";
    </script>
    <?php 
   }

    mysqli_query($con, $account_uploading_query);
    ?>
    <script>
        window.location.href = next_page_link;
    </script>
    <?php 
   }

}




if(isset($_POST['new_add'])) {
    $color_for_two = "#4285F4";
    $color_for_one = "rgb(167, 167, 167)";
   
    $address_details_country = "";
    $address_details_f_name = "";
    $address_details_l_name = "";
    $address_details_add = "";
    $address_details_phone = "";
    $address_details_city = "";
    $address_details_state = "";
    $address_details_zip = "";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Information - Shopssy</title>
    <link rel="icon" href="./images/favicon1.png">
    <script src="https://kit.fontawesome.com/628c629a17.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ceviche+One&family=Josefin+Sans:wght@700&family=Lobster&family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>

    <!--information container start-->
   <center>
    <div class="information_container">

        <div class="information_inner_container1">

            <h2 class="heading_of_info_div"><a href="#">Shopssy</a></h2>

           
           <?php
           include './cart_detail_of_mobile.php';
           ?>

            <div class="sub_navigation_of_info_div_inner_container">
                <span><a href="./cart.php">Cart</a></span>
                <span><i class="fa fa-angle-right" style="color: #666666;font-size: 14px;"></i></span>
                <span><a class="active">Information</a></span>
                <span><i class="fa fa-angle-right" style="color: #666666;font-size: 14px;"></i></span>
                <span><a href="./shipping.php">Shipping</a></span>
                <span><i class="fa fa-angle-right" style="color: #666666;font-size: 14px;"></i></span>
                <span><a href="./payment.php">Payment</a></span>
            </div>

            <h3>Contact information</h3>

            

            <div class="login_email_container">
                <div>
                    <div class="user_icon_div">
                        <span><i class="fa fa-user" aria-hidden="true"></i></span>
                    </div>
                </div>
                <div class="login_email_text_container">
                    <p><?php echo $customer_add_details_my_name; ?>	(<?php 
                    if(isset($_SESSION['user_login_email'])) {
                        echo $_SESSION['user_login_email'];
                    }
                     ?>)</p>
                   <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                   <p><button type="submit" name="logout_request">Log Out</button></p>
                   </form>
                </div>
            </div>

          
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" id="subscription_form" method="POST">

                <div class="checkbox_container">
                    <input type="checkbox" id="email_for_news" name="subscription_box" value="subs" onchange="document.getElementById('subscription_form').submit()"> <label for="email_for_news" id="email_of_news_and_offer">Email me with news and offers</label>
                </div>

                <h3>Shipping address</h3>

                <div class="information_inner_container_main_div">

                
                   <button type="submit" name="old_add" class="new_and_old_buttons" value="1"><i class="fas fa-circle" style="color: <?php echo $color_for_one; ?>;"></i> Default Address</button>

                   <button type="submit" name="secon_add" class="new_and_old_buttons" value="1"><i class="fas fa-circle" style="color: <?php echo $color_for_three; ?>;"></i> Secondary Address</button>

                   <button type="submit" name="new_add" value="2" class="new_and_old_buttons" ><i class="fas fa-circle" style="color: <?php echo $color_for_two; ?>;"></i> New Address</button>
                </form>
                    <br>
                    <form action="" method="POST">
                        <input type="hidden" name="add_type" value="<?php echo $address_type; ?>">
                    <input type="text" placeholder="Country" name="country" value="<?php echo $address_details_country; ?>" required> <br>
                    <input type="text" placeholder="First name(Optional)" name="f_name" class="fname" value="<?php echo $address_details_f_name; ?>" required> 
                    <input type="text" placeholder="Last name" class="lname" name="l_name" value="<?php echo $address_details_l_name; ?>" required> <br>
                    <input type="text" placeholder="Address" name="address" value="<?php echo $address_details_add; ?>" required> 
                    <input type="text" placeholder="Mobile Number" name="mob_number" value="<?php echo $address_details_phone; ?>" required> 
                    <input type="text" placeholder="City" class="city" name="city" value="<?php echo $address_details_city; ?>" required> 
                    <input type="text" placeholder="State" class="state" name="state" value="<?php echo $address_details_state; ?>" required>
                    <input type="text" placeholder="PIN code" name="zip" class="pin" value="<?php echo $address_details_zip; ?>" required> <br>
                    <button type="submit" name="continue_to_ship" class="continue_btn">Continue to shipping</button>
                    <span class="return_link"><a href="./cart.php"><i class="fa fa-angle-left"></i> Return to cart</a></span>
                    </form>
                </div>
           

        </div>

        <div class="information_inner_container2">
            <div class="information_inner_container2_1st">

            <?php 
         
            $user_id = $_SESSION['user_id'];
            $cart_details_query = "SELECT * FROM `cart` WHERE `u_id` = $user_id;";
            $cart_details__result = mysqli_query($con, $cart_details_query);
            $cart_count_checking = mysqli_num_rows($cart_details__result);
            $product_sub_total = 0;
            while($row = mysqli_fetch_assoc($cart_details__result)) {
                $cart_details_product_id = $row['product_id'];
                $cart_details_quantity = $row['quantity'];
                $cart_details_pro_type = $row['pro_type'];
                $cart_details_product_query = "SELECT * FROM `products` WHERE `p_id` = $cart_details_product_id;";
                $cart_details_product_result = mysqli_query($con, $cart_details_product_query);
                while($row2 = mysqli_fetch_assoc($cart_details_product_result)) {
                    $cart_details_product_p_title = $row2['p_title'];
                    $cart_details_product_p_image = $row2['p_image'];
                    $cart_details_product_p_a_price = $row2['p_a_price'];
                    $cart_details_product_p_o_price = $row2['p_o_price'];
               

            ?>

                <div class="information_inner_container2_divs">
                    <div class="information_inner_container2_divs_image">
                        <img src="./images/<?php echo $cart_details_product_p_image; ?>" alt="<?php echo $cart_details_product_p_title; ?>">
                    </div>
                    <div class="information_inner_container2_divs_title">
                     <h5><?php echo $cart_details_product_p_title; ?></h5>
                    </div>
                    <div class="information_inner_container2_divs_qty">
                    X <?php echo $cart_details_quantity; ?>
                    </div>
                    <div class="information_inner_container2_divs_price">
                        &#8377; <?php
                        if($cart_details_pro_type == 'normal') {
                            $product_total_price = $cart_details_quantity * $cart_details_product_p_o_price; 
                        } elseif($cart_details_pro_type == 'hot') {
                            $temp_price = floor($cart_details_product_p_o_price/2);
                            $product_total_price = $cart_details_quantity * $temp_price;
                        } else {
                            $product_total_price = $cart_details_quantity * $cart_details_product_p_a_price; 
                        }
                       
                        echo $product_total_price;
                        $product_sub_total = $product_sub_total + $product_total_price;
                        ?>.00
                    </div>
            </div>

            <?php } } ?>
               
            </div>

            <div class="information_inner_container2_1st">
                <div class="information_inner_container2_divs1">
                    <div class="information_inner_container2_divs_txt">
                        <p>subtotal</p>
                    </div>
                    <div class="information_inner_container2_divs_title">
                     
                    </div>
                    <div class="information_inner_container2_divs_qty">
                   
                    </div>
                    <div class="information_inner_container2_divs_pricez">
                        &#8377; <?php echo $product_sub_total; ?>.00
                    </div>
                </div>
    
                <div class="information_inner_container2_divs1">
                    <div class="information_inner_container2_divs_txt">
                        <p>shipping</p>
                    </div>
                    <div class="information_inner_container2_divs_title">
                     
                    </div>
                    <div class="information_inner_container2_divs_qty">
                   
                    </div>
                    <div class="information_inner_container2_divs_pricez">
                        &#8377; 50.00
                    </div>
                </div>
                
            </div>

            <div class="information_inner_container2_1st">
                <div class="information_inner_container2_divs1">
                    <div class="information_inner_container2_divs_txt1">
                        <p>Total</p>
                    </div>
                    <div class="information_inner_container2_divs_title">
                     
                    </div>
                    <div class="information_inner_container2_divs_qty">
                   
                    </div>
                    <div class="information_inner_container2_divs_pricez1">
                        &#8377; <?php echo $product_sub_total + 50; ?>.00
                    </div>
                </div>
    
                
            </div>


        </div>



    </div>
   </center>
    <!--information container end-->
           
    <script src="./javascript/info.js"></script>
</body>
</html>