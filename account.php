<?php 
include './action.php';
$title = "My Account - Shopssy";
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
        <div class="my_account_container">
            <h2 class="heading1">MY ACCOUNT</h2>
            <div class="account_details_table_container">
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
                <a href="#"><button>VIEW ADDRESS (1)</button></a>
                <a href="#"><button>LOG OUT</button></a>
            </div>
            <h2 class="heading2">ORDER HISTORY</h2>
            <p>You haven't placed any orders yet.</p>
        </div>
    </center>
    <!--my account container end-->
    
    <?php 
    include "./footer.php";
    ?>

   <script src="./javascript/index.js"></script>
</body>
</html>