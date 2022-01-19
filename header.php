<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="This is an Shopssy Ecommerce website Build for College Project Purpose only. This Website is a Clone of Themeforest website.">
  <meta name="keywords" content="Shopssy, Ecommerce, E-Shopping, Online Shopping, Buy, Sale, Offers">
    <title>
        <?php 
        echo $title;
        ?>
    </title>
    <link rel="icon" href="./images/favicon1.png">
    <script src="https://kit.fontawesome.com/628c629a17.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Ceviche+One&family=Josefin+Sans:wght@700&family=Lobster&family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>

    <!--wishlist container start-->
    <center>
        <div class="wishlist_container">
            <div class="user_id_and_cancel_btn_container">
                <button class="user_id_and_cancel_btn_container_btn1"><i class="fas fa-user-check"></i> callmeprakashzz@gmail.com</button>
                <button class="user_id_and_cancel_btn_container_btn2"><i class="fas fa-user-slash"></i> Guest Shopper</button>
                <button class="close_btn_of_wishlist"><i class="far fa-window-close"></i></button>
            </div>

           <div class="wishlist_heading_and_product_parent_container">

            <div class="wishlist_container_heading_container">
                <h2>My Wishlist</h2>
                <button class="three_dot_btn"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></button>

                <div class="share_and_clear_container">
                    <button class="share_email_button"><i class="fas fa-share-alt"></i> Share <i class="fa fa-angle-double-right"></i></button> <br>
                    <button class="delete_email_button"><i class="fas fa-trash-alt"></i> Delete List</button>
                </div>
            </div>

            <!--share email container start-->
            <div class="share_email_container">
                <button class="email_close_btn_of_wishlist"><i class="far fa-window-close"></i></button>
                <h2 class="email_heading">Share List Via Email</h2>

                <div class="share_email_form_container">
                    <form action="">
                        <label for="name_of_email">Sender Name</label> <br>
                        <input type="text" id="name_of_email" placeholder="Your Full Name"> <br>
                        <label for="email_of_email">Recipients Email <span class="astri">*</span></label> <br>
                        <input type="email" id="email_of_email" placeholder="shopper@example.com"> <br>
                        <label for="message_of_email">Message</label> <br>
                        <textarea id="message_of_email" placeholder="Add a note here..">Hey there! Check out My Wishlist</textarea> <br>
                       <button type="submit" class="share_list_btn">SHARE LIST</button>
                    </form>
                </div>

            </div>
            <!--share email container end-->

            <!--save your list container start-->
            <div class="save_your_list_container">
                <button class="savelist_close_btn_of_wishlist"><i class="far fa-window-close"></i></button>
                <h2>Save Your List</h2>
                <p>You are logged in as</p>
                <b>callmeprakashzz@gmail.com</b> <br>
                <center>
                <button class="btn_1">CANCEL</button>
                <button class="btn_2">LOG OUT</button>
                </center>
            </div>
            <!--save your list container end-->

            <!--save your list container 2 start-->
            <div class="save_your_list_container save_your_list_container1">
                <button class="savelist_close_btn_of_wishlist savelist_close_btn_of_wishlist1"><i class="far fa-window-close"></i></button>
                <h2>Save Your List</h2>
                <p>You are currently shopping anonymously. Either log in or save your wishlist items by entering your email address.</p>
               <br>
                <center>
                <a href="./login.html"><button class="btn_1">LOG IN</button></a>
                <button class="btn_2 savelist_close_btn_of_wishlist1_savelist_btn">SAVE LIST</button>
                </center>
            </div>
            <!--save your list container 2 end-->

            <!--save your list container 3 start-->
            <div class="enter_email_address_container">
                <button class="email_close_btn_of_wishlist email_close_btn_of_wishlist2"><i class="far fa-window-close"></i></button>
                <h2 class="email_heading">Share List Via Email</h2>
                <p>Please enter your email address. You will be sent a validation link to click on.</p>
                <form action="">
                    <label for="name_of_container">First Name</label> <br>
                    <input type="text" id="name_of_container" placeholder="First Name (Optional)"> <br>
                    <label for="lname_of_container">Last Name</label> <br>
                    <input type="text" id="lname_of_container" placeholder="Last Name (Optional)"> <br>
                    <label for="email_of_container">Email Address <span class="astri">*</span></label> <br>
                    <input type="email" id="email_of_container" placeholder="Enter your email address"> <br>
                   <center>
                    <button type="submit" class="save_list_btn">SAVE LIST</button>
                   </center>
                </form>
            </div>
            <!--save your list container 3 end -->

            <!--clear list conform container start-->
            <div class="clear_list_container">
              
                    <button class="clearlist_close_btn_of_wishlist"><i class="far fa-window-close"></i></button>
              
                <h2>Are you sure?</h2>
                <p>Do you want to remove all products from My Wishlist?</p>
                <button class="btn1">YES, REMOVE THE ITEM IN MY LIST</button> <br>
                <button class="btn2">NO, I CHANGED MY MIND</button>
            </div>
            <!--clear list confirm container end-->

            <div class="wishlist_product_container">


                <!--empty message container start-->
                <div class="empty_message_container">
                    <h2>Love It? Add To My Wishlist</h2>
                    <p>My Wishlist allows you to keep track of all of your favorites and shopping activity whether you're on your computer, phone, or tablet. You won't have to waste time searching all over again for that item you loved on your phone the other day - it's all here in one place!</p>
                    <a href="#"><button>Continue Shopping</button></a>
                </div>
                <!--empty message container end-->

                <div class="wishlist_product_inner_container">
                    <div class="btn_div1">
                        <button class="cross_btn"><i class="far fa-window-close"></i></button>
                    </div>
                    <div>
                        <img src="./images/mob_image_2.jpg" alt="mobile">
                    </div>
                    <div>
                        <h2>Lorem ipsum dolor sit amet</h2>
                        <p>S / White</p>
                        <h2 class="pricee">&#8377; 120.00</h2>
                        <a href="#"><button class="view_more_btn">View More <i class="fa fa-angle-double-right"></i></button></a>
                        <button class="add_to_cart_btn">ADD TO CART</button>
                    </div>
                </div>

                <div class="wishlist_product_inner_container">
                    <div class="btn_div1">
                        <button class="cross_btn"><i class="far fa-window-close"></i></button>
                    </div>
                    <div>
                        <img src="./images/mob_image_2.jpg" alt="mobile">
                    </div>
                    <div>
                        <h2>Lorem ipsum dolor sit amet</h2>
                        <p>S / White</p>
                        <h2 class="pricee">&#8377; 120.00</h2>
                        <a href="#"><button class="view_more_btn">View More <i class="fa fa-angle-double-right"></i></button></a>
                        <button class="add_to_cart_btn">ADD TO CART</button>
                    </div>
                </div>

                <div class="wishlist_product_inner_container">
                    <div class="btn_div1">
                        <button class="cross_btn"><i class="far fa-window-close"></i></button>
                    </div>
                    <div>
                        <img src="./images/mob_image_2.jpg" alt="mobile">
                    </div>
                    <div>
                        <h2>Lorem ipsum dolor sit amet</h2>
                        <p>S / White</p>
                        <h2 class="pricee">&#8377; 120.00</h2>
                        <a href="#"><button class="view_more_btn">View More <i class="fa fa-angle-double-right"></i></button></a>
                        <button class="add_to_cart_btn">ADD TO CART</button>
                    </div>
                </div>
                
                <div class="wishlist_product_inner_container">
                    <div class="btn_div1">
                        <button class="cross_btn"><i class="far fa-window-close"></i></button>
                    </div>
                    <div>
                        <img src="./images/mob_image_2.jpg" alt="mobile">
                    </div>
                    <div>
                        <h2>Lorem ipsum dolor sit amet</h2>
                        <p>S / White</p>
                        <h2 class="pricee">&#8377; 120.00</h2>
                        <a href="#"><button class="view_more_btn">View More <i class="fa fa-angle-double-right"></i></button></a>
                        <button class="add_to_cart_btn">ADD TO CART</button>
                    </div>
                </div>

                <div class="wishlist_product_inner_container">
                    <div class="btn_div1">
                        <button class="cross_btn"><i class="far fa-window-close"></i></button>
                    </div>
                    <div>
                        <img src="./images/mob_image_2.jpg" alt="mobile">
                    </div>
                    <div>
                        <h2>Lorem ipsum dolor sit amet</h2>
                        <p>S / White</p>
                        <h2 class="pricee">&#8377; 120.00</h2>
                        <a href="#"><button class="view_more_btn">View More <i class="fa fa-angle-double-right"></i></button></a>
                        <button class="add_to_cart_btn">ADD TO CART</button>
                    </div>
                </div>

                <div class="wishlist_product_inner_container">
                    <div class="btn_div1">
                        <button class="cross_btn"><i class="far fa-window-close"></i></button>
                    </div>
                    <div>
                        <img src="./images/mob_image_2.jpg" alt="mobile">
                    </div>
                    <div>
                        <h2>Lorem ipsum dolor sit amet</h2>
                        <p>S / White</p>
                        <h2 class="pricee">&#8377; 120.00</h2>
                        <a href="#"><button class="view_more_btn">View More <i class="fa fa-angle-double-right"></i></button></a>
                        <button class="add_to_cart_btn">ADD TO CART</button>
                    </div>
                </div>

                <div class="wishlist_product_inner_container">
                    <div class="btn_div1">
                        <button class="cross_btn"><i class="far fa-window-close"></i></button>
                    </div>
                    <div>
                        <img src="./images/mob_image_2.jpg" alt="mobile">
                    </div>
                    <div>
                        <h2>Lorem ipsum dolor sit amet</h2>
                        <p>S / White</p>
                        <h2 class="pricee">&#8377; 120.00</h2>
                        <a href="#"><button class="view_more_btn">View More <i class="fa fa-angle-double-right"></i></button></a>
                        <button class="add_to_cart_btn">ADD TO CART</button>
                    </div>
                </div>
                
               
            </div>
           </div>
        </div>
    </center>
    <!--wishlist container end-->


    <!--Navbar Container Start-->

    <div class="navbar_container">
        <!--Navbar container for desktop start-->
        <div class="navbar_container_for_desktop">
    <!--Header Start-->
    <center>
    <div class="header_main_container">
        <div class="header_container_childs header_container_left">
            <h1><a href="#">Shopssy</a></h1>
        </div>
        <div class="header_container_childs header_container_right">
            <div>
                <i class="fas fa-headset" style="color:#1792e9;font-size: 45px;"></i>
                <div id="header_container_phonenumber_div">
                    <b>Call Customer Services :</b> <br>
                    <h3>+84-0123-456-789</h3>
                </div>
            </div>
        </div>
    </div>
    </center>
    <!--Header End-->


    <!--Navbar Start-->
