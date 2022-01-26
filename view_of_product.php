<?php 
include './action.php';

$product_id = $_GET['p_id'];
$product_sub_cat_id = $_GET['sub_cat_id'];



$product_sub_query = "SELECT * FROM `products_sub` WHERE `p_id`=$product_id;";
$product_sub_result = mysqli_query($con, $product_sub_query);

while($row = mysqli_fetch_assoc($product_sub_result)) {
    $product_sub_p_image = $row['p_image'];
    $product_sub_p_s_image1 = $row['p_s_image1'];
    $product_sub_p_s_image2 = $row['p_s_image2'];
    $product_sub_p_s_image3 = $row['p_s_image3'];
    $product_sub_p_avail = $row['p_avail'];
    $product_sub_p_tags1 = $row['p_tags1'];
    $product_sub_p_tags2 = $row['p_tags2'];
    $product_sub_p_tags3 = $row['p_tags3'];
    $product_sub_p_desc = $row['p_desc'];
}


$product_sub_cat_id_query = "SELECT `subs_cat_title` FROM `sub_category` WHERE `cats_id`=round($product_sub_cat_id);";
$product_sub_cat_id_result = mysqli_query($con, $product_sub_cat_id_query);
$temp = round($product_sub_cat_id);


$i = 0;
while($row = mysqli_fetch_assoc($product_sub_cat_id_result)) {

    $titles[$i] = $row['subs_cat_title'];
    $i++;
}
$x = 1;
$y = 2;
$z = 3;
$temp1 = $temp.".".$x;
$temp1 = (float)$temp1;
if($product_sub_cat_id ==  $temp1) {
    $sub_navigation_title = $titles[0];
}
$temp2 = $temp.".".$y;
$temp2 = (float)$temp2;
if($product_sub_cat_id ==  $temp2) {
    $sub_navigation_title = $titles[1];
}
$temp3 = $temp.".".$z;
$temp3 = (float)$temp3;
if($product_sub_cat_id ==  $temp3) {
    $sub_navigation_title = $titles[2];
}

$title = $sub_navigation_title . " - Shopssy";
include './header.php';

$products_details_query = "SELECT * FROM `products` WHERE `p_id`=$product_id;";
$products_details_result = mysqli_query($con, $products_details_query);
while($row = mysqli_fetch_assoc($products_details_result)) {
    
$products_details_p_title = $row['p_title'];
$products_details_p_rating = $row['p_star_rat'];
$products_details_p_o_price = $row['p_o_price'];
$products_details_p_a_price = $row['p_a_price'];
}



?>

    <!--sub navigation container start-->
    <div class="sub_navigation_container">
<center>
    <div class="sub_navigation_inner_container">
        <span><a href="./index.php">Home</a></span>
        <span><i class="fas fa-arrow-right" style="color: #666666;font-size: 12px;"></i></span>
        <span><a href="#"><?php echo $sub_navigation_title; ?></a></span>
    </div>
</center>
    </div>
    <!--sub navigation container end-->

    <!--product image and cost description container start-->
    <center>
        <div class="product_image_and_cost_description_container">
            <div class="PIandC_image_container">
                <div class="PIandC_image_container_big_image_container">
                    <img src="./images/<?php echo $product_sub_p_image; ?>" alt="mobile image" class="big_image_container_image">
                </div>
                <div class="PIandC_image_container_small_images_container">
                    <div>
                        <img src="./images/<?php echo $product_sub_p_image; ?>" alt="mobile image" class="small_images_container_images small_images_container_images1 active" onclick="change_big_image('<?php echo $product_sub_p_image; ?>', 1)">
                    </div>
                   <div>
                    <img src="./images/<?php echo $product_sub_p_s_image1; ?>" alt="mobile image" class="small_images_container_images small_images_container_images2" onclick="change_big_image('<?php echo $product_sub_p_s_image1; ?>', 2)">
                   </div>
                    <div>
                        <img src="./images/<?php echo $product_sub_p_s_image2; ?>" alt="tab image" class="small_images_container_images small_images_container_images3" onclick="change_big_image('<?php echo $product_sub_p_s_image2; ?>', 3)">
                    </div>
                    <div>
                        <img src="./images/<?php echo $product_sub_p_s_image3; ?>" alt="tab image" class="small_images_container_images small_images_container_images4" onclick="change_big_image('<?php echo $product_sub_p_s_image3; ?>', 4)">
                    </div>
                </div>
            </div>
            <div class="PIandC_cost_container">
                <div class="PIandC_cost_container_name_and_review_container">
                    <h2><?php echo $products_details_p_title; ?></h2>
                    <span>
                    <?php
                        switch($products_details_p_rating) {
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
                    <p>No Reviews</p>
                </span>
                </div>
                <div class="PIandC_cost_container_details_container">
                    <table>
                        <tr>
                            <th>AVAILABLE:</th>
                            <td id="in_stock"><?php echo $product_sub_p_avail; ?> <i class="fas fa-check-square"></i></td>
                        </tr>
                        <tr>
                            <th>CATEGOTIES:</th>
                            <td>
                                <?php 
                                $j=0;
                                $title_count = count($titles);
                                while($title_count > $j) {
                                    echo '<a href="#">'.$titles[$j].'</a>,';
                                    $j++;
                                }
                                
                                ?>
                            
                            
                            ...</td>
                        </tr>
                        <tr>
                            <th>TAGS:</th>
                            <td><a href="#"><?php echo $product_sub_p_tags1; ?></a>, <a href="#"><?php echo $product_sub_p_tags2; ?></a>, <a href="#"><?php echo $product_sub_p_tags3; ?></a></td>
                        </tr>
                    </table>
                    <p>
                    <?php
                    if(strlen($product_sub_p_desc) > 150) {
                        echo substr($product_sub_p_desc, 0, 175)." ...";
                    } else {
                        echo $product_sub_p_desc;
                    }
                    ?>
                    </p>
                </div>
              <div class="PIandC_cost_container_details_container_rupee_div">
                <span>
                    <span>&#8377;<?php echo $products_details_p_a_price; ?>.00</span>
                    <del>&#8377;<?php echo $products_details_p_o_price; ?>.00</del>
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
                <p><?php   echo $product_sub_p_desc; ?></p>
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