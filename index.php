<?php 
include './action.php';
if(!isset($_COOKIE['T093NO5A86H'])) {
    $unnamed_user_cart_query = "SELECT `un_u_cart_token` FROM `unnamed_user_cart`;";
$unnamed_user_cart_result = mysqli_query($con, $unnamed_user_cart_query);
while($row_of_u_cart = mysqli_fetch_assoc($unnamed_user_cart_result)) {
    $token_for_un_u_cart_details = $row_of_u_cart['un_u_cart_token'];
}
$token_for_un_u_cart_details = $token_for_un_u_cart_details + 1;
$token_of_auth = "T093NO5A86H";
setcookie($token_of_auth, $token_for_un_u_cart_details, time() + (86400 * 730));
}

if(!isset($_COOKIE['W937LI25A856T0K3N'])) {
    $unnamed_user_wishlist_query = "SELECT `un_u_wishlist_token` FROM `unnamed_user_wishlist`;";
$unnamed_user_wishlist_result = mysqli_query($con, $unnamed_user_wishlist_query);
while($row_of_u_wishlist = mysqli_fetch_assoc($unnamed_user_wishlist_result)) {
    $token_for_un_u_wishlist_details = $row_of_u_wishlist['un_u_wishlist_token'];
}
$token_for_un_u_wishlist_details = $token_for_un_u_wishlist_details + 1;
$token_of_wishlist = "W937LI25A856T0K3N";
setcookie($token_of_wishlist, $token_for_un_u_wishlist_details, time() + (86400 * 730));
}

$title = "Shopssy | Online Shopping Site for Mobiles, Electronics and More.";
include './header.php';
if(isset($_POST['product_id'])) {
    if(isset($_SESSION['user_login_id'])) {
        $user_email_id = $_SESSION['user_login_email'];
        $cart_process_query = "SELECT `user_id` FROM `register` WHERE `email`='$user_email_id';";
        $cart_process_result = mysqli_query($con, $cart_process_query);
        $cart_process_user_id = mysqli_fetch_assoc($cart_process_result);
        $cart_process_user_id = $cart_process_user_id['user_id'];
        $cart_process_pro_id = $_POST['product_id'];
        $cart_query = "INSERT INTO `cart` (`u_id`, `product_id`, `quantity`, `pro_tot_price`, `cart_user_desc`) VALUES ($cart_process_user_id, $cart_process_pro_id, 1, 0, '')";
        mysqli_query($con, $cart_query);
        $_SESSION['user_id'] = $cart_process_user_id;
        ?>
        <script type="text/javascript">
        window.location.href = 'http://localhost:3000/index.php';
        </script>
        <?php
    } else {


        $unnamed_user_cart_query = "SELECT `un_u_cart_token` FROM `unnamed_user_cart`;";
        $unnamed_user_cart_result = mysqli_query($con, $unnamed_user_cart_query);
        if(mysqli_num_rows($unnamed_user_cart_result) === 0) {
            $token_for_un_u_cart_details = 1;
        } else {
            while($row_of_u_cart = mysqli_fetch_assoc($unnamed_user_cart_result)) {
                $token_for_un_u_cart_details = $row_of_u_cart['un_u_cart_token'];
            }
            $prod_id_for_unnamed_cart_details = $_POST['product_id'];
          if(isset($_COOKIE['T093NO5A86H'])) {
            $token_of_auth = "T093NO5A86H";
            $token_for_un_u_cart_details = $_COOKIE[$token_of_auth];
          }
            $unnamed_user_cart_details_insert_query = "INSERT INTO `unnamed_user_cart` (`un_u_cart_token`, `prod_id_of_cart`, `qty`) VALUES ($token_for_un_u_cart_details, $prod_id_for_unnamed_cart_details, 1);";
            mysqli_query($con, $unnamed_user_cart_details_insert_query);
            ?>
           <script type="text/javascript">
           window.location.href = 'http://localhost:3000/index.php';
           </script>
           <?php
        }
    
     
    }
   
}

