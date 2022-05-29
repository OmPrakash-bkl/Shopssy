<?php 
include './action.php';
$title = "Track Your Order - Shopssy";
include './header.php';

// Redirect If User Not Login Fun Start

if(!isset($_SESSION['user_login_id'])) {
    ?>
    <script type="text/javascript">
    window.location.href = 'http://localhost:3000/login.php';
    </script>
    <?php
    }

// Redirect If User Not Login Fun End

?>


    <!--sub navigation container start-->
    <div class="sub_navigation_container">
<center>
    <div class="sub_navigation_inner_container">
        <span><a href="./index.php">Home</a></span>
        <span><i class="fas fa-arrow-right" style="color: #666666;font-size: 12px;"></i></span>
        <span><a href="./order_tracker.php">Order Tracker</a></span>
    </div>
</center>
    </div>
    <!--sub navigation container end-->
    <?php 

     $user_id =  $_SESSION['user_id'];
     $order_tracker_id_retrieve_query = "SELECT `order_id`, `p_status`, `user_id` FROM `orders_table` WHERE `user_id` = $user_id AND `p_status` = 'ordered';";
     $order_tracker_id_retrieve_result = mysqli_query($con, $order_tracker_id_retrieve_query);
     $order_tracker_check_row = mysqli_num_rows($order_tracker_id_retrieve_result);

     if($order_tracker_check_row >= 0) {
     while($row = mysqli_fetch_assoc($order_tracker_id_retrieve_result)) {
         $fetch_order_tracker_id = $row['order_id'];
         $fetch_order_tracker_status = $row['p_status'];
         $fetch_order_tracker_user_id = $row['user_id'];
     }
    ?>
    <!--order tracker container start-->
    <center>
    <div class="order_tracker_container">
        <div class="order_id_container">

        <?php

 // Displaying Order Id Fun Start

        if(isset($fetch_order_tracker_id)) {
        ?>
            <h3>Order ID - #00<?php if(isset($_GET['ordered_id'])) {
           $ordered_id = $_GET['ordered_id'];
           $order_tracker_check_query = "SELECT `user_id` FROM `orders_table` WHERE `order_id` = $ordered_id;";
           $order_tracker_check_result = mysqli_query($con, $order_tracker_check_query);
           while($row = mysqli_fetch_assoc($order_tracker_check_result)) {
               $fetch_order_tracker_user_id_for_checking = $row['user_id'];
           }
   
           $user_id =  $_SESSION['user_id'];
           if($fetch_order_tracker_user_id_for_checking == $user_id) {
              echo $ordered_id;
           } else {
               echo $fetch_order_tracker_id;
           }
       } else {
        echo $fetch_order_tracker_id;
       } ?></h3>
        </div>
        <hr>

        <?php } 
        
        // Displaying Order Id Fun End

        ?>
        <!--order tracker product container start-->

        <?php

        // To Secure From Tracking Others Ordered Product Fun Start

        if(isset($fetch_order_tracker_id)) {
       
       $order_tracker_data_retrieve_query = "SELECT * FROM `order_tracker` WHERE `order_id` = $fetch_order_tracker_id;";

       if(isset($_GET['ordered_id'])) {
           $ordered_id = $_GET['ordered_id'];
        $order_tracker_check_query = "SELECT `user_id` FROM `orders_table` WHERE `order_id` = $ordered_id;";
        $order_tracker_check_result = mysqli_query($con, $order_tracker_check_query);
        while($row = mysqli_fetch_assoc($order_tracker_check_result)) {
            $fetch_order_tracker_user_id_for_checking = $row['user_id'];
        }

        $user_id =  $_SESSION['user_id'];
        if($fetch_order_tracker_user_id_for_checking == $user_id) {
            $order_tracker_data_retrieve_query = "SELECT * FROM `order_tracker` WHERE `order_id` =  $ordered_id;";
        } else {
            $order_tracker_data_retrieve_query = "SELECT * FROM `order_tracker` WHERE `order_id` = $fetch_order_tracker_id;";
        }
       }

    }

    // To Secure From Tracking Others Ordered Product Fun End


    // Displaying Ordered Product Fun Start

    if(isset($fetch_order_tracker_id)) {
       $order_tracker_data_retrieve_result = mysqli_query($con, $order_tracker_data_retrieve_query);
       while($row = mysqli_fetch_assoc($order_tracker_data_retrieve_result)) {
           $order_tracker_prod_name = $row['prod_name'];
           $order_tracker_prod_img_name = $row['prod_img_name'];
           $order_tracker_prod_price = $row['prod_price'];
           $order_tracker_offer_percentage_val = $row['offer_percentage_val'];
           $order_tracker_order_date = $row['order_date'];
           $order_tracker_process_date = $row['process_date'];
           $order_tracker_ready_date = $row['ready_date'];

        ?>
        <div class="product_display_parent_container">
        <div class="product_display_container1">
            <h2><?php echo $order_tracker_prod_name; ?></h2>
            <h3>&#8377;<?php echo $order_tracker_prod_price; ?>.00</h3>
            <?php 
            if($order_tracker_offer_percentage_val == 0) {
                ?>
                <h4 style="color: gray;">No off</h4>
                <?php
            } else {
                ?>
                <h4><?php echo $order_tracker_offer_percentage_val; ?>% off</h4>
                <?php
            }
            ?>
            
        </div>
        <div class="product_display_container2">
            <img src="./images/<?php echo $order_tracker_prod_img_name; ?>" alt="<?php echo $order_tracker_prod_name; ?>">
        </div>
        </div>
        <!--order tracker product container start-->
        <hr>

        <?php } ?>

        <?php }
    
    // Displaying Ordered Product Fun End

    }?>
        <!-- order tracker bar container start -->

        <?php

        // Displaying Order Status Fun Start
        
        if(isset($fetch_order_tracker_status)) {
        if($fetch_order_tracker_status != "") {

        ?>
        <div class="order_tracker_bar_parent_container">
            <div class="order_tracker_bar_container">
                <div class="progress_bar_parent">
                <div class="bar_circle <?php
                if($fetch_order_tracker_status == "ordered" OR $fetch_order_tracker_status == "processed" OR $fetch_order_tracker_status == "ready") {
                    echo "bar_circle_and_code_bgcolor";
                } else {
                    echo "";
                }
                ?>">1</div>
                <div class="bar_code  <?php
                if($fetch_order_tracker_status == "ordered" OR $fetch_order_tracker_status == "processed" OR $fetch_order_tracker_status == "ready") {
                    echo "bar_circle_and_code_bgcolor";
                } else {
                    echo "";
                }
                ?>"></div>
                <div class="bar_circle  <?php
                if($fetch_order_tracker_status == "ordered" OR $fetch_order_tracker_status == "processed" OR $fetch_order_tracker_status == "ready") {
                    echo "bar_circle_and_code_bgcolor";
                } else {
                    echo "";
                }
                ?>">2</div>
                <div class="bar_code <?php
                if($fetch_order_tracker_status == "processed" OR $fetch_order_tracker_status == "ready") {
                    echo "bar_circle_and_code_bgcolor";
                } else {
                    echo "";
                }
                ?>"></div>
                <div class="bar_circle <?php
                if($fetch_order_tracker_status == "processed" OR $fetch_order_tracker_status == "ready") {
                    echo "bar_circle_and_code_bgcolor";
                } else {
                    echo "";
                }
                ?>">3</div>
                <div class="bar_code <?php
                if($fetch_order_tracker_status == "ready") {
                    echo "bar_circle_and_code_bgcolor";
                } else {
                    echo "";
                }
                ?>"></div>
                <div class="bar_circle <?php
                if($fetch_order_tracker_status == "ready") {
                    echo "bar_circle_and_code_bgcolor";
                } else {
                    echo "";
                }
                ?>">4</div>
                </div>
            </div>
            <div class="order_tracker_bar_text_container">
                <div class="text_containers">
                <div>
                <i class='fas fa-box-open'></i>
                </div>
                <div>
                <h3>Order Placed</h3> <br>
                <p>We have received your order.</p>
                <em><?php
                if($fetch_order_tracker_status == "ordered" OR $fetch_order_tracker_status == "processed" OR $fetch_order_tracker_status == "ready") {
                    echo $order_tracker_order_date;
                } else {
                    echo "Soon";
                }
                ?></em>
                </div>
                </div>

                <div class="text_containers">
                <div>
                <i class="fa fa-check-square-o"></i>
                </div>
                <div>
                <h3>Order Confirmed</h3>
                <p>Your order has been confirmed.</p>
                <em><?php
                if($fetch_order_tracker_status == "ordered" OR $fetch_order_tracker_status == "processed" OR $fetch_order_tracker_status == "ready") {
                    echo $order_tracker_order_date;
                } else {
                    echo "Soon";
                }
                ?></em>
                </div>
                </div>

                <div class="text_containers">
                <div>
                <i class="fa fa-hourglass-half"></i>
                </div>
                <div>
                <h3>Order Processed</h3>
                <p>We are preparing your order.</p>
                <em><?php
                if($fetch_order_tracker_status == "processed" OR $fetch_order_tracker_status == "ready") {
                    echo $order_tracker_process_date;
                } else {
                    echo "Soon";
                }
                ?></em>
                </div>
                </div>

                <div class="text_containers">
                <div>
                <i class="fa fa-truck"></i>
                </div>
                <div>
                <h3>Ready To Pickup</h3>
                <p>Your order is ready for pickup.</p>
                <em><?php
                if($fetch_order_tracker_status == "ready") {
                    echo $order_tracker_ready_date;
                } else {
                    echo "Soon";
                }
                ?></em>
                </div>
                </div>
            </div>
        </div>
        <hr>

        <?php } } 
        
           // Displaying Order Status Fun End

        ?>

        <?php
        
        if((isset($_POST['order_cancel_id']))) {
            $order_can_id = $_POST['order_cancel_id'];
            ?>
            <div class="order_cancel_form_container">
               <center>
               <h1><u>Order cancellation Form</u></h1>
               </center>
                <form action="./order_tracker.php" method="POST">
                <input type="hidden" name="order_cancellation_id" value="<?php echo $order_can_id; ?>">
                <div class="order_cancel_sub_containers">
                    <label for="payment_id">Payment id</label> <br>
                    <input type="text" id="payment_id" name="payment_id_of_order" autofocus required>
                </div>

                <div class="order_cancel_sub_containers">
                    <label for="amount_of_order">Amount</label> <br>
                    <input type="text" id="amount_of_order" name="amount_of_order" required>
                </div>

                <div class="order_cancel_sub_containers">
                    <label for="date_of_amount_paid">Date of paid</label> <br>
                    <input type="text" id="date_of_amount_paid" name="date_of_amount_paid" required>
                </div>

                <div class="order_cancel_sub_containers">
                    <label for="reason_of_cancel">Reason of cancel</label> <br>
                    <input type="text" id="reason_of_cancel" name="reason_of_cancel" required>
                </div>
            
            <button type="submit" name="order_cancel_confirmation">Cancel Your Order</button>
                </form>
            </div>
            <?php
        }

        ?>


        <?php 
        if($order_tracker_check_row == 0) {
            ?>
            <div class="no_product_to_track">
               <h1>Sorry!, You haven't any products to track.</h1>
            </div>
            <?php
        }
        ?>

        <?php 
         if(!(isset($_POST['order_cancel_id'])) && !($order_tracker_check_row == 0))  {
            ?>
            <div class="cancel_order_btn_of_order_page">
            <form action="./order_tracker.php" method="POST">
            <button name="order_cancel_id" value="<?php if(isset($_GET['ordered_id'])) { echo $_GET['ordered_id']; } else {echo $fetch_order_tracker_id;} ?>">Order Cancel Request</button>
            </form>
            </div>
            <?php
         }
        ?>
        

        <div class="help_btn_of_order_page">
        <a href="./contactus.php"><button>Need help?</button></a>
        </div>
        <!-- order tracker bar container end -->

    </div>
    </center>
    <!--order tracker container end-->

    <?php 
    include "./footer.php";
    ?>

    <?php


