<?php 
//  $token_of_auth = "T093NO5A86H";
//  setcookie($token_of_auth, 0, time() + (86400 * -10));
// $token_of_wishlist = "W937LI25A856T0K3N";
// setcookie($token_of_wishlist, $token_for_un_u_wishlist_details, time() + (86400 * -40));
// session_start();
// $_SESSION['user_login_id'] = "ram@gmail.comShopssy";
// $_SESSION['user_login_email'] = "ram@gmail.com";
// $_SESSION['user_id'] = 4;

include './action.php';
include './redirect_fun.php';

if(isset($_GET['new_ques'])) {
    if(isset($_SESSION['user_id'])) {
        $users_id = $_SESSION['user_id'];
        $retrieve_name_query = "SELECT `f_name`, `l_name` FROM `register` WHERE `user_id` = $users_id;";
        $retrieve_name_result = mysqli_query($con, $retrieve_name_query);
        $fetch_name = mysqli_fetch_assoc($retrieve_name_result);
        $full_name = $fetch_name['f_name']." ".$fetch_name['l_name'];
       $product_id = $_GET['p_id'];
       $new_ques = $_GET['new_ques'];
       $new_ques = stripcslashes($new_ques);
       $new_ques = mysqli_real_escape_string($con, $new_ques);
       $new_ques_insert_query = "INSERT INTO `product_questions_and_answers` (`p_id`, `user_id`, `ques_person_name`, `p_ques`, `p_ans`, `status`) VALUES ($product_id, $users_id, '$full_name', '$new_ques', '', 'waiting');";
       mysqli_query($con, $new_ques_insert_query);
       refresh();
    } else {
           ?>
            <script type="text/javascript">
            window.location.href = 'http://localhost:3000/login.php';
            </script>
            <?php
    }
    
}

function refresh() {
    $pro_id = $_GET['p_id'];
    $pro_sub_cat_id = $_GET['sub_cat_id'];

    if(isset($_GET['hot_deal_pro'])) {
        ?>
        <script type="text/javascript">
        window.location.href = 'http://localhost:3000/view_of_product.php?p_id=<?php echo $pro_id; ?>&sub_cat_id=<?php echo $pro_sub_cat_id; ?>&hot_deal_pro=1';
        </script>
        <?php
    } else if(isset($_GET['best_selling_pro'])) {
        ?>
        <script type="text/javascript">
        window.location.href = 'http://localhost:3000/view_of_product.php?p_id=<?php echo $pro_id; ?>&sub_cat_id=<?php echo $pro_sub_cat_id; ?>&best_selling_pro=1';
        </script>
        <?php
    } else {
        ?>
        <script type="text/javascript">
        window.location.href = 'http://localhost:3000/view_of_product.php?p_id=<?php echo $pro_id; ?>&sub_cat_id=<?php echo $pro_sub_cat_id; ?>';
        </script>
        <?php
    }
}

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

$nav_link_query = "SELECT * FROM `sub_category` WHERE `sub_cat_identification_id` LIKE $product_sub_cat_id;";
$nav_link_result = mysqli_query($con, $nav_link_query);
while($rows = mysqli_fetch_assoc($nav_link_result)) {
    $nav_subs_cat_title = $rows['subs_cat_title'];
    $nav_sub_cat_identification_id_two = $rows['sub_cat_identification_id_two'];

}

$product_sub_cat_id_query = "SELECT * FROM `sub_category` WHERE `cats_id`=round($product_sub_cat_id);";
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

if(!isset($_SESSION['prod_qty'])) {
    $_SESSION['prod_qty'] = 1;
}

if(isset($_GET['increment'])) {
    $_SESSION['prod_qty'] = $_SESSION['prod_qty'] + 1;
    if(isset($_GET['best_selling_pro'])) {
        ?>
    <script type="text/javascript">
    window.location.href = 'http://localhost:3000/view_of_product.php?p_id=<?php echo $product_id; ?>&sub_cat_id=<?php echo $product_sub_cat_id; ?>&best_selling_pro=1';
    </script>
    <?php
    } elseif(isset($_GET['hot_deal_pro'])) {
        ?>
        <script type="text/javascript">
        window.location.href = 'http://localhost:3000/view_of_product.php?p_id=<?php echo $product_id; ?>&sub_cat_id=<?php echo $product_sub_cat_id; ?>&hot_deal_pro=1';
        </script>
        <?php
    } else {
        ?>
        <script type="text/javascript">
        window.location.href = 'http://localhost:3000/view_of_product.php?p_id=<?php echo $product_id; ?>&sub_cat_id=<?php echo $product_sub_cat_id; ?>';
        </script>
        <?php
    }
   
} 
if(isset($_GET['decrement'])) {
    $_SESSION['prod_qty'] = $_SESSION['prod_qty'] - 1;
    if($_SESSION['prod_qty'] < 1) {
        $_SESSION['prod_qty'] = 1;
        if(isset($_GET['best_selling_pro'])) {
            ?>
        <script type="text/javascript">
        window.location.href = 'http://localhost:3000/view_of_product.php?p_id=<?php echo $product_id; ?>&sub_cat_id=<?php echo $product_sub_cat_id; ?>&best_selling_pro=1';
        </script>
        <?php
        } elseif(isset($_GET['hot_deal_pro'])) {
            ?>
            <script type="text/javascript">
            window.location.href = 'http://localhost:3000/view_of_product.php?p_id=<?php echo $product_id; ?>&sub_cat_id=<?php echo $product_sub_cat_id; ?>&hot_deal_pro=1';
            </script>
            <?php
        }  else {
            ?>
            <script type="text/javascript">
            window.location.href = 'http://localhost:3000/view_of_product.php?p_id=<?php echo $product_id; ?>&sub_cat_id=<?php echo $product_sub_cat_id; ?>';
            </script>
            <?php
        }
    }
}

