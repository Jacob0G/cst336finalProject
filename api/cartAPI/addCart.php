<?php

    include '../../inc/dbConnection.php';
    $conn = getDatabaseConnection("finalProject");
    
    $namedParam = array();
    $namedParam[":product_id"] = $_GET['product_id'];
    $namedParam[":username"] = $_GET['username'];  
    
    $sql ="SELECT * FROM `fp_carts` WHERE username=:username AND product_id=:product_id";
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParam);
    $cartItem = $stmt->fetch(PDO::FETCH_ASSOC);

    if(!empty($cartItem)){
        $namedParam = array();
        $namedParam[":product_id"] = $_GET['product_id'];
        $namedParam[":username"] = $_GET['username'];  
        $namedParam[":quantity"] = $_GET['quantity'];

        $sql = "UPDATE `fp_carts` SET quantity=:quantity WHERE username=:username AND product_id=:product_id";
        
        $stmt = $conn->prepare($sql);
        $stmt->execute($namedParam);
    }else{
        $arr = array();
        $arr[":product_id"] = $_GET['product_id'];
        $arr[":quantity"] = $_GET['quantity'];
        $arr[":unit_price"] = $_GET['unit_price'];
        $arr[":username"] = $_GET['username'];  
        
        $sql = "INSERT INTO `fp_carts` (`cart_item_id`, `product_id`, `quantity`, `unitPrice`, `username`) 
            VALUES (NULL, :product_id, :quantity, :unit_price, :username)";
               
        $stmt = $conn->prepare($sql);
        $stmt->execute($arr);
    }    
   
?>