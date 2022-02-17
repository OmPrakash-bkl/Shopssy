<?php 
session_start();
include './db_con.php';



if(isset($_SESSION['user_id'])) {
    $p_known_user_id = $_SESSION['user_id'];
    $date_update_query = "SELECT `pro_id`, `n_id` FROM `notification` WHERE `noti_for_who` = $p_known_user_id;";
    $date_update_result = mysqli_query($con, $date_update_query);

    while($row = mysqli_fetch_assoc($date_update_result)) {
        $fetch_prod_id = $row['pro_id'];
        $fetch_n_id = $row['n_id'];
    }
    
    $check_product_avail_status_query = "SELECT `p_avail` FROM `products_sub` WHERE `p_id` = $fetch_prod_id;";
    $check_product_avail_status_result = mysqli_query($con, $check_product_avail_status_query);
    $check_product_avail_status = "";
    while($row = mysqli_fetch_assoc($check_product_avail_status_result)) {
        $check_product_avail_status = $row['p_avail'];
    }
   
    if($check_product_avail_status == "In Stock") {
        $date = new DateTime('', new DateTimezone("Asia/Kolkata"));
        $day = $date->format('d/m/y');
        $time = $date->format('H:i A');
        $date_and_time = $day." ".$time;
        $update_date_query = "UPDATE `notification` SET `n_time` = '$date_and_time' WHERE `n_id` = $fetch_n_id;";
        mysqli_query($con, $update_date_query);
    }
}


if(isset($_GET['close_hamburger'])) {
    ?>
    <script>
        document.getElementsByClassName("nav_hamburger_content_division")[0].style.left="-200px";
        document.getElementsByClassName("nav_hamburger_division")[0].style.display="none";
        document.getElementsByClassName("mob_hamburger_btn")[0].style.transition = "transform 0.5s";
        document.getElementsByClassName("mob_hamburger_btn")[0].style.transform = "rotate(0deg)";
    </script>
    <?php
}

if(isset($_GET['delete_btn_of_mini_cart'])) {
    if(isset($_SESSION['user_login_id'])) {
        $mini_cart_sub_product_id = $_GET['product_id'];
        $mini_cart_sub_delete_query = "DELETE FROM `cart` WHERE `product_id` = $mini_cart_sub_product_id;";
        mysqli_query($con, $mini_cart_sub_delete_query);
        ?>
    <script type="text/javascript">
    window.location.href = 'http://localhost:3000/index.php';
    </script>
    <?php
    } else {
        $mini_cart_sub_product_id = $_GET['product_id'];
        $mini_cart_sub_delete_query = "DELETE FROM `unnamed_user_cart` WHERE `prod_id_of_cart` = $mini_cart_sub_product_id;";
        mysqli_query($con, $mini_cart_sub_delete_query);
        ?>
    <script type="text/javascript">
    window.location.href = 'http://localhost:3000/index.php';
    </script>
    <?php
    }
  
}


if(isset($_POST['view_cart'])) {
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
    $cart_update_produc_id = $_POST['produc_id'];
    if(isset($_SESSION['user_login_id'])) {
        $cart_update_query = "UPDATE `cart` SET `pro_tot_price` = $cart_update_pro_tot_price, `cart_user_desc` = '$cart_update_cart_user_desc' WHERE `u_id` = $cart_update_u_id;";
    } else 
    {
        $cart_update_query = "UPDATE `unnamed_user_cart` SET `cart_desc` = '$cart_update_cart_user_desc' WHERE `prod_id_of_cart` = $cart_update_produc_id;";
    }

mysqli_query($con, $cart_update_query);
?>
<script type="text/javascript">
window.location.href = 'http://localhost:3000/information.php';
</script>
<?php
}

if(isset($_POST['wish_del_id'])) {
    $wish_delete_id = $_POST['wish_del_id'];
    if(isset($_SESSION['user_login_id'])) { 
        $wish_item_delete_query = "DELETE FROM `mywishlist` WHERE `prod_id` = $wish_delete_id;";
    } else {
        $wish_item_delete_query = "DELETE FROM `unnamed_user_wishlist` WHERE `prod_id_of_wishlist` = $wish_delete_id;";
    }
    mysqli_query($con, $wish_item_delete_query);
    ?>
<script type="text/javascript">
window.location.href = 'http://localhost:3000/index.php';
</script>
<?php
}

if(isset($_POST['delete_all_from_wishlist'])) {
    if(isset($_SESSION['user_login_id'])) {
        $users_id = $_SESSION['user_id'];
        $wish_item_delete_query = "DELETE FROM `mywishlist` WHERE `user_id` = $users_id;";
    } else {
        $token_of_wishlist = "W937LI25A856T0K3N";
        $token_for_un_u_wishlist_details = $_COOKIE[$token_of_wishlist];
        $wish_item_delete_query = "DELETE FROM `unnamed_user_wishlist` WHERE `un_u_wishlist_token` = $token_for_un_u_wishlist_details;";
    }
    mysqli_query($con, $wish_item_delete_query);
    $empty = "emptied";
    ?>
    <script type="text/javascript">
    window.location.href = 'http://localhost:3000/index.php';
    </script>
    <?php
}

if(isset($_POST['add_to_cart_id'])) {
    $produc_id = $_POST['add_to_cart_id'];
    $users_id = $_SESSION['user_id'];
    $produc_type = $_POST['prod_type'];
    if(isset($_SESSION['user_login_id'])) {
        $check_query = "SELECT * FROM `cart` WHERE (`u_id` = $users_id AND `product_id` = $produc_id);";
        $check_result = mysqli_query($con, $check_query);
        $check_rows = mysqli_num_rows($check_result);
        if($check_rows >= 1) {
            echo "";
        } else {
            $cart_insert_query = "INSERT INTO `cart` (`u_id`, `product_id`, `quantity`, `pro_tot_price`, `cart_user_desc`, `pro_type`) VALUES ($users_id, $produc_id, 1, 0, '', '$produc_type');";
            mysqli_query($con, $cart_insert_query);
        }
       
    } else {
        $users_id = $_COOKIE['T093NO5A86H'];
        $check_query = "SELECT * FROM `unnamed_user_cart` WHERE (`un_u_cart_token` = $users_id AND `prod_id_of_cart` = $produc_id);";
        $check_result = mysqli_query($con, $check_query);
        $check_rows = mysqli_num_rows($check_result);
        if($check_rows >= 1) {
            echo "";
        } else {
            $cart_insert_query = "INSERT INTO `unnamed_user_cart` (`un_u_cart_token`, `prod_id_of_cart`, `qty`, `cart_desc`, `pro_type`) VALUES ($users_id, $produc_id, 1, '', '$produc_type');";
            mysqli_query($con, $cart_insert_query);
        }
       
    }
   
    ?>
<script type="text/javascript">
window.location.href = 'http://localhost:3000/index.php';
</script>
<?php
}