if(isset($_POST['wish_btn'])) {
    $produc_id = $_POST['productt_id'];
    if(isset($_SESSION['user_login_id'])) {
        $users_id = $_SESSION['user_id'];
        $wishlist_insert_query = "INSERT INTO `mywishlist` (`user_id`, `prod_id`) VALUES ($users_id, $produc_id);";
    } else {
        $token_of_wishlist = "W937LI25A856T0K3N";
        $token_for_un_u_wishlist_details = $_COOKIE[$token_of_wishlist];
        $wishlist_insert_query = "INSERT INTO `unnamed_user_wishlist` (`un_u_wishlist_token`, `prod_id_of_wishlist`) VALUES ($token_for_un_u_wishlist_details, $produc_id);";
    }
  
    mysqli_query($con, $wishlist_insert_query);
    ?>
    <script type="text/javascript">
    window.location.href = 'http://localhost:3000/index.php';
    </script>
    <?php
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
        
        $products_query = "SELECT * FROM `products` ORDER BY RAND() LIMIT 20;";
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
            <a href="./view_of_product.php?p_id=<?php echo $product_p_id; ?>&sub_cat_id=<?php echo $product_subs_cat_identification_id; ?>">
                <img src="./images/<?php echo $product_p_image; ?>" alt="products images">
           </a>
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
                       $string_of_title = $product_p_title;
                       if(strlen($string_of_title) > 35) {
                        $string_of_title = explode("\n", wordwrap($string_of_title, 35));
                        $string_of_title = $string_of_title[0].' ...';
                       }
                       echo $string_of_title;
                         ?></h4>
                    </div>
                    <div>
                        <h2>&#8377;<?php echo $product_p_a_price; ?> <del>&#8377;<?php echo $product_p_o_price; ?></del></h2>
                    </div>
                </div>
               </a>
                <div class="products_container_products_inner_btn_divs">
                    <form action="./index.php" method="POST">
                    <button title="Add To Cart" name="product_id" value="<?php echo $product_p_id; ?>" ><i class="fas fa-cart-plus" ></i></button>
                    </form>
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                    <input type="hidden" name="productt_id" value="<?php echo $product_p_id; ?>">
                    <button title="Add To Wishlist" name="wish_btn" ><i class="far fa-heart"></i></button>
                    </form>
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

            <?php 
            $top_category_retrieve_query = "SELECT `cat_id`, `cat_title`, `cat_image_name` FROM `category` ORDER BY RAND() LIMIT 6;";
            $top_category_retrieve_result = mysqli_query($con, $top_category_retrieve_query);
            $border_counter1 = 1;
            while($row = mysqli_fetch_assoc($top_category_retrieve_result)) {
                $top_category_cat_id = $row['cat_id'];
                $top_category_cat_title = $row['cat_title'];
                $top_category_cat_image_name = $row['cat_image_name'];
               
                
            
            ?>
               
                <div class="top_categories_container_products <?php if($border_counter1 == 3 OR $border_counter1 == 6) {
                    echo "no_border";
                    
                } ?>">
                    <div class="top_categories_container_products_img_div">
                        <img src="./images/<?php echo $top_category_cat_image_name; ?>" alt="my web smart phone image">
                    </div>
                    <div class="top_categories_container_products_navlink_div">
                        <h4><?php echo $top_category_cat_title; ?></h4>
                        <ul>
                            <?php 

                $top_sub_category_retrieve_query = "SELECT * FROM `brand_and_item_list` WHERE `cats_id` = $top_category_cat_id LIMIT 5;";
                $top_sub_category_retrieve_result = mysqli_query($con, $top_sub_category_retrieve_query);
                while($row1 = mysqli_fetch_assoc($top_sub_category_retrieve_result)) {
                    $top_category_b_title = $row1['b_title'];
                    $top_category_sub_cat_identification_id_two = $row1['subs_cat_identification_id_two'];
                    $top_category_sub_cat_identification_id = $row1['subs_cat_identification_id'];
                    $top_category_b_and_i_identification_id = $row1['b_and_i_identification_id'];
                            ?>
                           <li><a href="./product.php?b_title=<?php echo $top_category_b_title; ?>&sub_cat_identification_id_two=<?php echo $top_category_sub_cat_identification_id_two; ?>&sub_cat_identification_id=<?php echo $top_category_sub_cat_identification_id; ?>&b_and_i_identification_id=<?php echo $top_category_b_and_i_identification_id; ?>"><?php echo $top_category_b_title; ?></a></li>
                            <?php } ?>
                            <li><a href="./product.php?sub_cat_identification_id=<?php echo $top_category_sub_cat_identification_id; ?>&sub_cat_identification_id_two=<?php echo $top_category_sub_cat_identification_id_two; ?>&sub_cat_title=<?php echo $top_category_cat_title; ?>" class="show_all">View all</a></li>
                        </ul>
                    </div>
                </div>
                <?php 
                if($border_counter1 == 3) {
                    echo '<div class="gray_border">
                    </div>';
                }
                ?>
                
                <?php
                 $border_counter1++;
                } 
             ?>

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

