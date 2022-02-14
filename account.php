<?php 
include './action.php';
$title = "My Account - Shopssy";
include './header.php';

if(!isset($_SESSION['user_login_id'])) {
    ?>
   <script type="text/javascript">
   window.location.href = 'http://localhost:3000/login.php';
   </script>
   <?php
}

if(isset($_POST['log_out'])){
    unset($_SESSION['user_login_id']);
    ?>
   <script type="text/javascript">
   window.location.href = 'http://localhost:3000/account.php';
   </script>
   <?php
}

?>

    <!--sub navigation container start-->
    <div class="sub_navigation_container">
<center>
    <div class="sub_navigation_inner_container">
        <span><a href="./index.php">Home</a></span>
        <span><i class="fas fa-arrow-right" style="color: #666666;font-size: 12px;"></i></span>
        <span><a href="./account.php">My Account</a></span>
    </div>
</center>
    </div>
    <!--sub navigation container end-->

    <!--my account container start-->
    <center>
        <div class="my_account_container">
            <h2 class="heading1">MY ACCOUNT</h2>
            <div class="account_details_table_container">

            <?php 
             $user_identity =  $_SESSION['user_id'];
            $account_query = "SELECT * FROM `account` WHERE `status` ='default' AND `user_id` = $user_identity;";
            $account_result = mysqli_query($con, $account_query);
            $accounts_my_name = "-- NIL --";
                $accounts_address = "-- NIL --";
                $accounts_city = "-- NIL --";
                $accounts_zip = "-- NIL --";
                $accounts_phone = "-- NIL --";
                $accounts_country = "-- NIL --";
                $accounts_state = "-- NIL --";
            while($row = mysqli_fetch_assoc($account_result)) {
                $accounts_my_name = $row['my_name'];
                $accounts_address = $row['address'];
                $accounts_city = $row['city'];
                $accounts_zip = $row['zip'];
                $accounts_phone = $row['phone'];
                $accounts_country = $row['country'];
                $accounts_state = $row['state'];
            }
            
            ?>



                <table>
                    <tr>
                        <th>My Name: </th>
                        <td><?php echo $accounts_my_name; ?></td>
                        
                    </tr>
                    <tr>
                        <td colspan="2" class="bottom_border"></td>
                    </tr>
                
                    <tr>
                        <th>Address: </th>
                        <td><?php echo $accounts_address; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="bottom_border"></td>
                    </tr>
                    <tr>
                        <th>City: </th>
                        <td><?php echo $accounts_city; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="bottom_border"></td>
                    </tr>
                    <tr>
                        <th>State: </th>
                        <td><?php echo $accounts_state; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="bottom_border"></td>
                    </tr>
                    <tr>
                        <th>Postal/Zip Code: </th>
                        <td><?php echo $accounts_zip; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="bottom_border"></td>
                    </tr>
                    <tr>
                        <th>Phone: </th>
                        <td><?php echo $accounts_phone; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="bottom_border"></td>
                    </tr>
                    <tr>
                        <th>Country: </th>
                        <td><?php echo $accounts_country; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="bottom_border"></td>
                    </tr>
                </table>
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                <a href="./address.php"><button type="button" >VIEW ADDRESS (1)</button></a>
                <a href="#"><button type="submit" name="log_out" >LOG OUT</button></a>
                </form>
            </div>
            <h2 class="heading2">ORDER HISTORY</h2>
            <!-- order history table start -->

           
            <table class="order_history_table">
                <tr>
                    <th>S.No</th>
                    <th>Order Id</th>
                    <th>Product</th>
                    <th>Qty</th>
                    <th>Status</th>
                </tr>

                <?php
                $user_identity =  $_SESSION['user_id'];
                $order_history_query = "SELECT `order_id`, `p_status` FROM `orders_table` WHERE `user_id` = $user_identity;";
                $s_no = 1;
                $order_history_result = mysqli_query($con, $order_history_query);
                if(mysqli_num_rows($order_history_result) > 0) {


                while($row = mysqli_fetch_assoc($order_history_result)) {
                    $order_id = $row['order_id'];
                    $status = $row['p_status'];

                    $order_history_sub_query = "SELECT * FROM `orders_sub_table` WHERE `order_id` = $order_id;";
                    $order_history_sub_result = mysqli_query($con, $order_history_sub_query);
                    while($row_two = mysqli_fetch_assoc($order_history_sub_result)) {
                        $quantity = $row_two['quantity'];
                        $prod_id = $row_two['product_id'];

                        $order_history_sub_query_two = "SELECT `p_title` FROM `products` WHERE `p_id` = $prod_id;";
                        $order_history_sub_result_two = mysqli_query($con, $order_history_sub_query_two);
                        while($rwo_three = mysqli_fetch_assoc($order_history_sub_result_two)) {
                            $prod_name = $rwo_three['p_title'];
                ?>
                <tr>
                    <td><?php echo $s_no ?>.</td>
                    <td>#<?php echo $order_id; ?></td>
                    <td><?php echo $prod_name; ?></td>
                    <td><?php echo $quantity; ?></td>
                    <td><?php echo $status; ?></td>
                </tr>
                <?php $s_no++;  } } } } else {
                    echo "<p>You haven't placed any orders yet.</p>";
                } ?>
            </table>
           

            <!-- order history table end -->
            
        </div>
    </center>
    <!--my account container end-->
    
    <?php 
    include "./footer.php";
    ?>

   <script src="./javascript/index.js"></script>
</body>
</html>