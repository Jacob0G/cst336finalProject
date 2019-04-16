<!DOCTYPE html>
<html>
    <head>
        <title> Admin Login screen</title>
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script>
             $(document).ready(function(){  
                let URL = window.location.href.split("=")[1]
                if(URL === 'True'){
                    $("#errorMsg").html("Wrong Login Credentials");
                }
             });
    </script>
    <style>
           #errorLogin{
               color:red;
           }
    </style> 
    </head>
    <body>
    <form method="POST" id="formElements" action="../api/loginProcess.php">
            
            Username: <input type="text" name="username"/><br/><br>
            
            Password: <input type="password" name="password"/> <br/> <br/><br>
            
            <input type="submit" id="submitButton" value="Login!"><br/><br/><br>
            
            <div id=“errorLogin”><h3 id=“errorMsg”></h3></div>
     </form>
    </body>