<?php 
include './action.php';
$title = "Mobiles - Shopssy";
include './header.php';

if(isset($_GET['sub_cat_identification_id'])) {
    $product_sub_cat_identification_id = $_GET['sub_cat_identification_id'];
    $product_sub_cat_title = $_GET['sub_cat_title'];
  
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
        <span><a href="#"><?php echo $product_sub_cat_title; ?></a></span>
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
           <form action="" id="fliter_form">
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
                        
                        $product_cat_query = "SELECT `b_title` FROM `brand_and_item_list` WHERE `subs_cat_identification_id`=$product_sub_cat_identification_id;";
                        $product_cat_result = mysqli_query($con, $product_cat_query);

                        while($row = mysqli_fetch_assoc($product_cat_result)) {

                            $pro_cat_titles = $row['b_title'];
                        
                        ?>
                        <div>
                            <input type="checkbox" id="<?php echo $pro_cat_titles; ?>" onchange="document.getElementById('fliter_form').submit()"> <label for="<?php echo $pro_cat_titles; ?>"><?php echo $pro_cat_titles; ?></label>
                        </div>
                       
                      <?php } ?>
                        
                    </div>
                </div>
            </div>

            <?php 
   $temp_query = "SELECT * FROM `filter` WHERE `subs_cat_identification_id`=$product_sub_cat_identification_id+99.9;";
   $temp_result = mysqli_query($con, $temp_query);
   
   while($row = mysqli_fetch_assoc($temp_result)) {
       $temp_title = $row['filter_title'];
       $temp_id = $row['filter_id'];
   ?>

            <div class="product_section_sub_container_customer_rating_container">
                <div>
                    <div class="rating_container">
                        <div class="text_div">
                            <span><?php echo $temp_title; ?></span>
                        </div>
                        <div>
                            <i class="fa fa-angle-down" id="arrow_of_product2"></i>
                        </div>
                    </div>
                    <div class="rating_list_container" id="rating_list_container">

                    <?php 
           $temp_sub_query = "SELECT * FROM `filter_sub` WHERE `filters_id`=$temp_id;";
           $temp_sub_result = mysqli_query($con, $temp_sub_query);
           while($row1 = mysqli_fetch_assoc($temp_sub_result)) {
               $temp_sub_filter_datas = $row1['filter_datas'];
          
           ?>
           
         <div>
           <input type="checkbox" id="<?php echo $temp_sub_filter_datas; ?>" onchange="document.getElementById('fliter_form').submit()"> <label for="<?php echo $temp_sub_filter_datas; ?>"><?php echo $temp_sub_filter_datas; ?></label>
        </div>

         <?php } ?>

                    </div>
                </div>
            </div>

            <?php } ?>

           </form>
        </div>

        <div class="product_section_sub_container_2">
           <div class="product_section_inner_container">
               <div class="product_section_inner_container_1">
                   <h1><?php echo $product_sub_cat_title; ?></h1>
               </div>
               <div class="product_section_inner_container_2" id="product_section_inner_container_2">
                  <div class="select_container">
                      <button>SORT BY <i class="fa fa-angle-down" id="arrow_of_product5"></i></button>
                      <div class="select_inner_container">
                          <span><a href="#">Alphabetically, A-Z</a></span> <br>
                          <span><a href="#">Alphabetically, Z-A</a></span> <br>
                          <span><a href="#">Price, low to high</a></span> <br>
                          <span><a href="#">Price, high to low</a></span> <br>
                      </div>
                  </div>
               </div>
           </div>

           <center>

           <?php 
           
           $category_products_query = "SELECT * FROM `products` WHERE `subs_cat_identification_id`=$product_sub_cat_identification_id;";
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
                        if(strlen($category_products_p_title) > 30) {
                            echo substr($category_products_p_title, 0, 35)." ...";
                        } else {
                            echo $category_products_p_title;
                        }
                         ?></h4>
                </div>
                <div>
                    <h2>&#8377;<?php echo $category_products_p_a_price; ?> <del>&#8377;<?php echo $category_products_p_o_price; ?></del></h2>
                </div>
            </div>
           </a>
            <div class="category_products_container_products_inner_btn_divs">
                <button title="Add To Cart"><i class="fas fa-cart-plus" ></i></button>
                <button title="Add To Wishlist"><i class="far fa-heart"></i></button>
                <button title="Quick View"><i class="fas fa-search"></i></button>
            </div>
        </div>
        
        <?php } ?>
     
</center>

<div class="next_page_container">
    <center>
        <a href="#"><button>Previous</button></a>
        <a href="#"><button class="for_round_btn active">1</button></a>
        <a href="#"><button class="for_round_btn">2</button></a>
        <a href="#"><button>Next</button></a>
    </center>
</div>

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