<center>
    <div class="navbar_main_container">

        <div class="navbar_main_container_childs navbar_main_container_childs_one">
         <div class="shop_by_category_container" id="table_navbar_showing_container">
            <i class="fas fa-bars" style="color: white;font-size: 20px;"></i>
            <p>SHOP BY CATEGORIES</p>
            <i class="fas fa-chevron-circle-down" style="color: white;font-size: 20px;" id="hamburger's_arrow_icon"></i>
            <!--hamburger container start-->

            <div class="hamburger_main_container_table" id="hamburger_navigation_container">
                <table>
                    <tr>
                        <td rowspan="2"><i class="fas fa-laptop" style="color: #A1A1A1;font-size: 25px;"></i></td>
                    </tr>
                    <tr id="hamburger_container_dir_arrow_tiger1">
                        <td><a href="#"><b>Laptops and Accessories</b></a> <br>
                         <a href="#"><p>Dell, Hp, Macbook, Alienware, and etc.</p></a>
                        </td>
                    </tr>
                    <tr>
                        <td rowspan="2"><i class="fa fa-microchip" style="color: #A1A1A1;font-size: 25px;"></i></td>
                    </tr>
                    <tr id="hamburger_container_dir_arrow_tiger2">
                        <td><a href="#"><b>Electronics</b></a> <br>
                         <a href="#"><p>Blender, iron, Vacuum Cleaner ...</p></a>
                        </td>
                    </tr>
                    <tr>
                        <td rowspan="2"><i class="fas fa-headset" style="color: #A1A1A1;font-size: 25px;"></i></td>
                    </tr>
                    <tr id="hamburger_container_dir_arrow_tiger3">
                        <td><a href="#"><b>Audio & Sound Devices</b></a> <br>
                         <a href="#"><p>Speaker, Headphone, Soundcard ...</p></a>
                        </td>
                    </tr>
                    <tr>
                        <td rowspan="2"><i class="fa fa-mobile" style="color: #A1A1A1;font-size: 25px;margin-left: 6px;"></i></td>
                    </tr>
                    <tr id="hamburger_container_dir_arrow_tiger4">
                        <td><a href="#"><b>Smartphone & Tablets</b></a> <br>
                         <a href="#"><p>Iphone, Oppo, Samsung, Sony ...</p></a>
                        </td>
                    </tr>
                    <tr>
                        <td rowspan="2"><i class="fas fa-gamepad" style="color: #A1A1A1;font-size: 25px;"></i></td>
                    </tr>
                    <tr id="hamburger_container_dir_arrow_tiger5">
                        <td><a href="#"><b>Gaming Gear</b></a> <br>
                         <a href="#"><p>Mouse, Headphone, Console ...</p></a>
                        </td>
                    </tr>
                   
                </table>
            </div>

            <!--hamburger container end-->
            <div class="hamburger_container_dir_arrow hamburger_container_dir_arrow1"></div>
            <div class="hamburger_container_dir_arrow hamburger_container_dir_arrow2"></div>
            <div class="hamburger_container_dir_arrow hamburger_container_dir_arrow3"></div>
            <div class="hamburger_container_dir_arrow hamburger_container_dir_arrow4"></div>
            <div class="hamburger_container_dir_arrow hamburger_container_dir_arrow5"></div>
         </div>
        </div>

      
            <div class="navbar_main_container_childs navbar_main_container_childs_two">
                <form action="">
                    <input type="search" placeholder="Search">
                    <button type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>

      
           <!--shortcut link for user container start-->
           <div class="shortcut_link_for_user_container">
               <table>
                   <tr>
                       <td><button><i class="fa fa-user" aria-hidden="true"></i></button></td>
                       <td><a href="./account.html"><button>My Account</button></a></td>
                   </tr>
                   <tr>
                       <td colspan="2">--------------------</td>
                   </tr>
                   <tr>
                    <td><button><i class="fa fa-sign-out" aria-hidden="true"></i></button></td>
                    <td><a href="#"><button>Log Out</button></a></td>
                </tr>
                <tr>
                    <td colspan="2">--------------------</td>
                </tr>
                <tr>
                    <td><button><i class="fas fa-check-circle"></i></button></td>
                    <td><a href="./payment.html"><button>Checkout</button></a></td>
                </tr>
                <tr>
                    <td colspan="2">--------------------</td>
                </tr>
                <tr>
                    <td><button><i class="fas fa-heart"></i></button></td>
                    <td><a><button class="wishlist_btn_of_homepage">My Wishlist</button></a></td>
                </tr>
               </table>
           
            </div>
           <!--shortcut link for user container end-->

           <!--mini cart container start-->
           <div class="mini_cart_container">

           <div class="mini_cart_products_container">
            <table>
                <tr>
                    <td rowspan="4" class="delete_btn_border"><img src="./images/drone_image_1.jpg" class="mini_cart_container_images" alt="drone"></td>
                </tr>
                <tr>
                    <td class="product_title"><a href="#">Lorem ipsum dolor sit amet</a></td>
                </tr>
                <tr>
                    <td class="product_prz"><b>&#8377; 120.00</b> X 1</td>
                </tr>
                <tr>
                    <td class="delete_btn_border"><a href="#"><i class="fas fa-trash-alt"></i></a></td>
                </tr>

                <tr>
                    <td rowspan="4" class="delete_btn_border"><img src="./images/mob_image_2.jpg" class="mini_cart_container_images" alt="mobile"></td>
                </tr>
                <tr>
                    <td class="product_title"><a href="#">Lorem ipsum dolor sit amet</a></td>
                </tr>
                <tr>
                    <td class="product_prz"><b>&#8377; 240.00</b> X 1</td>
                </tr>
                <tr>
                    <td class="delete_btn_border"><a href="#"><i class="fas fa-trash-alt"></i></a></td>
                </tr>

                
                <tr>
                    <td rowspan="4" class="delete_btn_border"><img src="./images/mob_image_2.jpg" class="mini_cart_container_images" alt="mobile"></td>
                </tr>
                <tr>
                    <td class="product_title"><a href="#">Lorem ipsum dolor sit amet</a></td>
                </tr>
                <tr>
                    <td class="product_prz"><b>&#8377; 240.00</b> X 1</td>
                </tr>
                <tr>
                    <td class="delete_btn_border"><a href="#"><i class="fas fa-trash-alt"></i></a></td>
                </tr>
               
            </table>
           </div>

           <div class="mini_cart_form_container">
               <p>Add a note to your order</p>
               <form action="">
                   <textarea></textarea>
                   <div class="money_container">
                    <h2 id="h2_one">TOTAL: </h2>
                    <h2 id="h2_two">&#8377; 240.00</h2>
                   </div>
                   <center>
                       <p>Shipping & taxes calculated at checkout</p>
                       <button>VIEW CART</button>
                       <button>CHECK OUT</button>
                   </center>
                  
               </form>
           </div>

           </div>
           <!--mini cart container end-->

        <div class="navbar_main_container_childs navbar_main_container_childs_three"> 
            
            <button type="submit" class="user_icon_of_homepage" id="user_btn" title="sign in"><a><i class="far fa-user" style="font-size: 25px;color: #45b2ff;"></i></a></button>
            <div id="cart_count_container">
                <button type="submit" class="cart_icon_of_homepage" title="view cart"><a href="#"><i class="fas fa-cart-plus" style="font-size: 25px;color: #45b2ff;"></i></a></button>
                <span>10</span>
                </div>
           <button type="submit" title="wishlist" class="wishlist_btn"><a><i class="far fa-heart" style="font-size: 25px;color: #45b2ff;"></i></a></button>
        </div>
        
            <!--hamburger sub container start-->

            <div class="hamburger_sub_container">
                <!--laptops table start-->

                <table class="laptops_container_table">
                    <tr>
                        <th>LAPTOPS</th>
                    </tr>
                    <tr>
                        <td><a href="#">Macbook Pro</a></td>
                    </tr>
                    <tr>
                        <td><a href="#">Laptop Thinkpad</a></td>
                    </tr>
                    <tr>
                        <td><a href="#">Elitebook</a></td>
                    </tr>
                    <tr>
                        <td><a href="#">Lenovo Yoga</a></td>
                    </tr>
                    <tr>
                        <td><a href="#">Trackpad</a></td>
                    </tr>
                    <tr>
                        <td><a href="#">Dell Percision</a></td>
                    </tr>
                    <tr>
                        <td><a href="#">Dell Alienware</a></td>
                    </tr>
                </table>

                <!--laptops table end-->

                <!--electronics table start-->

                <table class="electronic_container_table">
                    <tr>
                        <th>HOUSEWARE</th>
                        <th>KITCHEN EQUIPMENT</th>
                    </tr>
                    <tr>
                        <td><a href="#">Fridge</a></td>
                        <td><a href="#">Cooker</a></td>
                    </tr>
                    <tr>
                        <td><a href="#">Airconditioning</a></td>
                        <td><a href="#">Microwave</a></td>
                    </tr>
                    <tr>
                        <td><a href="#">Electronic Fan</a></td>
                        <td><a href="#">Diswasher</a></td>
                    </tr>
                    <tr>
                        <td><a href="#">Spray Mist Fan</a></td>
                        <td><a href="#">Dryer</a></td>
                    </tr>
                    <tr>
                        <td><a href="#">Vacuum Cleaner</a></td>
                        <td><a href="#">Kitchen Infrared</a></td>
                    </tr>
                    <tr>
                        <td><a href="#">Washing Machine</a></td>
                        <td><a href="#">Gas Stove</a></td>
                    </tr>
                    <tr>
                        <td><a href="#">Heater</a></td>
                        <td><a href="#">Oven</a></td>
                    </tr>
                    <tr>
                        <td><a href="#">Television</a></td>
                        <td><a href="#">Water Boiler</a></td>
                    </tr>
                </table>

                <!--electronics table end-->

                <!--audio container start-->

                <table class="audio_container_table">
                    <tr>
                        <th>SPEAKERS</th>
                        <th>HEADPHONES</th>
                    </tr>
                    <tr>
                        <td><a href="#">Lansing Products</a></td>
                        <td><a href="#">Lansing Products</a></td>
                    </tr>
                    <tr>
                        <td><a href="#">UFI Products</a></td>
                        <td><a href="#">UFI Products</a></td>
                    </tr>
                    <tr>
                        <td><a href="#">Edifier Products</a></td>
                        <td><a href="#">Edifier Products</a></td>
                    </tr>
                    <tr>
                        <td><a href="#">Mionix Products</a></td>
                        <td><a href="#">Mionix Products</a></td>
                    </tr>
                    <tr>
                        <td><a href="#">Plantronics Products</a></td>
                        <td><a href="#">Plantronics Products</a></td>
                    </tr>
                </table>

                <!--audio container end-->

                <!--smartphone container start-->

                <table class="smartphone_container_table1">
                    <tr>
                        <th>IPHONE</th>
                        <th>ANDROID PHONE</th>
                    </tr>
                    <tr>
                        <td><a href="#">iPhone X</a></td>
                        <td><a href="#">Samsung Galaxy</a></td>
                    </tr>
                    <tr>
                        <td><a href="#">iPhone 7/7 Plus</a></td>
                        <td><a href="#">Samsung</a></td>
                    </tr>
                    <tr>
                        <td><a href="#">iPhone 6/6s Plue</a></td>
                        <td><a href="#">OPPO</a></td>
                    </tr>

                    <tr>
                        <td><a href="#">iPhone 5s</a></td>
                        <td><a href="#">Sony</a></td>
                    </tr>
                </table>
                <br>
                <table class="smartphone_container_table2">
                   <tr>
                    <th>IPAD</th>
                   </tr>
                   <tr>
                       <td><a href="#">Samsung</a></td>
                   </tr>
                   <tr>
                       <td><a href="#">Lenovo</a></td>
                   </tr>
                   <tr>
                       <td><a href="#">Asus</a></td>
                   </tr>
                   <tr>
                       <td><a href="#">Huawei</a></td>
                   </tr>
                </table>

                <!--smartphone container end-->


            </div>

            <!--hamburger sub container end-->

    </div>