if(isset($_SESSION['user_login_id'])) {
    if(isset($_SESSION['user_id'])) {
        $users_id = $_SESSION['user_id'];
        $empty_msg_con_query = "SELECT * FROM `mywishlist` WHERE `user_id` = $users_id;";
        $empty_msg_con_result = mysqli_query($con, $empty_msg_con_query);
        if(isset($empty_msg_con_result)) {
        if(mysqli_num_rows($empty_msg_con_result) === 0) {
            $empty = "emptied";
        } else {
            $empty = "";
        }
    }
    } 
} else {
    if(isset($_COOKIE['W937LI25A856T0K3N'])) {
        $token_of_wishlist = "W937LI25A856T0K3N";
        $token_for_un_u_wishlist_details = $_COOKIE[$token_of_wishlist];
        $empty_msg_con_query = "SELECT * FROM `unnamed_user_wishlist` WHERE `un_u_wishlist_token` = $token_for_un_u_wishlist_details;";
        $empty_msg_con_result = mysqli_query($con, $empty_msg_con_query);
        if(isset($empty_msg_con_result)) {
        if(mysqli_num_rows($empty_msg_con_result) === 0) {
            $empty = "emptied";
        } else {
            $empty = "";
        }
    }
    }
  
}


 if(isset($_POST['logout'])) {
    unset($_SESSION['user_login_id']);
    unset($_SESSION['user_login_email']);
    unset($_SESSION['user_id']);
    
   //session_destroy();
   ?>
   <script type="text/javascript">
   window.location.href = 'http://localhost:3000/index.php';
   </script>
   <?php
   }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="This is an Shopssy Ecommerce website Build for College Project Purpose only. This Website is a Clone of Themeforest website.">
  <meta name="keywords" content="Shopssy, Ecommerce, E-Shopping, Online Shopping, Buy, Sale, Offers">
    <title>
        <?php 
        echo $title;
        ?>
    </title>
    <link rel="icon" href="./images/favicon1.png">
    <script src="https://kit.fontawesome.com/628c629a17.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Ceviche+One&family=Josefin+Sans:wght@700&family=Lobster&family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>

    <!--wishlist container start-->
    <center>
        <div class="wishlist_container">
            <div class="user_id_and_cancel_btn_container">
                <?php 
                if(isset($_SESSION['user_login_id'])) {
                   $user_identity_name = $_SESSION['user_login_email'];
                   $user_identity_class = "user_id_and_cancel_btn_container_btn1";
                   $user_identity_icon_class = "fas fa-user-check";
                } else {
                    $user_identity_name = "Guest Shopper";
                    $user_identity_class = "user_id_and_cancel_btn_container_btn2";
                    $user_identity_icon_class = "fas fa-user-slash";
                }
                 
                ?>
                <button class="<?php echo $user_identity_class; ?>"><i class="<?php echo $user_identity_icon_class; ?>"></i> <?php echo $user_identity_name; ?></button>

                <script src="./javascript/logged.js"></script>
                <script src="./javascript/unlogged.js"></script>
                
                <button class="close_btn_of_wishlist"><i class="far fa-window-close"></i></button>
            </div>

           <div class="wishlist_heading_and_product_parent_container">

            <div class="wishlist_container_heading_container">
                <h2>My Wishlist</h2>
                <button class="three_dot_btn"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></button>

                <div class="share_and_clear_container">
                    <button class="share_email_button"><i class="fas fa-share-alt"></i> Share <i class="fa fa-angle-double-right"></i></button> <br>
                    <button class="delete_email_button"><i class="fas fa-trash-alt"></i> Delete List</button>
                </div>
            </div>

            <!--share email container start-->
            <div class="share_email_container">
                <button class="email_close_btn_of_wishlist"><i class="far fa-window-close"></i></button>
                <h2 class="email_heading">Share List Via Email</h2>

                <div class="share_email_form_container">
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                        <label for="name_of_email">Sender Name</label> <br>
                        <input type="text" id="name_of_email" name="sender_name" placeholder="Your Full Name" required> <br>
                        <label for="email_of_email">Recipients Email <span class="astri">*</span></label> <br>
                        <input type="email" id="email_of_email" name="receiver_email" placeholder="shopper@example.com" required> <br>
                        <label for="message_of_email">Message</label> <br>
                        <textarea id="message_of_email" name="msg_for_receiver" placeholder="Add a note here.."></textarea> <br>
                       <button type="submit" name="share_list_request" class="share_list_btn">SHARE LIST</button>
                    </form>
                </div>

            </div>
            <!--share email container end-->

            <!--save your list container start-->
            <div class="save_your_list_container">
                <button class="savelist_close_btn_of_wishlist"><i class="far fa-window-close"></i></button>
                <h2>Are you sure?</h2>
                <p>You are logged in as</p>
                <b><?php echo $_SESSION['user_login_email'];?></b> <br>
                <center>
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                <button type="button" class="btn_1 save_your_list_close_btn">CANCEL</button>
               <button class="btn_2" name="logout">LOG OUT</button>
               </form>
                </center>
            </div>
            <!--save your list container end-->

            <!--save your list container 2 start-->
            <div class="save_your_list_container save_your_list_container1">
                <button class="savelist_close_btn_of_wishlist savelist_close_btn_of_wishlist1"><i class="far fa-window-close"></i></button>
                <h2>Register or Login</h2>
                <p>You are currently shopping anonymously. Either log in or register the account by entering the below buttons.</p>
               <br>
                <center>
                <a href="./login.php"><button class="btn_1">LOG IN</button></a>
                <a href="./register.php"><button class="btn_2 savelist_close_btn_of_wishlist1_savelist_btn">REGISTER</button></a>
                </center>
            </div>
            <!--save your list container 2 end-->

            <!--save your list container 3 start-->
            <!-- <div class="enter_email_address_container">
                <button class="email_close_btn_of_wishlist email_close_btn_of_wishlist2"><i class="far fa-window-close"></i></button>
                <h2 class="email_heading">Save List Via Email</h2>
                <p>Please enter your email address. You will be sent a validation link to click on.</p>
                <form action="">
                    <label for="name_of_container">First Name</label> <br>
                    <input type="text" id="name_of_container" placeholder="First Name (Optional)"> <br>
                    <label for="lname_of_container">Last Name</label> <br>
                    <input type="text" id="lname_of_container" placeholder="Last Name (Optional)"> <br>
                    <label for="email_of_container">Email Address <span class="astri">*</span></label> <br>
                    <input type="email" id="email_of_container" placeholder="Enter your email address"> <br>
                   <center>
                    <button type="submit" class="save_list_btn">SAVE LIST</button>
                   </center>
                </form>
            </div> -->
            <!--save your list container 3 end -->

            <!--clear list conform container start-->
            <div class="clear_list_container">
              
                    <button class="clearlist_close_btn_of_wishlist"><i class="far fa-window-close"></i></button>
              
                <h2>Are you sure?</h2>
                <p>Do you want to remove all products from My Wishlist?</p>
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                <button class="btn1" name="delete_all_from_wishlist" value="1" >YES, REMOVE THE ITEM IN MY LIST</button>
                </form>
                <button class="btn2 changed_my_mind">NO, I CHANGED MY MIND</button>
            </div>
            <!--clear list confirm container end-->

            <div class="wishlist_product_container">


                <!--empty message container start-->
                <?php 
                if(isset($empty)) {
                   
                    if($empty == "emptied") {
                        echo '<div class="empty_message_container">
                    <h2>Love It? Add To My Wishlist</h2>
                    <p>My Wishlist allows you to keep track of all of your favorites and shopping activity whether you are on your computer, phone, or tablet. You will not have to waste time searching all over again for that item you loved on your phone the other day - its all here in one place!</p>
                    <a href="./index.php"><button>Continue Shopping</button></a>
                </div>';
                    }
                }
                ?>
                <!--empty message container end-->

                <?php 

                if(isset($_SESSION['user_login_id'])) {

                    if(isset($_SESSION['user_id'])) {
                        $users_id = $_SESSION['user_id'];
                    }
                    ?>

                    <?php

                $wish_section_query = "SELECT * FROM `mywishlist` WHERE `user_id` = $users_id;";
                $wish_section_result = mysqli_query($con, $wish_section_query);
                $share_list_variable = "";
                $share_list_counter = 1;
                $share_list_prefix = "Rs.";
                while($row = mysqli_fetch_assoc($wish_section_result)) {
                    
                    $wish_prod_id = $row['prod_id'];
                    $wish_prod_type = $row['pro_type'];
                    $empty = "";
                    
                $wish_sec_product_query = "SELECT * FROM `products` WHERE `p_id` = $wish_prod_id;";
                $wish_sec_product_result = mysqli_query($con, $wish_sec_product_query);
                while($row1 = mysqli_fetch_assoc($wish_sec_product_result)) {
                    $wish_p_id = $row1['p_id'];
                    $wish_p_title = $row1['p_title'];
                    $wish_p_image = $row1['p_image'];
                    $wish_p_a_price = $row1['p_a_price'];
                    $wish_p_o_price = $row1['p_o_price'];
                    $wish_subs_cat_identify_id = $row1['subs_cat_identification_id'];

                    $share_list_variable = $share_list_variable . 
                    "<tr>
                    <th>$share_list_counter.</th>
                    <td><a href='http://localhost:3000/view_of_product.php?p_id=$wish_p_id&sub_cat_id=$wish_subs_cat_identify_id'>$wish_p_title</a></td>
                    <td>$share_list_prefix $wish_p_a_price</td>
                    </tr>";

                    $share_list_counter++;

                ?>
                <div class="wishlist_product_inner_container">
                    <div class="btn_div1">
                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                        <button class="cross_btn" name="wish_del_id" value="<?php echo $wish_p_id; ?>" ><i class="far fa-window-close"></i></button>
                        </form>
                    </div>
                    <div>
                        <img src="./images/<?php echo $wish_p_image; ?>" alt="mobile">
                    </div>
                    <div>
                        <h2><?php 
                        $string_of_title = $wish_p_title;
                        if(strlen($string_of_title) > 25) {
                         $string_of_title = explode("\n", wordwrap($string_of_title, 25));
                         $string_of_title = $string_of_title[0].' ...';
                        }
                        echo $string_of_title;
                        ?></h2>
                        <p>S / White</p>
                        <h2 class="pricee">&#8377;<?php 
                        if($wish_prod_type == 'normal') {
                            echo $wish_p_o_price;
                        } elseif($wish_prod_type == 'hot') {
                            echo floor($wish_p_o_price/2);
                        } else {
                            echo $wish_p_a_price;
                        }
                        ?></h2>
                        <a href="#"><button class="view_more_btn">View More <i class="fa fa-angle-double-right"></i></button></a>
                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                        <input type="hidden" name="prod_type" value="<?php echo $wish_prod_type; ?>">
                        <button class="add_to_cart_btn" name="add_to_cart_id" value="<?php echo $wish_p_id; ?>">ADD TO CART</button>
                        </form>
                    </div>
                </div>

               <?php } } ?>

               <?php 
                } else {

                    $token_of_wishlist = "W937LI25A856T0K3N";
                    $token_for_un_u_wishlist_details = $_COOKIE[$token_of_wishlist];

                    $wish_section_query = "SELECT * FROM `unnamed_user_wishlist` WHERE `un_u_wishlist_token` = $token_for_un_u_wishlist_details;";
                    $wish_section_result = mysqli_query($con, $wish_section_query);
                    $share_list_variable = "";
                    $share_list_counter = 1;
                    $share_list_prefix = "Rs.";
                    while($row = mysqli_fetch_assoc($wish_section_result)) {
                        $wish_prod_type = $row['pro_type'];
                        $wish_prod_id = $row['prod_id_of_wishlist'];
                        $empty = "";
                        
                    $wish_sec_product_query = "SELECT * FROM `products` WHERE `p_id` = $wish_prod_id;";
                    $wish_sec_product_result = mysqli_query($con, $wish_sec_product_query);
                    while($row1 = mysqli_fetch_assoc($wish_sec_product_result)) {
                        $wish_p_id = $row1['p_id'];
                        $wish_p_title = $row1['p_title'];
                        $wish_p_image = $row1['p_image'];
                        $wish_p_a_price = $row1['p_a_price'];
                        $wish_p_o_price = $row1['p_o_price'];
                        $wish_subs_cat_identification_id =$row1['subs_cat_identification_id'];

                    $share_list_variable = $share_list_variable . 
                    "<tr>
                    <th>$share_list_counter.</th>
                    <td><a href='http://localhost:3000/view_of_product.php?p_id=$wish_p_id&sub_cat_id=$wish_subs_cat_identification_id'>$wish_p_title</a></td>
                    <td>$share_list_prefix $wish_p_a_price</td>
                    </tr>";

                    $share_list_counter++;

                    ?>
                    <div class="wishlist_product_inner_container">
                        <div class="btn_div1">
                            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                            <button class="cross_btn" name="wish_del_id" value="<?php echo $wish_p_id; ?>" ><i class="far fa-window-close"></i></button>
                            </form>
                        </div>
                        <div>
                            <img src="./images/<?php echo $wish_p_image; ?>" alt="mobile">
                        </div>
                        <div>
                            <h2><?php 
                            $string_of_title = $wish_p_title;
                            if(strlen($string_of_title) > 25) {
                             $string_of_title = explode("\n", wordwrap($string_of_title, 25));
                             $string_of_title = $string_of_title[0].' ...';
                            }
                            echo $string_of_title;
                            ?></h2>
                            <p>S / White</p>
                            <h2 class="pricee">&#8377;<?php 
                        if($wish_prod_type == 'normal') {
                            echo $wish_p_o_price;
                        } elseif($wish_prod_type == 'hot') {
                            echo floor($wish_p_o_price/2);
                        }  else {
                            echo $wish_p_a_price;
                        }
                        ?></h2>
                        <?php 
                        $view_more_query = "SELECT `sub_cat_identification_id_two`, `subs_cat_title` FROM `sub_category` WHERE `sub_cat_identification_id` LIKE $wish_subs_cat_identification_id;";
                        $view_more_result = mysqli_query($con, $view_more_query);
                        while($row = mysqli_fetch_assoc($view_more_result)) {
                            $view_more_sub_cat_identification_id_two = $row['sub_cat_identification_id_two'];
                            $view_more_sub_cat_title = $row['subs_cat_title'];
                        }
                        ?>
                            <a href="./product.php?sub_cat_identification_id=<?php echo $wish_subs_cat_identification_id; ?>&sub_cat_title=<?php echo $view_more_sub_cat_title; ?>&sub_cat_identification_id_two=<?php echo $view_more_sub_cat_identification_id_two; ?>"><button class="view_more_btn">View More <i class="fa fa-angle-double-right"></i></button></a>
                            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                            <input type="hidden" name="prod_type" value="<?php echo $wish_prod_type; ?>">
                            <button class="add_to_cart_btn" name="add_to_cart_id" value="<?php echo $wish_p_id; ?>">ADD TO CART</button>
                            </form>
                        </div>
                    </div>
    
                   <?php } } } share_list_val($share_list_variable); ?>

                   <?php

                   
 function share_list_val($argum) {
    global $wishlist_prod_detail;
   $wishlist_prod_detail = $argum;
} 



