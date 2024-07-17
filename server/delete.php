<?php 
    include("./serverconnection.php");

    $id = $_POST["id"];
    $result = $conn->delete($id);
    if($result){
       header("Location: datatable.php");  
    }
    else{
        echo "Couldn't DELETE data!";
    }

?>