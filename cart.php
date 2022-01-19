<?php 
$title = "Your Shopping Cart - Shopssy";
include './header.php';
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

                <tr>
                    <td><img src="./images/mob_image_2.jpg" alt="mobile image" class="shopping_cart_images"></td>
                    <td>
                        <span class="product_name">Lorem, ipsum dolor</span> <br>
                        <span class="product_size">Size: S</span> <br>
                        <span class="product_color">Color: White</span> <br>
                    </td>
                    <td><button class="delete_btn_of_cart"><i class="fas fa-trash-alt"></i></button></td>
                    <td class="price_of_cart">$120.00</td>
                    <td>
                        <div class="incre_decre_container_of_cart">
                            <div>
                                <button class="decre">-</button>
                                <span class="counter">1</span>
                                <button class="incre">+</button>
                            </div>
                          </div>
                    </td>
                    <td class="total_price_of_cart">$120.00</td>
                </tr>

                <tr>
                    <td><img src="./images/watch_image_1.jpg" alt="watch image" class="shopping_cart_images"></td>
                    <td>
                        <span class="product_name">Lorem, ipsum dolor</span> <br>
                        <span class="product_size">Size: S</span> <br>
                        <span class="product_color">Color: White</span> <br>
                    </td>
                    <td><button class="delete_btn_of_cart"><i class="fas fa-trash-alt"></i></button></td>
                    <td class="price_of_cart">$432.00</td>
                    <td>
                        <div class="incre_decre_container_of_cart">
                            <div>
                                <button class="decre">-</button>
                                <span class="counter">1</span>
                                <button class="incre">+</button>
                            </div>
                          </div>
                    </td>
                    <td class="total_price_of_cart">$432.00</td>
                </tr>
            </table>

           <div class="table_for_mobile_shopping_cart">
               <div class="table_for_mobile_shopping_cart_1st_row">

                   <div class="table_for_mobile_shopping_cart_1st_row_inner_div">
                    <img src="./images/mob_image_2.jpg" alt="mobile image" class="shopping_cart_images">
                   </div>

                   <div class="table_for_mobile_shopping_cart_1st_row_inner_div table_for_mobile_shopping_cart_1st_row_inner_div_center_div">
                    <span class="product_name">Lorem, ipsum dolor</span> <br>
                    <span class="product_size">Size: S</span> <br>
                    <span class="product_color">Color: White</span> <br>
                   </div>

                   <div class="table_for_mobile_shopping_cart_1st_row_inner_div">
                    <button class="delete_btn_of_cart delete_btn_of_cart1"><i class="fas fa-trash-alt"></i></button>
                   </div>

               </div>

               <div class="table_for_mobile_shopping_cart_1st_row">

                <div class="table_for_mobile_shopping_cart_1st_row_inner_div">
                    <h2 class="heading">Price</h2>
                </div>

                <div class="table_for_mobile_shopping_cart_1st_row_inner_div">

                </div>

                <div class="table_for_mobile_shopping_cart_1st_row_inner_div">
                    <h2 class="price_of_cart">$120.00</h2>
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
                            <button class="decre">-</button>
                            <span class="counter">1</span>
                            <button class="incre">+</button>
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
                    <h2 class="total_price_of_cart">$120.00</h2>
                 </div>
                </div>

                <div class="table_for_mobile_shopping_cart_1st_row">

                    <div class="table_for_mobile_shopping_cart_1st_row_inner_div">
                        <img src="./images/watch_image_1.jpg" alt="watch image" class="shopping_cart_images">
                    </div>
 
                    <div class="table_for_mobile_shopping_cart_1st_row_inner_div table_for_mobile_shopping_cart_1st_row_inner_div_center_div">
                     <span class="product_name">Lorem, ipsum dolor</span> <br>
                     <span class="product_size">Size: S</span> <br>
                     <span class="product_color">Color: White</span> <br>
                    </div>
 
                    <div class="table_for_mobile_shopping_cart_1st_row_inner_div">
                     <button class="delete_btn_of_cart delete_btn_of_cart1"><i class="fas fa-trash-alt"></i></button>
                    </div>
 
                </div>
 
                <div class="table_for_mobile_shopping_cart_1st_row">
 
                 <div class="table_for_mobile_shopping_cart_1st_row_inner_div">
                     <h2 class="heading">Price</h2>
                 </div>
 
                 <div class="table_for_mobile_shopping_cart_1st_row_inner_div">
 
                 </div>
 
                 <div class="table_for_mobile_shopping_cart_1st_row_inner_div">
                     <h2 class="price_of_cart">$432.00</h2>
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
                             <button class="decre">-</button>
                             <span class="counter">1</span>
                             <button class="incre">+</button>
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
                     <h2 class="total_price_of_cart">$432.00</h2>
                  </div>
                 </div>

            </div>

          <div class="shopping_cart_note_and_btn_container">
              <div class="shopping_cart_note_and_btn_container_inner_div">
                  <textarea placeholder="Add a note to your order" class="note_input_box"></textarea>
              </div>
              <div class="shopping_cart_note_and_btn_container_inner_div">
                  <h4>TOTAL <h2>$984.00</h2></h4>
                  <p>Shipping & taxes calculated at checkout</p>
                  <button class="continue_shopping_btn">CONTINUE SHOPPING</button>
                  <button>UPDATE</button>
                  <button>CHECK OUT</button>
              </div>
          </div>

        </div>
   
    </center>
    <!--shopping cart container end-->
    
    <?php 
    include "./footer.php";
    ?>

    <script src="./javascript/index.js"></script>
    <script src="./javascript/incre_and_decre.js"></script>
</body>
</html>