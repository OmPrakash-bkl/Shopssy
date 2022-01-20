<?php 
include './action.php';
$title = "Create Account - Shopssy";
include './header.php';
?>

    <!--sub navigation container start-->
    <div class="sub_navigation_container">
<center>
    <div class="sub_navigation_inner_container">
        <span><a href="./index.php">Home</a></span>
        <span><i class="fas fa-arrow-right" style="color: #666666;font-size: 12px;"></i></span>
        <span><a href="./register.php">Create Account</a></span>
    </div>
</center>
    </div>
    <!--sub navigation container end-->

    <!--register container start-->
    <div class="login_register_container">
    
            <form action="">
                <div>
                    <label for="first">First Name</label> <br>
                <input type="text" id="first">
                </div>
                <div>
                    <label for="last">Last Name</label> <br>
                    <input type="text" id="last">
                </div>
                <div>
                    <label for="mail">Email</label> <br>
                    <input type="email" id="mail">
                </div>
                <div>
                    <label for="pass">Password</label> <br>
                    <input type="password" id="pass">
                </div>
            
            <button type="submit">CREATE ACCOUNT</button>
        </form>
       
    </div>
    <!--register container end-->



    <?php 
    include "./footer.php";
    ?>

   <script src="./javascript/index.js"></script>
</body>
</html>