if(isset($_POST['share_list_request'])) {
   $receiver_mail = test_input_data($_POST['receiver_email']);
   $sender_name = test_input_data($_POST['sender_name']);
   $receiver_msg = test_input_data($_POST['msg_for_receiver']);

   
   require "./Mail/phpmailer/PHPMailerAutoload.php";
   $user_mail_id = "";
   $mail = new PHPMailer;
   $mail -> isSMTP();
   $mail -> Host = 'smtp.gmail.com';
   $mail -> Port = 587;
   $mail -> SMTPAuth = true;
   $mail -> SMTPSecure = 'tls';

   $mail -> Username = 'shopssyz@gmail.com';
   $mail -> Password = 'Shopssy$#@123';

   $mail -> setFrom('shopssyz@gmail.com', 'Wishlist - Shopssy');
   $mail -> addAddress("$receiver_mail");

   $mail -> isHTML(true);
   $mail -> Subject = 'Wishlist Details';
   $mail -> Body = "
   <!DOCTYPE html>
   <html lang='en'>
   <head>
       <style>
           * {
               margin: 0px;
               padding: 0px;
               box-sizing: border-box;
               font-family: Arial, Helvetica, sans-serif;
           }
           body {
               padding: 0px 5px;
           }
           .site_name {
               color: #1792E9;
               font-size: 35px;
           }
           .msg_head_text {
               margin: 10px 0px;
               color: black;
           }
           
           .info_text {
               color: black;
           }
           .table_heading {
               margin: 10px 0px 5px 0px;
               color: black;
           }
           .table, .table td, .table th  {
               border: 1px solid gainsboro;
              border-collapse: collapse;
               padding: 5px 10px;
               margin: 10px 0px;
               text-align: left;
               color: black;
           }
           .help_para {
               margin: 20px 0px;
               color: black;
           }
   
           .help_para a {
               text-decoration: none;
               color: #1792E9;
           }
           

       </style>
   </head>
   <body>
       <center>
       <h1 class='site_name'>Shopssy</h1>
       </center>
       <h2 class='msg_head_text'>Wishlist from $sender_name</h2>
       <p class='info_text'>$receiver_msg</p>
       
   
       <h2 class='table_heading'>Product Details</h2>
       <table class='table'>
           <tr>
               <th>S.No</th>
               <th>Product Name</th>
               <th>Price</th>
           </tr>
           $wishlist_prod_detail
       </table>
     
   
       
       <p class='help_para'>If you have any questions, contact shopssy at <a href='http://localhost:3000/contactus.php'>http://localhost:3000/contactus.php</a> or call at <a href='tel: 1234567890'>+91 1234567890</a>.</p>
       
   </body>
   </html>
   ";

   if(!$mail -> send()) {
       echo "Sending Mail is Failed, Invalid Email";
   } else {
       ?>
       <script>
           window.location.href = 'http://localhost:3000/index.php';
       </script>
       <?php
   }

  
}

                   ?>
               
            </div>
           </div>
        </div>
    </center>
    <!--wishlist container end-->


    <!--Navbar Container Start-->

    <div class="navbar_container">
        <!--Navbar container for desktop start-->
        <div class="navbar_container_for_desktop">
    <!--Header Start-->
    <center>
    <div class="header_main_container" id="header_main_container">
        <div class="header_container_childs header_container_left">
            <h1><a href="./index.php">Shopssy</a></h1>
        </div>
        <div class="header_container_childs header_container_right">
            <div>
                <i class="fas fa-headset" style="color:#1792e9;font-size: 45px;"></i>
                <div id="header_container_phonenumber_div">
                    <b>Call Customer Services :</b> <br>
                    <h3>+84-0123-456-789</h3>
                </div>
            </div>
        </div>
    </div>
    </center>
    <!--Header End-->


    <!--Navbar Start-->
