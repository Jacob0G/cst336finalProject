<?php
    include '../../inc/dbConnection.php';
    $conn = getDatabaseConnection("finalProject");

    $product_id = $_GET['product_id'];
    
    $sql = "SELECT * FROM fp_products WHERE product_id = $product_id";
    
    $stmt = $conn->prepare($sql);
    // print_r($stmt);
    $stmt->execute();
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode($product);
?>