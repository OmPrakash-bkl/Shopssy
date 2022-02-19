
<!-- Cart Detail of Mobile Version Information, Shipping, Payment Page Container Start -->

<div class="information_inner_container_for_mobile">
                <button class="show_summary_btn"><i class="fas fa-shopping-cart"></i> show order summary <i class="fa fa-angle-down"></i></button>
                <span class="tot_amt_of_mobile">&#8377; </span>

                <div class="information_inner_container2 information_inner_container2_of_mobile">
                    <div class="information_inner_container2_1st">

              <?php 
         
            $user_id = $_SESSION['user_id'];
            $cart_details_query = "SELECT * FROM `cart` WHERE `u_id` = $user_id;";
            $cart_details__result = mysqli_query($con, $cart_details_query);
            $product_sub_total = 0;
            while($row = mysqli_fetch_assoc($cart_details__result)) {
                $cart_details_product_id = $row['product_id'];
                $cart_details_quantity = $row['quantity'];
                $cart_details_pro_type = $row['pro_type'];
                $cart_details_product_query = "SELECT * FROM `products` WHERE `p_id` = $cart_details_product_id;";
                $cart_details_product_result = mysqli_query($con, $cart_details_product_query);
                while($row2 = mysqli_fetch_assoc($cart_details_product_result)) {
                    $cart_details_product_p_title = $row2['p_title'];
                    $cart_details_product_p_image = $row2['p_image'];
                    $cart_details_product_p_a_price = $row2['p_a_price'];
                    $cart_details_product_p_o_price = $row2['p_o_price'];
               
            ?>

                        <div class="information_inner_container2_divs">
                            <div class="information_inner_container2_divs_image">
                                <img src="./images/<?php echo $cart_details_product_p_image; ?>" alt="<?php echo $cart_details_product_p_title; ?>">
                            </div>
                            <div class="information_inner_container2_divs_title information_inner_container2_divs_title1">
                             <h5><?php echo $cart_details_product_p_title; ?></h5>
                            </div>
                            <div class="information_inner_container2_divs_qty information_inner_container2_divs_qty1">
                            X <?php echo $cart_details_quantity; ?>
                            </div>
                            <div class="information_inner_container2_divs_price">
                                &#8377; <?php
                        if($cart_details_pro_type == 'normal') {
                            $product_total_price = $cart_details_quantity * $cart_details_product_p_o_price; 
                        } elseif($cart_details_pro_type == 'hot') {
                            $temp_price = floor($cart_details_product_p_o_price/2);
                            $product_total_price = $cart_details_quantity * $temp_price;
                        } else {
                            $product_total_price = $cart_details_quantity * $cart_details_product_p_a_price; 
                        }
                       
                        echo $product_total_price;
                        $product_sub_total = $product_sub_total + $product_total_price;
                        ?>.00
                            </div>
                        </div>
                        <?php } } ?>
                        
                    </div>
        
                    <div class="information_inner_container2_1st">
                        <div class="information_inner_container2_divs1">
                            <div class="information_inner_container2_divs_txt">
                                <p>subtotal</p>
                            </div>
                            <div class="information_inner_container2_divs_title">
                             
                            </div>
                            <div class="information_inner_container2_divs_qty">
                           
                            </div>
                            <div class="information_inner_container2_divs_pricez">
                                &#8377; <?php echo $product_sub_total; ?>.00
                            </div>
                        </div>
            
                        <div class="information_inner_container2_divs1">
                            <div class="information_inner_container2_divs_txt">
                                <p>shipping</p>
                            </div>
                            <div class="information_inner_container2_divs_title">
                             
                            </div>
                            <div class="information_inner_container2_divs_qty">
                           
                            </div>
                            <div class="information_inner_container2_divs_pricez">
                                &#8377; 50.00
                            </div>
                        </div>
                        
                    </div>
        
                    <div class="information_inner_container2_1st">
                        <div class="information_inner_container2_divs1">
                            <div class="information_inner_container2_divs_txt1">
                                <p>Total</p>
                            </div>
                            <div class="information_inner_container2_divs_title">
                             
                            </div>
                            <div class="information_inner_container2_divs_qty">
                           
                            </div>
                            <div class="information_inner_container2_divs_pricez1">
                                &#8377; <?php echo $product_sub_total+50; ?>.00
                                <?php 
                                $tot_amt = $product_sub_total+50;
                                $tot_amt = $tot_amt.".00";
                                ?>
                                <script>
                                    let x = document.createTextNode("<?php echo $tot_amt; ?>");
                                    document.getElementsByClassName("tot_amt_of_mobile")[0].appendChild(x);
                                </script>
                                <?php
                                ?>
                            </div>
                        </div>
            
                        
                    </div>
        
        
                </div>

            </div>

<!-- Cart Detail of Mobile Version Information, Shipping, Payment Page Container End -->
