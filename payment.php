<?php 
include './action.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment - Shopssy</title>
    <link rel="icon" href="./images/favicon1.png">
    <script src="https://kit.fontawesome.com/628c629a17.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ceviche+One&family=Josefin+Sans:wght@700&family=Lobster&family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>

    <!--information container start-->
   <center>
    <div class="information_container">

        <div class="information_inner_container1">

            <h2 class="heading_of_info_div"><a href="#">Shopssy</a></h2>

            <div class="information_inner_container_for_mobile">
                <button class="show_summary_btn"><i class="fas fa-shopping-cart"></i> show order summary <i class="fa fa-angle-down"></i></button>
                <span> &#8377; 1,004.00</span>

                <div class="information_inner_container2 information_inner_container2_of_mobile">
                    <div class="information_inner_container2_1st">
                        <div class="information_inner_container2_divs">
                            <div class="information_inner_container2_divs_image">
                                <img src="./images/mob_image_2.jpg" alt="mobile image">
                            </div>
                            <div class="information_inner_container2_divs_title information_inner_container2_divs_title1">
                             <h5>Lorem ipsum dolor</h5>
                             <p>Lorem ipsum</p>
                            </div>
                            <div class="information_inner_container2_divs_qty information_inner_container2_divs_qty1">
                            X 1
                            </div>
                            <div class="information_inner_container2_divs_price">
                                &#8377; 120.00
                            </div>
                        </div>
            
                        <div class="information_inner_container2_divs">
                            <div class="information_inner_container2_divs_image">
                                <img src="./images/smart_watch_image_1.jpg" alt="mobile image">
                            </div>
                            <div class="information_inner_container2_divs_title information_inner_container2_divs_title1">
                             <h5>Lorem ipsum dolor</h5>
                             <p>Lorem ipsum</p>
                            </div>
                            <div class="information_inner_container2_divs_qty information_inner_container2_divs_qty1">
                            X 2
                            </div>
                            <div class="information_inner_container2_divs_price">
                                &#8377; 240.00
                            </div>
                        </div>
            
                        <div class="information_inner_container2_divs">
                            <div class="information_inner_container2_divs_image">
                                <img src="./images/speaker1_image_1.jpg" alt="mobile image">
                            </div>
                            <div class="information_inner_container2_divs_title information_inner_container2_divs_title1">
                             <h5>Lorem ipsum dolor</h5>
                             <p>Lorem ipsum</p>
                            </div>
                            <div class="information_inner_container2_divs_qty information_inner_container2_divs_qty1">
                            X 1
                            </div>
                            <div class="information_inner_container2_divs_price">
                                &#8377; 120.00
                            </div>
                        </div>
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
                                &#8377; 120.00
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
                                &#8377; 20.00
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
                                &#8377; 1,004.00
                            </div>
                        </div>
            
                        
                    </div>
        
        
                </div>

            </div>

            <div class="sub_navigation_of_info_div_inner_container">
                <span><a href="./cart.php">Cart</a></span>
                <span><i class="fa fa-angle-right" style="color: #666666;font-size: 14px;"></i></span>
                <span><a  href="./information.php">Information</a></span>
                <span><i class="fa fa-angle-right" style="color: #666666;font-size: 14px;"></i></span>
                <span><a href="./shipping.php">Shipping</a></span>
                <span><i class="fa fa-angle-right" style="color: #666666;font-size: 14px;"></i></span>
                <span><a class="active">Payment</a></span>
            </div>

                

                <div class="semi_final_details_container">
                    <table>
                        <tr>
                            <th>Contact <p class="mail_and_home_add">
                                callmeprakashzz@gmail.com</p></th>
                                <td><a href="#">Change</a></td>
                        </tr>
                        <tr>
                            <th colspan="2"><hr></th>
                           
                        </tr>
                        <tr>
                            <th>Ship to <p class="mail_and_home_add">13.a, prasanna 3rd street, avaniyapuram, madurai.</p></th>
                                <td><a href="#">Change</a></td>
                        </tr>
                        <tr>
                            <th colspan="2"><hr></th>
                           
                        </tr>
                        <tr>
                            <th>Method <p class="mail_and_home_add">Standard - <b>&#8377; 20.00</b></p></th>
                                <td></td>
                        </tr>
                    </table>
                </div>

                <h3>Payment</h3>

                <div class="payment_container">
                   <form action="">
                    <input type="text" placeholder="Name on Card"> <br>
                    <input type="number" placeholder="Card Number"> <br>
                    <input type="text" placeholder="Expiry Date (pattern - mm/yy)"> <br>
                    <input type="number" placeholder="CVV"> <br>
                    <center>
                        <button type="submit">Continue to Checkout</button>
                    </center>
                   </form>
                </div>

       
        </div>

        <div class="information_inner_container2">
            <div class="information_inner_container2_1st">
                <div class="information_inner_container2_divs">
                    <div class="information_inner_container2_divs_image">
                        <img src="./images/mob_image_2.jpg" alt="mobile image">
                    </div>
                    <div class="information_inner_container2_divs_title">
                     <h5>Lorem ipsum dolor</h5>
                     <p>Lorem ipsum</p>
                    </div>
                    <div class="information_inner_container2_divs_qty">
                    X 1
                    </div>
                    <div class="information_inner_container2_divs_price">
                        &#8377; 120.00
                    </div>
                </div>
    
                <div class="information_inner_container2_divs">
                    <div class="information_inner_container2_divs_image">
                        <img src="./images/smart_watch_image_1.jpg" alt="mobile image">
                    </div>
                    <div class="information_inner_container2_divs_title">
                     <h5>Lorem ipsum dolor</h5>
                     <p>Lorem ipsum</p>
                    </div>
                    <div class="information_inner_container2_divs_qty">
                    X 2
                    </div>
                    <div class="information_inner_container2_divs_price">
                        &#8377; 240.00
                    </div>
                </div>
    
                <div class="information_inner_container2_divs">
                    <div class="information_inner_container2_divs_image">
                        <img src="./images/speaker1_image_1.jpg" alt="mobile image">
                    </div>
                    <div class="information_inner_container2_divs_title">
                     <h5>Lorem ipsum dolor</h5>
                     <p>Lorem ipsum</p>
                    </div>
                    <div class="information_inner_container2_divs_qty">
                    X 1
                    </div>
                    <div class="information_inner_container2_divs_price">
                        &#8377; 120.00
                    </div>
                </div>
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
                        &#8377; 120.00
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
                        &#8377; 20.00
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
                        &#8377; 1,004.00
                    </div>
                </div>
    
                
            </div>


        </div>

        

    </div>
   </center>
    <!--information container end-->
           
    <script src="./javascript/info.js"></script>
</body>
</html>