</center>
    <!--Navbar End-->
    </div>
    <!--Navbar container for desktop end-->

   <!--Navbar container for mobile hamburger div start-->
   <div class="nav_hamburger_division">
    
   </div>
   <div class="nav_hamburger_content_division">
    <div id="hamburger_btn_login_signup_btn_div">
            <a href="#"><button id="hamburger_btn_user_icon"><i class="far fa-user" style="font-size: 25px;color: #45b2ff;"></i></button></a>
            <a href="./login.html"><button id="hamburger_btn_login_btn">LOGIN</button></a> <a href="./register.html"><button id="hamburger_btn_signup_btn">SIGNUP</button></a>
      </div>
<table>
    
        <tr>
            <td><a href="#"><button><i class="fas fa-list-alt" style="font-size: 25px;color: #bbbbbb;"></i></button></a></td>
            <td><a href="./all_categories.html"><button>All Categories</button></a></td>
        </tr>
        <tr>
            <td><a href="#"><button><i class="fa fa-gift" style="font-size: 25px;color: #bbbbbb;"></i></button></a></td>
            <td><a href="#"><button>Offer Zone</button></a></td>
        </tr>
        <tr>
            <td><a href="#"><button><i class="fas fa-box" style="font-size: 25px;color: #bbbbbb;"></i></button></a></td>
            <td><a href="#"><button>Sell On Shopssy</button></a></td>
        </tr>
        <tr>
            <td><a href="#"><button><i class="fa fa-truck" style="font-size: 25px;color: #bbbbbb;"></i></button></a></td>
            <td><a href="#"><button>My Orders</button></a></td>
        </tr>
        <tr>
            <td><a href="#"><button><i class="fas fa-shopping-cart" style="font-size: 25px;color: #bbbbbb;"></i></button></a></td>
            <td><a href="./cart.html"><button>My Cart</button></a></td>
        </tr>
        <tr>
            <td><a href="#"><button><i class="far fa-heart" style="font-size: 25px;color: #bbbbbb;"></i></button></a></td>
            <td><a href="#"><button>My Wishlist</button></a></td>
        </tr>
        <tr>
            <td><a href="#"><button><i class="far fa-user" style="font-size: 25px;color: #bbbbbb;"></i></button></a></td>
            <td><a href="#"><button>My Account</button></a></td>
        </tr>
        <tr>
            <td><a href="#"><button><i class="fas fa-bell" style="font-size: 25px;color: #bbbbbb;"></i></button></a></td>
            <td><a href="#"><button>My Notifications</button></a></td>
        </tr>
        <tr>
            <td><a href="#"><button><i class="fas fa-comments" style="font-size: 25px;color: #bbbbbb;"></i></button></a></td>
            <td><a href="#"><button>Feedback</button></a></td>
        </tr>
        <tr>
            <td><a href="#"><button><i class="fa fa-wpforms" style="font-size: 25px;color: #bbbbbb;"></i></button></a></td>
            <td><a href="#"><button>Privacy Policy</button></a></td>
        </tr>
        <tr>
            <td><a href="#"><button><i class="fas fa-sticky-note" style="font-size: 25px;color: #bbbbbb;"></i></button></a></td>
            <td><a href="#"><button>Terms & Conditions</button></a></td>
        </tr>

        <tr>
            <td><a href="#"><button><i class="far fa-address-book" style="font-size: 25px;color: #bbbbbb;"></i></button></a></td>
            <td><a href="./contactus.html"><button>Contact Us</button></a></td>
        </tr>
    
        <tr>
            <td><a href="#"><button><i class="fa fa-question-circle" style="font-size: 25px;color: #bbbbbb;"></i></button></a></td>
            <td><a href="#"><button>Help Centre</button></a></td>
        </tr>

</table>
   </div>
   <!--Navbar container for mobile hamburger div end-->

   <!--Navbar container for mobile start-->
   <div class="navbar_container_for_mobile">
<div class="mob_navbar_container">
     <button class="mob_hamburger_btn"><i class="fas fa-bars" style="color: black;font-size: 30px;"></i></button>
     <h2 class="mob_navbar_title"><a href="#">Shopssy</a></h2>
     <a href="#" class="mob_navbar_shop_icon"><i class="fas fa-cart-plus" style="font-size: 30px;color: black;"></i></a>
     <div class="mob_navbar_search_container">
        <form action="">
            <input type="search" placeholder="Search">
            <button type="submit">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </div>
</div>
   </div>
   <!--Navbar container for mobile end-->

    </div>

    <!--Navbar Container End-->
