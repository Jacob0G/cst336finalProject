<?php

    include '../../inc/dbConnection.php';
    $conn = getDatabaseConnection("finalProject");
    
    $arr = array();
    $arr[":productId"] = $_GET['productId'];

    $sql= "SELECT product_stock FROM fp_products WHERE product_id = :productId";
    $stmt = $conn->prepare($sql);
    $stmt->execute($arr);
    
    $productStock = $stmt->fetch(PDO::FETCH_ASSOC);
    $prodStockQuantity = intval($productStock["product_stock"]);

    //echo json_encode($productStock);
    
    
    $arr[":quantity"] = $_GET['quantity'];
    $arr[":username"] = $_GET['username'];
    
   if ($_GET['quantity'] <= $prodStockQuantity){
       
    //print_r($_GET['quantity'] <= $prodStockQuantity);    
    $sql = "UPDATE fp_carts
    SET quantity = :quantity
    WHERE product_id = :productId AND username = :username"; 

    $stmt = $conn->prepare($sql);
    $stmt->execute($arr);    
    
    echo "Available";
    }
    
    else{
        
         echo "Not available";
    }
?>