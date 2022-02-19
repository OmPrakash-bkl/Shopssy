<?php 
include './action.php';

if(isset($_GET['s'])) {
    $searchKeyword = $_GET['s'];
}
// Pagination Count Fun Start

if(!isset($_GET['page'])) {
    unset($_SESSION['pagination_of_product2']);
    $page_count = 1;
} else {
    $page_count = $_GET['page'];
    if($page_count < 1) {
        $page_count = 1;
    }
}
// Pagination Count Fun End

// Retrieve Products Fun Start

$category_products_query = "SELECT * FROM `products` WHERE `p_title` LIKE '%$searchKeyword%';";

$category_products_result = mysqli_query($con, $category_products_query);
$p2 = 1;
while($row = mysqli_fetch_assoc($category_products_result)) {
    $category_products_p_id = $row['p_id'];
    $_SESSION['pagination_of_product2'][$p2] = $category_products_p_id;
    $p2++;
}
// Retrieve Products Fun End 

include './redirect_fun.php';

$title = $searchKeyword . " - Shopssy";
include './header.php';

// Product Adding Fun Start
if(isset($_GET['product_id'])) {
    // Adding Product If The User Is A Shopssy User Fun Start
    if(isset($_SESSION['user_login_id'])) {
        $user_id = $_SESSION['user_id'];
        $product_id = $_GET['product_id'];
        
        $pro_type = 'offer';
        $check_query = "SELECT * FROM `cart` WHERE (`u_id` = $user_id AND `product_id` = $product_id);";
        $check_result = mysqli_query($con, $check_query);
        $check_no_of_row = mysqli_num_rows($check_result);
        if($check_no_of_row >= 1) {
            echo "";
        } else {
            $cart_query = "INSERT INTO `cart` (`u_id`, `product_id`, `quantity`, `pro_tot_price`, `cart_user_desc`, `pro_type`) VALUES ($user_id, $product_id, 1, 0, '', '$pro_type')";
            mysqli_query($con, $cart_query);
        }


    } 
// Adding Product If The User Is A Shopssy User Fun End
// Adding Product If The User Is A Unknown User Fun Start
    else {

        $prod_id_for_unnamed_cart_details = $_GET['product_id'];
          if(isset($_COOKIE['T093NO5A86H'])) {
            $token_of_auth = "T093NO5A86H";
            $token_for_un_u_cart_details = $_COOKIE[$token_of_auth];
          }
         
        $pro_type = 'offer';
        $check_query = "SELECT * FROM `unnamed_user_cart` WHERE (`un_u_cart_token` = $token_for_un_u_cart_details AND `prod_id_of_cart` = $prod_id_for_unnamed_cart_details);";
        $check_result = mysqli_query($con, $check_query);
        $check_rows = mysqli_num_rows($check_result);
        if($check_rows >= 1) {
            echo "";
        } else {
            $unnamed_user_cart_details_insert_query = "INSERT INTO `unnamed_user_cart` (`un_u_cart_token`, `prod_id_of_cart`, `qty`, `pro_type`) VALUES ($token_for_un_u_cart_details, $prod_id_for_unnamed_cart_details, 1, '$pro_type');";
            mysqli_query($con, $unnamed_user_cart_details_insert_query);
        }

       
    }
    // Adding Product If The User Is A Unknown User Fun End
        ?>
        <script type="text/javascript">
       window.onload = function() {
       if(!window.location.hash) {
        window.location = window.location + '#loaded';
        window.location.reload();
              }
          }
        </script>
        <?php
}
// Product Adding Fun End

