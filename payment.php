<?php 
session_start();
include './action.php';

// Redirect If Your Not Login Fun Start

if(!isset($_SESSION['user_login_id'])) {
    ?>
   <script type="text/javascript">
   window.location.href = 'http://localhost:3000/login.php';
   </script>
   <?php
}

// Redirect If Your Not Login Fun End

// Payment Details Encryption Fun Start

function encryption($input_data) {
$ciphering = "AES-128-CTR";
$options = 0;
$encryption_iv = '1234567891011121';
$encryption_key = "Shopssy_Data_Encryption_By_Admin";
$encryption_data = openssl_encrypt($input_data, $ciphering, $encryption_key, $options, $encryption_iv);
return $encryption_data;
}

// Payment Details Encryption Fun End

// Order Request Processing Fun Start

if(isset($_POST['order_req'])) {
    $orders_cart_type = $_POST['card_type'];
    $orders_card_number = $_POST['card_number'];
    $orders_card_e_date = $_POST['card_e_date'];
    $orders_card_cvv_num = $_POST['card_cvv_num'];
    $orders_user_id = $_POST['user_id'];
    $orders_p_status = $_POST['p_status'];
    $orders_pro_tot_amt = $_POST['pro_tot_amt'];
    $cook_name = 'TRX_COUNTER';

    // Fetching TRX Id From DB Fun Start 

    if(!isset($_COOKIE['TRX_COUNTER'])) {
        $cookie_count_query = "SELECT `trx_count` FROM `orders_table`";
        $cookie_count_result = mysqli_query($con, $cookie_count_query);
        $cookie_last_count = 0;
        while($rows = mysqli_fetch_assoc($cookie_count_result)){
            $cookie_last_count = $rows['trx_count'];
        }
        setcookie($cook_name, $cookie_last_count, time() + (86400 * 730), '/');
    } else {
    $cookie_count_query = "SELECT `trx_count` FROM `orders_table`";
    $cookie_count_result = mysqli_query($con, $cookie_count_query);
    $cookie_last_count = 0;
    while($rows = mysqli_fetch_assoc($cookie_count_result)){
        $cookie_last_count = $rows['trx_count'];
    }
    setcookie($cook_name, $cookie_last_count, time() + (86400 * 730), '/');
}

// Fetching TRX Id From DB Fun End

// Ordered Data Inserting To DB Fun Start

    $orders_trx_id = $_POST['trx_id'];
    $trx_counter = $cookie_last_count;
    $trx_counter = $trx_counter + 1;
    $orders_trx_id = $orders_trx_id."".$trx_counter;
    $orders_cart_type = stripcslashes($orders_cart_type);
    $orders_cart_type = mysqli_real_escape_string($con, $orders_cart_type);
    $orders_card_number = stripcslashes($orders_card_number);
    $orders_card_number = mysqli_real_escape_string($con, $orders_card_number);
    
    $date = new DateTime('', new DateTimezone("Asia/Kolkata"));
    $orders_date = $date->format('d/m/y');

    $nameval = "/^[a-zA-Z ]+$/";
    $numberval = "/^[0-9]+$/";

    // Ordered Data Inserting To DB Fun End

    if(preg_match($nameval, $orders_cart_type) and preg_match($numberval, $orders_card_number) and preg_match($numberval, $orders_card_cvv_num)) {

        // Ordered Data Inserting Query Fun Start

        $orders_card_number = encryption($orders_card_number);
        $orders_card_e_date = encryption($orders_card_e_date);
        $orders_card_cvv_num = encryption($orders_card_cvv_num);
    
    $orders_query = "INSERT INTO `orders_table` (`user_id`, `trx_id`, `trx_count`, `p_status`, `pro_tot_amount`, `order_date`) VALUES ($orders_user_id, '$orders_trx_id',  $trx_counter, '$orders_p_status', $orders_pro_tot_amt, '$orders_date');";
    mysqli_query($con, $orders_query);
   
    $order_id_retrieve_query = "SELECT `order_id` FROM `orders_table` WHERE `user_id` = $orders_user_id;";
    $order_id_retrieve_result = mysqli_query($con, $order_id_retrieve_query);
    while($row = mysqli_fetch_assoc($order_id_retrieve_result)) {
        $orders_order_id = $row['order_id'];
    }

    $payment_query = "INSERT INTO `payment` (`user_id`, `order_id`, `card_type`, `card_number`, `exp_date`, `CVV`) VALUES ($orders_user_id, $orders_order_id, '$orders_cart_type', '$orders_card_number', '$orders_card_e_date', '$orders_card_cvv_num');";
    mysqli_query($con, $payment_query);

    if(isset($orders_order_id)) {
        $user_id = $_SESSION['user_id'];
        $cart_details_query = "SELECT * FROM `cart` WHERE `u_id` = $user_id;";
        $cart_details__result = mysqli_query($con, $cart_details_query);
        $product_sub_total = 0;
        while($row = mysqli_fetch_assoc($cart_details__result)) {
            $cart_details_product_id = $row['product_id'];
            $cart_details_quantity = $row['quantity'];
            $cart_details_pro_type = $row['pro_type'];

        $orders_sub_table_query = "INSERT INTO `orders_sub_table` (`order_id`, `product_id`, `quantity`) VALUES ($orders_order_id, $cart_details_product_id, $cart_details_quantity);";mysqli_query($con, $orders_sub_table_query);

        $select_name_of_product_details_query = "SELECT * FROM `products` WHERE `p_id` = $cart_details_product_id;";
        $select_name_of_product_details_result = mysqli_query($con, $select_name_of_product_details_query);
        while($prod_det_row = mysqli_fetch_assoc($select_name_of_product_details_result)) {
            $prod_name = $prod_det_row['p_title'];
            $prod_img_name = $prod_det_row['p_image'];
            $prod_p_o_price = $prod_det_row['p_o_price'];
            $prod_p_a_price = $prod_det_row['p_a_price'];
        

        $get_prod_price = 0;
        $prod_offer_percentage = 0;

        if($cart_details_pro_type == 'normal') {
            $get_prod_price = $prod_p_o_price;
            $prod_offer_percentage = 0;
        } elseif($cart_details_pro_type == 'offer') {
            $get_prod_price = $prod_p_a_price;
            $prod_offer_percentage = ($prod_p_o_price - $prod_p_a_price) / $prod_p_o_price;
            $prod_offer_percentage = $prod_offer_percentage * 100;
        } else {
            $get_prod_price = floor($prod_p_o_price / 2);
            $prod_offer_percentage = 50;
        }

        $order_tracker_query = "INSERT INTO `order_tracker` (`order_id`, `prod_name`, `prod_img_name`, `prod_price`, `offer_percentage_val`, `order_date`) VALUES ($orders_order_id, '$prod_name', '$prod_img_name', $get_prod_price, $prod_offer_percentage, '$orders_date');";
        mysqli_query($con, $order_tracker_query);
        }

        }
    }

     // Ordered Data Inserting Query Fun End

     // Account Details And Ordered Products Details From DB Fun Start

    $user_detail_retrieve_query = "SELECT * FROM `account` WHERE `user_id` =  $orders_user_id;";
    $user_detail_retrieve_result = mysqli_query($con, $user_detail_retrieve_query);
    while($row = mysqli_fetch_assoc($user_detail_retrieve_result)) {
        $user_full_name = $row['my_name'];
        $user_full_address = $row['street'];
        $user_full_address = $user_full_address.', '.$row['country'];
        $user_full_address = $user_full_address.', '.$row['state'];
        $user_full_address = $user_full_address.', '.$row['city'];
        $user_full_address = $user_full_address.', '.$row['zip'].'.';
    }

    $order_detail_retrieve_query = "SELECT `trx_id`, `pro_tot_amount`, `order_date` FROM `orders_table` WHERE `order_id` = $orders_order_id";
    $order_detail_retrieve_result = mysqli_query($con, $order_detail_retrieve_query);
    while($row = mysqli_fetch_assoc($order_detail_retrieve_result)) {
        $user_trx_id = $row['trx_id'];
        $user_pro_tot_amount = $row['pro_tot_amount'];
        $user_order_date = $row['order_date'];
    }

    // Account Details And Ordered Products Details From DB Fun End

    // Fetching Ordered Products Details From DB Fun Start
   
    $user_id = $_SESSION['user_id'];

    $cart_detail_retrieve_query = "SELECT * FROM `cart` WHERE `u_id` = $user_id;";
    $cart_detail_retrieve_result = mysqli_query($con, $cart_detail_retrieve_query);
    $table_product_part = "";
    while($row = mysqli_fetch_assoc($cart_detail_retrieve_result)) {
        $quantity = $row['quantity'];
        $pro_type = $row['pro_type'];
        $product_id = $row['product_id'];
        $pro_tot_price = $row['pro_tot_price'];
        $pro_final_tot_price = $pro_tot_price + 50;
        $product_detail_query = "SELECT * FROM `products` WHERE `p_id` = $product_id";
        $product_detail_result = mysqli_query($con, $product_detail_query);
        while($rows = mysqli_fetch_assoc($product_detail_result)) {
        $product_name = $rows['p_title'];
        $product_p_o_price = $rows['p_o_price'];
        $product_p_a_price = $rows['p_a_price'];
      
       if($pro_type == 'normal') {
           $price_money = $quantity * $product_p_o_price;
       } else if($pro_type == 'offer') {
        $price_money = $quantity * $product_p_a_price;
       } else {
        $price_money = floor($quantity * ($product_p_o_price/2));
       }

       $table_product_part = $table_product_part . 
            "<tr>
               <td>$product_name</td>
               <td>$quantity</td>
               <td>&#8377;$price_money</td>
           </tr>";
     } }
    
     // Fetching Ordered Products Details From DB Fun End

     // Mailing Ordered Products To The User Fun Start

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

    $mail -> setFrom('shopssyz@gmail.com', 'Order Confirmation');
    $mail -> addAddress($_SESSION['user_login_email']);

    $mail -> isHTML(true);
    $mail -> Subject = 'Order Confirmation - Shopssy';
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
            .thank_text {
                margin: 10px 0px;
                color: black;
            }
            .name_text {
                margin-bottom: 10px;
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
            .order_tracker_btn_of_order_page button {
                padding: 10px 20px;
                border: 0px;
                border-radius: 5px;
                background-color: #22A1FD;
                color: white;
                font-weight: bold;
                font-size: 18px;
                cursor: pointer;
                margin: 10px 0px;
                transition: background-color 0.2s;
            }
            
            .order_tracker_btn_of_order_page button:hover {
                background-color: #7A7CEE;
            }

        </style>
    </head>
    <body>
        <center>
        <h1 class='site_name'>Shopssy</h1>
        </center>
        <h2 class='thank_text'>Thanks for your order!</h2>
        <h4 class='name_text'>Hi $user_full_name,</h4>
        <p class='info_text'>We are delighted that you have found something you like!</p>
        <p class='info_text'>As soon as your package is on it's way, you will receive a delivery confirmation from us by email.</p>
    
        <h2 class='table_heading'>Product Details</h2>
        <table class='table'>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
                $table_product_part
            <tr>
                <th colspan='2'>Sub-Total</th>
                <td>&#8377;$pro_tot_price</td>
            </tr>
            <tr>
                <th colspan='2'>Shipping</th>
                <td>&#8377;50.00</td>
            </tr>
            <tr>
                <th colspan='2'>Total</th>
                <td>&#8377;$pro_final_tot_price.00</td>
            </tr>
        </table>
        <hr>
    
        <h2 class='table_heading'>Customer Details</h2>
        <table class='table'>
            <tr>
                <th>Order-Id</th>
                <td>#$orders_order_id</td>
            </tr>
            <tr>
                <th>Order-Date</th>
                <td>$user_order_date</td>
            </tr>
            <tr>
                <th>Transaction-Id</th>
                <td>$user_trx_id</td>
            </tr>
            <tr>
                <th>Delivery address</th>
                <td>$user_full_address</td>
            </tr>
        </table>
        <hr>
        
        <center>
        <div class='order_tracker_btn_of_order_page'>
        <a href='http://localhost:3000/order_tracker.php?ordered_id=$orders_order_id'><button>Track Order</button></a>
        </div>
        </center>
        
        <p class='help_para'>If you have any questions, contact shopssy at <a href='http://localhost:3000/contactus.php'>http://localhost:3000/contactus.php</a> or call at <a href='tel: 1234567890'>+91 1234567890</a>.</p>
        
    </body>
    </html>
    ";

    $delete_cart_after_booking = "DELETE FROM `cart` WHERE `u_id` = $user_id;";
    mysqli_query($con, $delete_cart_after_booking);

    if(!$mail -> send()) {
        echo "Sending Mail is Failed, Invalid Email";
    } else {
        ?>
        <script>
            window.location.href = 'http://localhost:3000/success.php';
        </script>
        <?php
    }

         // Mailing Ordered Products To The User Fun End

} else {
    echo "error";
}

}

// Order Request Processing Fun End

// Fetching Account details From DB Start

$shipping_address = "";
$user_id = $_SESSION['user_id'];
if(isset($_GET['p'])) {
    
if($_GET['p'] == 1) {
    $status_of_add = "default";
    $p_value = $_GET['p'];
} else {
    $status_of_add = "secondary";
    $p_value = $_GET['p'];
}
$add_retrieve_query = "SELECT * FROM `account` WHERE `user_id` = $user_id AND `status` = '$status_of_add';";
$add_retrieve_result = mysqli_query($con, $add_retrieve_query);
while($row2 = mysqli_fetch_assoc($add_retrieve_result)) {
    $customer_add_details_street = $row2['street'];
    $customer_add_details_city = $row2['city'];
    $customer_add_details_state = $row2['state'];
    $customer_add_details_country = $row2['country'];
    $shipping_address = $customer_add_details_street.", ".$customer_add_details_city.", ".$customer_add_details_state.", ".$customer_add_details_country.".";
}
} 
else 
{
    ?>
    <script type="text/javascript">
    window.location.href = 'http://localhost:3000/information.php';
    </script>
    <?php
}

// Fetching Account details From DB End

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment - Shopssy</title>
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

           <!-- Navlink Container Start -->

            <div class="sub_navigation_of_info_div_inner_container">
                <span><a href="./cart.php">Cart</a></span>
                <span><i class="fa fa-angle-right" style="color: #666666;font-size: 14px;"></i></span>
                <span><a  href="./information.php">Information</a></span>
                <span><i class="fa fa-angle-right" style="color: #666666;font-size: 14px;"></i></span>
                <span><a href="./shipping.php">Shipping</a></span>
                <span><i class="fa fa-angle-right" style="color: #666666;font-size: 14px;"></i></span>
                <span><a class="active">Payment</a></span>
            </div>
            
             <!-- Navlink Container End -->

             <!-- User Email And Address Display Container Start -->

                <div class="semi_final_details_container">
                    <table>
                        <tr>
                            <th>Contact <p class="mail_and_home_add">
                            <?php echo $_SESSION['user_login_email']; ?></p></th>
                                <td><a href="./login.php">Change</a></td>
                        </tr>
                        <tr>
                            <th colspan="2"><hr></th>
                           
                        </tr>
                        <tr>
                            <th>Ship to <p class="mail_and_home_add"><?php echo $shipping_address; ?></p></th>
                                <td><a href="./information.php">Change</a></td>
                        </tr>
                        <tr>
                            <th colspan="2"><hr></th>
                           
                        </tr>
                        <tr>
                            <th>Method <p class="mail_and_home_add">Standard - <b>&#8377; 50.00</b></p></th>
                                <td></td>
                        </tr>
                    </table>
                </div>

                 <!-- User Email And Address Display Container End -->

                  <!-- Payment Form Container Start -->

                <h3>Payment</h3>

                <div class="payment_container">
                   <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"  method="POST" autocomplete="off">
                    <input type="text" name="card_type" placeholder="Type of Card" required autofocus> <br>
                    <input type="number" name="card_number" placeholder="Card Number" required> <br>
                    <input type="text" name="card_e_date" placeholder="Expiry Date (pattern - mm/yy)" required> <br>
                    <input type="number" name="card_cvv_num" placeholder="CVV" required maxlength="3" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"> <br>
                    <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                    <input type="hidden" name="p_status" value="ordered">
                    <input type="hidden" name="trx_id" value="trx0000">
                    <input type="hidden" name="pro_tot_amt" value="<?php echo $_SESSION['T_AMT']; ?>">
                    <center>
                        <button type="submit" name="order_req">PLACE THE ORDER</button>
                    </center>
                   </form>
                </div>

                 <!-- Payment Form Container End -->
       
        </div>

        <div class="information_inner_container2">
            

        <div class="information_inner_container2_1st">

<?php 

// Products Of Cart Display Fun Start

$user_id = $_SESSION['user_id'];
$cart_details_query = "SELECT * FROM `cart` WHERE `u_id` = $user_id;";
$cart_details__result = mysqli_query($con, $cart_details_query);
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

<?php } } 

// Products Of Cart Display Fun End

?>
   
</div>

<!-- Products Total Amount Display Container Start -->

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

            <!-- Products Total Amount Display Container End -->

            <!-- Products Total Amount Display Container Start -->

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

            <!-- Products Total Amount Display Container End -->


        </div>

        

    </div>
   </center>
    <!--information container end-->
           
    <script src="./javascript/info.js"></script>
</body>
</html>