<?php
   include("database.php");
   session_start();

   if(!isset($_SESSION["username"])){
    header("Locatiom:login.php");
    exit;
   }

   if (isset($_GET['id'])) {
    $book_id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM books WHERE book_id = ?");
    $stmt->bind_param("i", $book_id);
    $stmt->execute();
    $book = $stmt->get_result()->fetch_assoc();
    $stmt->close();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $book_id = $_POST['book_id'];
    $book_title = $_POST['book_title'];
    $author = $_POST['author'];
    $book_type = $_POST['book_type'];
    $date_published = $_POST['date_published'];

    $stmt = $conn->prepare("UPDATE books SET book_title = ?, author = ?, book_type = ?, date_published = ? WHERE book_id = ?");
    $stmt->bind_param("ssssi", $book_title, $author, $book_type, $date_published, $book_id);

    if ($stmt->execute()) {
        header("Location: dashboard.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
</head>
<body>
    <h2>Edit Book</h2>
    <form method="POST">
        <input type="hidden" name="book_id" value="<?php echo $book['book_id']; ?>">
        <input type="text" name="book_title" value="<?php echo $book['book_title']; ?>" required>
        <input type="text" name="author" value="<?php echo $book['author']; ?>" required>
        <input type="text" name="book_type" value="<?php echo $book['book_type']; ?>" required>
        <input type="date" name="date_published" value="<?php echo $book['date_published']; ?>" required>
        <button type="submit">Update Book</button>
    </form>
</body>
</html>

<?php
   mysqli_close($conn);
?>