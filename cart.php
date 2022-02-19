<?php 
include './action.php';

$title = "Your Shopping Cart - Shopssy";
include './header.php';

// Product Quantity Increment Section Start

if(isset($_POST['product_id'])) {
    $cart_sub_pro_id = $_POST['product_id'];
}
if(isset($_POST['incre_quantity'])) {
    $qty = $_POST['quantity'];
    $qty = ++$qty;
if(isset($_SESSION['user_login_id'])) {
    $cart_sub_update_query = "UPDATE `cart` SET `quantity` = $qty WHERE `product_id`=$cart_sub_pro_id;";
} else {
    $cart_sub_update_query = "UPDATE `unnamed_user_cart` SET `qty` = $qty WHERE `prod_id_of_cart`=$cart_sub_pro_id;";
   
}
   $cart_sub_update_result = mysqli_query($con, $cart_sub_update_query);
   ?>
   <script type="text/javascript">
   window.location.href = 'http://localhost:3000/cart.php';
   </script>
   <?php
}

// Product Quantity Increment Section End

// Product Quantity Decrement Section Start

if(isset($_POST['decre_quantity'])) {
    $qty = $_POST['quantity'];
    if($qty > 1) {
     $qty = --$qty;
    } else {
        $qty = 1;
    }
    if(isset($_SESSION['user_login_id'])) {
        $cart_sub_update_query = "UPDATE `cart` SET `quantity` = $qty WHERE `product_id`=$cart_sub_pro_id;";
    } else {
        $cart_sub_update_query = "UPDATE `unnamed_user_cart` SET `qty` = $qty WHERE `prod_id_of_cart`=$cart_sub_pro_id;";
    }
    $cart_sub_update_result = mysqli_query($con, $cart_sub_update_query);
    ?>
    <script type="text/javascript">
    window.location.href = 'http://localhost:3000/cart.php';
    </script>
    <?php
}
// Product Quantity Decrement Section End

// Product Deletion Section Start

if(isset($_POST['delete_btn'])) {
    if(isset($_SESSION['user_login_id'])) {
        $cart_sub_product_id = $_POST['product_id'];
        $cart_sub_delete_query = "DELETE FROM `cart` WHERE `product_id` = $cart_sub_product_id;";
    } else {
        $cart_sub_product_id = $_POST['product_id'];
        $cart_sub_delete_query = "DELETE FROM `unnamed_user_cart` WHERE `prod_id_of_cart` = $cart_sub_product_id;";
    }
    mysqli_query($con, $cart_sub_delete_query);
    ?>
    <script type="text/javascript">
    window.location.href = 'http://localhost:3000/cart.php';
    </script>
    <?php
}
// Product Deletion Section End

?>    
    <!--sub navigation container start-->
    <div class="sub_navigation_container">
<center>
    <div class="sub_navigation_inner_container">
        <span><a href="./index.php">Home</a></span>
        <span><i class="fas fa-arrow-right" style="color: #666666;font-size: 12px;"></i></span>
        <span><a href="./cart.php">Your Cart</a></span>
    </div>
