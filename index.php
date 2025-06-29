<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Book Information System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="style.css" />
</head>
<body>
  <!-- Background Animation -->
  <div id="particles-js"></div>

  <!-- Main Content -->
  <div class="container">

    <h1><i class="fa-solid fa-book-open-reader" style="margin-right: 10px;"></i> BOOK INFORMATION SYSTEM</h1>
    
    <div class="table-wrapper">
      <a href="add_book.php" class="add-btn">Add New Book</a>
      
      <table>
        <thead>
          <tr>
            <th>Book ID</th>
            <th>Book Name</th>
            <th>Author</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
          include("connection.php");

          $sql = "SELECT * FROM book_info_table ORDER BY BookID ASC";
          $result = mysqli_query($con, $sql);

          if (mysqli_num_rows($result) > 0) {
              while($row = mysqli_fetch_assoc($result)) {
                  echo "<tr>";
                  echo "<td>" . $row['BookID'] . "</td>";
                  echo "<td>" . htmlspecialchars($row['BookName']) . "</td>";
                  echo "<td>" . htmlspecialchars($row['Author']) . "</td>";
                  echo "<td class='actions'>";
                  echo "<a href='edit_book.php?id=" . $row['BookID'] . "' class='btn-edit'>Edit</a>";
                  echo "<a href='process_delete.php?id=" . $row['BookID'] . "' class='btn-delete' onclick='return confirm(\"Are you sure you want to delete this book?\")'>Delete</a>";
                  echo "</td>";
                  echo "</tr>";
              }
          } else {
              echo "<tr><td colspan='4' class='no-data'>No books found</td></tr>";
          }

          mysqli_close($con);
          ?>
        </tbody>
      </table>
    </div>
  </div>

  <!-- Particles.js Library -->
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
