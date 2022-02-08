<?php 
include './action.php';
session_start();

if(!isset($_SESSION['user_login_id'])) {
    ?>
   <script type="text/javascript">
   window.location.href = 'http://localhost:3000/login.php';
   </script>
   <?php
}

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
    $customer_add_details_address = $row2['address'];
    $customer_add_details_city = $row2['city'];
    $customer_add_details_state = $row2['state'];
    $customer_add_details_country = $row2['country'];
    $shipping_address = $customer_add_details_address.", ".$customer_add_details_city.", ".$customer_add_details_state.", ".$customer_add_details_country.".";
}
} 
else {
    header("Location: http://localhost:3000/information.php");
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shipping - Shopssy</title>
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

            <div class="information_inner_container_for_mobile">
                <button class="show_summary_btn"><i class="fas fa-shopping-cart"></i> show order summary <i class="fa fa-angle-down"></i></button>
                <span> &#8377; 1,004.00</span>

                <div class="information_inner_container2 information_inner_container2_of_mobile">
                    <div class="information_inner_container2_1st">
                        <div class="information_inner_container2_divs">
                            <div class="information_inner_container2_divs_image">
                                <img src="./images/mob_image_2.jpg" alt="mobile image">
                            </div>
                            <div class="information_inner_container2_divs_title information_inner_container2_divs_title1">
                             <h5>Lorem ipsum dolor</h5>
                             <p>Lorem ipsum</p>
                            </div>
                            <div class="information_inner_container2_divs_qty information_inner_container2_divs_qty1">
                            X 1
                            </div>
                            <div class="information_inner_container2_divs_price">
                                &#8377; 120.00
                            </div>
                        </div>
            
                        <div class="information_inner_container2_divs">
                            <div class="information_inner_container2_divs_image">
                                <img src="./images/smart_watch_image_1.jpg" alt="mobile image">
                            </div>
                            <div class="information_inner_container2_divs_title information_inner_container2_divs_title1">
                             <h5>Lorem ipsum dolor</h5>
                             <p>Lorem ipsum</p>
                            </div>
                            <div class="information_inner_container2_divs_qty information_inner_container2_divs_qty1">
                            X 2
                            </div>
                            <div class="information_inner_container2_divs_price">
                                &#8377; 240.00
                            </div>
                        </div>
            
                        <div class="information_inner_container2_divs">
                            <div class="information_inner_container2_divs_image">
                                <img src="./images/speaker1_image_1.jpg" alt="mobile image">
                            </div>
                            <div class="information_inner_container2_divs_title information_inner_container2_divs_title1">
                             <h5>Lorem ipsum dolor</h5>
                             <p>Lorem ipsum</p>
                            </div>
                            <div class="information_inner_container2_divs_qty information_inner_container2_divs_qty1">
                            X 1
                            </div>
                            <div class="information_inner_container2_divs_price">
                                &#8377; 120.00
                            </div>
                        </div>
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
                                &#8377; 120.00
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
                                &#8377; 20.00
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
                                &#8377; 1,004.00
                            </div>
                        </div>
            
                        
                    </div>
        
        
                </div>

            </div>

            <div class="sub_navigation_of_info_div_inner_container">
                <span><a href="./cart.php">Cart</a></span>
                <span><i class="fa fa-angle-right" style="color: #666666;font-size: 14px;"></i></span>
                <span><a  href="./information.php">Information</a></span>
                <span><i class="fa fa-angle-right" style="color: #666666;font-size: 14px;"></i></span>
                <span><a class="active">Shipping</a></span>
                <span><i class="fa fa-angle-right" style="color: #666666;font-size: 14px;"></i></span>
                <span><a href="./payment.php">Payment</a></span>
            </div>

                

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
                    </table>
                </div>

                <h3>Shipping method</h3>

                <div class="mode_container">
                    <center>
                    <button><i class="fas fa-dot-circle"></i></button>
                    <p class="one">standard</p>
                    <p class="two">&#8377; 50.00</p>
                    </center>
                </div>

        <div class="semi_final_btn_container">
       <form action="./payment.php" method="GET">
       <button type="submit" name="p" value="<?php echo $p_value; ?>" class="continue_btn">Continue to payment</button>
     
        <span class="return_link"><a href="./information.php"><i class="fa fa-angle-left"></i> Return to information</a></span>
        </form>
        </div>

        </div>

        <div class="information_inner_container2">
        <div class="information_inner_container2_1st">

<?php 


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
                        &#8377; <?php echo $product_sub_total + 50; 
                        $_SESSION['T_AMT'] = $product_sub_total + 50;
                      
                        ?>.00
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