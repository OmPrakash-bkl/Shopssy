<?php 
include './action.php';
$title = "RC Drone - Shoppy";
include './header.php';
?>

    <!--sub navigation container start-->
    <div class="sub_navigation_container">
<center>
    <div class="sub_navigation_inner_container">
        <span><a href="./index.php">Home</a></span>
        <span><i class="fas fa-arrow-right" style="color: #666666;font-size: 12px;"></i></span>
        <span><a href="#">Lorem ipsum dolor sit</a></span>
    </div>
</center>
    </div>
    <!--sub navigation container end-->

    <!--product image and cost description container start-->
    <center>
        <div class="product_image_and_cost_description_container">
            <div class="PIandC_image_container">
                <div class="PIandC_image_container_big_image_container">
                    <img src="./images/product_mobile1_image_1.jpg" alt="mobile image" class="big_image_container_image">
                </div>
                <div class="PIandC_image_container_small_images_container">
                    <div>
                        <img src="./images/product_mobile1_image_1.jpg" alt="mobile image" class="small_images_container_images small_images_container_images1 active" onclick="change_big_image(1)">
                    </div>
                   <div>
                    <img src="./images/product_mobile1_image_2.jpg" alt="mobile image" class="small_images_container_images small_images_container_images2" onclick="change_big_image(2)">
                   </div>
                    <div>
                        <img src="./images/product_mobile1_image_3.jpg" alt="tab image" class="small_images_container_images small_images_container_images3" onclick="change_big_image(3)">
                    </div>
                    <div>
                        <img src="./images/product_mobile1_image_4.jpg" alt="tab image" class="small_images_container_images small_images_container_images4" onclick="change_big_image(4)">
                    </div>
                </div>
            </div>
            <div class="PIandC_cost_container">
                <div class="PIandC_cost_container_name_and_review_container">
                    <h2>Lorem Ipsum Dolor Sit Amet</h2>
                    <span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <p>No Reviews</p>
                </span>
                </div>
                <div class="PIandC_cost_container_details_container">
                    <table>
                        <tr>
                            <th>AVAILABLE:</th>
                            <td id="in_stock">In Stock <i class="fas fa-check-square"></i></td>
                        </tr>
                        <tr>
                            <th>CATEGOTIES:</th>
                            <td><a href="#">New Arrivals</a>, <a href="#">Trending</a></td>
                        </tr>
                        <tr>
                            <th>TAGS:</th>
                            <td><a href="#">Hot Trend</a>, <a href="#">Samsung</a>, <a href="#">Redmi</a>, <a href="#">Apple</a></td>
                        </tr>
                    </table>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis,...</p>
                </div>
              <div class="PIandC_cost_container_details_container_rupee_div">
                <span>
                    <span>&#8377;382.43</span>
                    <del>&#8377;480.70</del>
              </span>
              </div>
              <div class="incre_decre_container">
                <h6>QUANTITY:</h6>
                <div>
                    <button class="decre">-</button>
                    <span class="counter">1</span>
                    <button class="incre">+</button>
                </div>
              </div>
             <div class="PIandC_cost_container_btn_div1">
                <button class="btn1">ADD TO CART</button>
                <a href="#"><button class="btn2">BUY IT NOW</button></a>
                <button class="btn3"><i class="fas fa-heart"></i></button>
             </div>
             <div class="PIandC_cost_container_btn_div2">
                 <a href="#"><button class="btn1" title="Share on Facebook"><i class="fab fa-facebook-f"></i> SHARE</button></a>
                <a href="#"> <button class="btn2" title="Tweet on Tweeter"><i class="fab fa-twitter"></i> TWEET</button></a>
                 <a href="#"><button class="btn3" title="Pin on Pinterest"><i class="fab fa-pinterest"></i> PIN IT</button></a>
             </div>
             <p style="width: 400px;visibility: hidden;" class="dammi_txt">Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae earum minus nobis natus, accmollitia quibusdam doloremque, tempora aliquam deleniti ne, vitae offictaRepudiandae expedita nesciunt recusandae?</p>
            </div>
        </div>
    </center>
    <!--product image and cost description container end-->

    <!--product description container start-->
    <center>
        <div class="product_desc_container">
            <div class="heading">
                <h1>Product Description</h1>
            </div>
            <div class="content">
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Doloremque sed nulla laboriosam, recusandae consequuntur molestias eius praesentium esse. Est eum necessitatibus, vero explicabo cumque totam blanditiis iusto quidem, unde quis eaque temporibus qui, esse quod provident voluptas? Odio explicabo cum hic reiciendis rem impedit sed dolorem, molestias non animi, tenetur accusamus. Tempora ipsa nesciunt consequatur, incidunt nulla necessitatibus laborum obcaecati! Illo praesentium similique amet quas. Neque qui culpa ab repellendus deleniti adipisci cumque, vero quasi fugit ex inventore magni suscipit laborum voluptatibus doloribus at explicabo fugiat soluta perferendis delectus! Deleniti rem architecto, assumenda amet laborum magni fugiat cumque quidem laboriosam?</p>
            </div>
        </div>
    </center>
    <!--product description container end-->

    <!--specifications container start-->
    <center>
        <div class="spec_container">
            <div class="heading">
                <h1>Specifications</h1>
            </div>
            <div class="content">
                <table>
                    <tr>
                        <th>In The Box:</th>
                        <td>Handset, Adapter (9V/2A), USB Type C Cable, SIM Card Tool, Screen Protect Film, Important Info Booklet with Warranty Card, Quick Guide</td>
                    </tr>
                    <tr>
                        <th>Model Number:</th>
                        <td>RMX3430</td>
                    </tr>
                    <tr>
                        <th>Color:</th>
                        <td>Oxygen Blue</td>
                    </tr>
                    <tr>
                        <th>Warranty:</th>
                        <td>1 Year Warranty for Mobile and 6 Months for Accessories</td>
                    </tr>
                </table>
            </div>
        </div>
    </center>
    <!--specifications container end-->

