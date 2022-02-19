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
     $order_tracker_id_retrieve_query = "SELECT `order_id`, `p_status`, `user_id` FROM `orders_table` WHERE `user_id` = $user_id;";
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
                    echo $order_tracker_order_date;
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
                    echo $order_tracker_order_date;
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
        if($order_tracker_check_row == 0) {
            ?>
            <div class="no_product_to_track">
               <h1>Sorry!, You haven't any products to track.</h1>
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
              
    <script src="./javascript/index.js"></script>
</body>
</html>