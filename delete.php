<?php
   include("database.php");
   session_start();
   if(!isset($_SESSION["username"])){
     header("Location: login.php");
     exit;
   }

   if (isset($_GET['id'])) {
    $book_id = $_GET['id'];
    $stmt = $conn->prepare("DELETE FROM books WHERE book_id = ?");
    $stmt->bind_param("i", $book_id);

    if ($stmt->execute()) {
        header("Location: dashboard.php");
    } else {
        echo "Error deleting record: " . $conn->error;
    }
    $stmt->close();
}
mysqli_close($conn); 
?>

