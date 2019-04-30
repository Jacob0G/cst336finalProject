<?php

    include '../../inc/dbConnection.php';
    $conn = getDatabaseConnection("finalProject");
    
    // $arr = array();
    // $arr[":cartId"] = $_GET["cartId"];
    // $arr[":username"] = $_GET["username"];
    // $arr[":productId"] = $_GET["productId"];
    // $arr[":quantity"] = $_GET["quantity"];
    // $arr[":unitPrice"] = $_GET["unitPrice"];

     $sql = "DELETE FROM `fp_products` WHERE `fp_products`.`product_id` = " . $_POST['productId'];
   
   $stmt = $conn->prepare($sql);
    $stmt->execute();
    ?>