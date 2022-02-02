<?php 
session_start();
$_SESSION['user_login_id'] = "ram@gmail.comShopssy";
$_SESSION['user_login_email'] = "ram@gmail.com";
$_SESSION['user_id'] = 4;

include './action.php';

if(isset($_GET['p_id'])) {
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


}



$title = $sub_navigation_title . " - Shopssy";
include './header.php';

$products_details_query = "SELECT * FROM `products` WHERE `p_id`=$product_id;";
$products_details_result = mysqli_query($con, $products_details_query);
while($row = mysqli_fetch_assoc($products_details_result)) {
$products_details_b_and_i_identification_id = $row['b_and_i_identification_id'];
$products_details_p_title = $row['p_title'];
$products_details_p_rating = $row['p_star_rat'];
$products_details_p_o_price = $row['p_o_price'];
$products_details_p_a_price = $row['p_a_price'];
}

if(isset($_GET['review_sub_btn'])) {

    $pro_id = $_GET['p_id'];
    $p_cus_name = $_GET['p_customer_name'];
    $p_cus_rating = $_GET['p_rating'];
    $p_cus_description = $_GET['p_desc'];
    $nameval = "/^[a-zA-Z ]+$/";
    
    if(preg_match($nameval, $p_cus_name)) {
        $pro_review_query = "INSERT INTO `reviews` (`p_id`, `p_customer_name`, `p_rating`, `p_desc`) VALUES ('$pro_id', '$p_cus_name', '$p_cus_rating', '$p_cus_description');";
        mysqli_query($con, $pro_review_query);
    }
}

