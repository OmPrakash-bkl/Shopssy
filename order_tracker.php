<?php 
include './action.php';
$title = "Track Your Order - Shopssy";
include './header.php';

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

    <!--order tracker container start-->
    <center>
    <div class="order_tracker_container">
        <div class="order_id_container">
            <h3>Order ID - #1234</h3>
        </div>
        <hr>
        <!--order tracker product container start-->
        <div class="product_display_parent_container">
        <div class="product_display_container1">
            <h2>Samsung Galaxy M32 5G (Slate Black, 8GB RAM, 128GB Storage)</h2>
            <h3>&#8377;12999.00</h3>
            <h4>50% off</h4>
        </div>
        <div class="product_display_container2">
            <img src="./images/samsung_mobiles1_image1.jpg" alt="mobile">
        </div>
        </div>
        <!--order tracker product container start-->
        <hr>
        <!-- order tracker bar container start -->

        <div class="order_tracker_bar_parent_container">
            <div class="order_tracker_bar_container">
                <div class="progress_bar_parent">
                <div class="bar_circle bar_circle_and_code_bgcolor">1</div>
                <div class="bar_code bar_circle_and_code_bgcolor"></div>
                <div class="bar_circle bar_circle_and_code_bgcolor">2</div>
                <div class="bar_code"></div>
                <div class="bar_circle">3</div>
                <div class="bar_code"></div>
                <div class="bar_circle">4</div>
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
                <em>05/02/2022</em>
                </div>
                </div>

                <div class="text_containers">
                <div>
                <i class="fa fa-check-square-o"></i>
                </div>
                <div>
                <h3>Order Confirmed</h3>
                <p>Your order has been confirmed.</p>
                <em>05/02/2022</em>
                </div>
                </div>

                <div class="text_containers">
                <div>
                <i class="fa fa-hourglass-half"></i>
                </div>
                <div>
                <h3>Order Processed</h3>
                <p>We are preparing your order.</p>
                <em>05/02/2022</em>
                </div>
                </div>

                <div class="text_containers">
                <div>
                <i class="fa fa-truck"></i>
                </div>
                <div>
                <h3>Ready To Pickup</h3>
                <p>Your order is ready for pickup.</p>
                <em>05/02/2022</em>
                </div>
                </div>
            </div>
        </div>
        <hr>
        
        <div class="help_btn_of_order_page">
        <a href="#"><button>Need help?</button></a>
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