<?php
session_start();

//checks whether user has logged in
if (!isset($_SESSION['adminName'])) {
    header('location: ../../src/login.php'); //sends users to login screen if they haven't logged in
}

    include '../../inc/dbConnection.php';
    $conn = getDatabaseConnection("finalProject");
    $sql = "DELETE FROM `fp_products` WHERE `fp_products`.`product_id` = " . $_POST['productId'];
    //  $sql = "DELETE FROM `om_product` WHERE `om_product`.`productId` = " . $_POST['productId'];
    $stmt = $conn->prepare($sql);
    // $stmt->execute();  
    
   // echo $sql;
    
    header("Location: ../../src/admin.php");



?>