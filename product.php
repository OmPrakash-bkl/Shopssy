<?php 
include './action.php';
$_SESSION['prod_qty'] = 1;
$start = 1;

if(!isset($_GET['page'])) {
    unset($_SESSION['pagination']);
    $_SESSION['count'] = 1;
    $page_count = $_SESSION['count'];
}
else {
   $page_count = $_GET['page'];
}



if(isset($_GET['b_title'])) {
    $pagi_b_title = $_GET['b_title'];
    $pagi_sub_cat_identification_id_two = $_GET['sub_cat_identification_id_two'];
    $pagi_sub_cat_identification_id = $_GET['sub_cat_identification_id'];
    $pagi_b_and_i_identification_id = $_GET['b_and_i_identification_id'];
} else {
    $pagi_sub_cat_identification_id = $_GET['sub_cat_identification_id'];
    $pagi_sub_cat_title = $_GET['sub_cat_title'];
    $pagi_sub_cat_identification_id_two = $_GET['sub_cat_identification_id_two'];
}


include './redirect_fun.php';

if(isset($_GET['sub_cat_identification_id'])) {
    $product_sub_cat_identification_id = $_GET['sub_cat_identification_id'];
    if(isset($_GET['sub_cat_title'])) {
        $product_sub_cat_title = $_GET['sub_cat_title'];
    }
   
    $product_sub_cat_identification_id_two = $_GET['sub_cat_identification_id_two'];
}
if(isset($_GET['b_title'])) {
    $product_sub_cat_title = $_GET['b_title'];
}

$title = $product_sub_cat_title . " - Shopssy";
include './header.php';