<!--review container start-->
<center>
    <div class="review_container">
        <div class="heading">
        <h1>Reviews</h1>
        <button class="review_btn">Write a Review</button>
        </div>
        <div class="content">
            <div class="review_form_container">
                <form action="">
                    <label for="">Name</label> <br>
                    <input type="text" placeholder="Enter your name" class="inp1"> <br>
                    <label for="">Rating</label> <br>
                    <label for="">1</label>
                    <input type="range" min="1" max="5" class="inp3">
                    <label for="">5</label> <br>
                    <label for="">Body of Review</label> <br>
                    <textarea placeholder="write a comments here" class="inp2"></textarea> <br>
                   <center>
                    <button type="submit">SUBMIT REVIEW</button>
                   </center>
                </form>
            </div>
            <div class="customer_review_container">
                    <h3>yash vardhan</h3>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Beatae atque, quod fuga dolor ipsam voluptatum, omnis inventore ipsum alias, itaque assumenda praesentium! Ratione quia debitis deserunt doloribus aliquam harum optio amet molestiae, officia ipsam deleniti quam distinctio ab impedit, repellendus omnis dolor recusandae quibusdam quas assumenda natus nostrum! Enim odio deserunt rerum nihil autem? Nulla rerum possimus adipisci eligendi? Porro architecto ipsam, natus quaerat excepturi repellendus. Est, quia alias nostrum numquam eaque saepe ipsam aliquid fugit esse quasi odio eum!</p>
                </div>
                <div class="customer_review_container">
                    <h3>Nilesh Pethkar</h3>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Beatae atque, quod fuga dolor ipsam voluptatum, omnis inventore ipsum alias, itaque assumenda praesentium! Ratione quia debitis deserunt doloribus aliquam harum optio amet molestiae, officia ipsam deleniti quam distinctio ab impedit, repellendus omnis dolor recusandae quibusdam quas assumenda natus nostrum! Enim odio deserunt rerum nihil autem? Nulla rerum possimus adipisci eligendi? Porro architecto ipsam, natus quaerat excepturi repellendus. Est, quia alias nostrum numquam eaque saepe ipsam aliquid fugit esse quasi odio eum!</p>
                </div>
                <div class="customer_review_container">
                    <h3>Saikat Thakurta</h3>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Beatae atque, quod fuga dolor ipsam voluptatum, omnis inventore ipsum alias, itaque assumenda praesentium! Ratione quia debitis deserunt doloribus aliquam harum optio amet molestiae, officia ipsam deleniti quam distinctio ab impedit, repellendus omnis dolor recusandae quibusdam quas assumenda natus nostrum! Enim odio deserunt rerum nihil autem? Nulla rerum possimus adipisci eligendi? Porro architecto ipsam, natus quaerat excepturi repellendus. Est, quia alias nostrum numquam eaque saepe ipsam aliquid fugit esse quasi odio eum!</p>
                </div>
                <div class="customer_review_container">
                    <h3>Parmeshwar Munde</h3>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Beatae atque, quod fuga dolor ipsam voluptatum, omnis inventore ipsum alias, itaque assumenda praesentium! Ratione quia debitis deserunt doloribus aliquam harum optio amet molestiae, officia ipsam deleniti quam distinctio ab impedit, repellendus omnis dolor recusandae quibusdam quas assumenda natus nostrum! Enim odio deserunt rerum nihil autem? Nulla rerum possimus adipisci eligendi? Porro architecto ipsam, natus quaerat excepturi repellendus. Est, quia alias nostrum numquam eaque saepe ipsam aliquid fugit esse quasi odio eum!</p>
                </div>
        </div>
    </div>
</center>
<!--review container end-->

