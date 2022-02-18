<?php 
include './action.php';
$title = "Contact Us - Shopssy";
include './header.php';

if(isset($_POST['submit'])) {
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];
$nameval = "/^[a-zA-Z ]+$/";
$emailval = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
$numberval = "/^[0-9]+$/";

if(preg_match($nameval, $name) and preg_match($emailval, $email) and preg_match($numberval, $phone) and strlen($phone)==10) {
    $sql = "INSERT INTO `contact_us` (`name`, `email`, `phone`, `message`) VALUES ('$name', '$email', '$phone', '$message');";
    mysqli_query($con, $sql);
}

?>
<script>
    document.getElementsByClassName("message_box")[0].style.display = "flex";
    document.getElementsByClassName("message_box_1")[0].innerHTML = "<span>Message Sent</span>";
    setTimeout(function() {
        document.getElementsByClassName("message_box")[0].style.display = "none";
    }, 3000);
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
        <span><a href="./contactus.php">Contact Us</a></span>
    </div>
</center>
    </div>
    <!--sub navigation container end-->

   <!--contact us container start-->
  <center>
    <div class="contactus_container">
      
        <h2>CONTACT US</h2>

        <div class="map_container">
            <div style="width: 100%"><iframe width="100%" height="500" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=Airport-Mattuthavani%20Ring%20Rd,%20Madurai,%20Tamil%20Nadu%20625020+(Shopssy%20IT%20Park)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a href="https://www.gps.ie/sport-gps/">swimming watch</a></iframe></div>
        </div>

        <div class="mail_add_line_container">
            <div class="mail_add_line_inner_container">
                <table>
                    <tr>
                        <th><i class="fa fa-envelope" aria-hidden="true"></i></th>
                        <th class="heading">EMAIL: </th>
                        <td>support@domain.com</td>
                    </tr>
                    <tr>
                        <th></th>
                        <th></th>
                        <td>shopssy@domain.com</td>
                    </tr>
                </table>
            </div>
            <div class="mail_add_line_inner_container">
                <table>
                    <tr>
                        <th><i class="fas fa-home"></i></th>
                        <th class="heading">ADDRESS: </th>
                        <td>Airport-Mattuthavani Ring </td>
                    </tr>
                    <tr>
                        <th></th>
                        <th></th>
                        <td>Rd, Madurai, Tamil Nadu 625020.</td>
                    </tr>
                </table>
            </div>
            <div class="mail_add_line_inner_container">
                <table>
                    <tr>
                        <th><i class="fa fa-phone" aria-hidden="true"></i></th>
                        <th class="heading">HOTLINE: </th>
                        <td>0123-456-78910</td>
                    </tr>
                    <tr>
                        <th></th>
                        <th></th>
                        <td>0987-654-32100</td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="messanger_icon_container">
            <span><i class="far fa-comments"></i></span>
        </div>

        <div class="contactus_form_container">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                <div>
                    <input type="text" placeholder="NAME" name="name" required>
                </div>
                <div>
                    <input type="email" placeholder="EMAIL" name="email" required>
                </div>
                <div>
                    <input type="text" placeholder="PHONE NUMBER" name="phone" required>
                </div>
                <div>
                    <textarea rows="15" placeholder="MESSAGE" name="message" required></textarea>
                </div>
                <div>
                    <button type="submit" name="submit">SEND MESSAGE</button>
                </div>
            </form>
        </div>


    </div>
  </center>
   <!--contact us container end-->


   <?php 
    include "./footer.php";
    ?>

    <script src="./javascript/index.js"></script>
</body>
</html>