</center>
    </div>
    <!--sub navigation container end-->

    <!--shopping cart container start-->
    <center>
       
        <div class="shopping_cart_container">
            <table class="table_for_desktop_shopping_cart">
                <tr>
                    <th>Product</th>
                    <th></th>
                    <th></th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>

                <?php 

                // Cart Function If User Is A Shopssy User Start
                
                if(isset($_SESSION['user_login_id'])) {
                    if(isset($_SESSION['user_id'])) {
                        $user_id = $_SESSION['user_id'];
                    }
                    ?>

                    <?php

                $pro_cart_user_desc="";
                $cart_page_query = "SELECT * FROM `cart` WHERE `u_id`=$user_id;";
                $cart_page_result = mysqli_query($con, $cart_page_query);
                $cart_count_checking = mysqli_num_rows($cart_page_result); 
                
                $cart_products_total_price = 0;
                while($row = mysqli_fetch_assoc($cart_page_result)) {
                    $pro_id = $row['product_id'];
                    $pro_quantity = $row['quantity'];
                    $pro_u_id = $row['u_id'];
                    $pro_cart_user_desc = $row['cart_user_desc'];
                    $pro_cart_pro_type = $row['pro_type'];
                    $big_cart_query = "SELECT * FROM `products` WHERE `p_id`=$pro_id;";
                    $big_cart_result = mysqli_query($con, $big_cart_query);
                    while($row1 = mysqli_fetch_assoc($big_cart_result)) {
                        $big_cart_p_image = $row1['p_image'];
                        $big_cart_p_title = $row1['p_title'];
                        $big_cart_p_a_price = $row1['p_a_price'];
                        $big_cart_p_o_price = $row1['p_o_price'];
                        $cart_update_prod_id = $row1['p_id'];
                    }

                   
                ?>

                <tr>
                    <td><img src="./images/<?php echo $big_cart_p_image; ?>" alt="mobile image" class="shopping_cart_images"></td>
                    <td class="product_name_container">
                        <span class="product_name"><?php echo $big_cart_p_title; ?></span> <br>

                        <?php 
                        
                        $product_specification_retrieve_query = "SELECT * FROM `products_specification` WHERE `p_id` = $pro_id ORDER BY RAND() LIMIT 2;";
                        $product_specification_retrieve_result = mysqli_query($con, $product_specification_retrieve_query);
                        $pro_spec_title = "";
                            $pro_spec_detail = "";
                        while($row2 = mysqli_fetch_assoc($product_specification_retrieve_result)) {
                            $pro_spec_title = $row2['p_spec_title'];
                            $pro_spec_detail = $row2['p_spec_details'];
                        ?>

                        <span class="product_size"><?php echo $pro_spec_title; ?>: <?php echo $pro_spec_detail; ?></span> <br>
                        <?php } ?>

                    </td>
                    <td>
                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                        <input type="hidden" name="product_id" value="<?php echo $pro_id; ?>">
                        <button class="delete_btn_of_cart" name="delete_btn" ><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                    <td class="price_of_cart">&#8377;<?php 
                    if($pro_cart_pro_type == 'normal') {
                        echo $big_cart_p_o_price;
                    } elseif($pro_cart_pro_type == 'hot') {
                        echo floor($big_cart_p_o_price/2);
                    } else {
                        echo $big_cart_p_a_price;
                    }
                    ?>.00</td>
                    <td>
                        <div class="incre_decre_container_of_cart">
                            <div>
                                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                                <button class="decre" name="decre_quantity" value="<?php echo $pro_quantity; ?>">-</button>
                                <span class="counter"><?php echo $pro_quantity; ?></span> 
                                <input type="hidden" name="quantity" value="<?php echo $pro_quantity; ?>">
                                <input type="hidden" name="product_id" value=<?php echo $pro_id; ?>>
                                <button class="incre" name="incre_quantity" value="<?php echo $pro_quantity++; ?>">+</button>
                                </form>
                            </div>
                          </div>
                    </td>
                    <td class="total_price_of_cart">&#8377;<?php 
                    if($pro_cart_pro_type == 'normal') {
                        $tot_price = ($pro_quantity - 1 ) * $big_cart_p_o_price;
                        echo $tot_price;
                        $cart_products_total_price =  $cart_products_total_price+$tot_price;
                    } elseif($pro_cart_pro_type == 'hot') {
                        $temp_price = floor($big_cart_p_o_price/2);
                        $tot_price = ($pro_quantity - 1 ) * $temp_price;
                        echo $tot_price;
                        $cart_products_total_price =  $cart_products_total_price+$tot_price;
                    } else {
                        $tot_price = ($pro_quantity - 1 ) * $big_cart_p_a_price;
                        echo $tot_price;
                        $cart_products_total_price =  $cart_products_total_price+$tot_price;
                    }
                    ?>.00</td>
                </tr>

                <?php  } ?>
                <?php 
                }
                 // Cart Function If User Is A Shopssy User End

                  // Cart Function If User Is Not A Shopssy User Start

                  else {
                    $user_id = $_COOKIE['T093NO5A86H'];
                    $pro_cart_user_desc="";
                    $cart_page_query = "SELECT * FROM `unnamed_user_cart` WHERE `un_u_cart_token`=$user_id;";
                    $cart_page_result = mysqli_query($con, $cart_page_query);
                    $cart_count_checking = mysqli_num_rows($cart_page_result); 
                   
                    $cart_products_total_price = 0;
                    while($row = mysqli_fetch_assoc($cart_page_result)) {
                        $pro_id = $row['prod_id_of_cart'];
                        $pro_quantity = $row['qty'];
                        $pro_u_id = $row['un_u_cart_token'];
                        $pro_cart_user_desc = $row['cart_desc'];
                        $pro_cart_pro_type = $row['pro_type'];
                        $big_cart_query = "SELECT * FROM `products` WHERE `p_id`=$pro_id;";
                        $big_cart_result = mysqli_query($con, $big_cart_query);
                        while($row1 = mysqli_fetch_assoc($big_cart_result)) {
                            $big_cart_p_image = $row1['p_image'];
                            $big_cart_p_title = $row1['p_title'];
                            $big_cart_p_a_price = $row1['p_a_price'];
                            $big_cart_p_o_price = $row1['p_o_price'];
                            $cart_update_prod_id = $row1['p_id'];
                        }
                       
                    ?>
    
                    <tr>
                        <td><img src="./images/<?php echo $big_cart_p_image; ?>" alt="mobile image" class="shopping_cart_images"></td>
                        <td class="product_name_container">
                            <span class="product_name"><?php echo $big_cart_p_title; ?></span> <br>

                            <?php 
                        $product_specification_retrieve_query = "SELECT * FROM `products_specification` WHERE `p_id` = $pro_id ORDER BY RAND() LIMIT 2;";
                        $product_specification_retrieve_result = mysqli_query($con, $product_specification_retrieve_query);
                        $pro_spec_title = "";
                            $pro_spec_detail = "";
                        while($row2 = mysqli_fetch_assoc($product_specification_retrieve_result)) {
                            $pro_spec_title = $row2['p_spec_title'];
                            $pro_spec_detail = $row2['p_spec_details'];
                        ?>

                        <span class="product_size"><?php echo $pro_spec_title; ?>: <?php echo $pro_spec_detail; ?></span> <br>
                        <?php } ?>

                        </td>
                        <td>
                            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                            <input type="hidden" name="product_id" value="<?php echo $pro_id; ?>">
                            <button class="delete_btn_of_cart" name="delete_btn" ><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                        <td class="price_of_cart">&#8377;<?php
                         if($pro_cart_pro_type == 'normal') {
                            echo $big_cart_p_o_price;
                        } elseif($pro_cart_pro_type == 'hot') {
                            echo floor($big_cart_p_o_price/2);
                        } else {
                            echo $big_cart_p_a_price;
                        }
                        ?>.00</td>
                        <td>
                            <div class="incre_decre_container_of_cart">
                                <div>
                                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                                    <button class="decre" name="decre_quantity" value="<?php echo $pro_quantity; ?>">-</button>
                                    <span class="counter"><?php echo $pro_quantity; ?></span> 
                                    <input type="hidden" name="quantity" value="<?php echo $pro_quantity; ?>">
                                    <input type="hidden" name="product_id" value=<?php echo $pro_id; ?>>
                                    <button class="incre" name="incre_quantity" value="<?php echo $pro_quantity++; ?>">+</button>
                                    </form>
                                </div>
                              </div>
                        </td>
                        <td class="total_price_of_cart">&#8377;<?php 
                         if($pro_cart_pro_type == 'normal') {
                            $tot_price = ($pro_quantity - 1 ) * $big_cart_p_o_price;
                            echo $tot_price;
                            $cart_products_total_price =  $cart_products_total_price+$tot_price;
                        } elseif($pro_cart_pro_type == 'hot') {
                            $temp_price = floor($big_cart_p_o_price/2);
                            $tot_price = ($pro_quantity - 1 ) * $temp_price;
                            echo $tot_price;
                            $cart_products_total_price =  $cart_products_total_price+$tot_price;
                        } else {
                            $tot_price = ($pro_quantity - 1 ) * $big_cart_p_a_price;
                            echo $tot_price;
                            $cart_products_total_price =  $cart_products_total_price+$tot_price;
                        }
                        ?>.00</td>
                    </tr>
    
                    <?php } }

                    // Cart Function If User Is Not A Shopssy User End

                    ?>
    
                
              
           
             
            </table>

            <!-- Mobile Version Cart Section Start -->

           <div class="table_for_mobile_shopping_cart">

           <?php 

            // Cart Function If User Is A Shopssy User Start

            if(isset($_SESSION['user_login_id'])) {
                if(isset($_SESSION['user_id'])) {
                    $user_id = $_SESSION['user_id'];
                }

                $pro_cart_user_desc="";
                $cart_page_query = "SELECT * FROM `cart` WHERE `u_id`=$user_id;";
                $cart_page_result = mysqli_query($con, $cart_page_query);
                $cart_products_total_price = 0;
                while($row = mysqli_fetch_assoc($cart_page_result)) {
                    $pro_id = $row['product_id'];
                    $pro_quantity = $row['quantity'];
                    $pro_u_id = $row['u_id'];
                    $pro_cart_user_desc = $row['cart_user_desc'];
                    $pro_cart_pro_type = $row['pro_type'];
                    $big_cart_query = "SELECT * FROM `products` WHERE `p_id`=$pro_id;";
                    $big_cart_result = mysqli_query($con, $big_cart_query);
                    while($row1 = mysqli_fetch_assoc($big_cart_result)) {
                        $big_cart_p_image = $row1['p_image'];
                        $big_cart_p_title = $row1['p_title'];
                        $big_cart_p_a_price = $row1['p_a_price'];
                        $big_cart_p_o_price = $row1['p_o_price'];
                        $cart_update_prod_id = $row1['p_id'];
                    }


                ?>

                <div class="table_for_mobile_shopping_cart_1st_row">

                   <div class="table_for_mobile_shopping_cart_1st_row_inner_div">
                    <img src="./images/<?php echo $big_cart_p_image; ?>" alt="mobile image" class="shopping_cart_images">
                   </div>

                   <div class="table_for_mobile_shopping_cart_1st_row_inner_div table_for_mobile_shopping_cart_1st_row_inner_div_center_div">
                    <span class="product_name"><?php echo $big_cart_p_title; ?></span> <br>
                   
                    <?php 
                        
                        $product_specification_retrieve_query = "SELECT * FROM `products_specification` WHERE `p_id` = $pro_id ORDER BY RAND() LIMIT 2;";
                        $product_specification_retrieve_result = mysqli_query($con, $product_specification_retrieve_query);
                        $pro_spec_title = "";
                            $pro_spec_detail = "";
                        while($row2 = mysqli_fetch_assoc($product_specification_retrieve_result)) {
                            $pro_spec_title = $row2['p_spec_title'];
                            $pro_spec_detail = $row2['p_spec_details'];
                        ?>

                        <span class="product_size"><?php echo $pro_spec_title; ?>: <?php echo $pro_spec_detail; ?></span> <br>
                        <?php } ?>

                   </div>


                   <div class="table_for_mobile_shopping_cart_1st_row_inner_div">
                   <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                   <input type="hidden" name="product_id" value="<?php echo $pro_id; ?>">
                    <button class="delete_btn_of_cart delete_btn_of_cart1" name="delete_btn"><i class="fas fa-trash-alt"></i></button>
                    </form>
                   </div>

               </div>

               <div class="table_for_mobile_shopping_cart_1st_row">

                <div class="table_for_mobile_shopping_cart_1st_row_inner_div">
                    <h2 class="heading">Price</h2>
                </div>

                <div class="table_for_mobile_shopping_cart_1st_row_inner_div">

                </div>

                <div class="table_for_mobile_shopping_cart_1st_row_inner_div">
                    <h2 class="price_of_cart">&#8377;<?php 
                    if($pro_cart_pro_type == 'normal') {
                        echo $big_cart_p_o_price;
                    } elseif($pro_cart_pro_type == 'hot') {
                        echo floor($big_cart_p_o_price/2);
                    } else {
                        echo $big_cart_p_a_price;
                    }
                    ?>.00</h2>
                </div>

            </div>

            <div class="table_for_mobile_shopping_cart_1st_row">

                <div class="table_for_mobile_shopping_cart_1st_row_inner_div">
                    <h2 class="heading">Quantity</h2>
                </div>

                <div class="table_for_mobile_shopping_cart_1st_row_inner_div">

                </div>

                <div class="table_for_mobile_shopping_cart_1st_row_inner_div">

               
                    <div class="incre_decre_container_of_cart">
                        <div>
                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                            <button class="decre" name="decre_quantity" value="<?php echo $pro_quantity; ?>">-</button>
                            <span class="counter"><?php echo $pro_quantity; ?></span>
                            <input type="hidden" name="quantity" value="<?php echo $pro_quantity; ?>">
                            <input type="hidden" name="product_id" value=<?php echo $pro_id; ?>>
                            <button class="incre" name="incre_quantity" value="<?php echo $pro_quantity++; ?>">+</button>
                            </form>
                        </div>
                      </div>
                </div>

            </div>

            <div class="table_for_mobile_shopping_cart_1st_row  for_bottom_border">

                <div class="table_for_mobile_shopping_cart_1st_row_inner_div">
                    <h2 class="heading">Total</h2>
                </div>

                <div class="table_for_mobile_shopping_cart_1st_row_inner_div">

                </div>

                <div class="table_for_mobile_shopping_cart_1st_row_inner_div">
                    <h2 class="total_price_of_cart">&#8377;<?php 
                    if($pro_cart_pro_type == 'normal') {
                        $tot_price = ($pro_quantity - 1 ) * $big_cart_p_o_price;
                        echo $tot_price;
                        $cart_products_total_price =  $cart_products_total_price+$tot_price;
                    } elseif($pro_cart_pro_type == 'hot') {
                        $temp_price = floor($big_cart_p_o_price/2);
                        $tot_price = ($pro_quantity - 1 ) * $temp_price;
                        echo $tot_price;
                        $cart_products_total_price =  $cart_products_total_price+$tot_price;
                    } else {
                        $tot_price = ($pro_quantity - 1 ) * $big_cart_p_a_price;
                        echo $tot_price;
                        $cart_products_total_price =  $cart_products_total_price+$tot_price;
                    }
                    ?>.00</h2>
                 </div>
                </div>

                <?php } ?>

                <?php
            } 
            
            // Cart Function If User Is A Shopssy User End

            // Cart Function If User Is Not A Shopssy User Start

            else {

                $user_id = $_COOKIE['T093NO5A86H'];
                $pro_cart_user_desc="";
                $cart_page_query = "SELECT * FROM `unnamed_user_cart` WHERE `un_u_cart_token`=$user_id;";
                $cart_page_result = mysqli_query($con, $cart_page_query);
                $cart_products_total_price = 0;
                while($row = mysqli_fetch_assoc($cart_page_result)) {
                    $pro_id = $row['prod_id_of_cart'];
                    $pro_quantity = $row['qty'];
                    $pro_u_id = $row['un_u_cart_token'];
                    $pro_cart_user_desc = $row['cart_desc'];
                    $pro_cart_pro_type = $row['pro_type'];
                    $big_cart_query = "SELECT * FROM `products` WHERE `p_id`=$pro_id;";
                    $big_cart_result = mysqli_query($con, $big_cart_query);
                    while($row1 = mysqli_fetch_assoc($big_cart_result)) {
                        $big_cart_p_image = $row1['p_image'];
                        $big_cart_p_title = $row1['p_title'];
                        $big_cart_p_a_price = $row1['p_a_price'];
                        $big_cart_p_o_price = $row1['p_o_price'];
                        $cart_update_prod_id = $row1['p_id'];
                    }

                ?>

                <div class="table_for_mobile_shopping_cart_1st_row">

                   <div class="table_for_mobile_shopping_cart_1st_row_inner_div">
                    <img src="./images/<?php echo $big_cart_p_image; ?>" alt="mobile image" class="shopping_cart_images">
                   </div>

                   <div class="table_for_mobile_shopping_cart_1st_row_inner_div table_for_mobile_shopping_cart_1st_row_inner_div_center_div">
                    <span class="product_name"><?php echo $big_cart_p_title; ?></span> <br>

                    
                    <?php 
                        $product_specification_retrieve_query = "SELECT * FROM `products_specification` WHERE `p_id` = $pro_id ORDER BY RAND() LIMIT 2;";
                        $product_specification_retrieve_result = mysqli_query($con, $product_specification_retrieve_query);
                        $pro_spec_title = "";
                            $pro_spec_detail = "";
                        while($row2 = mysqli_fetch_assoc($product_specification_retrieve_result)) {
                            $pro_spec_title = $row2['p_spec_title'];
                            $pro_spec_detail = $row2['p_spec_details'];
                        ?>

                        <span class="product_size"><?php echo $pro_spec_title; ?>: <?php echo $pro_spec_detail; ?></span> <br>
                        <?php } ?>

                   </div>


                   <div class="table_for_mobile_shopping_cart_1st_row_inner_div">
                   <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                   <input type="hidden" name="product_id" value="<?php echo $pro_id; ?>">
                    <button class="delete_btn_of_cart delete_btn_of_cart1"  name="delete_btn" ><i class="fas fa-trash-alt"></i></button>
                    </form>
                   </div>

               </div>

               <div class="table_for_mobile_shopping_cart_1st_row">

                <div class="table_for_mobile_shopping_cart_1st_row_inner_div">
                    <h2 class="heading">Price</h2>
                </div>

                <div class="table_for_mobile_shopping_cart_1st_row_inner_div">

                </div>

                <div class="table_for_mobile_shopping_cart_1st_row_inner_div">
                    <h2 class="price_of_cart">&#8377;<?php
                         if($pro_cart_pro_type == 'normal') {
                            echo $big_cart_p_o_price;
                        } elseif($pro_cart_pro_type == 'hot') {
                            echo floor($big_cart_p_o_price/2);
                        } else {
                            echo $big_cart_p_a_price;
                        }
                        ?>.00</h2>
                </div>

            </div>

            <div class="table_for_mobile_shopping_cart_1st_row">

                <div class="table_for_mobile_shopping_cart_1st_row_inner_div">
                    <h2 class="heading">Quantity</h2>
                </div>

                <div class="table_for_mobile_shopping_cart_1st_row_inner_div">

                </div>

                <div class="table_for_mobile_shopping_cart_1st_row_inner_div">

               
                    <div class="incre_decre_container_of_cart">
                        <div>
                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                            <button class="decre" name="decre_quantity" value="<?php echo $pro_quantity; ?>">-</button>
                            <span class="counter"><?php echo $pro_quantity; ?></span>
                            <input type="hidden" name="quantity" value="<?php echo $pro_quantity; ?>">
                            <input type="hidden" name="product_id" value=<?php echo $pro_id; ?>>
                            <button class="incre" name="incre_quantity" value="<?php echo $pro_quantity++; ?>">+</button>
                            </form>
                        </div>
                      </div>
                </div>

            </div>

            <div class="table_for_mobile_shopping_cart_1st_row  for_bottom_border">

                <div class="table_for_mobile_shopping_cart_1st_row_inner_div">
                    <h2 class="heading">Total</h2>
                </div>

                <div class="table_for_mobile_shopping_cart_1st_row_inner_div">

                </div>

                <div class="table_for_mobile_shopping_cart_1st_row_inner_div">
                    <h2 class="total_price_of_cart">&#8377;<?php 
                         if($pro_cart_pro_type == 'normal') {
                            $tot_price = ($pro_quantity - 1 ) * $big_cart_p_o_price;
                            echo $tot_price;
                            $cart_products_total_price =  $cart_products_total_price+$tot_price;
                        } elseif($pro_cart_pro_type == 'hot') {
                            $temp_price = floor($big_cart_p_o_price/2);
                            $tot_price = ($pro_quantity - 1 ) * $temp_price;
                            echo $tot_price;
                            $cart_products_total_price =  $cart_products_total_price+$tot_price;
                        } else {
                            $tot_price = ($pro_quantity - 1 ) * $big_cart_p_a_price;
                            echo $tot_price;
                            $cart_products_total_price =  $cart_products_total_price+$tot_price;
                        }
                        ?>.00</h2>
                 </div>
                </div>


                <?php } } 

                 // Cart Function If User Is Not A Shopssy User End

                ?>
               

            </div>

             <!-- Mobile Version Cart Section End -->

             <!-- Adding Cart Note Section Start -->

        <form action="./action.php" method="POST">
          <div class="shopping_cart_note_and_btn_container">
              <div class="shopping_cart_note_and_btn_container_inner_div">
                  <textarea placeholder="Add a note to your order" class="note_input_box" name="cart_user_desc"><?php echo $pro_cart_user_desc; ?></textarea>
              </div>
              <div class="shopping_cart_note_and_btn_container_inner_div">
                  <h4>TOTAL <h2>&#8377;<?php echo $cart_products_total_price; ?>.00</h2></h4>
                  <p>Shipping & taxes calculated at checkout</p>
                
                 <button class="continue_shopping_btn" name="continue_shopping">CONTINUE SHOPPING</button>
                 <input type="hidden" name="u_id" value="<?php echo $pro_u_id; ?>">
                 <input type="hidden" name="pro_tot_price" value="<?php echo $cart_products_total_price; ?>">
                 <input type="hidden" name="produc_id" value="<?php echo $pro_id; ?>">
                  <button name="cart_update">UPDATE</button>
                  <button name="cart_update_and_checkout">CHECK OUT</button>
                
              </div>
          </div>
          </form>


        </div>

        <div class="cart_empty_message_container">
            <h1><i class="fas fa-shopping-cart"></i></h1>
            <h1>Your Cart Is Currently Empty!</h1>
            <p>Before proceed to checkout you must add some products to your shopping cart.</p>
            <p>You will find a lot of interesting products on our "Home" page.</p>
            <a href="./index.php"><button>Back To Home</button></a>
        </div>

          <!-- Adding Cart Note Section End -->

    </center>
    <!--shopping cart container end-->
    
    <?php 
    include "./footer.php";

    if($cart_count_checking == 0) {
        ?>
        <script>
            /* Cart Empty Message Function Start */

function empty_msg_show_off() {
document.getElementsByClassName("shopping_cart_container")[0].style.display = "none";
document.getElementsByClassName("mini_cart_products_container")[0].style.display = "none";
document.getElementsByClassName("mini_cart_form_container")[0].style.display = "none";
document.getElementsByClassName("cart_empty_message_container")[0].style.display = "block";
document.getElementsByClassName("cart_empty_message_container")[1].style.display = "block";
document.getElementsByClassName("cart_empty_message_container")[2].style.display = "block";
document.getElementsByClassName("cart_empty_message_container")[3].style.display = "block";
}

/* Cart Empty Message Function End */

            empty_msg_show_off();
        </script>
        <?php
    }

    ?>
    <script src="./javascript/index.js"></script>
    <script src="./javascript/incre_and_decre.js"></script>
</body>
</html>