// Order Cancel Confirmation Section Start

if(isset($_POST['order_cancel_confirmation'])) {

    $order_can_id = $_POST['order_cancellation_id'];
    $payment_id_of_order = $_POST['payment_id_of_order'];
    $amount_of_order = $_POST['amount_of_order'];
    $date_of_amount_paid = $_POST['date_of_amount_paid'];
    $reason_of_cancel = $_POST['reason_of_cancel'];

    $payment_id_of_order = stripcslashes($payment_id_of_order);
    $amount_of_order = stripcslashes($amount_of_order);
    $reason_of_cancel = stripcslashes($reason_of_cancel);
    
    $amount_of_order = mysqli_real_escape_string($con, $amount_of_order);

    $payment_id_checker_query = "SELECT `payment_id` FROM `cancelled_orders` WHERE `payment_id` = '$payment_id_of_order';";
    $payment_id_checker_result = mysqli_query($con, $payment_id_checker_query);
    $payment_id_checker_count = mysqli_num_rows($payment_id_checker_result);
    
    if($payment_id_checker_count >= 1) {
        ?>
        <script>
            alert("OOPS, Wrong Payment Id!");
        </script>
        <?php
    } else {

        require "./Mail/phpmailer/PHPMailerAutoload.php";
        $mail = new PHPMailer;
    
        $mail->isSMTP();
        $mail->Host='smtp.gmail.com';
        $mail->Port=587;
        $mail->SMTPAuth=true;
        $mail->SMTPSecure='tls';
    
       
        $mail->Username='shopssyz@gmail.com';
        $mail->Password='Shopssy$@#123';
    
        
        $mail->setFrom('shopssyz@gmail.com', 'Order cancelled!');
        
        $mail->addAddress($_SESSION['user_login_email']);
        
        $mail->isHTML(true);
        $mail->Subject="Your order is cancelled - Shopssy";
        $mail->Body="<h4 style='color: black;'>Dear User,</h4>
        <h3 style='color: black;'>Your order has been cancelled, your payment will be refunded to your account in 2 to 4 business days, Thankyou.</h3>
        
        <p style='color: black;'>If you have any questions, contact shopssy at <a href='http://localhost:3000/contactus.php'>http://localhost:3000/contactus.php</a> or call at <a href='tel: 1234567890'>+91 1234567890</a>.</p>

        <p style='color: black;'>With regrads,</p>
        <b style='color: black;'>Shopssy - The Online Shopping Site.</b>";
    
        if(!$mail->send()){
            ?>
            <script>
                alert("Invalid Email!");
            </script>
            <?php
        } else{

            
        $cancel_order_insert_query = "INSERT INTO `cancelled_orders` (`order_id`, `payment_id`, `amount`, `date_of_paid`, `reason`, `status`) VALUES ('$order_can_id', '$payment_id_of_order', '$amount_of_order', '$date_of_amount_paid', '$reason_of_cancel', '');";
        mysqli_query($con, $cancel_order_insert_query);

    
            $order_cancel_query = "UPDATE `orders_table` SET `p_status` = 'canceled' WHERE `order_id` = '$order_can_id'";
            mysqli_query($con, $order_cancel_query);
    
            ?>
            <script>
            window.location.href = 'http://localhost:3000/index.php';
            </script>
            <?php
        }
    
    }

}

// Order Cancel Confirmation Section End

    ?>
              
    <script src="./javascript/index.js"></script>
</body>
</html>