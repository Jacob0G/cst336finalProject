<?php

    include '../../inc/dbConnection.php';
    $conn = getDatabaseConnection("finalProject");
    
    $arr[":productId"]= $_GET['productId'];
    
    $sql= "SELECT product_stock FROM fp_products WHERE product_id = :productId";
    $stmt = $conn->prepare($sql);
    $stmt->execute($arr);
    
    $productStock = $stmt->fetch(PDO::FETCH_ASSOC);
    $prodStockQuantity = intval($productStock["product_stock"]);
    $newProductStock = $prodStockQuantity - $_GET['quantity'];
    $arr[":quantity"] = $newProductStock;
    
    $sql = "UPDATE fp_products
    SET product_stock = :quantity
    WHERE product_id = :productId"; 
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($arr);
    
    $arr = array();
    $arr[":productId"]= $_GET['productId'];    
    $arr[":username"] = $_GET['username'];
    
    $sql = "DELETE FROM `fp_carts` WHERE username = :username and product_id = :productId";
    $stmt = $conn->prepare($sql);
    $stmt->execute($arr); 
        

?>