<?php 
include './action.php';
$title = "Addresses - Shopssy";
include './header.php';

if(!isset($_SESSION['user_login_id'])) {
    ?>
   <script type="text/javascript">
   window.location.href = 'http://localhost:3000/login.php';
   </script>
   <?php
}

if(isset($_POST['add_address'])){
    $fir_name = $_POST['fir_name'];
    $las_name = $_POST['las_name'];
    $my_full_name = $fir_name." ".$las_name;
    $address = $_POST['address'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $phone = $_POST['phone'];
   $user_identity =  $_SESSION['user_id'];


   $nameval = "/^[a-zA-Z ]+$/";
   $numberval = "/^[0-9]+$/";
   $fir_name = stripcslashes($fir_name);
   $las_name = stripcslashes($las_name);
   $city = stripcslashes($city);
   $country = stripcslashes($country);
   $state = stripcslashes($state);
   $fir_name = mysqli_real_escape_string($con, $fir_name);
   $las_name = mysqli_real_escape_string($con, $las_name);
   $city = mysqli_real_escape_string($con, $city);
   $country = mysqli_real_escape_string($con, $country);
   $state = mysqli_real_escape_string($con, $state);

   if(preg_match($nameval, $city) and preg_match($nameval, $country) and preg_match($nameval, $state) and preg_match($numberval, $zip) and preg_match($numberval, $phone)) {
    if(isset($_POST['checkbox'])) {
        $checkbox = "default";
    } else {
        $checkbox = "secondary";
    }
    $account_insert_query = "INSERT INTO `account` (`user_id`, `f_name`, `l_name`, `my_name`, `address`, `city`, `state`, `zip`, `phone`, `country`, `status`) VALUES ($user_identity, '$fir_name', '$las_name', '$my_full_name', '$address', '$city', '$state', '$zip', '$phone', '$country', '$checkbox');";
    mysqli_query($con, $account_insert_query);
   }

}
$user_identity =  $_SESSION['user_id'];
$extra_account_check_query = "SELECT * FROM `account` WHERE `status` ='default' AND `user_id` = $user_identity;";
$extra_account_check_result = mysqli_query($con, $extra_account_check_query);
if(mysqli_num_rows($extra_account_check_result) > 1) {
    $counter = 1;
while($row1 = mysqli_fetch_assoc($extra_account_check_result)) {
    if($counter == 1) {
        $user_acc_id = $row1['acc_id'];
    $extra_account_delete_query = "DELETE FROM `account` WHERE `acc_id` = $user_acc_id  AND `status` = 'default';";
    mysqli_query($con, $extra_account_delete_query);
    }
    $counter++;
}
}

$extra_account_check_query1 = "SELECT * FROM `account` WHERE `status` ='secondary' AND `user_id` = $user_identity;";
$extra_account_check_result1 = mysqli_query($con, $extra_account_check_query1);
if(mysqli_num_rows($extra_account_check_result1) > 1) {
    $counter1 = 1;
while($row1 = mysqli_fetch_assoc($extra_account_check_result1)) {
    if($counter1 == 1) {
        $user_acc_id = $row1['acc_id'];
    $extra_account_delete_query1 = "DELETE FROM `account` WHERE `acc_id` = $user_acc_id  AND `status` = 'secondary';";
    mysqli_query($con, $extra_account_delete_query1);
    }
    $counter1++;
}
}

if(isset($_POST['update_acc_details'])) {
    $fir_name1 = $_POST['fir_name1'];
    $las_name1 = $_POST['las_name1'];
    $my_full_name1 = $fir_name1." ".$las_name1;
    $address1 = $_POST['address1'];
    $city1 = $_POST['city1'];
    $country1 = $_POST['country1'];
    $state1 = $_POST['state1'];
    $zip1 = $_POST['zip1'];
    $phone1 = $_POST['phone1'];
   $user_identity =  $_SESSION['user_id'];


   $nameval = "/^[a-zA-Z ]+$/";
   $numberval = "/^[0-9]+$/";
   $fir_name1 = stripcslashes($fir_name1);
   $las_name1 = stripcslashes($las_name1);
   $city1 = stripcslashes($city1);
   $country1 = stripcslashes($country1);
   $state1 = stripcslashes($state1);
   $fir_name1 = mysqli_real_escape_string($con, $fir_name1);
   $las_name1 = mysqli_real_escape_string($con, $las_name1);
   $city1 = mysqli_real_escape_string($con, $city1);
   $country1 = mysqli_real_escape_string($con, $country1);
   $state1 = mysqli_real_escape_string($con, $state1);

   if(preg_match($nameval, $city1) and preg_match($nameval, $country1) and preg_match($nameval, $state1) and preg_match($numberval, $zip1) and preg_match($numberval, $phone1)) {
    if(isset($_POST['checkbox1'])) {
        $checkbox1 = "default";
    } else {
        $checkbox1 = "secondary";
    }
    $user_identity =  $_SESSION['user_id'];
    $account_insert_query = "UPDATE `account` SET `f_name` = '$fir_name1', `l_name` = '$las_name1', `my_name` = '$my_full_name1', `address` = '$address1', `city` = '$city1', `state` = '$state1', `zip` = '$zip1', `phone`= '$phone1', `country` = '$country1', `status` = '$checkbox1' WHERE `user_id` = $user_identity;";
    mysqli_query($con, $account_insert_query);
   }
}

if(isset($_POST['delete_default_add'])) {
    $user_identity =  $_SESSION['user_id'];
    $delete_default_add_query = "DELETE FROM `account` WHERE `user_id` = $user_identity AND `status`='default';";
    mysqli_query($con, $delete_default_add_query);
}

?>
    
    <!--sub navigation container start-->
    <div class="sub_navigation_container">
<center>
    <div class="sub_navigation_inner_container">
        <span><a href="./index.php">Home</a></span>
        <span><i class="fas fa-arrow-right" style="color: #666666;font-size: 12px;"></i></span>
        <span><a href="./address.php">My Address</a></span>
    </div>
</center>
    </div>
    <!--sub navigation container end-->

    <!--my account container start-->
    <center>
        <div class="my_address_container">
            <h2 class="heading1">YOUR ADDRESSES</h2>
            <span class="return_link"><a href="./account.php"><i class="fa fa-angle-left"></i> Return to Account Details</a></span> <br>
            <button class="add_new_add_btn">ADD A NEW ADDRESS</button>
           
            <div class="address_details_table_container1">
                <h2 class="heading2">ADD A NEW ADDRESS</h2>

            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                <table>
                    <tr>
                        <th><label for="fir_name">First Name</label></th>
                    </tr>
                    <tr>
                        <td><input type="text" id="fir_name" name="fir_name" class="inp_box" required></td>
                    </tr>
                    <tr>
                        <th><label for="las_name">Last Name</label></th>
                    </tr>
                    <tr>
                        <td><input type="text" id="las_name" name="las_name" class="inp_box" required></td>
                    </tr>
                   
                    <tr>
                        <th><label for="add">Address</label></th>
                    </tr>
                    <tr>
                        <td><input type="text" id="add" name="address" class="inp_box" required></td>
                    </tr>
                    <tr>
                        <th><label for="cit">City</label></th>
                    </tr>
                    <tr>
                        <td><input type="text" id="cit" name="city" class="inp_box" required></td>
                    </tr>
                    <tr>
                        <th><label for="coun">Country</label></th>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" id="coun" name="country" class="inp_box" required>
                        </td>
                    </tr>
                    <tr>
                        <th><label for="stat">State</label></th>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" id="stat" name="state" class="inp_box" required>
                        </td>
                    </tr>
                    <tr>
                        <th><label for="zip">Postal/Zip Code</label></th>
                    </tr>
                    <tr>
                        <td><input type="text" id="zip" name="zip" class="inp_box" required></td>
                    </tr>
                    <tr>
                        <th><label for="phon">Phone</label></th>
                    </tr>
                    <tr>
                        <td><input type="text" id="phon" name="phone" class="inp_box" required></td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="checkbox" value="default" id="check_default_add1"> <label for="check_default_add1">Set as default address</label></td>
                    </tr>
                </table>

                <button type="submit" name="add_address">ADD ADDRESS</button>
               <button type="button" class="cancel_btn_of_new_add">CANCEL</button>
            </form>
            </div>

            <div class="address_details_table_container2">
                <h2 class="heading1">DEFAULT</h2>

                <?php 
                
                $default_details_showing_query = "SELECT * FROM `account` WHERE `status` ='default' AND `user_id` = $user_identity;";
                $default_details_showing_result = mysqli_query($con, $default_details_showing_query);
                $default_accounts_my_name = "-- NIL --";
                $default_accounts_f_name = "-- NIL --";
                    $default_accounts_l_name = "-- NIL --";
                    $default_accounts_address = "-- NIL --";
                    $default_accounts_city = "-- NIL --";
                    $default_accounts_zip = "-- NIL --";
                    $default_accounts_phone = "-- NIL --";
                    $default_accounts_country = "-- NIL --";
                    $default_accounts_state = "-- NIL --";
                while($row = mysqli_fetch_assoc($default_details_showing_result)) {
                    $default_accounts_my_name = $row['my_name'];
                    $default_accounts_f_name = $row['f_name'];
                    $default_accounts_l_name = $row['l_name'];
                    $default_accounts_address = $row['address'];
                    $default_accounts_city = $row['city'];
                    $default_accounts_zip = $row['zip'];
                    $default_accounts_phone = $row['phone'];
                    $default_accounts_country = $row['country'];
                    $default_accounts_state = $row['state'];
                }
                
                ?>


                <table>
                    <tr>
                        <th>My Name: </th>
                        <td><?php echo $default_accounts_my_name; ?></td>
                        
                    </tr>
                    <tr>
                        <td colspan="2" class="bottom_border"></td>
                    </tr>
                   
                    <tr>
                        <th>Address: </th>
                        <td><?php echo $default_accounts_address; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="bottom_border"></td>
                    </tr>
                    <tr>
                        <th>City: </th>
                        <td><?php echo $default_accounts_city; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="bottom_border"></td>
                    </tr>
                    <tr>
                        <th>State: </th>
                        <td><?php echo $default_accounts_state; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="bottom_border"></td>
                    </tr>
                    <tr>
                        <th>Postal/Zip Code: </th>
                        <td><?php echo $default_accounts_zip; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="bottom_border"></td>
                    </tr>
                    <tr>
                        <th>Phone: </th>
                        <td><?php echo $default_accounts_phone; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="bottom_border"></td>
                    </tr>
                    <tr>
                        <th>Country: </th>
                        <td><?php echo $default_accounts_country; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="bottom_border"></td>
                    </tr>
                </table>

               <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
               <button type="button" class="edit_btn_of_default">EDIT</button>
                <button type="submit" name="delete_default_add">DELETE</button>
               </form>

            </div>

            <div class="address_details_table_container3">
                <h2 class="heading2">EDIT ADDRESS</h2>

                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                    <table>
                        <tr>
                            <th><label for="fir_name1">First Name</label></th>
                        </tr>
                        <tr>
                            <td><input type="text" id="fir_name1" value="<?php echo $default_accounts_f_name; ?>" name="fir_name1" class="inp_box" required></td>
                        </tr>
                        <tr>
                            <th><label for="las_name1">Last Name</label></th>
                        </tr>
                        <tr>
                            <td><input type="text1" value="<?php echo $default_accounts_l_name; ?>" id="las_name1" name="las_name1" class="inp_box" required></td>
                        </tr>
                        
                        <tr>
                            <th><label for="add1">Address</label></th>
                        </tr>
                        <tr>
                            <td><input type="text" id="add1" value="<?php echo $default_accounts_address; ?>" name="address1" class="inp_box" required></td>
                        </tr>
                        <tr>
                            <th><label for="cit1">City</label></th>
                        </tr>
                        <tr>
                            <td><input type="text" id="cit1" value="<?php echo $default_accounts_city; ?>" name="city1" class="inp_box" required></td>
                        </tr>
                        <tr>
                            <th><label for="coun1">Country</label></th>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" id="coun1" value="<?php echo $default_accounts_country; ?>" name="country1" class="inp_box" required>
                            </td>
                        </tr>
                        <tr>
                            <th><label for="stat1">State</label></th>
                        </tr>
                        <tr>
                            <td>
                        <input type="text" id="stat1" value="<?php echo $default_accounts_state; ?>" name="state1"  class="inp_box" required>
                            </td>
                        </tr>
                        <tr>
                            <th><label for="zip1">Postal/Zip Code</label></th>
                        </tr>
                        <tr>
                            <td><input type="text" id="zip1" value="<?php echo $default_accounts_zip; ?>" name="zip1" class="inp_box" required></td>
                        </tr>
                        <tr>
                            <th><label for="phon1">Phone</label></th>
                        </tr>
                        <tr>
                            <td><input type="text" id="phon1" name="phone1" value="<?php echo $default_accounts_phone; ?>" class="inp_box" required></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" id="check_default_add2" name="checkbox1"> <label for="check_default_add2">Set as default address</label></td>
                        </tr>
                    </table>
                    <a href="#"><button type="submit" name="update_acc_details">UPDATE ADDRESS</button></a>
                   <button type="button" class="cancel_btn_of_edit_add">CANCEL</button>
                </form>


            </div>

        </div>
    </center>
    <!--my account container end-->
    
    <?php 
    include "./footer.php";
    ?>

    <script src="./javascript/index.js"></script>
    
    <script src="./javascript/address.js"></script>
</body>
</html>