<center>
    <div class="navbar_main_container">

        <div class="navbar_main_container_childs navbar_main_container_childs_one">
         <div class="shop_by_category_container" id="table_navbar_showing_container">
            <i class="fas fa-bars" style="color: white;font-size: 20px;"></i>
            <p>SHOP BY CATEGORIES</p>
            <i class="fas fa-chevron-circle-down" style="color: white;font-size: 20px;" id="hamburger's_arrow_icon"></i>
            <!--hamburger container start-->

            <div class="hamburger_main_container_table" id="hamburger_navigation_container">

                <table class="hamburger_main_container_tables_table">

                <?php 

                $category_query = "SELECT * FROM `category` WHERE `cat_id` BETWEEN 1 AND 4;";
                $category_result = mysqli_query($con, $category_query);
               while($row = mysqli_fetch_assoc($category_result)) {
                   $category_cat_id = $row['cat_id'];
                   $category_cat_title = $row['cat_title'];
                   $category_cat_icon_name = $row['cat_icon_name'];
                   $category_cat_name_description = $row['cat_name_description'];
              

                ?>

                    <tr>
                        <td rowspan="2"><i class="<?php echo $category_cat_icon_name; ?>" style="color: #A1A1A1;font-size: 25px;"></i></td>
                    </tr>
                    <tr class="hamburger_container_dir_arrow_tiger<?php echo $category_cat_id; ?>" id="hamburger_container_dir_arrow_tiger<?php echo $category_cat_id; ?>">
                        <td><a><b><?php echo $category_cat_title; ?></b></a> <br>
                         <a><p><?php echo $category_cat_name_description; ?></p></a>
                        </td>
                    </tr>

                    <?php } ?>
                    
                </table>
                <h3 class="hamburger_main_container_table_h3_tag"><a href="./all_categories.php">View All Categories <i class="fa fa-angle-double-right"></i></a></h3>
            </div>

            <!--hamburger container end-->
            <div class="hamburger_container_dir_arrow hamburger_container_dir_arrow1"></div>
            <div class="hamburger_container_dir_arrow hamburger_container_dir_arrow2"></div>
            <div class="hamburger_container_dir_arrow hamburger_container_dir_arrow3"></div>
            <div class="hamburger_container_dir_arrow hamburger_container_dir_arrow4"></div>
            <div class="hamburger_container_dir_arrow hamburger_container_dir_arrow5"></div>
            <div class="hamburger_container_dir_arrow hamburger_container_dir_arrow6"></div>
            <div class="hamburger_container_dir_arrow hamburger_container_dir_arrow7"></div>
            <div class="hamburger_container_dir_arrow hamburger_container_dir_arrow8"></div>
            <div class="hamburger_container_dir_arrow hamburger_container_dir_arrow9"></div>
            <div class="hamburger_container_dir_arrow hamburger_container_dir_arrow10"></div>
            <div class="hamburger_container_dir_arrow hamburger_container_dir_arrow11"></div>
            <div class="hamburger_container_dir_arrow hamburger_container_dir_arrow12"></div>

         </div>
        </div>

        
      
            <div class="navbar_main_container_childs navbar_main_container_childs_two">
                <form action="./product.php" method="GET">
                    <input type="search" placeholder="Search" name="searchItem" required>
                    <button type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>

      
           <!--shortcut link for user container start-->
           <div class="shortcut_link_for_user_container">
               <table>

               <?php
               if(isset( $_SESSION['user_id'])) {
                   ?>
                  <tr>
                       <td><button><i class="fa fa-user" aria-hidden="true"></i></button></td>
                       <td><a href="./account.php"><button>My Account</button></a></td>
                   </tr>
                   <tr>
                       <td colspan="2">--------------------</td>
                   </tr>
                   <tr>
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                    <td><button><i class="fa fa-sign-out" aria-hidden="true"></i></button></td>
                    <td><a href="#"><button name="logout">Log Out</button></a></td>
                    </form>
                   </tr>

                   <?php
               } else {
                   ?>
                   <tr>
                       <td><button><i class="fas fa-sign-in-alt"></i></button></td>
                       <td><a href="./login.php"><button>Log in</button></a></td>
                   </tr>
                   <tr>
                       <td colspan="2">--------------------</td>
                   </tr>
                   <tr>
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                    <td><button><i class="fas fa-user-plus"></i></button></td>
                    <td><a href="./register.php"><button>Register</button></a></td>
                    </form>
                   </tr>

                   <?php
               }
               ?>

                  

                <tr>
                    <td colspan="2">--------------------</td>
                </tr>
                <tr>
                    <td><button><i class="fas fa-check-circle"></i></button></td>
                    <td><a href="./information.php"><button>Checkout</button></a></td>
                </tr>
                <tr>
                    <td colspan="2">--------------------</td>
                </tr>
                <tr>
                    <td><button><i class="fas fa-heart"></i></button></td>
                    <td><a><button class="wishlist_btn_of_homepage">My Wishlist</button></a></td>
                </tr>
               </table>
           
            </div>
           <!--shortcut link for user container end-->

           <!--mini cart container start-->
           <div class="mini_cart_container">

           <div class="mini_cart_products_container">
            <table>

            <?php 

            if(isset($_SESSION['user_login_id'])) {
                if(isset($_SESSION['user_id'])) {
                    $mini_user_id = $_SESSION['user_id'];
                }
                 

                ?>

                <?php 
                
            $mini_pro_cart_user_desc="";
            $mini_cart_page_query = "SELECT * FROM `cart` WHERE `u_id`=$mini_user_id;";
            $mini_cart_page_result = mysqli_query($con, $mini_cart_page_query);
            $mini_cart_products_total_price = 0;
            while($row = mysqli_fetch_assoc($mini_cart_page_result)) {
               $mini_pro_id = $row['product_id'];
               $mini_pro_quantity = $row['quantity'];
               $mini_pro_u_id = $row['u_id'];
               $mini_pro_cart_user_desc = $row['cart_user_desc'];
               $mini_pro_prod_type = $row['pro_type'];
               $mini_big_cart_query = "SELECT * FROM `products` WHERE `p_id`=$mini_pro_id;";
               $mini_big_cart_result = mysqli_query($con, $mini_big_cart_query);
               while($row1 = mysqli_fetch_assoc($mini_big_cart_result)) {
                   $mini_big_cart_p_image = $row1['p_image'];
                   $mini_big_cart_p_title = $row1['p_title'];
                   $mini_big_cart_p_a_price = $row1['p_a_price'];
                   $mini_cart_update_prod_id = $row1['p_id'];
                   $mini_big_cart_p_o_price = $row1['p_o_price'];
               }
           
           ?>

               <tr>
                   <td rowspan="4" class="delete_btn_border"><img src="./images/<?php echo $mini_big_cart_p_image; ?>" class="mini_cart_container_images" alt="<?php echo $mini_big_cart_p_image; ?>"></td>
               </tr>
               <tr>
                   <td class="product_title"><a href="#"><?php
                       $string_of_title = $mini_big_cart_p_title;
                       if(strlen($string_of_title) > 30) {
                        $string_of_title = explode("\n", wordwrap($string_of_title, 35));
                        $string_of_title = $string_of_title[0].' ...';
                       }
                       echo $string_of_title;
                       ?></a></td>
               </tr>
               <tr>
                   <td class="product_prz"><b>&#8377;<?php 
                   if($mini_pro_prod_type == 'normal') {
                    $mini_tot_price = $mini_pro_quantity * $mini_big_cart_p_o_price;
                   } elseif($mini_pro_prod_type == 'hot') {
                       $temp_price = floor($mini_big_cart_p_o_price/2);
                    $mini_tot_price = $mini_pro_quantity * $temp_price;
                   } else {
                    $mini_tot_price = $mini_pro_quantity * $mini_big_cart_p_a_price;
                   }
                  
                   echo $mini_tot_price;
                   $mini_cart_products_total_price =  $mini_cart_products_total_price+$mini_tot_price; ?></b> X <?php echo $mini_pro_quantity; ?></td>
               </tr>
               <tr>
                   <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="GET">
                   <input type="hidden" name="product_id" value="<?php echo $mini_pro_id; ?>">
                   <td class="delete_btn_border"><button class="delete_btn_of_cart" name="delete_btn_of_mini_cart" ><i class="fas fa-trash-alt"></i></button></td>
                   </form>
               </tr>

              <?php   } ?>
              <?php 
            } else {

                $mini_user_id = $_COOKIE['T093NO5A86H'];
                 
            $mini_pro_cart_user_desc="";
            $mini_cart_page_query = "SELECT * FROM `unnamed_user_cart` WHERE `un_u_cart_token`=$mini_user_id;";
            $mini_cart_page_result = mysqli_query($con, $mini_cart_page_query);
            $mini_cart_products_total_price = 0;
            while($row = mysqli_fetch_assoc($mini_cart_page_result)) {
               $mini_pro_id = $row['prod_id_of_cart'];
               $mini_pro_quantity = $row['qty'];
               $mini_pro_u_id = $row['un_u_cart_token'];
               $mini_pro_cart_user_desc = $row['cart_desc'];
               $mini_pro_prod_type = $row['pro_type'];
               $mini_big_cart_query = "SELECT * FROM `products` WHERE `p_id`=$mini_pro_id;";
               $mini_big_cart_result = mysqli_query($con, $mini_big_cart_query);
               while($row1 = mysqli_fetch_assoc($mini_big_cart_result)) {
                   $mini_big_cart_p_image = $row1['p_image'];
                   $mini_big_cart_p_title = $row1['p_title'];
                   $mini_big_cart_p_a_price = $row1['p_a_price'];
                   $mini_cart_update_prod_id = $row1['p_id'];
                   $mini_big_cart_p_o_price = $row1['p_o_price'];
               }
           
           ?>

               <tr>
                   <td rowspan="4" class="delete_btn_border"><img src="./images/<?php echo $mini_big_cart_p_image; ?>" class="mini_cart_container_images" alt="<?php echo $mini_big_cart_p_image; ?>"></td>
               </tr>
               <tr>
                   <td class="product_title"><a href="#"><?php
                       $string_of_title = $mini_big_cart_p_title;
                       if(strlen($string_of_title) > 30) {
                        $string_of_title = explode("\n", wordwrap($string_of_title, 35));
                        $string_of_title = $string_of_title[0].' ...';
                       }
                       echo $string_of_title;
                       ?></a></td>
               </tr>
               <tr>
                   <td class="product_prz"><b>&#8377;<?php 
                    if($mini_pro_prod_type == 'normal') {
                        $mini_tot_price = $mini_pro_quantity * $mini_big_cart_p_o_price;
                       } elseif($mini_pro_prod_type == 'hot') {
                           $temp_price = floor($mini_big_cart_p_o_price/2);
                           $mini_tot_price = $mini_pro_quantity * $temp_price;
                       } else {
                        $mini_tot_price = $mini_pro_quantity * $mini_big_cart_p_a_price;
                       }
                  
                   echo $mini_tot_price;
                   $mini_cart_products_total_price =  $mini_cart_products_total_price+$mini_tot_price; ?></b> X <?php echo $mini_pro_quantity; ?></td>
               </tr>
               <tr>
                   <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="GET">
                   <input type="hidden" name="product_id" value="<?php echo $mini_pro_id; ?>">
                   <td class="delete_btn_border"><button class="delete_btn_of_cart" name="delete_btn_of_mini_cart" ><i class="fas fa-trash-alt"></i></button></td>
                   </form>
               </tr>

              <?php   }  } ?>
              
          
         
          
               
            </table>
           </div>
           

           <div class="mini_cart_form_container">
               <p>Add a note to your order</p>
               <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                   <textarea name="cart_user_desc"><?php echo $mini_pro_cart_user_desc; ?></textarea>
                   <div class="money_container">
                    <h2 id="h2_one">TOTAL: </h2>
                    <h2 id="h2_two">&#8377;<?php 
                    echo $mini_cart_products_total_price;
                    ?>.00</h2>
                   </div>
                   <center>
                       <p>Shipping & taxes calculated at checkout</p>
                       <input type="hidden" name="u_id" value="<?php echo $mini_pro_u_id; ?>">
                        <input type="hidden" name="pro_tot_price" value="<?php echo $mini_cart_products_total_price; ?>">
                        <input type="hidden" name="produc_id" value="<?php echo $mini_pro_id; ?>">
                       <button name="view_cart">VIEW CART</button>
                       <button name="cart_update_and_checkout">CHECK OUT</button>
                   </center>
                  
               </form>
           </div>

           

           </div>
           <!--mini cart container end-->

        <div class="navbar_main_container_childs navbar_main_container_childs_three"> 
            
            <button type="submit" class="user_icon_of_homepage" id="user_btn" title="sign in"><a><i class="far fa-user" style="font-size: 25px;color: #45b2ff;"></i></a></button>
            <div id="cart_count_container">
                <button type="submit" class="cart_icon_of_homepage" title="view cart"><a href="./cart.php"><i class="fas fa-cart-plus" style="font-size: 25px;color: #45b2ff;"></i></a></button>
                <?php 
                if(isset($_SESSION['user_login_id'])){
                    $cart_count_user_id = $_SESSION['user_id'];
                    $cart_count_query = "SELECT COUNT(u_id) AS `cart_item_count` FROM `cart` WHERE `u_id` = $cart_count_user_id;";
                    $cart_count_result = mysqli_query($con, $cart_count_query);
                    $cart_item_count = mysqli_fetch_assoc($cart_count_result);
                } else {
                    $cart_count_user_id = $_COOKIE['T093NO5A86H'];
                    $cart_count_query = "SELECT COUNT(un_u_cart_token) AS `cart_item_count` FROM `unnamed_user_cart` WHERE `un_u_cart_token` = $cart_count_user_id;";
                    $cart_count_result = mysqli_query($con, $cart_count_query);
                    $cart_item_count = mysqli_fetch_assoc($cart_count_result);
                }
                ?>
                <span><?php
                if($cart_item_count['cart_item_count'] > 9) {
                    $zero = "";
                } else {
                    $zero = 0;
                }
                echo $zero;
                echo $cart_item_count['cart_item_count'];
                ?></span>
                </div>
           <button type="submit" title="wishlist" class="wishlist_btn"><a><i class="far fa-heart" style="font-size: 25px;color: #45b2ff;"></i></a></button>
        </div>
        
            <!--hamburger sub container start-->

            <div class="hamburger_sub_container">
                <!--hamburger_sub_container_tables start-->

                <?php 

                $sub_cat_query = "SELECT * FROM `sub_category` WHERE `cats_id` BETWEEN 1 AND 4";
                $sub_cat_result = mysqli_query($con, $sub_cat_query);
               while($row1 = mysqli_fetch_assoc($sub_cat_result)) {
                $subcategory_cats_id = $row1['cats_id'];
                $subcategory_sub_cat_title = $row1['subs_cat_title'];
                $subcategory_sub_cat_identification_id = $row1['sub_cat_identification_id'];
                $subcategory_sub_cat_identification_id_two = $row1['sub_cat_identification_id_two'];
                ?>

                <table class="table_of_hamburger_sub_container hamburger_sub_container_tables<?php echo $subcategory_cats_id; ?>">
                    <tr>
                        <th><a href="./product.php?sub_cat_identification_id=<?php echo $subcategory_sub_cat_identification_id; ?>&sub_cat_title=<?php echo $subcategory_sub_cat_title; ?>&sub_cat_identification_id_two=<?php echo $subcategory_sub_cat_identification_id_two; ?>"><?php echo $subcategory_sub_cat_title; ?></a></th>
                    </tr>

                    <?php 
                    $brand_and_item_list_query = " SELECT * FROM `brand_and_item_list` WHERE `subs_cat_identification_id` = $subcategory_sub_cat_identification_id;";
                    $brand_and_item_list_result = mysqli_query($con, $brand_and_item_list_query);

                    while($row2 = mysqli_fetch_assoc($brand_and_item_list_result)) {
                        $brand_and_item_list_b_title = $row2['b_title'];
                        $brand_b_and_i_identification_id = $row2['b_and_i_identification_id'];
                    ?>

                    <tr>
                        <td><a href="./product.php?b_title=<?php echo $brand_and_item_list_b_title; ?>&sub_cat_identification_id_two=<?php echo $subcategory_sub_cat_identification_id_two; ?>&sub_cat_identification_id=<?php echo $subcategory_sub_cat_identification_id; ?>&b_and_i_identification_id=<?php echo $brand_b_and_i_identification_id; ?>"><?php 
                         echo $brand_and_item_list_b_title;
                         ?></a></td>
                    </tr>
                  <?php } ?>
                </table>
               <?php } ?>
              

                <!--hamburger_sub_container_tables end-->


            </div>

            <!--hamburger sub container end-->

    </div>