if(isset($_GET['cart_adding_req'])) {
    $product_id = $_GET['p_id'];
    if(isset($_SESSION['user_login_id'])) {
        $user_email_id = $_SESSION['user_login_email'];
        $cart_adding_query = "SELECT `user_id` FROM `register` WHERE `email` = '$user_email_id';";
        $cart_adding_result = mysqli_query($con, $cart_adding_query);
        $cart_adding_result_user_id = mysqli_fetch_assoc($cart_adding_result);
        $cart_adding_result_user_id = $cart_adding_result_user_id['user_id'];
        $cart_inserting_qty = $_SESSION['prod_qty'];
        if(isset($_GET['best_selling_pro'])) {
            $pro_type = 'normal';
        } elseif(isset($_GET['hot_deal_pro'])) {
            $pro_type = 'hot';
        } else {
            $pro_type = 'offer';
        }
        $check_query = "SELECT * FROM `cart` WHERE (`u_id` = $cart_adding_result_user_id AND `product_id` = $product_id);";
        $check_result = mysqli_query($con, $check_query);
        $check_rows = mysqli_num_rows($check_result);
        if($check_rows >= 1) {
            ?>
      <script>
       document.getElementsByClassName("message_box")[0].style.display = "flex";
       document.getElementsByClassName("message_box_1")[0].innerHTML = "<span>Already added to your cart</span>";
       setTimeout(function() {
        document.getElementsByClassName("message_box")[0].style.display = "none";
       }, 3000);
      </script>
      <?php
        } else {
            $cart_inserting_query = "INSERT INTO `cart` (`u_id`, `product_id`, `quantity`, `pro_tot_price`, `cart_user_desc`, `pro_type`) VALUES ($cart_adding_result_user_id, $product_id, $cart_inserting_qty, 0, '', '$pro_type');";
            mysqli_query($con, $cart_inserting_query);

            if(isset($_GET['best_selling_pro'])) {
                ?>
                <script type="text/javascript">
                window.location.href = 'http://localhost:3000/view_of_product.php?p_id=<?php echo $product_id; ?>&sub_cat_id=<?php echo $product_sub_cat_id; ?>&best_selling_pro=1';
                </script>
                <?php
    
            } elseif(isset($_GET['hot_deal_pro'])) {
                ?>
                <script type="text/javascript">
                window.location.href = 'http://localhost:3000/view_of_product.php?p_id=<?php echo $product_id; ?>&sub_cat_id=<?php echo $product_sub_cat_id; ?>&hot_deal_pro=1';
                </script>
                <?php
            } else {
                ?>
                <script type="text/javascript">
                window.location.href = 'http://localhost:3000/view_of_product.php?p_id=<?php echo $product_id; ?>&sub_cat_id=<?php echo $product_sub_cat_id; ?>';
                </script>
                <?php
            }
        }
       
        
        
    } else {
        if(isset($_COOKIE['T093NO5A86H'])) {
            $unnamed_user_token = $_COOKIE['T093NO5A86H'];
            $product_id = $_GET['p_id'];
            $unnamed_cart_inserting_qty = $_SESSION['prod_qty'];
            if(isset($_GET['best_selling_pro'])) {
                $pro_type = 'normal';
            } elseif(isset($_GET['hot_deal_pro'])) {
                $pro_type = 'hot';
            } else {
                $pro_type = 'offer';
            }
            $check_query = "SELECT * FROM `unnamed_user_cart` WHERE (`un_u_cart_token` = $unnamed_user_token AND `prod_id_of_cart` = $product_id);";
            $check_result = mysqli_query($con, $check_query);
            $check_rows = mysqli_num_rows($check_result);
            if($check_rows >= 1) {
                ?>
              <script>
              document.getElementsByClassName("message_box")[0].style.display = "flex";
              document.getElementsByClassName("message_box_1")[0].innerHTML = "<span>Already added to your cart</span>";
              setTimeout(function() {
               document.getElementsByClassName("message_box")[0].style.display = "none";
               }, 3000);
              </script>
              <?php
            } else {
                $unname_user_cart_query = "INSERT INTO `unnamed_user_cart` (`un_u_cart_token`, `prod_id_of_cart`, `qty`, `cart_desc`, `pro_type`) VALUES ($unnamed_user_token, $product_id,  $unnamed_cart_inserting_qty, '', '$pro_type');";
                mysqli_query($con, $unname_user_cart_query);

                if(isset($_GET['best_selling_pro'])) {
                    ?>
                    <script type="text/javascript">
                    window.location.href = 'http://localhost:3000/view_of_product.php?p_id=<?php echo $product_id; ?>&sub_cat_id=<?php echo $product_sub_cat_id; ?>&best_selling_pro=1';
                    </script>
                    <?php
                } elseif(isset($_GET['hot_deal_pro'])) {
                    ?>
                    <script type="text/javascript">
                    window.location.href = 'http://localhost:3000/view_of_product.php?p_id=<?php echo $product_id; ?>&sub_cat_id=<?php echo $product_sub_cat_id; ?>&hot_deal_pro=1';
                    </script>
                    <?php
                } else {
                    ?>
                    <script type="text/javascript">
                    window.location.href = 'http://localhost:3000/view_of_product.php?p_id=<?php echo $product_id; ?>&sub_cat_id=<?php echo $product_sub_cat_id; ?>';
                    </script>
                    <?php
                }

            }
           
           
        }
    }
   
}


if(isset($_GET['product_buy_req'])) {
    $product_id = $_GET['p_id'];
    if(isset($_SESSION['user_login_id'])) {
        $user_email_id = $_SESSION['user_login_email'];
        $cart_adding_query = "SELECT `user_id` FROM `register` WHERE `email` = '$user_email_id';";
        $cart_adding_result = mysqli_query($con, $cart_adding_query);
        $cart_adding_result_user_id = mysqli_fetch_assoc($cart_adding_result);
        $cart_adding_result_user_id = $cart_adding_result_user_id['user_id'];
        $cart_inserting_qty = $_SESSION['prod_qty'];
        if(isset($_GET['best_selling_pro'])) {
            $pro_type = 'normal';
        } elseif(isset($_GET['hot_deal_pro'])) {
            $pro_type = 'hot';
        } else {
            $pro_type = 'offer';
        }
        $check_query = "SELECT * FROM `cart` WHERE (`u_id` = $cart_adding_result_user_id AND `product_id` = $product_id);";
        $check_result = mysqli_query($con, $check_query);
        $check_rows = mysqli_num_rows($check_result);
        if($check_rows >= 1) {
            echo "";
        } else {
            $cart_inserting_query = "INSERT INTO `cart` (`u_id`, `product_id`, `quantity`, `pro_tot_price`, `cart_user_desc`, `pro_type`) VALUES ($cart_adding_result_user_id, $product_id, $cart_inserting_qty, 0, '', '$pro_type');";
            mysqli_query($con, $cart_inserting_query);
        }
      
        ?>
        <script type="text/javascript">
        window.location.href = 'http://localhost:3000/information.php';
        </script>
        <?php
    } else {
        ?>
        <script type="text/javascript">
        window.location.href = 'http://localhost:3000/login.php';
        </script>
        <?php
    }
   
}

