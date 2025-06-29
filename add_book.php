<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Book</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="particles-js"></div>
    <div class="form-container">
        <h1>Add New Book</h1>
        
        <form action="process_add.php" method="POST" class="book-form">
            <div class="form-group">
                <label for="book_name">Book Name:</label>
                <input type="text" id="book_name" name="book_name" required>
            </div>
            
            <div class="form-group">
                <label for="author">Author:</label>
                <input type="text" id="author" name="author" required>
            </div>
            
            <div class="form-actions">
                <button type="submit" class="btn-save">Save Book</button>
                <a href="index.php" class="btn-cancel">Cancel</a>
            </div>
        </form>
    </div>

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
</body>
</html>
