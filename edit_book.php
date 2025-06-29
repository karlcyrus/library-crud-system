<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="particles-js"></div>
        <div class="form-container">
             <h1><i class="fa-solid fa-pen-to-square" style="margin-right: 10px;"></i>EDIT BOOK</h1>
            
            <?php
            include("connection.php");
            
            if (isset($_GET['id'])) {
                $book_id = $_GET['id'];
                $sql = "SELECT * FROM book_info_table WHERE BookID = ?";
                $stmt = $con->prepare($sql);
                $stmt->bind_param("i", $book_id);
                $stmt->execute();
                $result = $stmt->get_result();
                
                if ($result->num_rows > 0) {
                    $book = $result->fetch_assoc();
            ?>
            
            <form action="process_edit.php" method="POST" class="book-form">
                <input type="hidden" name="book_id" value="<?php echo $book['BookID']; ?>">
                
                <div class="form-group">
                    <label for="book_name">Book Name:</label>
                    <input type="text" id="book_name" name="book_name" value="<?php echo htmlspecialchars($book['BookName']); ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="author">Author:</label>
                    <input type="text" id="author" name="author" value="<?php echo htmlspecialchars($book['Author']); ?>" required>
                </div>
                
                <div class="form-actions">
                    <button type="submit" class="btn-save">Update Book</button>
                    <a href="index.php" class="btn-cancel">Cancel</a>
                </div>
            </form>
            
            <?php
                } else {
                    echo "<p class='error'>Book not found!</p>";
                    echo "<a href='index.php' class='btn-cancel'>Back to Home</a>";
                }
                $stmt->close();
            } else {
                echo "<p class='error'>No book ID provided!</p>";
                echo "<a href='index.php' class='btn-cancel'>Back to Home</a>";
            }
            
            mysqli_close($con);
            ?>

        <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
        <script>
            particlesJS("particles-js", {
            particles: {
                number: { value: 60 },
                size: { value: 3 },
                color: { value: "#ffffff" },
                line_linked: {
                enable: true,
                distance: 150,
                color: "#ffffff",
                opacity: 0.4,
                width: 1
                },
                move: {
                enable: true,
                speed: 1.6
                }
            },
            interactivity: {
                events: {
                onhover: { enable: true, mode: "grab" }
                }
            },
            retina_detect: true
            });
        </script>
        </div>
</body>
</html>