if(isset($_GET['wishlist_adding_req'])) {
    $prod_id = $_GET['p_id'];
    if(isset($_SESSION['user_login_id'])) {
        $users_id = $_SESSION['user_id'];
        if(isset($_GET['best_selling_pro'])) {
            $pro_type = 'normal';
        } elseif(isset($_GET['hot_deal_pro'])) {
            $pro_type = 'hot';
        }  else {
            $pro_type = 'offer';
        }
        $check_query = "SELECT * FROM `mywishlist` WHERE (`user_id` = $users_id AND `prod_id` = $prod_id);";
        $check_result = mysqli_query($con, $check_query);
        $check_rows = mysqli_num_rows($check_result);
        if($check_rows >= 1) {
            ?>
            <script>
            document.getElementsByClassName("message_box")[0].style.display = "flex";
            document.getElementsByClassName("message_box_1")[0].innerHTML = "<span>Already added to your wishlist</span>";
            setTimeout(function() {
             document.getElementsByClassName("message_box")[0].style.display = "none";
             }, 3000);
            </script>
            <?php
        } else {
            $wishlist_insert_query = "INSERT INTO `mywishlist` (`user_id`, `prod_id`, `pro_type`) VALUES ($users_id, $prod_id, '$pro_type');";
            mysqli_query($con, $wishlist_insert_query);

            if(isset($_GET['best_selling_pro'])) {
                ?>
                <script type="text/javascript">
                window.location.href = 'http://localhost:3000/view_of_product.php?p_id=<?php echo $product_id; ?>&sub_cat_id=<?php echo $product_sub_cat_id; ?>&best_selling_pro=1';
                </script>
                <?php
            } elseif(isset($_GET['hot_deal_pro'])) {
                ?>
                <script type="text/javascript">
                window.location.href = 'http://localhost:3000/view_of_product.php?p_id=<?php echo $product_id; ?>&sub_cat_id=<?php echo $product_sub_cat_id; ?>&hot_deal_pro=1';
                </script>
                <?php
            } else {
                ?>
                <script type="text/javascript">
                window.location.href = 'http://localhost:3000/view_of_product.php?p_id=<?php echo $product_id; ?>&sub_cat_id=<?php echo $product_sub_cat_id; ?>';
                </script>
                <?php
            }

        }
       
           
    }else {
        $prod_id = $_GET['p_id'];
        $token_of_wishlist = "W937LI25A856T0K3N";
        $token_for_un_u_wishlist_details = $_COOKIE[$token_of_wishlist];
        if(isset($_GET['best_selling_pro'])) {
            $pro_type = 'normal';
        } elseif(isset($_GET['hot_deal_pro'])) {
            $pro_type = 'hot';
        } else {
            $pro_type = 'offer';
        }
        $check_query = "SELECT * FROM `unnamed_user_wishlist` WHERE (`un_u_wishlist_token` = $token_for_un_u_wishlist_details AND `prod_id_of_wishlist` = $prod_id);";
        $check_result = mysqli_query($con, $check_query);
        $check_rows = mysqli_num_rows($check_result);
        if($check_rows >= 1) {
            ?>
            <script>
            document.getElementsByClassName("message_box")[0].style.display = "flex";
            document.getElementsByClassName("message_box_1")[0].innerHTML = "<span>Already added to your wishlist</span>";
            setTimeout(function() {
             document.getElementsByClassName("message_box")[0].style.display = "none";
             }, 3000);
            </script>
            <?php
        } else {
            $wishlist_insert_query = "INSERT INTO `unnamed_user_wishlist` (`un_u_wishlist_token`, `prod_id_of_wishlist`, `pro_type`) VALUES ($token_for_un_u_wishlist_details, $prod_id, '$pro_type');";
            mysqli_query($con, $wishlist_insert_query);

            if(isset($_GET['best_selling_pro'])) {
                ?>
                <script type="text/javascript">
                window.location.href = 'http://localhost:3000/view_of_product.php?p_id=<?php echo $product_id; ?>&sub_cat_id=<?php echo $product_sub_cat_id; ?>&best_selling_pro=1';
                </script>
                <?php
            } elseif(isset($_GET['hot_deal_pro'])) {
                ?>
                <script type="text/javascript">
                window.location.href = 'http://localhost:3000/view_of_product.php?p_id=<?php echo $product_id; ?>&sub_cat_id=<?php echo $product_sub_cat_id; ?>&hot_deal_pro=1';
                </script>
                <?php
            } else {
                ?>
                <script type="text/javascript">
                window.location.href = 'http://localhost:3000/view_of_product.php?p_id=<?php echo $product_id; ?>&sub_cat_id=<?php echo $product_sub_cat_id; ?>';
                </script>
                <?php
            }

        }
       
           
    }
} 

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
    $pro_sub_cat_id = $_GET['sub_cat_id'];
    $p_cus_name = $_GET['p_customer_name'];
    $p_cus_rating = $_GET['p_rating'];
    $p_cus_description = $_GET['p_desc'];
    $nameval = "/^[a-zA-Z ]+$/";

    $known_user_id = 0;
    if(isset($_SESSION['user_login_id'])) {
        $known_user_id = $_SESSION['user_id'];
    }
    $check_query = "SELECT `order_id` FROM `orders_table` WHERE `user_id` = $known_user_id;";
    $check_result = mysqli_query($con, $check_query);
    while($row = mysqli_fetch_assoc($check_result)) {
        $order_id = $row['order_id'];
        $check_query_2 = "SELECT `product_id` FROM `orders_sub_table` WHERE (`order_id` = $order_id AND `product_id` = $pro_id);";
        $check_result_2 = mysqli_query($con, $check_query_2);
        $fetch_rows = mysqli_num_rows($check_result_2);
    }
   
    if($fetch_rows >= 1) {
        $check_query = "SELECT * FROM `reviews` WHERE (`known_user_id` = $known_user_id AND `p_id` = $pro_id);";
        $check_result = mysqli_query($con, $check_query);
        $checking_no_of_rows = mysqli_num_rows($check_result);
        if($checking_no_of_rows == 0) {
            if(preg_match($nameval, $p_cus_name)) {
                $pro_review_query = "INSERT INTO `reviews` (`known_user_id`, `p_id`, `p_customer_name`, `p_rating`, `p_desc`) VALUES ($known_user_id, '$pro_id', '$p_cus_name', '$p_cus_rating', '$p_cus_description');";
                mysqli_query($con, $pro_review_query);

                if(isset($_GET['hot_deal_pro'])) {
                    ?>
                    <script type="text/javascript">
                    window.location.href = 'http://localhost:3000/view_of_product.php?p_id=<?php echo $pro_id; ?>&sub_cat_id=<?php echo $pro_sub_cat_id; ?>&hot_deal_pro=1';
                    </script>
                    <?php
                } else if(isset($_GET['best_selling_pro'])) {
                    ?>
                    <script type="text/javascript">
                    window.location.href = 'http://localhost:3000/view_of_product.php?p_id=<?php echo $pro_id; ?>&sub_cat_id=<?php echo $pro_sub_cat_id; ?>&best_selling_pro=1';
                    </script>
                    <?php
                } else {
                    ?>
                    <script type="text/javascript">
                    window.location.href = 'http://localhost:3000/view_of_product.php?p_id=<?php echo $pro_id; ?>&sub_cat_id=<?php echo $pro_sub_cat_id; ?>';
                    </script>
                    <?php
                }

            }
        } else {
            ?>
            <script>
            document.getElementsByClassName("message_box")[0].style.display = "flex";
            document.getElementsByClassName("message_box_1")[0].innerHTML = "<span>Already your review is added</span>";
            setTimeout(function() {
             document.getElementsByClassName("message_box")[0].style.display = "none";
             }, 3000);
            </script>
            <?php
        }

        
        
    } else {
        ?>
        <script type="text/javascript">
            document.getElementsByClassName("message_box")[0].style.backgroundColor = "#da0000";
            document.getElementsByClassName("message_send_cross_btn")[0].style.backgroundColor = "#da0000";
            document.getElementsByClassName("message_box")[0].style.display = "flex";
             document.getElementsByClassName("message_box_1")[0].innerHTML = "<h1>Haven't purchased this product?</h1><h4>Sorry! You are not allowed to review this product since you haven't bought it on Shopssy.</h4>";
             setTimeout(function() {
                 document.getElementsByClassName("message_box")[0].style.display = "none";
             }, 3000);
        </script>
        <?php
        
    }
    
}

