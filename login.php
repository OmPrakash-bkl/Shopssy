<?php 
include './action.php';
$title = "Login - Shopssy";
include './header.php';
?>


    <!--sub navigation container start-->
    <div class="sub_navigation_container">
<center>
    <div class="sub_navigation_inner_container">
        <span><a href="./index.php">Home</a></span>
        <span><i class="fas fa-arrow-right" style="color: #666666;font-size: 12px;"></i></span>
        <span><a href="./login.php">Login</a></span>
    </div>
</center>
    </div>
    <!--sub navigation container end-->

    <!--login container start-->
    <div class="login_register_container">
    
            <form action="">
                <div>
                    <label for="mail">Email</label> <br>
                <input type="email" id="mail">
                </div>
                <div>
                    <label for="pass">Password</label> <br>
                    <input type="password" id="pass">
                </div>
            <center>
                <span><a href="#">Forgot your password?</a></span>
                <span><a href="#">Register?</a></span>
            </center>
            <button type="submit">SIGN IN</button>
        </form>
       
    </div>
    <!--login container end-->

    <?php 
    include "./footer.php";
    ?>
              
    <script src="./javascript/index.js"></script>
</body>
</html>