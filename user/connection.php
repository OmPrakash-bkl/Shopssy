<?php 

// Connect Functionality Start

$serverName = 'localhost';
$userName = 'root';
$password = '';
$db = 'shopssy_onlineshop';


$conn = mysqli_connect($serverName, $userName, $password, $db);

// Connect Error Checker Fun Start

if(!$conn) {
    die("Connection Failed :" . mysqli_connect_error());
}



// Connect Error Checker Fun End

// Connect Functionality End

?>