if(isset($_GET['review_id'])) {

    if(isset($_SESSION['user_id'])) {

    $p_review_id = $_GET['review_id'];
    if(isset($_GET['p_like'])) {
        $p_known_user_id = $_SESSION['user_id'];
        $check_query = "SELECT `review_id`, `like_and_unlike_id` FROM `sub_reviews` WHERE `user_id` = $p_known_user_id AND `is_like` = 1 AND `review_id` = $p_review_id;";
        $check_result = mysqli_query($con, $check_query);
        $check_rows = mysqli_num_rows($check_result);
        $fetch_l_u_id = mysqli_fetch_assoc($check_result);
        $like_and_unlike_id = $fetch_l_u_id['like_and_unlike_id'];
        if($check_rows > 0) {
            $review_like_and_dislike_delete_query = "DELETE FROM `sub_reviews` WHERE `like_and_unlike_id` = $like_and_unlike_id;";
            mysqli_query($con, $review_like_and_dislike_delete_query);
        } else {
            $p_known_user_id = $_SESSION['user_id'];
            $check_query = "SELECT `review_id`, `like_and_unlike_id` FROM `sub_reviews` WHERE `user_id` = $p_known_user_id AND `is_dislike` = 1 AND `review_id` = $p_review_id;";
            $check_result = mysqli_query($con, $check_query);
            $check_rows = mysqli_num_rows($check_result);
            $fetch_l_u_id = mysqli_fetch_assoc($check_result);
            $like_and_unlike_id = $fetch_l_u_id['like_and_unlike_id'];
            if($check_rows > 0) {
                $review_like_and_dislike_delete_query = "DELETE FROM `sub_reviews` WHERE `like_and_unlike_id` = $like_and_unlike_id;";
                mysqli_query($con, $review_like_and_dislike_delete_query);
            }
            $review_like_and_dislike_alter_query = "INSERT INTO `sub_reviews` (`review_id`, `user_id`, `is_like`, `is_dislike`) VALUES ($p_review_id, $p_known_user_id, 1, 0);";
            mysqli_query($con, $review_like_and_dislike_alter_query);
        }
       
        refresh();
    } 
    else {
        $p_known_user_id = $_SESSION['user_id'];
        $check_query = "SELECT `review_id`, `like_and_unlike_id` FROM `sub_reviews` WHERE `user_id` = $p_known_user_id AND `is_dislike` = 1 AND `review_id` = $p_review_id;";
        $check_result = mysqli_query($con, $check_query);
        $check_rows = mysqli_num_rows($check_result);
        $fetch_l_u_id = mysqli_fetch_assoc($check_result);
        $like_and_unlike_id = $fetch_l_u_id['like_and_unlike_id'];
        if($check_rows > 0) {
            $review_like_and_dislike_delete_query = "DELETE FROM `sub_reviews` WHERE `like_and_unlike_id` = $like_and_unlike_id;";
            mysqli_query($con, $review_like_and_dislike_delete_query);
        } else {
            $p_known_user_id = $_SESSION['user_id'];
            $check_query = "SELECT `review_id`, `like_and_unlike_id` FROM `sub_reviews` WHERE `user_id` = $p_known_user_id AND `is_like` = 1 AND `review_id` = $p_review_id;";
            $check_result = mysqli_query($con, $check_query);
            $check_rows = mysqli_num_rows($check_result);
            $fetch_l_u_id = mysqli_fetch_assoc($check_result);
            $like_and_unlike_id = $fetch_l_u_id['like_and_unlike_id'];
            if($check_rows > 0) {
                $review_like_and_dislike_delete_query = "DELETE FROM `sub_reviews` WHERE `like_and_unlike_id` = $like_and_unlike_id;";
                mysqli_query($con, $review_like_and_dislike_delete_query);
            }
            $review_like_and_dislike_alter_query = "INSERT INTO `sub_reviews` (`review_id`, `user_id`, `is_like`, `is_dislike`) VALUES ($p_review_id, $p_known_user_id, 0, 1);";
            mysqli_query($con, $review_like_and_dislike_alter_query);
        }
        refresh();
    }

} else {
    ?>
    <script type="text/javascript">
    window.location.href = 'http://localhost:3000/login.php';
    </script>
    <?php
}
    
}



if(isset($_GET['p_q_and_a_id'])) {

    if(isset($_SESSION['user_id'])) {
    $p_p_q_and_a_id = $_GET['p_q_and_a_id'];
    if(isset($_GET['p_q_like'])) {
        $p_known_user_id = $_SESSION['user_id'];
        $check_query = "SELECT `ques_id`, `ques_and_ans_id` FROM `sub_question_and_answers` WHERE `user_id` = $p_known_user_id AND `is_like` = 1 AND `ques_id` = $p_p_q_and_a_id;";
        $check_result = mysqli_query($con, $check_query);
        $check_rows = mysqli_num_rows($check_result);
        $fetch_l_u_id = mysqli_fetch_assoc($check_result);
        $ques_and_ans_id = $fetch_l_u_id['ques_and_ans_id'];
        if($check_rows > 0) {
            $question_like_and_dislike_delete_query = "DELETE FROM `sub_question_and_answers` WHERE `ques_and_ans_id` = $ques_and_ans_id;";
            mysqli_query($con, $question_like_and_dislike_delete_query);
        } else {
            $p_known_user_id = $_SESSION['user_id'];
            $check_query = "SELECT `ques_id`, `ques_and_ans_id` FROM `sub_question_and_answers` WHERE `user_id` = $p_known_user_id AND `is_dislike` = 1 AND `ques_id` = $p_p_q_and_a_id;";
            $check_result = mysqli_query($con, $check_query);
            $check_rows = mysqli_num_rows($check_result);
            $fetch_l_u_id = mysqli_fetch_assoc($check_result);
            $ques_and_ans_id = $fetch_l_u_id['ques_and_ans_id'];
            if($check_rows > 0) {
                $question_like_and_dislike_delete_query = "DELETE FROM `sub_question_and_answers` WHERE `ques_and_ans_id` = $ques_and_ans_id;";
                mysqli_query($con, $question_like_and_dislike_delete_query);
            }
            $question_like_and_dislike_alter_query = "INSERT INTO `sub_question_and_answers` (`ques_id`, `user_id`, `is_like`, `is_dislike`) VALUES ($p_p_q_and_a_id, $p_known_user_id, 1, 0);";
            mysqli_query($con, $question_like_and_dislike_alter_query);
        }
       
        refresh();
    } else {
        $p_known_user_id = $_SESSION['user_id'];
        $check_query = "SELECT `ques_id`, `ques_and_ans_id` FROM `sub_question_and_answers` WHERE `user_id` = $p_known_user_id AND `is_dislike` = 1 AND `ques_id` = $p_p_q_and_a_id;";
        $check_result = mysqli_query($con, $check_query);
        $check_rows = mysqli_num_rows($check_result);
        $fetch_l_u_id = mysqli_fetch_assoc($check_result);
        $ques_and_ans_id = $fetch_l_u_id['ques_and_ans_id'];
        if($check_rows > 0) {
            $question_like_and_dislike_delete_query = "DELETE FROM `sub_question_and_answers` WHERE `ques_and_ans_id` = $ques_and_ans_id;";
            mysqli_query($con, $question_like_and_dislike_delete_query);
        } else {
            $p_known_user_id = $_SESSION['user_id'];
            $check_query = "SELECT `ques_id`, `ques_and_ans_id` FROM `sub_question_and_answers` WHERE `user_id` = $p_known_user_id AND `is_like` = 1 AND `ques_id` = $p_p_q_and_a_id;";
            $check_result = mysqli_query($con, $check_query);
            $check_rows = mysqli_num_rows($check_result);
            $fetch_l_u_id = mysqli_fetch_assoc($check_result);
            $ques_and_ans_id = $fetch_l_u_id['ques_and_ans_id'];
            if($check_rows > 0) {
                $question_like_and_dislike_delete_query = "DELETE FROM `sub_question_and_answers` WHERE `ques_and_ans_id` = $ques_and_ans_id;";
                mysqli_query($con, $question_like_and_dislike_delete_query);
            }
            $question_like_and_dislike_alter_query = "INSERT INTO `sub_question_and_answers` (`ques_id`, `user_id`, `is_like`, `is_dislike`) VALUES ($p_p_q_and_a_id, $p_known_user_id, 0, 1);";
            mysqli_query($con, $question_like_and_dislike_alter_query);
        }
        refresh();
    }

} else {
           ?>
            <script type="text/javascript">
            window.location.href = 'http://localhost:3000/login.php';
            </script>
            <?php
}
}



