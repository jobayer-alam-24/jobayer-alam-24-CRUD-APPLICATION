<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $db_name = "schedule_manager"; 

    try{
        $conn = new mysqli($servername, $username, $password, $db_name);
    }catch(mysqli_sql_exception $e){
        die("" . $e->getMessage());
    } 
?>