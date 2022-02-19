<?php 

// Connect Functionality Start

$serverName = 'localhost';
$userName = 'root';
$password = '';
$db = 'shopssy_onlineshop';


$con = mysqli_connect($serverName, $userName, $password, $db);

// Connect Error Checker Fun Start

if(!$con) {
    die("Connection Failed :" . mysqli_connect_error());
}

// Connect Error Checker Fun End

// Connect Functionality End

?>