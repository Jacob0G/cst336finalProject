<!DOCTYPE html>
<html>
    <head>
        <title> Cart Page </title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
       <meta charset="UTF-8">
       <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css" integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous">
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
       <!--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>-->
       <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      <link href="../css/styles.css" rel="stylesheet" type="text/css" />
      <style>
          button{
            border-radius: 10px;
            width: 150px;
            height: 70px;
            font-size: 20px;
          }
      </style>
      <script>
        /*global $*/
        $(document).ready(function(){
                
      //----------Add to cart and Display Cart-----------------                 
            addToCart();
            displayCart();     
        
            function addToCart(){
                $.ajax({
                method: "GET",
                 url: "../api/cartAPI/addToCart.php",
                dataType: "json",
                data:{ "productId": <?=$_GET['productId']?>,
                    "quantity": <?=$_GET['quantity']?>,
                    "unitPrice": <?=$_GET['unitPrice']?>,
                    "username": "<?=$_GET['username']?>"
                },
                    success: function(data, status) {
                        
                        $("#successMessage").html("The product(s) have been added to your cart!"); 
                        
                    },
                    complete: function(data,status) { //optional, used for debugging purposes
                    //alert(status)
                    }
                
              });//ajax
        } //add to cart
        
        function displayCart(){
               
               for(var i=0; i< 50 ; i++){
                 $("#selectQuantity").append("<option value='" + i + "'>"+ i + "</option>"); 
                 $("#quantity").hide();
                 $("updateBtn").hide();
                 $("deleteBtn").hide();
                 $("checkoutBtn").hide();
                }    
               var productId = [];      
                    $.ajax({
                            type: "GET",
                            url: "../api/cartAPI/getAllFromCart.php",
                            dataType: "json",
                            data: { "username": "<?=$_GET['username']?>"
                            },
                            success: function(data,status) {
                            data.forEach(function(key){  
                               alert(data);    
                               productId.push(key.product_id);  
                             });
                            },
                            complete: function(data,status) { //optional, used for debugging purposes
                                 //alert(status)
                            }
                                
                    });//ajax
                    
                    $.ajax({
                            type: "GET",
                            url: "../api/productAPI/getProductInfo.php",
                            dataType: "json",
                            data: { "product_id": productId
                            },
                            success: function(data,status) {
                            data.forEach(function(key){
                              $("#productImage").append("<img src='" + key.product_img + "'>");  
                              $("#productName").append(key.product_name);
                              $("#productDesc").append(key.product_description);
                              $("#productPrice").append(key.product_price);
                              $("#quantity").show();
                              $("updateBtn").show();
                              $("deleteBtn").show();
                              $("checkoutBtn").show();
                              
                             });
                            },
                            complete: function(data,status) { //optional, used for debugging purposes
                                 //alert(status)
                            }
                                
                      });//ajax
                    
            }// display function
                
                
      //----------Update Cart-----------------     
    
               $("#updateBtn").on("click", function(){    
                    $.ajax({
                            type: "GET",
                            url: "../api/cartAPI/updateItemQuantity.php",
                            dataType: "json",
                            data: { 
                                    "quantity": <?=$_GET['quantity']?>,
                                    "productId": <?=$_GET['productId']?>,
                                    "username": "<?=$_GET['username']?>"
                            },
                            success: function(data,status) {
                                   
                               $("#successMessage").html("The products have been added to your cart!");    
                            },
                            complete: function(data,status) { //optional, used for debugging purposes
                                 //alert(status)
                            }
                                
                     });//ajax
            
               }); //update cart
               
    //----------Delete from Cart-----------------   
             
               $("#deleteBtn").on("click", function(){
                 alert("Do you want to delete this product from the cart?");     
                 $.ajax({
                            type: "GET",
                            url: "../api/cartAPI/removeFromCart.php",
                            dataType: "json",
                            data: { "productId": <?=$_GET['productId']?>
                            },
                            success: function(data,status) {
                               $("#successMessage").html("The product(s) have been deleted from your cart!");    
                            },
                            complete: function(data,status) { //optional, used for debugging purposes
                                 //alert(status)
                            }
                                
                 });//ajax
               }); //delete from cart
               
    //----------Checkout from Cart-----------------         
                   $("#checkoutBtn").on("click", function(){    
                    $.ajax({
                            type: "GET",
                            url: "../api/cartAPI/checkoutCart.php",
                            dataType: "json",
                            data: { "quantity": <?=$_GET['quantity']?>,
                                    "productId": <?=$_GET['productId']?>,
                                    "username": "<?=$_GET['username']?>"
                            },
                            success: function(data,status) {
                                   
                               $("#successMessage").html("The product(s) have been checked out from your cart!");    
                            },
                            complete: function(data,status) { //optional, used for debugging purposes
                                 //alert(status)
                            }
                                
                     });//ajax
            
               }); //update cart
        
        });//documentReady
        
        </script>
        
    </head>

    <body>
    <div id = "mainBody">  
        <div id = "productImage"></div><br>
        <div id = "productName"></div><br>
        <div id = "productDesc"></div><br>
        <div id = "productPrice"></div><br>
        <div id = "quantity"> Qty:
        <select id = "selectQuantity">
        </select>
        </div><br>
       <button id = "updateBtn">Update Quantity</button>
       <button id = "deleteBtn">Delete Item</button><br>
       <button id = "checkoutBtn">Checkout</button><br>
       <div id = "successMessage"></div>
    </div>
    </body>
</html>