if(isset($_GET['notify_me_req'])) {

    if(isset($_SESSION['user_id'])) {
    $pro_id = $_GET['p_id'];
    $pro_sub_cat_id = $_GET['sub_cat_id'];
    $p_known_user_id = $_SESSION['user_id'];
    $check_query = "SELECT `n_id` FROM `notification` WHERE `noti_for_who` = $p_known_user_id AND `pro_id` = $pro_id;";
    $check_result = mysqli_query($con, $check_query);
    $notify_row = mysqli_num_rows($check_result);
    if($notify_row == 0) {
        $link_of_notify = "";
        if(isset($_GET['hot_deal_pro'])) {
            $link_of_notify = "http://localhost:3000/view_of_product.php?p_id=$pro_id&sub_cat_id=$pro_sub_cat_id&hot_deal_pro=1";
        } else if(isset($_GET['best_selling_pro'])) {
            $link_of_notify = "http://localhost:3000/view_of_product.php?p_id=$pro_id&sub_cat_id=$pro_sub_cat_id&best_selling_pro=1";
        } else {
            $link_of_notify = "http://localhost:3000/view_of_product.php?p_id=$pro_id&sub_cat_id=$pro_sub_cat_id";
        }
        
        $fetch_product_title_query = "SELECT `p_title` FROM `products` WHERE `p_id` = $pro_id;";
        $fetch_product_title_result = mysqli_query($con, $fetch_product_title_query);
        $fetch_content = mysqli_fetch_assoc($fetch_product_title_result);
        $fetch_content = $fetch_content['p_title'];
        $title_of_notify = "Back In Stock";
        $notify_content = "The $fetch_content - you were looking for is back in stock! Grab it NOW!";
        $notify_insert_query = "insert into notification(`n_title`, `n_content`, `n_time`, `noti_for_who`, `link`, `pro_id`) values
        ('$title_of_notify', '$notify_content', '',  $p_known_user_id, '$link_of_notify', $pro_id);";
        mysqli_query($con, $notify_insert_query);
        
    
        if(isset($_GET['hot_deal_pro'])) {
            ?>
            <script type="text/javascript">
            window.location.href = 'http://localhost:3000/view_of_product.php?p_id=<?php echo $pro_id; ?>&sub_cat_id=<?php echo $pro_sub_cat_id; ?>&hot_deal_pro=1';
            </script>
            <?php
        } else if(isset($_GET['best_selling_pro'])) {
            ?>
            <script type="text/javascript">
            window.location.href = 'http://localhost:3000/view_of_product.php?p_id=<?php echo $pro_id; ?>&sub_cat_id=<?php echo $pro_sub_cat_id; ?>&best_selling_pro=1';
            </script>
            <?php
        } else {
            ?>
            <script type="text/javascript">
            window.location.href = 'http://localhost:3000/view_of_product.php?p_id=<?php echo $pro_id; ?>&sub_cat_id=<?php echo $pro_sub_cat_id; ?>';
            </script>
            <?php
        }
    } else {
           ?>
            <script>
            document.getElementsByClassName("message_box")[0].style.display = "flex";
            document.getElementsByClassName("message_box_1")[0].innerHTML = "<span>You will get the notification once the product is get stock in shopssy.</span>";
            setTimeout(function() {
             document.getElementsByClassName("message_box")[0].style.display = "none";
             }, 3000);
            </script>
            <?php
    }

} else {
    ?>
    <script type="text/javascript">
    window.location.href = 'http://localhost:3000/login.php';
    </script>
    <?php
}
    
}

if(isset($_GET['product_id1'])) {
    if(isset($_SESSION['user_login_id'])) {
        $user_email_id = $_SESSION['user_login_email'];
        $cart_process_query = "SELECT `user_id` FROM `register` WHERE `email`='$user_email_id';";
        $cart_process_result = mysqli_query($con, $cart_process_query);
        $cart_process_user_id = mysqli_fetch_assoc($cart_process_result);
        $cart_process_user_id = $cart_process_user_id['user_id'];
        $cart_process_pro_id = $_GET['product_id1'];
        if(isset($_GET['best_selling_pro'])) {
            $pro_type = 'normal';
        } elseif(isset($_GET['hot_deal_pro'])) {
            $pro_type = 'hot';
        } else {
            $pro_type = 'offer';
        }
        $check_query = "SELECT * FROM `cart` WHERE (`u_id` = $cart_process_user_id AND `product_id` = $cart_process_pro_id);";
        $check_result = mysqli_query($con, $check_query);
        $check_rows = mysqli_num_rows($check_result);
        if($check_rows >= 1) {
            ?>
            <script>
            document.getElementsByClassName("message_box")[0].style.display = "flex";
            document.getElementsByClassName("message_box_1")[0].innerHTML = "<span>Already added to your cart</span>";
            setTimeout(function() {
             document.getElementsByClassName("message_box")[0].style.display = "none";
             }, 3000);
            </script>
            <?php
        } else {
            $cart_query = "INSERT INTO `cart` (`u_id`, `product_id`, `quantity`, `pro_tot_price`, `cart_user_desc`, `pro_type`) VALUES ($cart_process_user_id, $cart_process_pro_id, 1, 0, '', '$pro_type')";
            mysqli_query($con, $cart_query);
            $_SESSION['user_id'] = $cart_process_user_id;
        refresh();
        }
        
    } else {

        $prod_id_for_unnamed_cart_details = $_GET['product_id1'];
          if(isset($_COOKIE['T093NO5A86H'])) {
            $token_of_auth = "T093NO5A86H";
            $token_for_un_u_cart_details = $_COOKIE[$token_of_auth];
          }
          if(isset($_GET['best_selling_pro'])) {
            $pro_type = 'normal';
        } elseif(isset($_GET['hot_deal_pro'])) {
            $pro_type = 'hot';
        } else {
            $pro_type = 'offer';
        }
        $check_query = "SELECT * FROM `unnamed_user_cart` WHERE (`un_u_cart_token` = $token_for_un_u_cart_details AND `prod_id_of_cart` = $prod_id_for_unnamed_cart_details);";
        $check_result = mysqli_query($con, $check_query);
        $check_rows = mysqli_num_rows($check_result);
        if($check_rows >= 1) {
            ?>
            <script>
            document.getElementsByClassName("message_box")[0].style.display = "flex";
            document.getElementsByClassName("message_box_1")[0].innerHTML = "<span>Already added to your cart</span>";
            setTimeout(function() {
             document.getElementsByClassName("message_box")[0].style.display = "none";
             }, 3000);
            </script>
            <?php
        } else {
            $unnamed_user_cart_details_insert_query = "INSERT INTO `unnamed_user_cart` (`un_u_cart_token`, `prod_id_of_cart`, `qty`, `pro_type`) VALUES ($token_for_un_u_cart_details, $prod_id_for_unnamed_cart_details, 1, '$pro_type');";
            mysqli_query($con, $unnamed_user_cart_details_insert_query);
            refresh();
        }
        
        
    }
   
}

if(isset($_GET['wish_btn1'])) {
    $produc_id = $_GET['productt_id'];
    if(isset($_SESSION['user_login_id'])) {
        $users_id = $_SESSION['user_id'];
        if(isset($_GET['best_selling_pro'])){
            $pro_type = 'normal';
        } elseif(isset($_GET['hot_deal_pro'])) {
            $pro_type = 'hot';
        } else {
            $pro_type = 'offer';
        }
        $check_query = "SELECT * FROM `mywishlist` WHERE (`user_id` = $users_id AND `prod_id` = $produc_id);";
        $check_result = mysqli_query($con, $check_query);
        $check_rows = mysqli_num_rows($check_result);
        if($check_rows >= 1) {
            ?>
            <script>
            document.getElementsByClassName("message_box")[0].style.display = "flex";
            document.getElementsByClassName("message_box_1")[0].innerHTML = "<span>Already added to your wishlist</span>";
            setTimeout(function() {
             document.getElementsByClassName("message_box")[0].style.display = "none";
             }, 3000);
            </script>
            <?php
        } else {
            $wishlist_insert_query = "INSERT INTO `mywishlist` (`user_id`, `prod_id`, `pro_type`) VALUES ($users_id, $produc_id, '$pro_type');";
            mysqli_query($con, $wishlist_insert_query);
            refresh();
        }
       
    } else {
        $token_of_wishlist = "W937LI25A856T0K3N";
        $token_for_un_u_wishlist_details = $_COOKIE[$token_of_wishlist];
        if(isset($_GET['best_selling_pro'])){
            $pro_type = 'normal';
        } elseif(isset($_GET['hot_deal_pro'])) {
            $pro_type = 'hot';
        } else {
            $pro_type = 'offer';
        }
        $check_query = "SELECT * FROM `unnamed_user_wishlist` WHERE (`un_u_wishlist_token` = $token_for_un_u_wishlist_details AND `prod_id_of_wishlist` = $produc_id);";
        $check_result = mysqli_query($con, $check_query);
        $check_rows = mysqli_num_rows($check_result);
        if($check_rows >= 1) {
            ?>
            <script>
            document.getElementsByClassName("message_box")[0].style.display = "flex";
            document.getElementsByClassName("message_box_1")[0].innerHTML = "<span>Already added to your wishlist</span>";
            setTimeout(function() {
             document.getElementsByClassName("message_box")[0].style.display = "none";
             }, 3000);
            </script>
            <?php
        } else { 
            $wishlist_insert_query = "INSERT INTO `unnamed_user_wishlist` (`un_u_wishlist_token`, `prod_id_of_wishlist`, `pro_type`) VALUES ($token_for_un_u_wishlist_details, $produc_id, '$pro_type');";
            mysqli_query($con, $wishlist_insert_query);
            refresh();
        }
       
    }
  
   
}


