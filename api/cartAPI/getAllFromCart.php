<?php

   include '../../inc/dbConnection.php';
    $conn = getDatabaseConnection("finalProject");

    $cartId = $_GET['cartId'];
    
    $sql = "SELECT * FROM fp_carts";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $product = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($product);

?>