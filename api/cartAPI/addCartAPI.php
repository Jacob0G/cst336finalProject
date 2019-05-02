<?php

    include '../../inc/dbConnection.php';
    $conn = getDatabaseConnection("finalProject");
    
    $arr = array();
   foreach($_GET["orderList"] as $key){
       
    $arr[":cartId"] = $key["cartId"];//keys
    $arr[":username"] = $key["username"];
    $arr[":productId"] = $key["productId"];
    $arr[":quantity"] = $key["quantity"];
    $arr[":unitPrice"] = $key["unitPrice"];

    $sql = "INSERT INTO `fp_carts` (`cart_id`, `username`, `product_id`, `quantity`, `unitPrice`) 
           VALUES (NULL, :username, :product_id, :quantity, :unitPrice)";
    $stmt = $conn->prepare($sql);
    $stmt->execute($arr);
   }
    ?>