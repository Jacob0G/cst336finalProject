<!DOCTYPE html>
<html>
    <head>
        <title> Cart Page </title>
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        
    <script>
            /*global $*/
            $(document).ready(function(){
                var cart = [];
                // save cart
                //load cart

                $("#Delete").on("click", function(){
                    //alert("heeeeeee");
                    $.ajax({
                            type: "GET",
                            url: "api/cartAPI/removeFromCart.php",
                            dataType: "json",
                            data: { "productId": $_GET['productId']
                            },
                            success: function(data,status) {
                            data.forEach(function(key){
                                  var temp ={};
                                  temp["username"]=key.username;
                                  temp["productId"]=key.productId;
                                  temp["quantity"]= key.quantity;
                                  temp["unitPrice"]= key.unitPrice;
                                  cart.push(temp);
                          });
                          $("#myCart").append(key['productId']+ " " +key['quantity']+ " " +key['unitPrice'] + "<br>");
                          $("#totalProducts").html(data.totalproducts + " Products");
                            
                        },
                            complete: function(data,status) { //optional, used for debugging purposes
                                 //alert(status)
                            }
                                
                    });//ajax
            }); //on click
                    
                    
            //     $.ajax({
            //     method: "GET",
            //      url: "api/cartAPI/addToCart.php",
            //     dataType: "json",
            //     data:{
            //         "orderList": cart
            //     },
            //         success: function(data, status) {
            //     },
            //         complete: function(data,status) { //optional, used for debugging purposes
            //         //alert(status)
            //     }
                
            //  });//ajax
        
        });//documentReady
            
                
                
                
                
            
            // $(function(){
            //     var $select = $(".1-50");
            //     for (i=1;i<=50;i++){
            //         $("#quantity").append($('<option></option>').val(i).html(i))
            //     }
            // });
               
        </script>
        
    </head>
    <div id = "mainBody">
    <body>
        <div id = "productImage"></div>
        <div id = "productDesc"></div>
        <div id = "productPrice"></div>
        <button id = "delete">Delete</button>
        
         <!--<select name = "qunatity" id = quantity>-->
         <!--       <option value="">Qty:</option>-->
         <!--   </select>-->
            <span id="totalProducts"></span>
            <div id = "myCart"></div>
    </div>
        
    </body>
</html>