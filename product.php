<?php 
$title = "Mobiles - Shopssy";
include './header.php';
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
        <span><a href="./index.html">Home</a></span>
        <span><i class="fas fa-arrow-right" style="color: #666666;font-size: 12px;"></i></span>
        <span><a href="./all_categories.html">All Categories</a></span>
        <span><i class="fas fa-arrow-right" style="color: #666666;font-size: 12px;"></i></span>
        <span><a href="#">Mobiles</a></span>
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
                            <span>BRANDS</span>
                        </div>
                        <div class="arrow_div">
                            <i class="fa fa-angle-down" id="arrow_of_product1"></i>
                        </div>
                    </div>
                    <div class="brand_list_container" id="brand_list_container">
                        <div>
                            <input type="checkbox" id="Samsung" onchange="document.getElementById('fliter_form').submit()"> <label for="Samsung">Samsung</label>
                        </div>
                        <div>
                            <input type="checkbox" id="Realme" onchange="document.getElementById('fliter_form').submit()"> <label for="Realme">Realme</label>
                        </div>
                        <div>
                            <input type="checkbox" id="Poco" onchange="document.getElementById('fliter_form').submit()"> <label for="Poco">Poco</label>
                        </div>
                        <div>
                            <input type="checkbox" id="Redmi" onchange="document.getElementById('fliter_form').submit()"> <label for="Redmi">Redmi</label>
                        </div>
                        <div>
                            <input type="checkbox" id="Apple" onchange="document.getElementById('fliter_form').submit()"> <label for="Apple">Apple</label>
                        </div>
                        <div>
                            <input type="checkbox" id="Infinix" onchange="document.getElementById('fliter_form').submit()"> <label for="Infinix">Infinix</label>
                        </div>
                        <div>
                            <input type="checkbox" id="OnePlus" onchange="document.getElementById('fliter_form').submit()"> <label for="OnePlus">OnePlus</label>
                        </div>
                        <div>
                            <input type="checkbox" id="Oppo" onchange="document.getElementById('fliter_form').submit()"> <label for="Oppo">Oppo</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="product_section_sub_container_customer_rating_container">
                <div>
                    <div class="rating_container">
                        <div class="text_div">
                            <span>CUSTOMER RATINGS</span>
                        </div>
                        <div>
                            <i class="fa fa-angle-down" id="arrow_of_product2"></i>
                        </div>
                    </div>
                    <div class="rating_list_container" id="rating_list_container">
                        <div>
                            <input type="checkbox" id="4star" onchange="document.getElementById('fliter_form').submit()"> <label for="4star">4 Star & Above</label>
                        </div>
                        <div>
                            <input type="checkbox" id="3star" onchange="document.getElementById('fliter_form').submit()"> <label for="3star">3 Star & Above</label>
                        </div>
                        <div>
                            <input type="checkbox" id="2star" onchange="document.getElementById('fliter_form').submit()"> <label for="2star">2 Star & Above</label>
                        </div>
                        <div>
                            <input type="checkbox" id="1star" onchange="document.getElementById('fliter_form').submit()"> <label for="1star">1 Star & Above</label>
                        </div>
                      
                    </div>
                </div>
            </div>

            <div class="product_section_sub_container_colors_container">
                <div>
                    <div class="colors_container">
                        <div class="text_div">
                            <span>COLORS</span>
                        </div>
                        <div>
                            <i class="fa fa-angle-down" id="arrow_of_product3"></i>
                        </div>
                    </div>
                    <div class="color_list_container" id="color_list_container">
                        <div>
                            <input type="checkbox" id="Red" onchange="document.getElementById('fliter_form').submit()"> <label for="Red">Red</label>
                        </div>
                        <div>
                            <input type="checkbox" id="Green" onchange="document.getElementById('fliter_form').submit()"> <label for="Green">Green</label>
                        </div>
                        <div>
                            <input type="checkbox" id="Blue" onchange="document.getElementById('fliter_form').submit()"> <label for="Blue">Blue</label>
                        </div>
                        <div>
                            <input type="checkbox" id="Yellow" onchange="document.getElementById('fliter_form').submit()"> <label for="Yellow">Yellow</label>
                        </div>
                      
                    </div>
                </div>
            </div>

            <div class="product_section_sub_container_size_container">
                <div>
                    <div class="size_container">
                        <div class="text_div">
                            <span>SIZE</span>
                        </div>
                        <div>
                            <i class="fa fa-angle-down" id="arrow_of_product6"></i>
                        </div>
                    </div>
                    <div class="size_list_container" id="size_list_container">
                        <div>
                            <input type="checkbox" id="Small" onchange="document.getElementById('fliter_form').submit()"> <label for="Small">Small</label>
                        </div>
                        <div>
                            <input type="checkbox" id="Medium" onchange="document.getElementById('fliter_form').submit()"> <label for="Medium">Medium</label>
                        </div>
                        <div>
                            <input type="checkbox" id="Large" onchange="document.getElementById('fliter_form').submit()"> <label for="Large">Large</label>
                        </div>
                        
                      
                    </div>
                </div>
            </div>

            <div class="product_section_sub_container_price_container">
                <div>
                    <div class="price_container">
                        <div class="text_div">
                            <span>PRICE</span>
                        </div>
                        <div>
                            <i class="fa fa-angle-down" id="arrow_of_product4"></i>
                        </div>
                    </div>
                    <div class="price_bar_container" id="price_bar_container">
                        <label for="price_range">1</label>
                        <input type="range" min="1" max="10000" id="price_range"  onchange="document.getElementById('fliter_form').submit()">
                        <label for="price_range">10000</label>
                    </div>
                </div>
            </div>

           </form>
        </div>

        <div class="product_section_sub_container_2">
           <div class="product_section_inner_container">
               <div class="product_section_inner_container_1">
                   <h1>Mobiles</h1>
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
           <div class="category_products_container_products_inner_divs">
            <img src="./images/mob_image_2.jpg" alt="products images">
           <a href="./view_of_product.html">
            <div class="category_products_container_products_inner_text_divs">
                <div>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                </div>
                <div>
                    <h4>Lorem ipsum dolor sit.</h4>
                </div>
                <div>
                    <h2>$450.50 <del>$600.50</del></h2>
                </div>
            </div>
           </a>
            <div class="category_products_container_products_inner_btn_divs">
                <button title="Add To Cart"><i class="fas fa-cart-plus" ></i></button>
                <button title="Add To Wishlist"><i class="far fa-heart"></i></button>
                <button title="Quick View"><i class="fas fa-search"></i></button>
            </div>
        </div>
        <div class="category_products_container_products_inner_divs">
            <img src="./images/tab_image_2.jpg" alt="products images">
            <a href="#">
                <div class="category_products_container_products_inner_text_divs">
                    <div>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                    </div>
                    <div>
                        <h4>Lorem ipsum dolor sit.</h4>
                    </div>
                    <div>
                        <h2>$450.50 <del>$600.50</del></h2>
                    </div>
                </div>
            </a>
            <div class="category_products_container_products_inner_btn_divs">
                <button title="Add To Cart"><i class="fas fa-cart-plus" ></i></button>
                <button title="Add To Wishlist"><i class="far fa-heart"></i></button>
                <button title="Quick View"><i class="fas fa-search"></i></button>
            </div>
        </div>
        <div class="category_products_container_products_inner_divs">
                <img src="./images/drone_image_1.jpg" alt="products images">
          <a href="#">
            <div class="category_products_container_products_inner_text_divs">
                <div>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                </div>
                <div>
                    <h4>Lorem ipsum dolor sit.</h4>
                </div>
                <div>
                    <h2>$450.50 <del>$600.50</del></h2>
                </div>
            </div>
          </a>
            <div class="category_products_container_products_inner_btn_divs">
                <button title="Add To Cart"><i class="fas fa-cart-plus" ></i></button>
                <button title="Add To Wishlist"><i class="far fa-heart"></i></button>
                <button title="Quick View"><i class="fas fa-search"></i></button>
            </div>
        </div>
        <div class="category_products_container_products_inner_divs">
                <img src="./images/smart_watch_image_2.jpg" alt="products images">
            <a href="#">
                <div class="category_products_container_products_inner_text_divs">
                    <div>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                    </div>
                    <div>
                        <h4>Lorem ipsum dolor sit.</h4>
                    </div>
                    <div>
                        <h2>$450.50 <del>$600.50</del></h2>
                    </div>
                </div>
            </a>
            <div class="category_products_container_products_inner_btn_divs">
                <button title="Add To Cart"><i class="fas fa-cart-plus" ></i></button>
                <button title="Add To Wishlist"><i class="far fa-heart"></i></button>
                <button title="Quick View"><i class="fas fa-search"></i></button>
            </div>
        </div>
        <div class="category_products_container_products_inner_divs">
                <img src="./images/cam_image_1.jpg" alt="products images">
            <a href="#">
                <div class="category_products_container_products_inner_text_divs">
                    <div>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                    </div>
                    <div>
                        <h4>Lorem ipsum dolor sit.</h4>
                    </div>
                    <div>
                        <h2>$450.50 <del>$600.50</del></h2>
                    </div>
                </div>
            </a>
            <div class="category_products_container_products_inner_btn_divs">
                <button title="Add To Cart"><i class="fas fa-cart-plus" ></i></button>
                <button title="Add To Wishlist"><i class="far fa-heart"></i></button>
                <button title="Quick View"><i class="fas fa-search"></i></button>
            </div>
        </div>
        <div class="category_products_container_products_inner_divs">
                <img src="./images/speaker1_image_1.jpg" alt="products images">
            <a href="#">
                <div class="category_products_container_products_inner_text_divs">
                    <div>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                    </div>
                    <div>
                        <h4>Lorem ipsum dolor sit.</h4>
                    </div>
                    <div>
                        <h2>$450.50 <del>$600.50</del></h2>
                    </div>
                </div>
            </a>
            <div class="category_products_container_products_inner_btn_divs">
                <button title="Add To Cart"><i class="fas fa-cart-plus" ></i></button>
                <button title="Add To Wishlist"><i class="far fa-heart"></i></button>
                <button title="Quick View"><i class="fas fa-search"></i></button>
            </div>
        </div>
        <div class="category_products_container_products_inner_divs">
                <img src="./images/speaker_case_image1.jpg" alt="products images">
            <a href="#">
                <div class="category_products_container_products_inner_text_divs">
                    <div>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                    </div>
                    <div>
                        <h4>Lorem ipsum dolor sit.</h4>
                    </div>
                    <div>
                        <h2>$450.50 <del>$600.50</del></h2>
                    </div>
                </div>
            </a>
            <div class="category_products_container_products_inner_btn_divs">
                <button title="Add To Cart"><i class="fas fa-cart-plus" ></i></button>
                <button title="Add To Wishlist"><i class="far fa-heart"></i></button>
                <button title="Quick View"><i class="fas fa-search"></i></button>
            </div>
        </div>
        <div class="category_products_container_products_inner_divs">
                <img src="./images/suround_speak_image_1.jpg" alt="products images">
            <a href="#">
                <div class="category_products_container_products_inner_text_divs">
                    <div>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                    </div>
                    <div>
                        <h4>Lorem ipsum dolor sit.</h4>
                    </div>
                    <div>
                        <h2>$450.50 <del>$600.50</del></h2>
                    </div>
                </div>
            </a>
            <div class="category_products_container_products_inner_btn_divs">
                <button title="Add To Cart"><i class="fas fa-cart-plus" ></i></button>
                <button title="Add To Wishlist"><i class="far fa-heart"></i></button>
                <button title="Quick View"><i class="fas fa-search"></i></button>
            </div>
        </div>

        <div class="category_products_container_products_inner_divs">
            <img src="./images/cam_image_1.jpg" alt="products images">
        <a href="#">
            <div class="category_products_container_products_inner_text_divs">
                <div>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                </div>
                <div>
                    <h4>Lorem ipsum dolor sit.</h4>
                </div>
                <div>
                    <h2>$450.50 <del>$600.50</del></h2>
                </div>
            </div>
        </a>
        <div class="category_products_container_products_inner_btn_divs">
            <button title="Add To Cart"><i class="fas fa-cart-plus" ></i></button>
            <button title="Add To Wishlist"><i class="far fa-heart"></i></button>
            <button title="Quick View"><i class="fas fa-search"></i></button>
        </div>
    </div>
    <div class="category_products_container_products_inner_divs">
            <img src="./images/speaker1_image_1.jpg" alt="products images">
        <a href="#">
            <div class="category_products_container_products_inner_text_divs">
                <div>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                </div>
                <div>
                    <h4>Lorem ipsum dolor sit.</h4>
                </div>
                <div>
                    <h2>$450.50 <del>$600.50</del></h2>
                </div>
            </div>
        </a>
        <div class="category_products_container_products_inner_btn_divs">
            <button title="Add To Cart"><i class="fas fa-cart-plus" ></i></button>
            <button title="Add To Wishlist"><i class="far fa-heart"></i></button>
            <button title="Quick View"><i class="fas fa-search"></i></button>
        </div>
    </div>
    <div class="category_products_container_products_inner_divs">
            <img src="./images/speaker_case_image1.jpg" alt="products images">
        <a href="#">
            <div class="category_products_container_products_inner_text_divs">
                <div>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                </div>
                <div>
                    <h4>Lorem ipsum dolor sit.</h4>
                </div>
                <div>
                    <h2>$450.50 <del>$600.50</del></h2>
                </div>
            </div>
        </a>
        <div class="category_products_container_products_inner_btn_divs">
            <button title="Add To Cart"><i class="fas fa-cart-plus" ></i></button>
            <button title="Add To Wishlist"><i class="far fa-heart"></i></button>
            <button title="Quick View"><i class="fas fa-search"></i></button>
        </div>
    </div>
    <div class="category_products_container_products_inner_divs">
            <img src="./images/suround_speak_image_1.jpg" alt="products images">
        <a href="#">
            <div class="category_products_container_products_inner_text_divs">
                <div>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                </div>
                <div>
                    <h4>Lorem ipsum dolor sit.</h4>
                </div>
                <div>
                    <h2>$450.50 <del>$600.50</del></h2>
                </div>
            </div>
        </a>
        <div class="category_products_container_products_inner_btn_divs">
            <button title="Add To Cart"><i class="fas fa-cart-plus" ></i></button>
            <button title="Add To Wishlist"><i class="far fa-heart"></i></button>
            <button title="Quick View"><i class="fas fa-search"></i></button>
        </div>
    </div>
    
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