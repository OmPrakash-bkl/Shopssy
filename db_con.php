<?php 

$serverName = 'localhost';
$userName = 'root';
$password = '';
$db = 'shopssy_onlineshop';

// Create Connection
$con = mysqli_connect($serverName, $userName, $password, $db);

// Check Connection
if(!$con) {
    die("Connection Failed :" . mysqli_connect_error());
}

?>