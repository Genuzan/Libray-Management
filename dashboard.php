<?php
   include("database.php");
   session_start();
   if(!isset($_SESSION['username'])){
      header("Location: login.php"); 
      exit;
   }

   if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['add_book'])){
      $book_title = $_POST['book_title'];
      $author = $_POST['author'];
      $book_type = $_POST['book_type'];
      $date_published = $_POST['date_published'];

      $stmt = $conn->prepare("INSERT INTO books (book_title, author, book_type, date_published)
                              VALUES (?, ?, ?, ?)");
      $stmt->bind_param("ssss", $book_title, $author, $book_type, $date_published);

      if($stmt->execute()){
         $message = "Book added successfully!";
      }
      else{
         $message = "ERROR: ".$conn->error;
      }
      $stmt->close();
   }

   $sql = "SELECT book_id, book_title, author, book_type, date_published, date_added FROM books";
   $result = $conn->query($sql);
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Dashboard</title>

    <style>
      <?php
          include("dashboardstyle.php"); 
      ?>
     
       </style>
</head>
<body>

    <div class="container">
        <h1>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>'s Dashboard</h1>

        <?php
            if (isset($message)) {
                echo "<div class='message ".(strpos($message, 'ERROR') !== false ? 'error' : 'success')."'>$message</div>";
            }
        ?>

        <h2>Library System</h2>

        <table>
            <thead>
                <tr>
                    <th>Book ID</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Type</th>
                    <th>Date Published</th>
                    <th>Date Added</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if($result->num_rows > 0){
                        while($row = $result->fetch_assoc()){
                            echo "<tr>
                                    <td>{$row['book_id']}</td>
                                    <td>{$row['book_title']}</td>
                                    <td>{$row['author']}</td>
                                    <td>{$row['book_type']}</td>
                                    <td>{$row['date_published']}</td>
                                    <td>{$row['date_added']}</td>
                                    <td>
                                        <a href='edit.php?id={$row['book_id']}'>Edit</a> | 
                                        <a href='delete.php?id={$row['book_id']}' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                                    </td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7'>No records found.</td></tr>";
                    }
                ?>
            </tbody>
        </table>

     
        <h3>Add New Book</h3>

        <form method="POST">
            <input type="text" name="book_title" placeholder="Book Title" required>
            <input type="text" name="author" placeholder="Author" required>
            <input type="text" name="book_type" placeholder="Type" required>
            <input type="date" name="date_published" required>
            <button type="submit" name="add_book">Add Book</button>
        </form>

        <div class="back-link">
            <a href="index.php">Back to Home</a>
        </div>
    </div>

</body>
</html>

<?php
   mysqli_close($conn); 
?>
