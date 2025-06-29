<?php
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $book_id = $_POST['book_id'];
    $book_name = trim($_POST['book_name']);
    $author = trim($_POST['author']);
    
    if (!empty($book_name) && !empty($author) && !empty($book_id)) {
        $sql = "UPDATE book_info_table SET BookName = ?, Author = ? WHERE BookID = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("ssi", $book_name, $author, $book_id);
        
        if ($stmt->execute()) {
            echo "<script>
                    alert('Book updated successfully!');
                    window.location.href = 'index.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Error updating book: " . $con->error . "');
                    window.location.href = 'edit_book.php?id=" . $book_id . "';
                  </script>";
        }
        
        $stmt->close();
    } else {
        echo "<script>
                alert('Please fill in all fields!');
                window.location.href = 'index.php';
              </script>";
    }
} else {
    header("Location: index.php");
    exit();
}

mysqli_close($con);
?>