if(isset($_GET['product_id'])) {
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


    } else {

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


if(isset($_GET['wish_btn'])) {
    $produc_id = $_GET['productt_id'];
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
       
    } else {
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



if(isset($_GET['searchItem'])) {
   
    $searchKeyword = $_GET['searchItem'];
    if($searchKeyword) {
        $search_retrieve_query = "SELECT * FROM `brand_and_item_list` WHERE `b_sub_title` LIKE '%$searchKeyword%';";
        $search_retrieve_result = mysqli_query($con, $search_retrieve_query);
        $search_result_count = mysqli_num_rows($search_retrieve_result);
      unset($_SESSION['temp_product_id']);
      $l = 1;
        while($row = mysqli_fetch_assoc($search_retrieve_result)) {
        $search_b_and_i_identification_id =  $row['b_and_i_identification_id'];
        $search_sub_cat_identification_id = $row['subs_cat_identification_id'];
        $search_sub_cat_identification_id_two = $row['subs_cat_identification_id_two'];
        $search_sub_b_title = $row['b_title'];
            $_SESSION['temp_product_id'][$l] = $search_b_and_i_identification_id;
            $l++;
         }
        
      if($search_result_count == 1) {

        ?>
        <script type="text/javascript">
        window.location.href = 'http://localhost:3000/product.php?b_title=<?php echo $search_sub_b_title; ?>&sub_cat_identification_id_two=<?php echo $search_sub_cat_identification_id_two; ?>&sub_cat_identification_id=<?php echo $search_sub_cat_identification_id; ?>&b_and_i_identification_id=<?php echo $search_b_and_i_identification_id; ?>';
        </script>
        <?php
      } 
    elseif($search_result_count > 1) {
        $searchKeyword = $_GET['searchItem'];
        $search_retrieve_query = "SELECT * FROM `brand_and_item_list` WHERE `b_sub_title_two` LIKE '%$searchKeyword%';";
        $search_retrieve_result = mysqli_query($con, $search_retrieve_query);
        $search_result_count = mysqli_num_rows($search_retrieve_result);
        while($row = mysqli_fetch_assoc($search_retrieve_result)) {
        $search_b_and_i_identification_id =  $row['b_and_i_identification_id'];
        $search_sub_cat_identification_id = $row['subs_cat_identification_id'];
        $search_sub_cat_identification_id_two = $row['subs_cat_identification_id_two'];
        $search_sub_b_title = $row['b_title'];
        $search_sub_cat_title = $row['b_sub_title_two'];
         }
        
        if($search_result_count > 0) {
            ?>
            <script type="text/javascript">
            window.location.href = 'http://localhost:3000/product.php?sub_cat_identification_id_two=<?php echo $search_sub_cat_identification_id_two; ?>&sub_cat_identification_id=<?php echo $search_sub_cat_identification_id; ?>&sub_cat_title=<?php echo $search_sub_cat_title; ?>';
            </script>
            <?php
        } else {
            ?>
            <script type="text/javascript">
            window.location.href = 'http://localhost:3000/product3.php?t=<?php echo $searchKeyword; ?>';
            </script>
            <?php
        }
       
      } else {
        ?>
        <script type="text/javascript">
        window.location.href = 'http://localhost:3000/product2.php?s=<?php echo $searchKeyword; ?>';
        </script>
        <?php
      }
    

    }
}



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
        <span><a href="<?php echo $_SERVER['REQUEST_URI']; ?>"><?php echo $product_sub_cat_title; ?></a></span>
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
        <div class="product_section_sub_container_1" id="product_section_sub_container_1">
            <h1>Filters</h1>
           
            <div class="product_section_sub_container_brands_container">
                <div>
                    <div class="brands_container">
                        <div class="text_div">
                            <span>BRANDS & ITEMS</span>
                        </div>
                        <div class="arrow_div">
                            <i class="fa fa-angle-down" id="arrow_of_product1"></i>
                        </div>
                    </div>

                   

                    <div class="brand_list_container" id="brand_list_container">
                        <?php
                        
                        $product_cat_query = "SELECT * FROM `brand_and_item_list` WHERE `subs_cat_identification_id`=$product_sub_cat_identification_id;";
                        $product_cat_result = mysqli_query($con, $product_cat_query);
                        $temprory_value = 1;
                        while($row = mysqli_fetch_assoc($product_cat_result)) {

                            $pro_cat_titles = $row['b_title'];
                            $pro_b_and_i_identification_id = $row['b_and_i_identification_id'];
                            $pro_subs_cat_identification_id_two = $row['subs_cat_identification_id_two'];
                            $pro_subs_cat_identification_id = $row['subs_cat_identification_id'];
                        
                        ?>

                        <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" id="fliter_form<?php echo $temprory_value; ?>" method="GET">
                        <div>
                            <input type="hidden" name="b_and_i_identification_id" value="<?php echo $pro_b_and_i_identification_id; ?>">
                            <input type="checkbox" id="<?php echo $pro_cat_titles; ?>" onchange="document.getElementById('fliter_form<?php echo $temprory_value; ?>').submit()" name="b_title" value="<?php echo $pro_cat_titles; ?>"  class="filter_brand_and_item_divvs"> <label for="<?php echo $pro_cat_titles; ?>"><?php echo $pro_cat_titles; ?></label>
                            <input type="hidden" name="sub_cat_identification_id" value="<?php echo $pro_subs_cat_identification_id; ?>">
                      <input type="hidden" name="sub_cat_identification_id_two" value="<?php echo $pro_subs_cat_identification_id_two; ?>">
                        </div>
                        </form>
                     
                      <?php 
                    $temprory_value++;
                    } 
                    ?>
                      
                    </div>

                   
                </div>
            </div>

            <?php 


   $temp_query = "SELECT * FROM `filter` WHERE `subs_cat_identification_id`=$product_sub_cat_identification_id_two;";
   $temp_result = mysqli_query($con, $temp_query);
   $dummy = 1;
  
   while($row = mysqli_fetch_assoc($temp_result)) {
       $temp_title = $row['filter_title'];
       $temp_sub_title = $row['filter_sub_title'];
       $temp_id = $row['filter_id'];
       $temp_filter_details_category = $row['filter_details_category'];
   ?>

     <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" id="filter_form" method="GET">
               
            <div class="product_section_sub_container_customer_rating_container">
                <div>
                    <div class="rating_container fil_container<?php echo $dummy; ?>" onclick="show_and_hide(<?php echo $dummy; ?>)">
                        <div class="text_div">
                            <span><?php echo $temp_title; ?></span>
                        </div>
                        <div>
                            <i class="fa fa-angle-down arrow_of_product" id="arrow_of_product<?php echo $dummy; ?>"></i>
                        </div>
                    </div>
                    <div class="rating_list_container" id="rating_list_container<?php echo $dummy; ?>">

                    <?php 
           $temp_sub_query = "SELECT * FROM `filter_sub` WHERE `filters_id`=$temp_id;";
           $temp_sub_result = mysqli_query($con, $temp_sub_query);
           while($row1 = mysqli_fetch_assoc($temp_sub_result)) {
               $temp_sub_filter_datas = $row1['filter_datas'];
            
           ?>
           
         <div>
           <input type="checkbox" id="<?php echo $temp_sub_filter_datas; ?>" onchange="document.getElementById('filter_form').submit()" name="<?php echo $temp_sub_title; ?>" value="<?php echo $temp_sub_filter_datas; ?>"> <label for="<?php echo $temp_sub_filter_datas; ?>"><?php echo $temp_sub_filter_datas; ?></label>
           <input type="hidden" name="sub_cat_identification_id" value="<?php echo $pro_subs_cat_identification_id; ?>">
             <input type="hidden" name="sub_cat_identification_id_two" value="<?php echo $pro_subs_cat_identification_id_two; ?>">
             <input type="hidden" name="b_title" value="Filtered Items">
           
         
        </div>

         <?php } ?>

                    </div>
                </div>
            </div>

          
            <?php
        $dummy++;

       

       if(isset($_GET[$temp_sub_title])) {
           $temp_sub_title_data = $_GET[$temp_sub_title];
       $filters_retrieving_query = "SELECT `pro_id` FROM `$temp_filter_details_category` WHERE `$temp_sub_title` = '$temp_sub_title_data';";
       $filters_retrieving_result = mysqli_query($con, $filters_retrieving_query);
       $row_of_filter_counter = 0;
       while($row_of_fil = mysqli_fetch_assoc($filters_retrieving_result)) {
           $row_of_filter =  $row_of_fil['pro_id'];
           $row_of_filter_counter_array[$row_of_filter_counter] = $row_of_filter;
           $row_of_filter_counter++;
       }
       }

        } ?>

</form>
            
     
         
        </div>

        <div class="product_section_sub_container_2">
           <div class="product_section_inner_container">
               <div class="product_section_inner_container_1">
                   <h1><?php echo $product_sub_cat_title; ?></h1>
               </div>
               <div class="product_section_inner_container_2" id="product_section_inner_container_2">
                  <div class="select_container">
                      <button>SORT BY <i class="fa fa-angle-down arrow_of_product5"></i></button>
                      <div class="select_inner_container">
                          <?php 
                          if(isset($_GET['b_title'])) {
                              ?>
                          <span><a href="./product.php?b_title=<?php echo $pagi_b_title; ?>&sub_cat_identification_id_two=<?php echo $pagi_sub_cat_identification_id_two; ?>&sub_cat_identification_id=<?php echo $pagi_sub_cat_identification_id; ?>&b_and_i_identification_id=<?php echo $pagi_b_and_i_identification_id; ?>&sort=1">Alphabetically, A-Z</a></span> <br>
                          <span><a href="./product.php?b_title=<?php echo $pagi_b_title; ?>&sub_cat_identification_id_two=<?php echo $pagi_sub_cat_identification_id_two; ?>&sub_cat_identification_id=<?php echo $pagi_sub_cat_identification_id; ?>&b_and_i_identification_id=<?php echo $pagi_b_and_i_identification_id; ?>&sort=2">Alphabetically, Z-A</a></span> <br>
                          <span><a href="./product.php?b_title=<?php echo $pagi_b_title; ?>&sub_cat_identification_id_two=<?php echo $pagi_sub_cat_identification_id_two; ?>&sub_cat_identification_id=<?php echo $pagi_sub_cat_identification_id; ?>&b_and_i_identification_id=<?php echo $pagi_b_and_i_identification_id; ?>&sort=3">Price, low to high</a></span> <br>
                          <span><a href="./product.php?b_title=<?php echo $pagi_b_title; ?>&sub_cat_identification_id_two=<?php echo $pagi_sub_cat_identification_id_two; ?>&sub_cat_identification_id=<?php echo $pagi_sub_cat_identification_id; ?>&b_and_i_identification_id=<?php echo $pagi_b_and_i_identification_id; ?>&sort=4">Price, high to low</a></span> <br>
                            <?php  
                            } else {    
                            ?>
                          <span><a href="./product.php?sub_cat_identification_id=<?php echo $pagi_sub_cat_identification_id; ?>&sub_cat_title=<?php echo $pagi_sub_cat_title; ?>&sub_cat_identification_id_two=<?php echo $pagi_sub_cat_identification_id_two; ?>&sort=1">Alphabetically, A-Z</a></span> <br>
                          <span><a href="./product.php?sub_cat_identification_id=<?php echo $pagi_sub_cat_identification_id; ?>&sub_cat_title=<?php echo $pagi_sub_cat_title; ?>&sub_cat_identification_id_two=<?php echo $pagi_sub_cat_identification_id_two; ?>&sort=2">Alphabetically, Z-A</a></span> <br>
                          <span><a href="./product.php?sub_cat_identification_id=<?php echo $pagi_sub_cat_identification_id; ?>&sub_cat_title=<?php echo $pagi_sub_cat_title; ?>&sub_cat_identification_id_two=<?php echo $pagi_sub_cat_identification_id_two; ?>&sort=3">Price, low to high</a></span> <br>
                          <span><a href="./product.php?sub_cat_identification_id=<?php echo $pagi_sub_cat_identification_id; ?>&sub_cat_title=<?php echo $pagi_sub_cat_title; ?>&sub_cat_identification_id_two=<?php echo $pagi_sub_cat_identification_id_two; ?>&sort=4">Price, high to low</a></span> <br>
                            <?php  
                          }
                          ?>
                          
                      </div>
                  </div>
               </div>
           </div>

       
           <?php 
           
           $category_products_query = "SELECT * FROM `products` WHERE `subs_cat_identification_id`=$product_sub_cat_identification_id;";
           $sort_val = 0;
           if(isset($_GET['sort'])) {
            $sort_val = $_GET['sort'];
           }
         
           switch($sort_val) {
               case 1:
                $category_products_query = "SELECT * FROM `products` WHERE `subs_cat_identification_id`=$product_sub_cat_identification_id ORDER BY `p_title`;";
                break;
                case 2:
                    $category_products_query = "SELECT * FROM `products` WHERE `subs_cat_identification_id`=$product_sub_cat_identification_id ORDER BY `p_title` DESC;";
                break;
                case 3:
                    $category_products_query = "SELECT * FROM `products` WHERE `subs_cat_identification_id`=$product_sub_cat_identification_id ORDER BY `p_a_price`;";
                break;
                case 4:
                    $category_products_query = "SELECT * FROM `products` WHERE `subs_cat_identification_id`=$product_sub_cat_identification_id ORDER BY `p_a_price` DESC;";
                break;
           }

           if(isset($_GET['b_and_i_identification_id'])) {
               $product_b_and_i_identification_id = $_GET['b_and_i_identification_id'];
               $category_products_query = "SELECT * FROM `products` WHERE `b_and_i_identification_id`=$product_b_and_i_identification_id;";

               $sort_val = $_GET['sort'];
           switch($sort_val) {
               case 1:
                $category_products_query = "SELECT * FROM `products` WHERE `b_and_i_identification_id`=$product_b_and_i_identification_id ORDER BY `p_title`;";
                break;
                case 2:
                    $category_products_query = "SELECT * FROM `products` WHERE `b_and_i_identification_id`=$product_b_and_i_identification_id ORDER BY `p_title` DESC;";
                break;
                case 3:
                    $category_products_query = "SELECT * FROM `products` WHERE `b_and_i_identification_id`=$product_b_and_i_identification_id ORDER BY `p_a_price`;";
                break;
                case 4:
                    $category_products_query = "SELECT * FROM `products` WHERE `b_and_i_identification_id`=$product_b_and_i_identification_id ORDER BY `p_a_price` DESC;";
                break;
           }

           }


           if(isset($row_of_filter)) {
               if(!isset($_GET['page'])) {
                foreach($row_of_filter_counter_array as $product_id_of_row_filter) {
                    $category_products_query = "SELECT * FROM `products` WHERE `p_id`=$product_id_of_row_filter;";

                    $sort_val = 0;
                    if(isset($_GET['sort'])) {
                    $sort_val = $_GET['sort'];
                    }
                  
                    switch($sort_val) {
                        case 1:
                            $category_products_query = "SELECT * FROM `products` WHERE `p_id`=$product_id_of_row_filter ORDER BY `p_title`;";
                         break;
                         case 2:
                            $category_products_query = "SELECT * FROM `products` WHERE `p_id`=$product_id_of_row_filter ORDER BY `p_title` DESC;";
                         break;
                         case 3:
                            $category_products_query = "SELECT * FROM `products` WHERE `p_id`=$product_id_of_row_filter ORDER BY `p_a_price`;";
                         break;
                         case 4:
                            $category_products_query = "SELECT * FROM `products` WHERE `p_id`=$product_id_of_row_filter ORDER BY `p_a_price` DESC;";
                         break;
                    }
    
                    ?>
    
                    <?php 
    
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
                    <div>
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
                <form action="./product.php" method="GET">
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
            
            <?php } ?>
    
                    <?php
    
                   }
               } else {

                    $category_products_query = "SELECT * FROM `products` WHERE `p_id`=$product_id_of_row_filter;";

                    $sort_val = $_GET['sort'];
                    switch($sort_val) {
                        case 1:
                            $category_products_query = "SELECT * FROM `products` WHERE `p_id`=$product_id_of_row_filter ORDER BY `p_title`;";
                         break;
                         case 2:
                            $category_products_query = "SELECT * FROM `products` WHERE `p_id`=$product_id_of_row_filter ORDER BY `p_title` DESC;";
                         break;
                         case 3:
                            $category_products_query = "SELECT * FROM `products` WHERE `p_id`=$product_id_of_row_filter ORDER BY `p_a_price`;";
                         break;
                         case 4:
                            $category_products_query = "SELECT * FROM `products` WHERE `p_id`=$product_id_of_row_filter ORDER BY `p_a_price` DESC;";
                         break;
                    }
    
                    ?>
    
                    <?php 
    
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
                    <div>
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
                <form action="./product.php" method="GET">
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
            
            <?php } ?>
    
                    <?php
    
                  
               }
              
            
           } else {
          
            if(!isset($_GET['page'])) {

                $category_products_result = mysqli_query($con, $category_products_query);

                if(!isset($_GET['page'])) {
                  $t = 1;
                }
               while($row = mysqli_fetch_assoc($category_products_result)) {
               $category_products_p_image = $row['p_image'];
                $category_products_p_star_rat = $row['p_star_rat'];
                 $category_products_p_title = $row['p_title'];
                 $category_products_p_a_price = $row['p_a_price'];
                 $category_products_p_o_price = $row['p_o_price'];
                 $category_products_p_id = $row['p_id'];
                   $category_products_subs_cat_identification_id = $row['subs_cat_identification_id'];
                  
                   if(!isset($_GET['page'])) {
                      $_SESSION['pagination'][$t] = $category_products_p_id;
                      $t++;
                      if($t > 13) {
                          continue;
                      }
                   }
                  
      
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
             <div>
                 <h4><?php
                     if(strlen($category_products_p_title) > 35) {
                         echo substr($category_products_p_title, 0, 35)." ...";
                     } else {
                         echo $category_products_p_title;
                     }
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
         <form action="./product.php" method="GET">
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
      
      <?php } ?>

      <?php

            } else {

                $start = 1;
                $end = 12;
                $no_of_product_per_page = 12;
               if($_GET['page']) {
                   $page_no = $_GET['page'];
                   $end = $no_of_product_per_page * $page_no;
                   $start = $end - 11;
               }

              
               foreach(array_slice($_SESSION['pagination'], $start-1, 12) as $pro_value) {
                   ?>
                   <?php

                     $category_products_query = "SELECT * FROM `products` WHERE `p_id` = $pro_value;";

                     if(isset($_GET['sort'])) {
                     $sort_val = $_GET['sort'];
                     switch($sort_val) {
                         case 1:
                            $category_products_query = "SELECT * FROM `products` WHERE `p_id` = $pro_value ORDER BY `p_title`;";
                          break;
                          case 2:
                            $category_products_query = "SELECT * FROM `products` WHERE `p_id` = $pro_value ORDER BY `p_title` DESC;";
                          break;
                          case 3:
                            $category_products_query = "SELECT * FROM `products` WHERE `p_id` = $pro_value ORDER BY `p_a_price`;";
                          break;
                          case 4:
                            $category_products_query = "SELECT * FROM `products` WHERE `p_id` = $pro_value ORDER BY `p_a_price` DESC;";
                          break;
                     } }
                
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
         <div>
             <h4><?php
                 if(strlen($category_products_p_title) > 35) {
                     echo substr($category_products_p_title, 0, 35)." ...";
                 } else {
                     echo $category_products_p_title;
                 }
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
     <form action="./product.php" method="GET">
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
  
  <?php } ?>

  
               
      
  <?php
            }

  ?>

       <?php

           }

        }

