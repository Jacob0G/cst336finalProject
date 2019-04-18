<?php

    include '../inc/dbConnection.php';
    $conn = getDatabaseConnection("finalProject");
    
    $arr = array();
    
    $arr[":productName"] = $_GET["productName"];
    $arr[":productDescription"] = $_GET["productDescription"];
    $arr[":productPrice"] = $_GET["productPrice"];
    $arr[":productStock"] = $_GET["productStock"];
    $arr[":catId"] = $_GET["catId"];
    $arr[":productImage"] = $_GET["productImage"];
  
    $sql = "INSERT INTO `fp_products` (`product_id`, `product_name`, `product_description`, `product_price`, `product_stock`, `cat_id`, `product_img`) 
           VALUES (NULL, ':productName',':productDescription', ':productPrice', ':productStock', ':catId', ':productImage')";
   
    $stmt = $conn->prepare($sql);
    $stmt->execute($arr);
    ?>