<?php

$payment_id = $_POST['razorpay_payment_id'];
$amt = $_POST['totalAmount'];
$pro_id = $_POST['product_id'];
$data = [ 
'user_id' => '1',
'payment_id' => $payment_id,
'amount' => $amt,
'product_id' => $pro_id
];
// you can write your database insertation code here
// after successfully insert transaction in database, pass the response accordingly
$arr = array('msg' => 'Payment successfully credited', 'status' => true);  
echo json_encode($arr);
?>