?>
        


<?php if(isset($_SESSION['pagination'])) {

?>

<div class="next_page_container">
    <center>
        <?php 
        if(isset($_GET['sub_cat_title'])) {
            if($start == 1) {
                ?>
                <button class="for_box_button">Previous</button>
                <?php
            } else {
                ?>
                <a href="./product.php?sub_cat_identification_id=<?php echo $pagi_sub_cat_identification_id; ?>&sub_cat_title=<?php echo $pagi_sub_cat_title; ?>&sub_cat_identification_id_two=<?php echo $pagi_sub_cat_identification_id_two; ?>&page=<?php
                if($page_count == 1) {
                   echo $page_count; 
               }else {
                   echo $page_count - 1; 
               }
                ?>&dec"><button class="for_box_button">Previous</button></a>
                <?php
            }
        ?>
        

        <button class="for_round_btn <?php 
        if($_GET['page'] == 1) { echo "active"; } 
        if(!isset($_GET['page'])) { echo "active"; }
        ?>"><?php 
         if($page_count == 1) {
            echo $page_count; 
        }else {
            echo $page_count - 1; 
        }
        ?></button>

          <?php 
          if(isset($_GET['page']) and $_GET['page'] > 1) {
              ?>
            <button class="for_round_btn <?php if($_GET['page'] > 1) { echo "active"; } ?>"><?php echo $_GET['page'] ?></button>
            <?php
          }
          ?>

        <button class="for_round_btn"><?php echo $page_count + 1; ?></button>
        <?php

        if(end($_SESSION['pagination']) == $pro_value) {
           ?>
         <button class="for_box_button">Next</button>
           <?php
       } else {
        if(count($_SESSION['pagination']) > 12) {
            ?>
            <a href="./product.php?sub_cat_identification_id=<?php echo $pagi_sub_cat_identification_id; ?>&sub_cat_title=<?php echo $pagi_sub_cat_title; ?>&sub_cat_identification_id_two=<?php echo $pagi_sub_cat_identification_id_two; ?>&page=<?php echo $page_count + 1; ?>&inc"><button class="for_box_button">Next</button></a>
             <?php
           } else {
            ?>
            <button class="for_box_button">Next</button>
              <?php
           }
          
       }

       ?>

            <?php
        } else {

            if($start == 1) {
                ?>
                <button class="for_box_button">Previous</button>
                <?php
            } else {
                if(count($_SESSION['pagination']) < 12 and $start == 1) {
                    ?>
                    <button class="for_box_button">Previous</button>
                    <?php
                } else {
                    ?>
                    <a href="./product.php?b_title=<?php echo $pagi_b_title; ?>&sub_cat_identification_id_two=<?php echo $pagi_sub_cat_identification_id_two; ?>&sub_cat_identification_id=<?php echo $pagi_sub_cat_identification_id; ?>&b_and_i_identification_id=<?php echo $pagi_b_and_i_identification_id; ?>&page=<?php
                   if($page_count == 1) {
                    echo $page_count; 
                }else {
                    echo $page_count - 1; 
                }
                     ?>&dec"><button class="for_box_button">Previous</button></a>
            
                     <?php
                }
                
            }

            ?>
            
            
        <button class="for_round_btn <?php 
        if($_GET['page'] == 1) { echo "active"; } 
        if(!isset($_GET['page'])) { echo "active"; }
        ?>"><?php 
         if($page_count == 1) {
            echo $page_count; 
        }else {
            echo $page_count - 1; 
        }
        ?></button>

         <?php 
          if(isset($_GET['page']) and $_GET['page'] > 1) {
              ?>
            <button class="for_round_btn <?php if($_GET['page'] > 1) { echo "active"; } ?>"><?php echo $_GET['page'] ?></button>
            <?php
          }
          ?>

        <button class="for_round_btn"><?php echo $page_count + 1; ?></button>

       <?php

      if(isset($_SESSION['pagination'])) {
        if(end($_SESSION['pagination']) == $pro_value) {
            ?>
          <button class="for_box_button">Next</button>
            <?php
        } else {
            if(count($_SESSION['pagination']) > 12) {
             ?>
             <a href="./product.php?b_title=<?php echo $pagi_b_title; ?>&sub_cat_identification_id_two=<?php echo $pagi_sub_cat_identification_id_two; ?>&sub_cat_identification_id=<?php echo $pagi_sub_cat_identification_id; ?>&b_and_i_identification_id=<?php echo $pagi_b_and_i_identification_id; ?>&page=<?php echo $page_count + 1; ?>&inc"><button class="for_box_button">Next</button></a>
              <?php
            } else {
             ?>
             <button class="for_box_button">Next</button>
               <?php
            }
           
        }
      } else {
          echo "";
      }
      


       ?>

            <?php
        }
        
        ?>
    </center>
</div>

<?php } else { echo "<hr>"; } ?>

     </div>
    </div>
   </center>
   <!--products section container end-->

   
   
   <?php 
    include "./footer.php";
    
    ?>

    <script src="./javascript/index.js"></script>
    <script src="./javascript/product.js"></script>

<?php
if(isset($_GET['sub_cat_title'])) {
    $end_value = 2;
} else {
    $end_value = 1;
    ?>
    <script>
        document.getElementById("brand_list_container").style.display = "none";
    </script>
    <?php
}
?>
<script>
    let end_value = <?php echo $end_value; ?>
</script>
<?php
while($dummy > $end_value) {
?>
<script>
    hide_extra_filter_box(end_value++);
</script>
<?php
echo "hi";
$end_value++;
}
?>

</body>
</html>