</center>
    <!--Navbar End-->
    </div>
    <!--Navbar container for desktop end-->

   <!--Navbar container for mobile hamburger div start-->
   <div class="nav_hamburger_division">
    
   </div>
   <div class="nav_hamburger_content_division">
    <div id="hamburger_btn_login_signup_btn_div">
            
            <?php
            if(!isset( $_SESSION['user_id'])) {
                ?>
            <a href="#"><button id="hamburger_btn_user_icon"><i class="far fa-user" style="font-size: 25px;color: #45b2ff;"></i></button></a>
            <a href="./login.php"><button id="hamburger_btn_login_btn">LOGIN</button></a>
            <a href="./register.php"><button id="hamburger_btn_signup_btn">SIGNUP</button></a>
                <?php
            } else {
                $user_id = $_SESSION['user_id'];
                $select_user_name_query = "SELECT `my_name` FROM `account` WHERE `user_id` = $user_id";
                $select_user_name_result = mysqli_query($con, $select_user_name_query);
                while($row = mysqli_fetch_assoc($select_user_name_result)) {
                    $full_name = $row['my_name'];
                }
                if($full_name == "" OR $full_name == "   ") {
                    $select_user_name_query = "SELECT `f_name`, `l_name` FROM `register` WHERE `user_id` = $user_id";
                    $select_user_name_result = mysqli_query($con, $select_user_name_query);
                    while($row = mysqli_fetch_assoc($select_user_name_result)) {
                        $f_name = $row['f_name'];
                        $l_name = $row['l_name'];
                    }
                    $full_name = $f_name." ".$l_name;
                }
                ?>
                <h3 class="register_person_name"><?php echo $full_name; ?></h3>
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                <button id="hamburger_btn_signup_btn"  name="logout">Log Out</button>
                </form>
                <?php
            }
            ?>
            
      </div>