if(isset($_GET['review_id'])) {
    $p_review_id = $_GET['review_id'];
    if(isset($_GET['p_like'])) {
        $p_like_count = $_GET['p_like'];
        $review_like_and_dislike_alter_query = "UPDATE `reviews` SET `p_like` = $p_like_count WHERE `review_id` = $p_review_id;";
        mysqli_query($con, $review_like_and_dislike_alter_query);
    } else {
        $p_dislike_count = $_GET['p_dislike'];
        $review_like_and_dislike_alter_query = "UPDATE `reviews` SET `p_dislike` = $p_dislike_count WHERE `review_id` = $p_review_id;";
        mysqli_query($con, $review_like_and_dislike_alter_query);
    }
    
}
if(isset($_GET['p_q_and_a_id'])) {
    $p_p_q_and_a_id = $_GET['p_q_and_a_id'];
    if(isset($_GET['p_q_like'])) {
        $p_q_like_count = $_GET['p_q_like'];
        $products_p_q_and_q_alter_query = "UPDATE `product_questions_and_answers` SET `p_q_like` = $p_q_like_count WHERE `p_q_and_a_id`=$p_p_q_and_a_id;";
        mysqli_query($con, $products_p_q_and_q_alter_query);
    } else {
     $p_q_dislike_count = $_GET['p_q_dislike'];
     $products_p_q_and_q_alter_query = "UPDATE `product_questions_and_answers` SET `p_q_dislike` = $p_q_dislike_count WHERE `p_q_and_a_id`=$p_p_q_and_a_id;";
     mysqli_query($con, $products_p_q_and_q_alter_query);
    }
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

                <?php 

                $products_specification_query = "SELECT * FROM `products_specification` WHERE `p_id`=$product_id;";
                $products_specification_result = mysqli_query($con, $products_specification_query);

                while($row = mysqli_fetch_assoc($products_specification_result)) {
                    $products_specification_p_spec_title = $row['p_spec_title'];
                    $products_specification_p_spec_details = $row['p_spec_details'];
               
                
                ?>

                    <tr>
                        <th><?php echo $products_specification_p_spec_title; ?>: </th>
                        <td><?php echo $products_specification_p_spec_details; ?></td>
                    </tr>
                    <?php } ?>
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
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="GET">
                    <input type="hidden" name="p_id" value="<?php echo $product_id;?>">
                    <input type="hidden" name="sub_cat_id" value="<?php echo $product_sub_cat_id; ?>">
                    <label for="cus_name">Name</label> <br>
                    <input type="text" placeholder="Enter your name" id="cus_name" name="p_customer_name" class="inp1" required> <br>
                    <label for="cus_rat">Rating</label> <br>
                    <label for="">1</label>
                    <input type="range" min="1" max="5" id="cus_rat" value="4" name="p_rating" class="inp3">
                    <label for="">5</label> <br>
                    <label for="cus_desc">Body of Review</label> <br>
                    <textarea placeholder="write a comments here" name="p_desc" id="cus_desc" class="inp2" required></textarea>
                     <br>

                   <center>
                    <button type="submit" name="review_sub_btn" value="1">SUBMIT REVIEW</button>
                   </center>
                </form>
            </div>

            <?php 
            
            $product_review_query = "SELECT * FROM `reviews` WHERE `p_id`=$product_id;";
            $product_review_result = mysqli_query($con, $product_review_query);

            while($row = mysqli_fetch_assoc($product_review_result)) {
                $review_cus_name = $row['p_customer_name'];
                $reviews_rating_count = $row['p_rating'];
                $review_product_description = $row['p_desc'];
                $review_p_like = $row['p_like'];
                $review_p_dislike = $row['p_dislike'];
                $review_review_id = $row['review_id'];

            ?>

            <div class="customer_review_container">
                    <h3><?php echo $review_cus_name; ?></h3>
                    <?php 
                     switch($reviews_rating_count) {
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
                    <p><?php echo $review_product_description; ?></p>
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="GET">
                    <input type="hidden" name="p_id" value="<?php echo $product_id;?>">
                    <input type="hidden" name="sub_cat_id" value="<?php echo $product_sub_cat_id; ?>">
                    <input type="hidden" name="review_id" value="<?php echo $review_review_id; ?>">
                    <span class="customer_review_container_thumbs"><button name="p_like" value="<?php echo $review_p_like+1; ?>"><i class="fas fa-thumbs-up"></i></button> <?php echo $review_p_like; ?></span>
                    <span class="customer_review_container_thumbs"><button name="p_dislike" value="<?php echo $review_p_dislike+1; ?>"><i class="fas fa-thumbs-down"></i></button> <?php echo $review_p_dislike; ?></span>
                    </form>
                </div>
                
                <?php } ?>
                
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

        <?php 

        $products_q_and_a_query = "SELECT * FROM `product_questions_and_answers` WHERE `p_id`=$product_id;";
        $products_q_and_a_result = mysqli_query($con, $products_q_and_a_query);

        while($row = mysqli_fetch_assoc($products_q_and_a_result)) {
            $product_p_q_and_a_id = $row['p_q_and_a_id'];
            $product_ques_person_name = $row['ques_person_name'];
            $product_p_ques = $row['p_ques'];
            $product_p_ans = $row['p_ans'];
            $product_p_q_like = $row['p_q_like'];
            $product_p_q_dislike = $row['p_q_dislike'];

        ?>
            <div>
                <h5 class="h5tag">Q: <?php echo $product_p_ques; ?></h5>
                <span><h5 class="h5tag1">A: </h5><?php echo $product_p_ans; ?></span> <br>
                <span><?php echo $product_ques_person_name; ?></span> <br>
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="GET">
                <input type="hidden" name="p_id" value="<?php echo $product_id;?>">
                <input type="hidden" name="sub_cat_id" value="<?php echo $product_sub_cat_id; ?>">
                <input type="hidden" name="p_q_and_a_id" value="<?php echo $product_p_q_and_a_id; ?>">
                <span class="thumbs"><button name="p_q_like" value="<?php echo $product_p_q_like+1; ?>"><i class="fas fa-thumbs-up"></i></button> <?php echo $product_p_q_like; ?></span>
                <span class="thumbs"><button name="p_q_dislike" value="<?php echo $product_p_q_dislike+1; ?>" ><i class="fas fa-thumbs-down"></i></button> <?php echo $product_p_q_dislike; ?></span>
                </form>
            </div>
           
           <?php  } ?>
            
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

        <?php 

        $related_products_query = "SELECT * FROM `products` WHERE `b_and_i_identification_id`=$products_details_b_and_i_identification_id;";
        $related_products_result = mysqli_query($con, $related_products_query);
      while($row = mysqli_fetch_assoc($related_products_result)) {
        $related_products_p_image = $row['p_image'];
        $related_products_p_title = $row['p_title'];
        $related_products_p_a_price = $row['p_a_price'];
        $related_products_p_o_price = $row['p_o_price'];
        $related_products_p_star_rat = $row['p_star_rat'];
        $related_products_p_id = $row['p_id'];
        $related_products_subs_cat_identification_id = $row['subs_cat_identification_id'];
    
        ?>

            <div class="products_container_products_inner_divs">
                <img src="./images/<?php echo $related_products_p_image; ?>" alt="products images">
               <a href="./view_of_product.php?p_id=<?php echo $related_products_p_id; ?>&sub_cat_id=<?php echo $related_products_subs_cat_identification_id; ?>">
                <div class="products_container_products_inner_text_divs">
                    <div>
                    <?php
                        switch($related_products_p_star_rat) {
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
                        if(strlen($related_products_p_title) > 30) {
                            echo substr($related_products_p_title, 0, 35)." ...";
                        } else {
                            echo $related_products_p_title;
                        }
                         ?></h4>
                    </div>
                    <div>
                        <h2>&#8377;<?php echo $related_products_p_a_price; ?> <del>&#8377;<?php echo $related_products_p_o_price; ?></del></h2>
                    </div>
                </div>
               </a>
                <div class="products_container_products_inner_btn_divs">
                    <button title="Add To Cart"><i class="fas fa-cart-plus" ></i></button>
                    <button title="Add To Wishlist"><i class="far fa-heart"></i></button>
                    <button title="Quick View"><i class="fas fa-search"></i></button>
                </div>
            </div>
           
            <?php } ?>
           
           
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