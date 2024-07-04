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

  <main>
    <div class="tablebody">
      <div class="mov">
        <h1>Movies</h1>
        <button onclick="showOverlay()" class="addmovlistbtn">Add</button>
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
    <div id="overlay" style="display:none;">
      <div class="overlay-content">
        <h1 class="playlist1">Movie Details</h1>
        <span class="close" onclick="hideOverlay()">&times;</span>
        <form id="addMovieForm" action="addmovie.php" method="POST">
          <label for="movietitle">Movie Title: </label>
          <input type="text" name="movieTitle" required>
          <label for="director Title">Director: </label>
          <input type="text" name="director"  required>
          <label for="releaseYear">Release Year: </label>
          <input type="date" name="releaseYear" required>
          <button type="submit">Submit</button>
        </form>
      </div>
    </div>
  </main>

  <div id="overlay" style="display: none;"></div>
  <script src="script.js"></script>
</body>

</html>

