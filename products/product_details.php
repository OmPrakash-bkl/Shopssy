<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");

if(isset($_SERVER['REQUEST_METHOD'])) {
   
        $table_of_products_data_query = "SELECT * FROM `products`;";
    
        $table_of_products_data_result = mysqli_query($conn, $table_of_products_data_query);
        while($row = mysqli_fetch_assoc($table_of_products_data_result)) {
            $table_of_products_data_rows[] = $row;
        }
        header("content-type: Content-Type: application/json");
        echo json_encode($table_of_products_data_rows);
       
}


?>