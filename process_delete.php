<?php
include("connection.php");

if (isset($_GET['id'])) {
    $book_id = $_GET['id'];
    
    $sql = "DELETE FROM book_info_table WHERE BookID = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $book_id);
    
    if ($stmt->execute()) {
        echo "<script>
                alert('Book deleted successfully!');
                window.location.href = 'index.php';
              </script>";
    } else {
        echo "<script>
                alert('Error deleting book: " . $con->error . "');
                window.location.href = 'index.php';
              </script>";
    }
    
    $stmt->close();
} else {
    header("Location: index.php");
    exit();
}

mysqli_close($con);
?>