if(isset($_GET['view_all_related1'])) {
if(isset($_GET['p_id'])) {
$view_all_subs_cat_identification_id = $_GET['sub_cat_id'];
$view_all_query = "SELECT `sub_cat_identification_id_two`, `subs_cat_title` FROM `sub_category` WHERE `sub_cat_identification_id` LIKE $view_all_subs_cat_identification_id;";
$view_all_result = mysqli_query($con, $view_all_query);
while($rows = mysqli_fetch_assoc($view_all_result)) {
$view_all_sub_cat_identification_id_two = $rows['sub_cat_identification_id_two'];
$view_all_subs_cat_title = $rows['subs_cat_title'];
?>
<script type="text/javascript">
window.location.href = 'http://localhost:3000/product.php?sub_cat_identification_id=<?php echo $view_all_subs_cat_identification_id; ?>&sub_cat_title=<?php echo $view_all_subs_cat_title; ?>&sub_cat_identification_id_two=<?php echo $view_all_sub_cat_identification_id_two; ?>';
</script>
<?php
    }
  }
}




?>

    <!--sub navigation container start-->
    <div class="sub_navigation_container">
<center>
    <div class="sub_navigation_inner_container">
        <?php
          $product_sub_cat_id = $_GET['sub_cat_id'];
        ?>
        <span><a href="./index.php">Home</a></span>
        <span><i class="fas fa-arrow-right" style="color: #666666;font-size: 12px;"></i></span>
        <span><a href="./product.php?sub_cat_identification_id=<?php echo $product_sub_cat_id; ?>&sub_cat_title=<?php echo $nav_subs_cat_title; ?>&sub_cat_identification_id_two=<?php echo $nav_sub_cat_identification_id_two; ?>"><?php echo $sub_navigation_title; ?></a></span>
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

                        <?php
                        $product_count_query = "SELECT COUNT(review_id) FROM `reviews` WHERE `p_id` = $product_id;";
                        $product_count_result = mysqli_query($con, $product_count_query);
                        $product_count_result = mysqli_fetch_assoc($product_count_result);
                        $review_count = $product_count_result['COUNT(review_id)'];
                        if($review_count > 0) {
                            $review_count_val = $review_count;
                        } else {
                            $review_count_val = "No";
                        }
                        ?>


                    <p><?php echo $review_count_val; ?> Reviews</p>
                </span>
                </div>
                <div class="PIandC_cost_container_details_container">
                    <table>
                        <tr>
                            <th>AVAILABLE:</th>
                            <td id="in_stock" <?php if($product_sub_p_avail == "Out Of Stock") {
                                ?>
                                 style="color: red;"
                                <?php
                            } ?>><?php echo $product_sub_p_avail; ?> <?php if($product_sub_p_avail == "In Stock") {
                                echo "<i class='fas fa-check-square'></i>";
                            } else {
                                echo "<i class='fas fa-exclamation-triangle'></i>";
                            } ?></td>
                        </tr>
                        <tr>
                            <th>CATEGOTIES:</th>
                            <td>

                            <?php
                            $product_sub_cat_id = $_GET['sub_cat_id'];
                            $products_navigation_query = "SELECT * FROM `sub_category` WHERE `sub_cat_identification_id` LIKE $product_sub_cat_id;";
                            $products_navigation_result = mysqli_query($con, $products_navigation_query);
                            while($row = mysqli_fetch_assoc($products_navigation_result)) {
                                $navigation_sub_cat_identification_id_two = $row['sub_cat_identification_id_two'];
                                $navigation_sub_cat_title = $row['subs_cat_title'];
                            }
                            ?>

                                <?php 
                                $j=0;
                                $title_count = count($titles);
                                while($title_count > $j) {
                                    echo '<a href="./product.php?sub_cat_identification_id='.$product_sub_cat_id.'&sub_cat_title='.$navigation_sub_cat_title.'&sub_cat_identification_id_two='.$navigation_sub_cat_identification_id_two.'">'.$titles[$j].'</a>,';
                                    $j++;
                                }
                                
                                ?>
                            
                            
                            ...</td>
                        </tr>
                        <tr>
                            <th>TAGS:</th>
                            <td><a href="./product.php?sub_cat_identification_id=<?php echo $product_sub_cat_id; ?>&sub_cat_title=<?php echo $navigation_sub_cat_title; ?>&sub_cat_identification_id_two=<?php echo $navigation_sub_cat_identification_id_two; ?>"><?php echo $product_sub_p_tags1; ?></a>, <a  href="./product.php?sub_cat_identification_id=<?php echo $product_sub_cat_id; ?>&sub_cat_title=<?php echo $navigation_sub_cat_title; ?>&sub_cat_identification_id_two=<?php echo $navigation_sub_cat_identification_id_two; ?>"><?php echo $product_sub_p_tags2; ?></a>, <a  href="./product.php?sub_cat_identification_id=<?php echo $product_sub_cat_id; ?>&sub_cat_title=<?php echo $navigation_sub_cat_title; ?>&sub_cat_identification_id_two=<?php echo $navigation_sub_cat_identification_id_two; ?>"><?php echo $product_sub_p_tags3; ?></a></td>
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
                  <?php 
                  if(isset($_GET['best_selling_pro'])) {

                    ?>

                   <span>
                    <span>&#8377;<?php echo $products_details_p_o_price; ?>.00</span>
                   </span>

                      <?php
                      
                  } elseif(isset($_GET['hot_deal_pro'])) {
                    ?>

                    <span>
                        <span>&#8377;<?php echo floor($products_details_p_o_price/2); ?>.00</span>
                        <del>&#8377;<?php echo $products_details_p_o_price; ?>.00</del>
                        <h2 class="offer_value"><?php 
                            echo 50;
                            ?>% off</h2>
                    </span>
    
                     <?php
                  } else {
                    ?>

                    <span>
                        <span>&#8377;<?php echo $products_details_p_a_price; ?>.00</span>
                        <del>&#8377;<?php echo $products_details_p_o_price; ?>.00</del>
                        <h2 class="offer_value"><?php 
                            $offer_value = ($products_details_p_o_price - $products_details_p_a_price) / $products_details_p_o_price;
                            $offer_value = $offer_value * 100;
                            echo intval($offer_value);
                            ?>% off</h2>
                    </span>
    
                     <?php
                  }
                  
                  ?>
               
                  
              </div>

              <?php 
              if($product_sub_p_avail == "In Stock") {
                  ?>
              <div class="incre_decre_container">
                <h6>QUANTITY:</h6>
                <div>
                    <form action="./view_of_product.php" method="GET">
                        <?php 
                        if(isset($_GET['best_selling_pro'])) {
                            ?>
                        <input type="hidden" name="best_selling_pro" value="<?php echo 1 ?>">
                        <?php
                        }
                        ?>
                        <?php 
                        if(isset($_GET['hot_deal_pro'])) {
                            ?>
                        <input type="hidden" name="hot_deal_pro" value="<?php echo 1 ?>">
                        <?php
                        }
                        ?>
                    <input type="hidden" name="p_id" value="<?php echo $product_id; ?>">
                    <input type="hidden" name="sub_cat_id" value="<?php echo $product_sub_cat_id; ?>">
                    <button class="decre" name="decrement" value="1">-</button>
                    <span class="counter">
                        <?php if(isset($_SESSION['prod_qty'])) {
                        echo $_SESSION['prod_qty'];
                    } else {
                        echo 1;
                    }
                    ?></span>
                    <button class="incre" name="increment" value="1">+</button>
                    </form>
                </div>
              </div>
             <div class="PIandC_cost_container_btn_div1">
                <form action="./view_of_product.php" method="GET">
                <input type="hidden" name="p_id" value="<?php echo $product_id; ?>">
                    <input type="hidden" name="sub_cat_id" value="<?php echo $product_sub_cat_id; ?>">
                    <?php 
                    if(isset($_GET['best_selling_pro'])) {
                        ?>
                        <input type="hidden" name="best_selling_pro" value="<?php echo 1 ?>">
                        <?php
                    }
                    if(isset($_GET['hot_deal_pro'])) {
                        ?>
                        <input type="hidden" name="hot_deal_pro" value="<?php echo 1 ?>">
                        <?php
                    }
                    
                    ?>
                <button class="btn1" name="cart_adding_req" value="1">ADD TO CART</button>
                <button class="btn2" name="product_buy_req" value="1">BUY IT NOW</button>
                <button class="btn3" name="wishlist_adding_req" value="1"><i class="fas fa-heart"></i></button>
                </form>
             </div>
                  <?php
              } else {
                  ?>
                  <form action="./view_of_product.php" method="GET">
                  <?php 
                        if(isset($_GET['best_selling_pro'])) {
                            ?>
                        <input type="hidden" name="best_selling_pro" value="<?php echo 1 ?>">
                        <?php
                        }
                        ?>
                        <?php 
                        if(isset($_GET['hot_deal_pro'])) {
                            ?>
                        <input type="hidden" name="hot_deal_pro" value="<?php echo 1 ?>">
                        <?php
                        }
                        ?>
                    <input type="hidden" name="p_id" value="<?php echo $product_id; ?>">
                    <input type="hidden" name="sub_cat_id" value="<?php echo $product_sub_cat_id; ?>">
                    <div class="notify_me_container">
                    <button class="notify_me_btn" name="notify_me_req" value="1">Notify Me</button>
                    </div>

                  </form>
                  <?php
              }

              ?>

              


             <div class="PIandC_cost_container_btn_div2">
                 <a href="https://www.facebook.com/"><button class="btn1" title="Share on Facebook"><i class="fab fa-facebook-f"></i> SHARE</button></a>
                <a href="https://www.twitter.com"> <button class="btn2" title="Tweet on Tweeter"><i class="fab fa-twitter"></i> TWEET</button></a>
                 <a href="https://www.pinterest.com/"><button class="btn3" title="Pin on Pinterest"><i class="fab fa-pinterest"></i> PIN IT</button></a>
                
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
                    <?php
                    if(isset($_GET['hot_deal_pro'])) {
                        ?>
                        <input type="hidden" name="hot_deal_pro" value="<?php echo 1; ?>">
                        <?php 
                    }
                    if(isset($_GET['best_selling_pro'])) {
                        ?>
                        <input type="hidden" name="best_selling_pro" value="<?php echo 1; ?>">
                        <?php
                    }
                    ?>
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
                $review_review_id = $row['review_id'];
                $review_known_user_id = $row['known_user_id'];
                $review_p_id = $row['p_id'];


                $give_color_to_like_query = "SELECT * FROM `sub_reviews` WHERE `review_id` = $review_review_id";

                if(isset($_SESSION['user_id'])) {
                    $p_known_user_id = $_SESSION['user_id'];
                    $give_color_to_like_query = "SELECT * FROM `sub_reviews` WHERE `review_id` = $review_review_id AND `user_id` = $p_known_user_id;";
                }
                
            $give_color_to_like_result = mysqli_query($con, $give_color_to_like_query);
            $give_color_to_like_fetch = mysqli_fetch_assoc($give_color_to_like_result);
            
            $like_class = "";
            $dislike_class = "";

            if(isset($_SESSION['user_id'])) {
                if($give_color_to_like_fetch['is_like'] == 1) {
                    $like_class = "checked_like";
                }
                
                if($give_color_to_like_fetch['is_dislike'] == 1) {
                    $dislike_class = "checked_like";
                }
            }
            

                $product_like_count_query = "SELECT COUNT(is_like) AS `is_like` FROM `sub_reviews` WHERE `review_id` = $review_review_id AND `is_like` = 1;";
                $product_like_count_result = mysqli_query($con, $product_like_count_query);
                
                while($fetch_like_count = mysqli_fetch_assoc($product_like_count_result)) {
                    $like_count = $fetch_like_count['is_like'];
                }

                $product_dislike_count_query = "SELECT COUNT(is_dislike) AS `is_dislike` FROM `sub_reviews` WHERE `review_id` = $review_review_id AND `is_dislike` = 1;";
                $product_dislike_count_result = mysqli_query($con, $product_dislike_count_query);
                while($fetch_dislike_count = mysqli_fetch_assoc($product_dislike_count_result)) {
                    $dislike_count = $fetch_dislike_count['is_dislike'];
                }

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
                    <?php
                    if(isset($_GET['best_selling_pro'])) {
                    ?>
                    <input type="hidden" name="best_selling_pro" value="<?php echo 1; ?>">
                    <?php
                    } else {
                    ?>
                    <input type="hidden" name="hot_deal_pro" value="<?php echo 1; ?>">
                    <?php
                    }
                    ?>
                    <span class="customer_review_container_thumbs"><button name="p_like" value="<?php echo 1; ?>"><i class="fas fa-thumbs-up <?php echo $like_class; ?>"></i></button> <?php echo $like_count; ?></span>
                    <span class="customer_review_container_thumbs"><button name="p_dislike" value="<?php echo 1; ?>"><i class="fas fa-thumbs-down <?php echo $dislike_class; ?>"></i></button> <?php echo $dislike_count; ?></span>
                    </form>
                </div>
                
                <?php } ?>
                
        </div>
    </div>