// Adding Product To Wishlist Fun Start
if(isset($_GET['wish_btn'])) {
    $produc_id = $_GET['productt_id'];
    // Adding Product If The User Is A Shopssy User Fun Start
    if(isset($_SESSION['user_login_id'])) {
        $users_id = $_SESSION['user_id'];
        $pro_type = 'offer';
        $check_query = "SELECT * FROM `mywishlist` WHERE (`user_id` = $users_id AND `prod_id` = $produc_id);";
        $check_result = mysqli_query($con, $check_query);
        $check_rows = mysqli_num_rows($check_result);
        if($check_rows >= 1) {
            echo "";
        } else {
            $wishlist_insert_query = "INSERT INTO `mywishlist` (`user_id`, `prod_id`, `pro_type`) VALUES ($users_id, $produc_id, '$pro_type');";
            mysqli_query($con, $wishlist_insert_query);
        }
       
    }
    // Adding Product If The User Is A Shopssy User Fun End

    // Adding Product If The User Is A Unknown User Fun Start

    else {
        $token_of_wishlist = "W937LI25A856T0K3N";
        $token_for_un_u_wishlist_details = $_COOKIE[$token_of_wishlist];
        $pro_type = 'offer';
        $check_query = "SELECT * FROM `unnamed_user_wishlist` WHERE (`un_u_wishlist_token` = $token_for_un_u_wishlist_details AND `prod_id_of_wishlist` = $produc_id);";
        $check_result = mysqli_query($con, $check_query);
        $check_rows = mysqli_num_rows($check_result);
        if($check_rows >= 1) {
            echo "";
        } else { 
            $wishlist_insert_query = "INSERT INTO `unnamed_user_wishlist` (`un_u_wishlist_token`, `prod_id_of_wishlist`, `pro_type`) VALUES ($token_for_un_u_wishlist_details, $produc_id, '$pro_type');";
            mysqli_query($con, $wishlist_insert_query);
        }
       
    }
    // Adding Product If The User Is A Unknown User Fun End
    
    ?>
    <script type="text/javascript">
   window.onload = function() {
   if(!window.location.hash) {
    window.location = window.location + '#loaded';
    window.location.reload();
          }
      }
    </script>
    <?php
}
// Adding Product To Wishlist Fun End

?>

    <!--filter for mobile container start-->

    <div class="filter_for_mobile_container">
        <div class="filter_for_mobile_header_container">
           <button class="filter_mobile_arrow"><i class="fas fa-arrow-left"></i></button> <span>Filters</span>
        </div>

        <div class="filter_for_mobile_container_body_container">
            <center>
                <div class="filter_for_mobile_container_body_container_inner_container1">
                    <button onclick="show_checkboxes(1)">BRANDS <i class="fa fa-angle-right"></i></button>
                    <button onclick="show_checkboxes(2)">CUSTOMER RATINGS <i class="fa fa-angle-right"></i></button>
                    <button onclick="show_checkboxes(3)">COLORS <i class="fa fa-angle-right"></i></button>
                    <button onclick="show_checkboxes(4)">SIZE <i class="fa fa-angle-right"></i></button>
                    <button onclick="show_checkboxes(5)">PRICE <i class="fa fa-angle-right"></i></button>
                </div>
    
                <div class="filter_for_mobile_container_body_container_inner_container2">
                    <form action="" id="filter_for_mobile_form"></form>
                    <div class="brand_list_container filter_for_mobile_container_body_container_inner_container2_div1">
                            <h3><u>BRANDS</u></h3>
                            <div>
                                <input type="checkbox" id="Samsung"> <label for="Samsung">Samsung</label>
                            </div>
                            <div>
                                <input type="checkbox" id="Realme"> <label for="Realme">Realme</label>
                            </div>
                            <div>
                                <input type="checkbox" id="Poco"> <label for="Poco">Poco</label>
                            </div>
                            <div>
                                <input type="checkbox" id="Redmi"> <label for="Redmi">Redmi</label>
                            </div>
                            <div>
                                <input type="checkbox" id="Apple"> <label for="Apple">Apple</label>
                            </div>
                            <div>
                                <input type="checkbox" id="Infinix"> <label for="Infinix">Infinix</label>
                            </div>
                            <div>
                                <input type="checkbox" id="OnePlus"> <label for="OnePlus">OnePlus</label>
                            </div>
                            <div>
                                <input type="checkbox" id="Oppo"> <label for="Oppo">Oppo</label>
                            </div>
                        </div>
    
                        <div class="rating_list_container filter_for_mobile_container_body_container_inner_container2_div2">
                            <h3><u>CUSTOMER RATINGS</u></h3>
                            <div>
                                <input type="checkbox" id="4star"> <label for="4star">4 Star & Above</label>
                            </div>
                            <div>
                                <input type="checkbox" id="3star"> <label for="3star">3 Star & Above</label>
                            </div>
                            <div>
                                <input type="checkbox" id="2star"> <label for="2star">2 Star & Above</label>
                            </div>
                            <div>
                                <input type="checkbox" id="1star"> <label for="1star">1 Star & Above</label>
                            </div>
                        </div>
                        <div class="color_list_container filter_for_mobile_container_body_container_inner_container2_div3">
                            <h3><u>COLORS</u></h3>
                            <div>
                                <input type="checkbox" id="Red"> <label for="Red">Red</label>
                            </div>
                            <div>
                                <input type="checkbox" id="Green"> <label for="Green">Green</label>
                            </div>
                            <div>
                                <input type="checkbox" id="Blue"> <label for="Blue">Blue</label>
                            </div>
                            <div>
                                <input type="checkbox" id="Yellow"> <label for="Yellow">Yellow</label>
                            </div>
                        </div>
                        <div class="size_list_container filter_for_mobile_container_body_container_inner_container2_div4">
                            <h3><u>SIZE</u></h3>
                            <div>
                                <input type="checkbox" id="Small"> <label for="Small">Small</label>
                            </div>
                            <div>
                                <input type="checkbox" id="Medium"> <label for="Medium">Medium</label>
                            </div>
                            <div>
                                <input type="checkbox" id="Large"> <label for="Large">Large</label>
                            </div>
                        </div>
                        <div class="price_bar_container price_bar_container1 filter_for_mobile_container_body_container_inner_container2_div5">
                            <h3><u>PRICE</u></h3>
                            <div>
                                <input type="checkbox" id="Hundred"> <label for="Hundred">5 to 100</label>
                            </div>
                            <div>
                                <input type="checkbox" id="Thousand"> <label for="Thousand">100 to 1000</label>
                            </div>
                            <div>
                                <input type="checkbox" id="Tenthousand"> <label for="Tenthousand">1000 to 10000</label>
                            </div>
                            <div>
                                <input type="checkbox" id="lakh"> <label for="lakh">10000 to 100000</label>
                            </div>
                            <div>
                                <input type="checkbox" id="Nlakh"> <label for="Nlakh">Above 100000</label>
                            </div>
                        </div>
    
                        </form>
                </div>
            </center>
        </div>
        
       <center>
        <div class="apply_btn_container">
            <button onclick="document.getElementById('filter_for_mobile_form').submit()">Apply</button>
        </div>
       </center>
    </div>

    <!--filter for mobile container end-->

    <!--sort for mobile container start-->
    <div class="sort_for_mobile_container">
        <h3>SORT BY</h3>
       <div class="close_icon_container">
        <span  class="close_icon"><i class="far fa-window-close"></i></span>
       </div>
        <a href="#"><button><i class="fa fa-dot-circle-o"></i> Alphabetically, A-Z</button></a>
        <a href="#"><button><i class="fa fa-dot-circle-o"></i> Alphabetically, Z-A</button></a>
        <a href="#"><button><i class="fa fa-dot-circle-o"></i> Price, low to high</button></a>
        <a href="#"><button><i class="fa fa-dot-circle-o"></i> Price, high to low</button></a>
    </div>
    <!--sort for mobile container end-->

    <!--sub navigation container start-->
    <div class="sub_navigation_container">
