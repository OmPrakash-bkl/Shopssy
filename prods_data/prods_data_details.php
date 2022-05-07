<?php

include("../connection.php");

header("Access-Control-Allow-Origin: http://localhost/");

if(isset($_SERVER['REQUEST_METHOD'])) {

    $table_names_query = "SELECT TABLE_NAME AS `mytables` from information_schema.tables WHERE TABLE_NAME LIKE '%filter_detail_for%';";

    $table_names_result = mysqli_query($conn, $table_names_query);
    while($row = mysqli_fetch_assoc($table_names_result)) {
        $tables_names_of_grp_of_tables[] = $row; 
    }
    header("content-type: Content-Type: application/json");
    echo json_encode($tables_names_of_grp_of_tables);
       
}


?>