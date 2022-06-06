<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopssy - Payment</title>
</head>
<body>

<center>
    <a href="http://localhost:3000/index.php"><button style="margin: 2% 45%;padding: 10px 15px;background-color:rebeccapurple;color:white;border: 0px;border-radius: 10px;">Back To Home</button></a>
</center>

<?php
session_start();

// Redirect If Your Not Login Fun Start

if(!isset($_SESSION['user_login_id'])) {
    ?>
   <script type="text/javascript">
   window.location.href = 'http://localhost:3000/login.php';
   </script>
   <?php
}

// Redirect If Your Not Login Fun End

include './connection.php';

// Redirect If The Cart Is Empty Start

$user_id = $_SESSION['user_id'];
$cart_details_query = "SELECT * FROM `cart` WHERE `u_id` = $user_id;";
$cart_details__result = mysqli_query($conn, $cart_details_query);
$cart_count_checking = mysqli_num_rows($cart_details__result);
if($cart_count_checking == 0) {
 ?>
 <script type="text/javascript">
 window.location.href = 'http://localhost:3000/index.php';
 </script>
 <?php
}

// Redirect If The Cart Is Empty End

$_SESSION['psarynmielnat_fqtienayl_sxeacgigown'] = 1;

?>
    
<script src="./javascript/checkout.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
    function show_payment_cart(payment) {
    var totalAmount = payment;
    var product_id =  "P0XXX";
    var options = {
    "key": "",
    "amount": (totalAmount*100), // 2000 paise = INR 20
    "name": "Shopssy",
    "description": "Payment",
    "image": "./images/favicon1.png",
    "handler": function (response){
    window.location.href = './success2.php';
    $.ajax({
    url: './payment_proccess.php',
    type: 'POST',
    dataType: 'json',
    data: {
    razorpay_payment_id: response.razorpay_payment_id , totalAmount : totalAmount ,product_id : product_id,
    }, 
    success: function (msg) {
    window.location.href = './success2.php';
    }
    });
    },
    "theme": {
    "color": "#528FF0"
    }
    };
    var rzp1 = new Razorpay(options);
    rzp1.open();
    // e.preventDefault();
}
show_payment_cart('<?php echo $_SESSION['final_total_amt']; ?>');
</script>


</body>
</html>