<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies List</title>
    <link rel="stylesheet" href="app.css">
</head>
<body>
  
  <?php require('partials/sidebar.php'); ?>
  <?php require('partials/addmovieoverlay.php'); ?>

  <main>
    <div class="tablebody">
      <div class="mov">
        <h1>Movies</h1>
        <button id="addmovieBtn">Add</button>
      </div>
      <?php
  // Database connection
  include 'connection.php';
  $sql = "SELECT title, director, releaseYear FROM tbl_movie";
  $result = $conn->query($sql);
  ?>
      <div class="tablecontainer">
        <table class="table">
          <thead class = tablehead>
            <tr>
              <th>Movie Title</th>
              <th>Director</th>
              <th>Release Date</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if ($result->num_rows > 0) {
              // Output data of each row
              while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . htmlspecialchars($row["title"]) . "</td><td>" . htmlspecialchars($row["director"]) . "</td><td>" . htmlspecialchars($row["releaseYear"]);  //"</td><td><button class='deleteBtn' onclick='deleteMovie(" . $row["MovieID"] . ")'>Delete</button></td></tr>";
              }
            } else {
              echo "<tr><td colspan='3'>No movies found</td></tr>";
            }
            //Add a Flag instead of Delete
            $conn->close();
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </main>
  <script src="script.js"></script>
</body>

</html>
