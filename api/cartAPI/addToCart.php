<?php

    include '../../inc/dbConnection.php';
    $conn = getDatabaseConnection("finalProject");
    
    $arr = array();

    $arr[":productId"] = $_GET['productId'];
    $arr[":quantity"] = $_GET['quantity'];
    $arr[":unitPrice"] = $_GET['unitPrice'];
    $arr[":username"] = $_GET['username'];  
   
   //$sql = "INSERT INTO `fp_carts` (`cart_id`, `product_id`, `quantity`, `unitPrice`) 
         // VALUES (NULL, :productId, :quantity, :unitPrice)"; 

   $sql = "INSERT INTO `fp_carts` (`cart_item_id`, `product_id`, `quantity`, `unitPrice`, `username`) 
    VALUES (NULL, :productId, :quantity, :unitPrice, :username)";
           
    $stmt = $conn->prepare($sql);
    $stmt->execute($arr);
   
?>