<table>
    
        <tr>
            <td><a href="./all_categories.php"><button><i class="fas fa-list-alt" style="font-size: 25px;color: #bbbbbb;"></i></button></a></td>
            <td><a href="./all_categories.php"><button>All Categories</button></a></td>
        </tr>
        <tr>
            <td><a href="./index.php?close_hamburger#hot_deals_product_container"><button><i class="fa fa-gift" style="font-size: 25px;color: #bbbbbb;"></i></button></a></td>
            <td><a href="./index.php?close_hamburger#hot_deals_product_container"><button>Offer Zone</button></a></td>
        </tr>
        <!-- <tr>
            <td><a href="#"><button><i class="fas fa-box" style="font-size: 25px;color: #bbbbbb;"></i></button></a></td>
            <td><a href="#"><button>Sell On Shopssy</button></a></td>
        </tr> -->
        <tr>
            <td><a href="./order_tracker.php"><button><i class="fa fa-truck" style="font-size: 25px;color: #bbbbbb;"></i></button></a></td>
            <td><a href="./order_tracker.php"><button>My Orders</button></a></td>
        </tr>
        <tr>
            <td><a href="./cart.php"><button><i class="fas fa-shopping-cart" style="font-size: 25px;color: #bbbbbb;"></i></button></a></td>
            <td><a href="./cart.php"><button>My Cart</button></a></td>
        </tr>
        <tr>
            <td><a><button onclick="open_wishlist()"><i class="far fa-heart" style="font-size: 25px;color: #bbbbbb;"></i></button></a></td>
            <td><a><button onclick="open_wishlist()">My Wishlist</button></a></td>
        </tr>
        <tr>
            <td><a href="./account.php"><button><i class="far fa-user" style="font-size: 25px;color: #bbbbbb;"></i></button></a></td>
            <td><a href="./account.php"><button>My Account</button></a></td>
        </tr>
        <tr>
            <td><a href="./notification_page.php"><button><i class="fas fa-bell" style="font-size: 25px;color: #bbbbbb;"></i></button></a></td>
            <td><a href="./notification_page.php"><button>My Notifications</button></a></td>
        </tr>
        <tr>
            <td><a href="./contactus.php"><button><i class="fas fa-comments" style="font-size: 25px;color: #bbbbbb;"></i></button></a></td>
            <td><a href="./contactus.php"><button>Feedback</button></a></td>
        </tr>
        <tr>
            <td><a href="./contactus.php"><button><i class="far fa-address-book" style="font-size: 25px;color: #bbbbbb;"></i></button></a></td>
            <td><a href="./contactus.php"><button>Contact Us</button></a></td>
        </tr>
    
        <tr>
            <td><a href="./contactus.php"><button><i class="fa fa-question-circle" style="font-size: 25px;color: #bbbbbb;"></i></button></a></td>
            <td><a href="./contactus.php"><button>Help Centre</button></a></td>
        </tr>

       
        <tr>
            <td><a href="#"><button><i class="fa fa-wpforms" style="font-size: 25px;color: #bbbbbb;"></i></button></a></td>
            <td><a href="#"><button>Privacy Policy</button></a></td>
        </tr>
        <tr>
            <td><a href="#"><button><i class="fas fa-sticky-note" style="font-size: 25px;color: #bbbbbb;"></i></button></a></td>
            <td><a href="#"><button>Terms & Conditions</button></a></td>
        </tr>

</table>
   </div>
   <!--Navbar container for mobile hamburger div end-->

   <!--Navbar container for mobile start-->
   <div class="navbar_container_for_mobile">
<div class="mob_navbar_container">
     <button class="mob_hamburger_btn"><i class="fas fa-bars" style="color: black;font-size: 30px;"></i></button>
     <h2 class="mob_navbar_title"><a href="./index.php">Shopssy</a></h2>
     <a href="./cart.php" class="mob_navbar_shop_icon"><i class="fas fa-cart-plus" style="font-size: 30px;color: black;"></i></a>
     <div class="mob_navbar_search_container">
        <form action="./product.php" method="GET">
            <input type="search" placeholder="Search" name="searchItem" required>
            <button type="submit">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </div>
</div>
   </div>
   <!--Navbar container for mobile end-->

    </div>

    <!--Navbar Container End-->








