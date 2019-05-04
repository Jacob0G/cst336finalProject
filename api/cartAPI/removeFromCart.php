<?php
    
    include '../../inc/dbConnection.php';
    $conn = getDatabaseConnection("finalProject");
    
     $arr = array();
     
     $arr[":productId"] = $_GET['productId'];
     $arr[":username"] = $_GET['username'];
     
     $sql = "DELETE FROM `fp_carts` WHERE username = :username and product_id = :productId";
     
     
    $stmt = $conn->prepare($sql);
    $stmt->execute($arr);
    
?>