<?php 
session_start();
include './action.php';
$title = "Shopssy | Online Shopping Site for Mobiles, Electronics and More.";
include './header.php';

if(isset($_POST['product_id'])) {
    $user_email_id = $_SESSION['user_login_email'];
    $cart_process_query = "SELECT `user_id` FROM `register` WHERE `email`='$user_email_id';";
    $cart_process_result = mysqli_query($con, $cart_process_query);
    $cart_process_user_id = mysqli_fetch_assoc($cart_process_result);
    $cart_process_user_id = $cart_process_user_id['user_id'];
    $cart_process_pro_id = $_POST['product_id'];
    $cart_query = "INSERT INTO `cart_sub` (`u_id`, `product_id`, `quantity`) VALUES ($cart_process_user_id, $cart_process_pro_id, 1)";
    mysqli_query($con, $cart_query);
    $_SESSION['user_id'] = $cart_process_user_id;
}

?>


    <!--Slider Container Start-->

    <div class="image_slider_container">

        <center>
            <div class="img_slider_image_container" id="img_slider_image_container_1">
                <img src="./images/slide3.jpg" alt="slider images for shopssy">
                <div class="image_slider_words_container">
                    <p id="image_slider_words_container_one_text1">BEST COMPUTER 2018</p>
                    <h1 id="image_slider_words_container_one_text2">iMac PRO</h1>
                    <a href="#" id="image_slider_words_container_one_text3">BUY NOW <i class="fa fa-angle-right"></i></a>
                </div>
            </div>
            <div class="img_slider_image_container" id="img_slider_image_container_2">
                <img src="./images/slide1.jpg" alt="slider images for shopssy">
                <div class="image_slider_words_container">
                    <p id="image_slider_words_container_two_text1">Eco<span>Bubble</span></p>
                    <p id="image_slider_words_container_two_text2">Washes using 30% of the energy Bubbles to the rest</p>
                 </div>
            </div>
            <div class="img_slider_image_container" id="img_slider_image_container_3">
                <img src="./images/slide2.jpg" alt="slider images for shopssy">
                <div class="image_slider_words_container">
                    <p id="image_slider_words_container_three_text1">SERIES 3</p>
                    <h1 id="image_slider_words_container_three_text2">SMART WATCH</h1>
                   <p id="image_slider_words_container_three_text3">Now Available on Shopssy</p>
                    <a href="#" id="image_slider_words_container_three_text4">BUY NOW <i class="fa fa-angle-right"></i></a>
                </div>
            </div>
            
        </center>

        <center>
           <div id="chage_slide_btn_container">
            <span  id="chage_slide_btn_1">1</span>
            <span  id="chage_slide_btn_2">2</span>
            <span  id="chage_slide_btn_3">3</span>
           </div>
        </center>
    </div>
   
    <!--Slider Container End-->

    <!--three ad container start-->
    <center>
        <div class="three_ad_container">
            <div class="three_ad_inner_containers">
                <a href="#"><img src="./images/ad_banner_1.png" alt="ad of my web pages"></a>
            </div>
            <div class="three_ad_inner_containers">
                <a href="#"><img src="./images/ad_banner_2.png" alt="ad of my web pages"></a>
            </div>
            <div class="three_ad_inner_containers">
                <a href="#"><img src="./images/ad_banner_3.png" alt="ad of my web pages"></a>
            </div>
        </div>
    </center>
    <!--three ad container end-->

    <!--products container start-->
   <center>
    <div class="products_container">
        <div class="products_container_button_div">
            <div class="products_container_button_inner_div_1">
            <button class="active">NEW ARRIVALS</button>
            <button>BEST SELLERS</button>
            <button>ON SALE</button>
            </div>
            <div class="products_container_button_inner_div_2">
                <button><i class="fa fa-angle-left"></i></button>
                <button><i class="fa fa-angle-right"></i></button>
            </div>
        </div>
        
        <div class="products_container_products_div">

        <?php
        
        $products_query = "SELECT * FROM `products` WHERE `cats_id` = 1 ;";
        $products_result = mysqli_query($con, $products_query);
       while($row = mysqli_fetch_assoc($products_result)) {
           $product_p_image = $row['p_image'];
           $product_p_title = $row['p_title'];
           $product_p_a_price = $row['p_a_price'];
           $product_p_o_price = $row['p_o_price'];
           $product_p_star_rat = $row['p_star_rat'];
           $product_p_id = $row['p_id'];
           $product_subs_cat_identification_id = $row['subs_cat_identification_id'];
        ?>

            <div class="products_container_products_inner_divs">
                <img src="./images/<?php echo $product_p_image; ?>" alt="products images">
               <a href="./view_of_product.php?p_id=<?php echo $product_p_id; ?>&sub_cat_id=<?php echo $product_subs_cat_identification_id; ?>">
                <div class="products_container_products_inner_text_divs">
                    <div>
                        <?php
                        switch($product_p_star_rat) {
                            case 1:
                                echo '<span class="fa fa-star checked"></span>
                                      <span class="fa fa-star"></span>
                                      <span class="fa fa-star"></span>
                                      <span class="fa fa-star"></span>
                                      <span class="fa fa-star"></span>';
                            break;
                            case 2:
                                echo '<span class="fa fa-star checked"></span>
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star"></span>
                                      <span class="fa fa-star"></span>
                                      <span class="fa fa-star"></span>';
                            break;
                            case 3:
                                echo '<span class="fa fa-star checked"></span>
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star"></span>
                                      <span class="fa fa-star"></span>';
                            break;
                            case 4:
                                echo '<span class="fa fa-star checked"></span>
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star"></span>';
                            break;
                            case 5:
                                echo '<span class="fa fa-star checked"></span>
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star checked"></span>
                                      <span class="fa fa-star checked"></span>';
                            break;

                        }
    
                        ?>
                    </div>
                    <div>
                        <h4><?php
                        if(strlen($product_p_title) > 30) {
                            echo substr($product_p_title, 0, 35)." ...";
                        } else {
                            echo $product_p_title;
                        }
                         ?></h4>
                    </div>
                    <div>
                        <h2>&#8377;<?php echo $product_p_a_price; ?> <del>&#8377;<?php echo $product_p_o_price; ?></del></h2>
                    </div>
                </div>
               </a>
                <div class="products_container_products_inner_btn_divs">
                    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
                    <button title="Add To Cart" name="product_id" value="<?php echo $product_p_id; ?>" ><i class="fas fa-cart-plus" ></i></button>
                    </form>
                    <button title="Add To Wishlist"><i class="far fa-heart"></i></button>
                    <button title="Quick View"><i class="fas fa-search"></i></button>
                </div>
            </div>
            
            <?php } ?>


            
        </div>
    </div>
   </center>
    <!--products container end-->

    <!--hot deals product container start-->
    <center>
        <div class="hot_deals_product_container">
            <div class="hot_deals_text_container">
               <div class="hot_deals_text_container_div1">
                <h2>HOT DEALS</h2>
               </div>
               <div class="hot_deals_text_container_div2">
                <button><i class="fa fa-angle-left"></i></button>
                <button><i class="fa fa-angle-right"></i></button>
               </div>
            </div>
            <div class="hot_deals_product_outer_container">
                <div class="hot_deals_products_containers">
                    <img src="./images/smart_phone_1.jpg" alt="shopssy hot deals images">
                    <div class="hot_deals_products_time_container">
                        <div class="div1">
                            <div class="hot_deals_products_time_container_inner_divs">
                                <div>
                                    <h6>Days</h6>
                                </div>
                                <div class="times">
                                    05
                                </div>
                            </div>
                            <div class="hot_deals_products_time_container_inner_divs">
                                <div>
                                    <h6>Hours</h6>
                                </div>
                                <div class="times">
                                    05
                                </div>
                            </div>
                            <div class="hot_deals_products_time_container_inner_divs">
                                <div>
                                    <h6>Mins</h6>
                                </div>
                                <div class="times">
                                    05
                                </div>
                            </div>
                            <div class="hot_deals_products_time_container_inner_divs">
                                <div>
                                    <h6>Secs</h6>
                                </div>
                                <div class="times">
                                    05
                                </div>
                            </div>
                        </div>
                        <div class="div2">
                            <div class="hot_deals_products_button_container">
                                <button title="Select Options"><i class="fa fa-check" ></i></button>
                                <button title="Add To Wishlist"><i class="far fa-heart"></i></button>
                                <button title="Quick View"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </div>

                    <div class="hot_deals_products_text_container">
                        <h4><a href="#">Lorem ipsum dolor sit.</a></h4>
                        <a href="#">
                            <div>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                        </a>
                        <a href="#">
                            <div>
                                <h2>$450.50 <del>$600.50</del></h2>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="hot_deals_products_containers">
                    <img src="./images/roll_chair_image_1.jpg" alt="shopssy hot deals images">
                    <div class="hot_deals_products_time_container">
                        <div class="div1">
                            <div class="hot_deals_products_time_container_inner_divs">
                                <div>
                                    <h6>Days</h6>
                                </div>
                                <div class="times">
                                    05
                                </div>
                            </div>
                            <div class="hot_deals_products_time_container_inner_divs">
                                <div>
                                    <h6>Hours</h6>
                                </div>
                                <div class="times">
                                    05
                                </div>
                            </div>
                            <div class="hot_deals_products_time_container_inner_divs">
                                <div>
                                    <h6>Mins</h6>
                                </div>
                                <div class="times">
                                    05
                                </div>
                            </div>
                            <div class="hot_deals_products_time_container_inner_divs">
                                <div>
                                    <h6>Secs</h6>
                                </div>
                                <div class="times">
                                    05
                                </div>
                            </div>
                        </div>
                        <div class="div2">
                            <div class="hot_deals_products_button_container">
                                <button title="Select Options"><i class="fa fa-check" ></i></button>
                                <button title="Add To Wishlist"><i class="far fa-heart"></i></button>
                                <button title="Quick View"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="hot_deals_products_text_container">
                        <h4><a href="#">Lorem ipsum dolor sit.</a></h4>
                        <a href="#">
                            <div>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                        </a>
                        <a href="#">
                            <div>
                                <h2>$450.50 <del>$600.50</del></h2>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="hot_deals_products_containers">
                    <img src="./images/smart_watch_image_1.jpg" alt="shopssy hot deals images">
                    <div class="hot_deals_products_time_container">
                        <div class="div1">
                            <div class="hot_deals_products_time_container_inner_divs">
                                <div>
                                    <h6>Days</h6>
                                </div>
                                <div class="times">
                                    05
                                </div>
                            </div>
                            <div class="hot_deals_products_time_container_inner_divs">
                                <div>
                                    <h6>Hours</h6>
                                </div>
                                <div class="times">
                                    05
                                </div>
                            </div>
                            <div class="hot_deals_products_time_container_inner_divs">
                                <div>
                                    <h6>Mins</h6>
                                </div>
                                <div class="times">
                                    05
                                </div>
                            </div>
                            <div class="hot_deals_products_time_container_inner_divs">
                                <div>
                                    <h6>Secs</h6>
                                </div>
                                <div class="times">
                                    05
                                </div>
                            </div>
                        </div>
                        <div class="div2">
                            <div class="hot_deals_products_button_container">
                                <button title="Select Options"><i class="fa fa-check" ></i></button>
                                <button title="Add To Wishlist"><i class="far fa-heart"></i></button>
                                <button title="Quick View"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="hot_deals_products_text_container">
                        <h4><a href="#">Lorem ipsum dolor sit.</a></h4>
                        <a href="#">
                            <div>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                        </a>
                        <a href="#">
                            <div>
                                <h2>$450.50 <del>$600.50</del></h2>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="hot_deals_products_containers">
                    <img src="./images/iphone_image_1.jpg" alt="shopssy hot deals images">
                    <div class="hot_deals_products_time_container">
                        <div class="div1">
                            <div class="hot_deals_products_time_container_inner_divs">
                                <div>
                                    <h6>Days</h6>
                                </div>
                                <div class="times">
                                    05
                                </div>
                            </div>
                            <div class="hot_deals_products_time_container_inner_divs">
                                <div>
                                    <h6>Hours</h6>
                                </div>
                                <div class="times">
                                    05
                                </div>
                            </div>
                            <div class="hot_deals_products_time_container_inner_divs">
                                <div>
                                    <h6>Mins</h6>
                                </div>
                                <div class="times">
                                    05
                                </div>
                            </div>
                            <div class="hot_deals_products_time_container_inner_divs">
                                <div>
                                    <h6>Secs</h6>
                                </div>
                                <div class="times">
                                    05
                                </div>
                            </div>
                        </div>
                        <div class="div2">
                            <div class="hot_deals_products_button_container">
                                <button title="Select Options"><i class="fa fa-check" ></i></button>
                                <button title="Add To Wishlist"><i class="far fa-heart"></i></button>
                                <button title="Quick View"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                        
                    </div>
                    <div class="hot_deals_products_text_container">
                        <h4><a href="#">Lorem ipsum dolor sit.</a></h4>
                        <a href="#">
                            <div>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                        </a>
                        <a href="#">
                            <div>
                                <h2>$450.50 <del>$600.50</del></h2>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </center>
    <!--hot deals product container end-->

    <!--iphone ad banner container start-->
    <center>
        <div class="iphone_ad_banner_container">
            <a href="#">
                <img src="./images/iphone_x_banner.png" alt="my website iphone ad">
            </a>
        </div>
    </center>
    <!--iphone ad banner container end-->

    <!--top categories container start-->
    <center>
        <div class="top_categories_container">
            <div class="top_categories_container_headtext_div">
                <h2>TOP CATEGORIES</h2>
            </div>
            <div class="top_categories_container_product_nav_div">
                <div class="top_categories_container_products">
                    <div class="top_categories_container_products_img_div">
                        <img src="./images/smart_phone_2.jpg" alt="my web smart phone image">
                    </div>
                    <div class="top_categories_container_products_navlink_div">
                        <h4>Smartphone & Tablets</h4>
                        <ul>
                            <li><a href="#">Apple</a></li>
                            <li><a href="#">Samsung</a></li>
                            <li><a href="#">Accessories</a></li>
                            <li><a href="#">Chargers</a></li>
                            <li><a href="#">Smartphone</a></li>
                            <li><a href="#">Motorola</a></li>
                            <li><a href="#" class="show_all">View all</a></li>
                        </ul>
                    </div>
                </div>
                <div class="top_categories_container_products">
                    <div class="top_categories_container_products_img_div">
                        <img src="./images/bluetooth_image_1.jpg" alt="my web smart phone image">
                    </div>
                    <div class="top_categories_container_products_navlink_div">
                        <h4>Audio & Sound Devices</h4>
                        <ul>
                            <li><a href="#">Logitech Products</a></li>
                            <li><a href="#">Zebronics Products</a></li>
                            <li><a href="#">Headphones</a></li>
                            <li><a href="#">Audiophile</a></li>
                            <li><a href="#">Home Theater</a></li>
                            <li><a href="#">Accessories</a></li>
                            <li><a href="#" class="show_all">View all</a></li>
                        </ul>
                    </div>
                </div>
                <div class="top_categories_container_products no_border">
                    <div class="top_categories_container_products_img_div">
                        <img src="./images/smart_image_1.jpg" alt="my web smart phone image">
                    </div>
                    <div class="top_categories_container_products_navlink_div">
                        <h4>Smartwatches</h4>
                        <ul>
                            <li><a href="#">Apple Smartwatch</a></li>
                            <li><a href="#">Garmin</a></li>
                            <li><a href="#">Accessories</a></li>
                            <li><a href="#">Leather Band</a></li>
                            <li><a href="#">Steel Band</a></li>
                            <li><a href="#">Xiaomi</a></li>
                            <li><a href="#" class="show_all">View all</a></li>
                        </ul>
                    </div>
                </div>
                <div class="gray_border">
                </div>
                <div class="top_categories_container_products">
                    <div class="top_categories_container_products_img_div">
                        <img src="./images/power_image_1.jpg" alt="my web smart phone image">
                    </div>
                    <div class="top_categories_container_products_navlink_div">
                        <h4>Gaming Gear</h4>
                        <ul>
                            <li><a href="#">Accessories</a></li>
                            <li><a href="#">Action Games</a></li>
                            <li><a href="#">Game Consoles</a></li>
                            <li><a href="#">Racing Games</a></li>
                            <li><a href="#">Station Consoles</a></li>
                            <li><a href="#">Arcade Games</a></li>
                            <li><a href="#" class="show_all">View all</a></li>
                        </ul>
                    </div>
                </div>
                <div class="top_categories_container_products">
                    <div class="top_categories_container_products_img_div">
                        <img src="./images/cam_image_1.jpg" alt="my web smart phone image">
                    </div>
                    <div class="top_categories_container_products_navlink_div">
                        <h4>Camera</h4>
                        <ul>
                            <li><a href="#">Security Cameras</a></li>
                            <li><a href="#">Canon DSLR</a></li>
                            <li><a href="#">Accessories</a></li>
                            <li><a href="#">Wireless Cam</a></li>
                            <li><a href="#">Go Pro</a></li>
                            <li><a href="#">Button Carera</a></li>
                            <li><a href="#" class="show_all">View all</a></li>
                        </ul>
                    </div>
                </div>
                <div class="top_categories_container_products no_border">
                    <div class="top_categories_container_products_img_div">
                        <img src="./images/cpu_image_1.jpg" alt="my web smart phone image">
                    </div>
                    <div class="top_categories_container_products_navlink_div">
                        <h4>Laptop & Computer</h4>
                        <ul>
                            <li><a href="#">Accessories</a></li>
                            <li><a href="#">Keyboard</a></li>
                            <li><a href="#">Mouse</a></li>
                            <li><a href="#">Computer Monitors</a></li>
                            <li><a href="#">Graphic Card</a></li>
                            <li><a href="#">Desktop Computers</a></li>
                            <li><a href="#" class="show_all">View all</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </center>
    <!--top categories container end-->

    <?php 
    include "./footer.php";
    ?>

    <script src="./javascript/slider.js"></script>
    <script src="./javascript/index.js"></script>
</body>
</html>