</center>
<!--review container end-->

<!--questions and answers container start-->
<center>
    <div class="ques_and_ans_container" id="ques_and_ans_container_for_nav">
        <div class="heading">
            <h1>Questions and Answers</h1>
            <div class="search_container">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>#ques_and_ans_container_for_nav" method="GET">
                <?php
                    if(isset($_GET['best_selling_pro'])) {
                    ?>
                    <input type="hidden" name="best_selling_pro" value="<?php echo 1; ?>">
                    <?php
                    } else {
                    ?>
                    <input type="hidden" name="hot_deal_pro" value="<?php echo 1; ?>">
                    <?php
                    }
                    ?>
                    <input type="hidden" name="p_id" value="<?php echo $product_id;?>">
                    <input type="hidden" name="sub_cat_id" value="<?php echo $product_sub_cat_id; ?>">
                <input type="search" name="ques" placeholder="Have a Question? Search for Answers" required>
                <button type="submit" ><i class="fas fa-search"></i></button>
                </form>
            </div>
        </div>
        <div class="content">

        <?php 

        $products_q_and_a_query = "SELECT * FROM `product_questions_and_answers` WHERE `p_id`=$product_id AND `status` = 'approved';";

        if(isset($_GET['ques'])) {
            $question = $_GET['ques'];
            $products_q_and_a_query = "SELECT * FROM `product_questions_and_answers` WHERE `p_ques` LIKE '%$question%' AND `status` = 'approved';";
        }

        $products_q_and_a_result = mysqli_query($con, $products_q_and_a_query);
        $products_q_and_a_result_row_count = mysqli_num_rows($products_q_and_a_result);

        while($row = mysqli_fetch_assoc($products_q_and_a_result)) {
            $product_p_q_and_a_id = $row['p_q_and_a_id'];
            $product_ques_person_name = $row['ques_person_name'];
            $product_p_ques = $row['p_ques'];
            $product_p_ans = $row['p_ans'];

            $give_color_to_like_query = "SELECT * FROM `sub_question_and_answers` WHERE `ques_id` = $product_p_q_and_a_id;";

            if(isset($_SESSION['user_id'])) {
                $p_known_user_id = $_SESSION['user_id'];
                $give_color_to_like_query = "SELECT * FROM `sub_question_and_answers` WHERE `ques_id` = $product_p_q_and_a_id AND `user_id` = $p_known_user_id;";
            }
            
            $give_color_to_like_result = mysqli_query($con, $give_color_to_like_query);
            $give_color_to_like_fetch = mysqli_fetch_assoc($give_color_to_like_result);
            
            $like_class = "";
            $dislike_class = "";

            if(isset($_SESSION['user_id'])) {
                if($give_color_to_like_fetch['is_like'] == 1) {
                    $like_class = "checked_like";
                }
                
                if($give_color_to_like_fetch['is_dislike'] == 1) {
                    $dislike_class = "checked_like";
                }
            }
           

            $question_like_count_query = "SELECT COUNT(is_like) AS `is_like` FROM `sub_question_and_answers` WHERE `ques_id` = $product_p_q_and_a_id AND `is_like` = 1;";
                $question_like_count_result = mysqli_query($con, $question_like_count_query);
                
                while($fetch_like_count = mysqli_fetch_assoc($question_like_count_result)) {
                    $like_count = $fetch_like_count['is_like'];
                }

                $question_dislike_count_query = "SELECT COUNT(is_dislike) AS `is_dislike` FROM `sub_question_and_answers` WHERE `ques_id` = $product_p_q_and_a_id AND `is_dislike` = 1;";
                $question_dislike_count_result = mysqli_query($con, $question_dislike_count_query);
                while($fetch_dislike_count = mysqli_fetch_assoc($question_dislike_count_result)) {
                    $dislike_count = $fetch_dislike_count['is_dislike'];
                }

        ?>
            <div>
                <h5 class="h5tag">Q: <?php echo $product_p_ques; ?></h5>
                <span><h5 class="h5tag1">A: </h5><?php echo $product_p_ans; ?></span> <br>
                <span><?php echo $product_ques_person_name; ?></span> <br>
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="GET">
                <input type="hidden" name="p_id" value="<?php echo $product_id;?>">
                <input type="hidden" name="sub_cat_id" value="<?php echo $product_sub_cat_id; ?>">
                <?php
                    if(isset($_GET['best_selling_pro'])) {
                    ?>
                    <input type="hidden" name="best_selling_pro" value="<?php echo 1; ?>">
                    <?php
                    } else {
                    ?>
                    <input type="hidden" name="hot_deal_pro" value="<?php echo 1; ?>">
                    <?php
                    }
                    ?>
                <input type="hidden" name="p_q_and_a_id" value="<?php echo $product_p_q_and_a_id; ?>">
                <span class="thumbs"><button name="p_q_like" value="<?php echo 1; ?>"><i class="fas fa-thumbs-up <?php echo $like_class; ?>"></i></button> <?php echo $like_count; ?></span>
                <span class="thumbs"><button name="p_q_dislike" value="<?php echo 1; ?>" ><i class="fas fa-thumbs-down <?php echo $dislike_class; ?>"></i></button> <?php echo $dislike_count; ?></span>
                </form>
            </div>
           
           <?php  } ?>
            
        </div>
        <?php
        if($products_q_and_a_result_row_count == 0) {
            ?>
            <div class="zero_question_container" >
            <p class="zero_question_text">Didn't get the right answer you were looking for?</p>
            <button class="zero_question_button">Post Your Question</button>
            </div>
           
            <div class="post_question_container">
               <div class="post_question_close_btn_container">
               <button class="post_question_close_btn"><i class="far fa-window-close"></i></button>
               </div>
                <h2 class="question_input_heading">POST YOUR QUESTION</h2>
                <div class="post_question_inner_container">
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="GET">
                    <?php
                    if(isset($_GET['best_selling_pro'])) {
                    ?>
                    <input type="hidden" name="best_selling_pro" value="<?php echo 1; ?>">
                    <?php
                    } else {
                    ?>
                    <input type="hidden" name="hot_deal_pro" value="<?php echo 1; ?>">
                    <?php
                    }
                    ?>
                   <input type="hidden" name="p_id" value="<?php echo $product_id;?>">
                    <input type="hidden" name="sub_cat_id" value="<?php echo $product_sub_cat_id; ?>">
                        <textarea name="new_ques" placeholder="Post Your Question"></textarea> <br>
                       <center>
                       <button type="submit" class="question_ask_btn">SUBMIT</button>
                       </center>
                    </form>
                </div>

            </div>
            
            <?php
        }
        ?>
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
                    <?php 
                  if(isset($_GET['best_selling_pro'])) {

                    ?>

                   <span>
                    <span class="non_dash_price">&#8377;<?php echo $related_products_p_o_price; ?>.00</span>
                    <span class="non_dash_price">Only</span>
                    <h2 class="offer_value" style="opacity: 0.5"><del style="color: orangered;">50% off</del></h2>
                   </span>

                      <?php
                      
                  } elseif(isset($_GET['hot_deal_pro'])) {
                    ?>

                    <span>
                        <span class="non_dash_price">&#8377;<?php echo floor($related_products_p_o_price/2); ?>.00</span>
                        <del class="dash_price">&#8377;<?php echo $related_products_p_o_price; ?>.00</del>
                        <h2 class="offer_value"><?php 
                            echo 50;
                            ?>% off</h2>
                    </span>
    
                     <?php
                  } else {
                    ?>

                    <span>
                        <span class="non_dash_price">&#8377;<?php echo $related_products_p_a_price; ?>.00</span>
                        <del class="dash_price">&#8377;<?php echo $related_products_p_o_price; ?>.00</del>
                        <h2 class="offer_value"><?php 
                            $offer_value = ($related_products_p_o_price - $related_products_p_a_price) / $related_products_p_o_price;
                            $offer_value = $offer_value * 100;
                            echo intval($offer_value);
                            ?>% off</h2>
                    </span>
    
                     <?php
                  }
                  
                  ?>
               
                    </div>
                </div>
               </a>
                <div class="products_container_products_inner_btn_divs">
                <form action="./view_of_product.php" method="GET">
                    <button title="Add To Cart" name="product_id1" value="<?php echo $related_products_p_id; ?>" ><i class="fas fa-cart-plus" ></i></button>
                    <?php 
                    redirect();
                    ?>
                    </form>
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="GET">
                    <input type="hidden" name="productt_id" value="<?php echo $related_products_p_id; ?>">
                    <button title="Add To Wishlist" name="wish_btn1" ><i class="far fa-heart"></i></button>
                    <?php 
                    redirect();
                    ?>
                    </form>
                    <form action="./view_of_product.php" method="GET">
                    <input type="hidden" name="p_id" value="<?php echo $related_products_p_id; ?>">
                     <input type="hidden" name="sub_cat_id" value="<?php echo $related_products_subs_cat_identification_id; ?>">
                     <button title="Quick View" name="view_all_related1"><i class="fas fa-search"></i></button>
                     <?php
                      redirect();
                     ?>
                     </form>
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