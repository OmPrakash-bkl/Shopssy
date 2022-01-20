<?php 
include './action.php';
$title = "Addresses - Shopssy";
include './header.php';
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
        <div class="my_address_container">
            <h2 class="heading1">YOUR ADDRESSES</h2>
            <span class="return_link"><a href="#"><i class="fa fa-angle-left"></i> Return to Account Details</a></span> <br>
            <button class="add_new_add_btn">ADD A NEW ADDRESS</button>
           
            <div class="address_details_table_container1">
                <h2 class="heading2">ADD A NEW ADDRESS</h2>
            <form action="">
                <table>
                    <tr>
                        <th>First Name</th>
                    </tr>
                    <tr>
                        <td><input type="text" class="inp_box"></td>
                    </tr>
                    <tr>
                        <th>Last Name</th>
                    </tr>
                    <tr>
                        <td><input type="text" class="inp_box"></td>
                    </tr>
                    <tr>
                        <th>Company</th>
                    </tr>
                    <tr>
                        <td><input type="text" class="inp_box"></td>
                    </tr>
                    <tr>
                        <th>Address</th>
                    </tr>
                    <tr>
                        <td><input type="text" class="inp_box"></td>
                    </tr>
                    <tr>
                        <th>City</th>
                    </tr>
                    <tr>
                        <td><input type="text" class="inp_box"></td>
                    </tr>
                    <tr>
                        <th>Country</th>
                    </tr>
                    <tr>
                        <td>
                            <select class="inp_box">
                                <option>-----</option>
                                <option>India</option>
                                <option>Afghanistan</option>
                                <option>Albania</option>
                                <option>Brazil</option>
                                <option>Canada</option>
                                <option>China</option>
                                <option>Egypt</option>
                                <option>Finland</option>
                                <option>Germany</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>State</th>
                    </tr>
                    <tr>
                        <td>
                            <select class="inp_box">
                                <option>-----</option>
                                <option>Tamil Nadu</option>
                                <option>Andhra Pradesh</option>
                                <option>Bihar</option>
                                <option>Goa</option>
                                <option>Gujarat</option>
                                <option>Haryana</option>
                                <option>Jharkhand</option>
                                <option>Chhattisgarh</option>
                                <option>Assam</option>
                            </select> 
                        </td>
                    </tr>
                    <tr>
                        <th>Postal/Zip Code</th>
                    </tr>
                    <tr>
                        <td><input type="text" class="inp_box"></td>
                    </tr>
                    <tr>
                        <th>Phone</th>
                    </tr>
                    <tr>
                        <td><input type="text" class="inp_box"></td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" id="check_default_add1"> <label for="check_default_add1">Set as default address</label></td>
                    </tr>
                </table>
                <a href="#"><button>ADD ADDRESS</button></a>
               <button type="button" class="cancel_btn_of_new_add">CANCEL</button>
            </form>
            </div>

            <div class="address_details_table_container2">
                <h2 class="heading1">DEFAULT</h2>
                <table>
                    <tr>
                        <th>My Name: </th>
                        <td>om prakash</td>
                        
                    </tr>
                    <tr>
                        <td colspan="2" class="bottom_border"></td>
                    </tr>
                    <tr>
                        <th>Company: </th>
                        <td>Prakashz Solutionsz</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="bottom_border"></td>
                    </tr>
                    <tr>
                        <th>Address: </th>
                        <td>13/A, Prasanna Colony, 3rd Street, Avaniyapuram, Madurai.</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="bottom_border"></td>
                    </tr>
                    <tr>
                        <th>City: </th>
                        <td>Madurai(South)</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="bottom_border"></td>
                    </tr>
                    <tr>
                        <th>Postal/Zip Code: </th>
                        <td>625012</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="bottom_border"></td>
                    </tr>
                    <tr>
                        <th>Phone: </th>
                        <td>1234567890</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="bottom_border"></td>
                    </tr>
                    <tr>
                        <th>Country: </th>
                        <td>India</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="bottom_border"></td>
                    </tr>
                </table>
                <button class="edit_btn_of_default">EDIT</button>
                <button>DELETE</button>
            </div>

            <div class="address_details_table_container3">
                <h2 class="heading2">EDIT ADDRESS</h2>
                <form action="">
                    <table>
                        <tr>
                            <th>First Name</th>
                        </tr>
                        <tr>
                            <td><input type="text" class="inp_box"></td>
                        </tr>
                        <tr>
                            <th>Last Name</th>
                        </tr>
                        <tr>
                            <td><input type="text" class="inp_box"></td>
                        </tr>
                        <tr>
                            <th>Company</th>
                        </tr>
                        <tr>
                            <td><input type="text" class="inp_box"></td>
                        </tr>
                        <tr>
                            <th>Address</th>
                        </tr>
                        <tr>
                            <td><input type="text" class="inp_box"></td>
                        </tr>
                        <tr>
                            <th>City</th>
                        </tr>
                        <tr>
                            <td><input type="text" class="inp_box"></td>
                        </tr>
                        <tr>
                            <th>Country</th>
                        </tr>
                        <tr>
                            <td>
                                <select class="inp_box">
                                    <option>-----</option>
                                    <option>India</option>
                                    <option>Afghanistan</option>
                                    <option>Albania</option>
                                    <option>Brazil</option>
                                    <option>Canada</option>
                                    <option>China</option>
                                    <option>Egypt</option>
                                    <option>Finland</option>
                                    <option>Germany</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>State</th>
                        </tr>
                        <tr>
                            <td>
                                <select class="inp_box">
                                    <option>-----</option>
                                    <option>Tamil Nadu</option>
                                    <option>Andhra Pradesh</option>
                                    <option>Bihar</option>
                                    <option>Goa</option>
                                    <option>Gujarat</option>
                                    <option>Haryana</option>
                                    <option>Jharkhand</option>
                                    <option>Chhattisgarh</option>
                                    <option>Assam</option>
                                </select> 
                            </td>
                        </tr>
                        <tr>
                            <th>Postal/Zip Code</th>
                        </tr>
                        <tr>
                            <td><input type="text" class="inp_box"></td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                        </tr>
                        <tr>
                            <td><input type="text" class="inp_box"></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" id="check_default_add2"> <label for="check_default_add2">Set as default address</label></td>
                        </tr>
                    </table>
                    <a href="#"><button>UPDATE ADDRESS</button></a>
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