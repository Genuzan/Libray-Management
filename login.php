<?php
include("database.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <?php
       include("loginstyle.php"); 
    ?>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
       <input type="submit" name="return" value="Return"><br>
       <h1>Login:</h1><br>
       Username:<br>
       <input type="text" name="username"><br>
       Password:<br>
       <input type="password" name="password"><br>
       <input type="submit" name="login" value="Log In">
    </form>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["return"])) {
        header("Location: index.php"); 
        exit;
    } elseif (isset($_POST["login"])) {
        if (!empty(trim($_POST["username"])) && !empty(trim($_POST["password"]))) {
            $username = trim(filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS));
            $password = trim($_POST["password"]);

            $sql = "SELECT password FROM users WHERE username = ?";
            $stmt = mysqli_prepare($conn, $sql);

            if ($stmt) {
                mysqli_stmt_bind_param($stmt, "s", $username);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_bind_result($stmt, $hashed_password);

                if (mysqli_stmt_fetch($stmt)) {
                    if (password_verify($password, $hashed_password)) {
                        $_SESSION['username'] = $username;  
                        header("Location: dashboard.php");
                        exit;
                    } else {
                        echo "Invalid username or password.";
                    }
                } else {
                    echo "Invalid username or password.";
                }

                mysqli_stmt_close($stmt);
            } 
            else {
                echo "Database Query failed: " . mysqli_error($conn);
            }
        } else {
            echo "<br> Please complete all fields." ;
        }
    }
}

mysqli_close($conn);
?>