<center>
    <div class="sub_navigation_inner_container">
        <span><a href="./index.php">Home</a></span>
        <span><i class="fas fa-arrow-right" style="color: #666666;font-size: 12px;"></i></span>
        <span><a href="./all_categories.php">All Categories</a></span>
        <span><i class="fas fa-arrow-right" style="color: #666666;font-size: 12px;"></i></span>
        <span><a href="<?php echo $_SERVER['REQUEST_URI']; ?>"><?php echo $searchKeyword; ?></a></span>
    </div>
</center>
    </div>
    <!--sub navigation container end-->

   <!--sort and filter for mobile container start-->
   <center>
    <div class="sort_and_filter_container">
        <button class="sort_btn"><i class="fas fa-sort"></i> Sort</a></button> | 
        <button class="filter_btn"><i class="fas fa-sort-amount-down"></i> Filter</button>
       </div>
   </center>
   <!--sort and filter for mobile container end-->


   <!--products section container start-->
   <center>
    <div class="product_section_container">

        <div class="product_section_sub_container_2">
           

           <center>

           <?php 

           // Displaying Product Fun Start
                $start = 1;
                $end = 10;
                $no_of_product_per_page = 10;
               if(isset($_GET['page'])) {
                   $page_no = $_GET['page'];
                   $end = $no_of_product_per_page * $page_no;
                   $start = $end - 10;
               }

               if(isset($_SESSION['pagination_of_product2'])) {

           foreach(array_slice($_SESSION['pagination_of_product2'], $start-1, 10) as $pro2_value) {
           
           $category_products_query = "SELECT * FROM `products` WHERE `p_id`= $pro2_value;";

           $category_products_result = mysqli_query($con, $category_products_query);

     

           while($row = mysqli_fetch_assoc($category_products_result)) {
               $category_products_p_image = $row['p_image'];
               $category_products_p_star_rat = $row['p_star_rat'];
               $category_products_p_title = $row['p_title'];
               $category_products_p_a_price = $row['p_a_price'];
               $category_products_p_o_price = $row['p_o_price'];
               $category_products_p_id = $row['p_id'];
               $category_products_subs_cat_identification_id = $row['subs_cat_identification_id'];
           
           ?>

           <div class="category_products_container_products_inner_divs">
            <img src="./images/<?php echo $category_products_p_image; ?>" alt="products images">
           <a href="./view_of_product.php?p_id=<?php echo $category_products_p_id; ?>&sub_cat_id=<?php echo $category_products_subs_cat_identification_id; ?>">
            <div class="category_products_container_products_inner_text_divs">
                <div>
                <?php
                        switch($category_products_p_star_rat) {
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
                <div class="product_title_container">
                    <h4><?php
                        $string_of_title = $category_products_p_title;
                        if(strlen($string_of_title) > 35) {
                         $string_of_title = explode("\n", wordwrap($string_of_title, 35));
                         $string_of_title = $string_of_title[0].' ...';
                        }
                        echo $string_of_title;
                         ?></h4>
                </div>
                <div>
                    <h2>&#8377;<?php echo $category_products_p_a_price; ?> <del>&#8377;<?php echo $category_products_p_o_price; ?></del></h2>
                    <h4 class="offer_value"><?php 
                    $offer_value = ($category_products_p_o_price - $category_products_p_a_price) / $category_products_p_o_price;
                    $offer_value = $offer_value * 100;
                    echo intval($offer_value);
                    ?>% off</h4>
                </div>
            </div>
           </a>
            <div class="category_products_container_products_inner_btn_divs">
            <form action="./product2.php" method="GET">
                    <button title="Add To Cart" name="product_id" value="<?php echo $category_products_p_id; ?>" ><i class="fas fa-cart-plus" ></i></button>
                    <?php 
                    redirect();
                    ?>
                    </form>
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="GET">
                    <input type="hidden" name="productt_id" value="<?php echo $category_products_p_id; ?>">
                    <button title="Add To Wishlist" name="wish_btn" ><i class="far fa-heart"></i></button>
                    <?php 
                    redirect();
                    ?>
                    </form>
                    <form action="./view_of_product.php" method="GET">
                     <input type="hidden" name="p_id" value="<?php echo $category_products_p_id; ?>">
                     <input type="hidden" name="sub_cat_id" value="<?php echo $category_products_subs_cat_identification_id; ?>">
                     <button title="Quick View" name="view_all_related"><i class="fas fa-search"></i></button>
                     </form>
            </div>
        </div>
        
        <?php } } }
        // Displaying Product Fun End
        ?>
     
</center>
<!-- Pagination Section Container Start -->
<div class="next_page_container">
    <?php
    if(isset($_GET['page']) or isset($_SESSION['pagination_of_product2'])) {
        ?>
 <center>
    <?php
        if($_GET['page'] == 1 or !isset($_GET['page'])) {
            ?>
            <button class="for_box_button">Previous</button>
            <?php 
        } else {
            ?>
            <a href="./product2.php?s=<?php echo $searchKeyword; ?>&page=<?php echo $page_count-1; ?>"><button class="for_box_button">Previous</button></a>
            <?php
        }

        ?>
         <button class="for_round_btn active">
            <?php
            if(!isset($_GET['page'])) {
                echo 1;
            } else {
                echo $_GET['page'];
            }
           ?>
        </button>
        <button class="for_round_btn">
        <?php
            if(!isset($_GET['page'])) {
                echo 2;
            } else {
                echo $_GET['page']+1;
            }
           ?>
        </button>
        <?php
        if(end($_SESSION['pagination_of_product2']) == $pro2_value) {
            ?>
            <button class="for_box_button">Next</button>
            <?php
        } else {
            ?>
            <a href="./product2.php?s=<?php echo $searchKeyword; ?>&page=<?php echo $page_count+1; ?>"><button class="for_box_button">Next</button></a>
            <?php
        }
        ?>
    </center>
        <?php
    }
    ?>
   
</div>
<!-- Pagination Section Container End -->

     </div>
    </div>
   </center>
   <!--products section container end-->

   <?php 
    include "./footer.php";
    ?>

    <script src="./javascript/index.js"></script>
    <script src="./javascript/product.js"></script>
</body>
</html>