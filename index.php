
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
   include("indexstyle.php");
?>
</head> 
<body>
    <form action = "<?php
       htmlspecialchars($_SERVER["PHP_SELF"]);
    ?>" method = "post">

       <h1> Library System </h1>
       <input type = "submit" name = "login" value = "LOG-in"> <br>
       <input type = "submit" name = "register" value = "REGISTER"> <br>

    </form>
    
  
   
</body>
</html> 

<?php
   if($_SERVER["REQUEST_METHOD"] === "POST"){
      if(isset($_POST["login"])){
         header("Location: login.php");
      }
      else{
         header("location: register.php");
      } 
   }
?>
