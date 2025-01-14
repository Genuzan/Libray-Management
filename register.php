
<?php
   include("database.php")
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
       include("registerstyle.php"); 
    ?>
</head>
<body>
    <form action = "<?php echo
       htmlspecialchars($_SERVER["PHP_SELF"])
    ?>" method = "post">
       <input type = submit value = "return" name = "return"><br>
       <h1> Register </h1>
       User Name <br>
       <input type = "text" name = "username"> <br>
       Password <br>
       <input type = "password" name = "password"> <br>
       <input type = "submit" value = "register" name = "register">


       
    </form>
</body>
</html>

<?php
   if($_SERVER["REQUEST_METHOD"] === "POST"){

      if(isset($_POST["return"])){
        header("Location: index.php"); 
        exit;
      }
      else{

        if(!empty($_POST["username"]) && !empty($_POST["password"])){
       $username = filter_input(INPUT_POST, "username",
       FILTER_SANITIZE_SPECIAL_CHARS);
       $password = filter_input(INPUT_POST, "password",
       FILTER_SANITIZE_SPECIAL_CHARS); 
       
       $hashed_password = password_hash($password, PASSWORD_DEFAULT);
       $sql = ("INSERT into users(username, password)
                   values ('$username', '$hashed_password')");

        try{
            mysqli_query($conn, $sql);
            echo "Registered Successfuly";
        }
        catch(mysqli_sql_exception){
            echo "User taken"; 
        }
       }
       else{
          echo "Please complete all fields"; 
       }
      }
   } 

   mysqli_close($conn); 
?>