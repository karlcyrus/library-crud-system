<?php
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $book_name = trim($_POST['book_name']);
    $author = trim($_POST['author']);
    
    if (!empty($book_name) && !empty($author)) {
        $sql = "INSERT INTO book_info_table (BookName, Author) VALUES (?, ?)";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("ss", $book_name, $author);
        
        if ($stmt->execute()) {
            echo "<script>
                    alert('Book added successfully!');
                    window.location.href = 'index.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Error adding book: " . $con->error . "');
                    window.location.href = 'add_book.php';
                  </script>";
        }
        
        $stmt->close();
    } else {
        echo "<script>
                alert('Please fill in all fields!');
                window.location.href = 'add_book.php';
              </script>";
    }
} else {
    header("Location: index.php");
    exit();
}

mysqli_close($con);
?>