<!--questions and answers container start-->
<center>
    <div class="ques_and_ans_container">
        <div class="heading">
            <h1>Questions and Answers</h1>
            <div class="search_container">
                <form action="">
                <input type="search" placeholder="Have a Question? Search for Answers">
                <button type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>
        </div>
        <div class="content">
            <div>
                <h5 class="h5tag">Q: Which type Charging Pin Type C ya normal?</h5>
                <span><h5 class="h5tag1">A: </h5>Type C</span> <br>
                <span>Rama Krishna</span> <br>
                <span class="thumbs"><button><i class="fas fa-thumbs-up"></i></button> 400</span>
                <span class="thumbs"><button><i class="fas fa-thumbs-down"></i></button> 100</span>
            </div>
            <div>
                <h5 class="h5tag">Q: What is the nice colour blue or oxygen green?</h5>
                <span><h5 class="h5tag1">A: </h5>Blue</span> <br>
                <span>Anonymous</span> <br>
                <span class="thumbs"><button><i class="fas fa-thumbs-up"></i></button> 400</span>
                <span class="thumbs"><button><i class="fas fa-thumbs-down"></i></button> 100</span>
            </div>
            <div>
                <h5 class="h5tag">Q: WiFi calling available in this phone?</h5>
                <span><h5 class="h5tag1">A: </h5>yes</span> <br>
                <span>Dev Bhardwaj</span> <br>
                <span class="thumbs"><button><i class="fas fa-thumbs-up"></i></button> 400</span>
                <span class="thumbs"><button><i class="fas fa-thumbs-down"></i></button> 100</span>
            </div>
            <div>
                <h5 class="h5tag">Q: WiFi calling available in this phone?</h5>
                <span><h5 class="h5tag1">A: </h5>Yes</span> <br>
                <span>Krishna Srinivas</span> <br>
                <span class="thumbs"><button><i class="fas fa-thumbs-up"></i></button> 400</span>
                <span class="thumbs"><button><i class="fas fa-thumbs-down"></i></button> 100</span>
            </div>
        </div>
    </div>
</center>
<!--questions and answers container end-->

<!--related products container start-->
<center>
    <div class="products_container">
        <div class="products_container_button_div">
            <div class="products_container_button_inner_div_1">
            <h2>RELATED PRODUCT</h2>
            </div>
            <div class="products_container_button_inner_div_2">
                <button><i class="fa fa-angle-left"></i></button>
                <button><i class="fa fa-angle-right"></i></button>
            </div>
        </div>
        
        <div class="products_container_products_div">
            <div class="products_container_products_inner_divs">
                <img src="./images/mob_image_2.jpg" alt="products images">
               <a href="./view_of_product.html">
                <div class="products_container_products_inner_text_divs">
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
                <div class="products_container_products_inner_btn_divs">
                    <button title="Add To Cart"><i class="fas fa-cart-plus" ></i></button>
                    <button title="Add To Wishlist"><i class="far fa-heart"></i></button>
                    <button title="Quick View"><i class="fas fa-search"></i></button>
                </div>
            </div>
            <div class="products_container_products_inner_divs">
                <img src="./images/tab_image_2.jpg" alt="products images">
                <a href="#">
                    <div class="products_container_products_inner_text_divs">
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
                <div class="products_container_products_inner_btn_divs">
                    <button title="Add To Cart"><i class="fas fa-cart-plus" ></i></button>
                    <button title="Add To Wishlist"><i class="far fa-heart"></i></button>
                    <button title="Quick View"><i class="fas fa-search"></i></button>
                </div>
            </div>
            <div class="products_container_products_inner_divs">
                    <img src="./images/drone_image_1.jpg" alt="products images">
              <a href="#">
                <div class="products_container_products_inner_text_divs">
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
                <div class="products_container_products_inner_btn_divs">
                    <button title="Add To Cart"><i class="fas fa-cart-plus" ></i></button>
                    <button title="Add To Wishlist"><i class="far fa-heart"></i></button>
                    <button title="Quick View"><i class="fas fa-search"></i></button>
                </div>
            </div>
            <div class="products_container_products_inner_divs">
                    <img src="./images/smart_watch_image_2.jpg" alt="products images">
                <a href="#">
                    <div class="products_container_products_inner_text_divs">
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
                <div class="products_container_products_inner_btn_divs">
                    <button title="Add To Cart"><i class="fas fa-cart-plus" ></i></button>
                    <button title="Add To Wishlist"><i class="far fa-heart"></i></button>
                    <button title="Quick View"><i class="fas fa-search"></i></button>
                </div>
            </div>
           
           
        </div>
    </div>
   </center>
<!--related products container end-->

<?php 
    include "./footer.php";
    ?>

    
<script src="./javascript/index.js"></script>
    <script src="./javascript/view_of_product.js"></script>
</body>
</html>