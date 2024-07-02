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
        <button>Add</button>
      </div>
      <div class="tablecontainer">
        <form method="post">
          <input type="text" name="movieTitle" placeholder="Movie Title" required>
          <input type="text" name="releaseYear" placeholder="Release Year" required>
          <input type="text" name="rating" placeholder="Rating" required>
          <button type="submit" id="addMovieBtn">Add Movie</button>
        </form>
        <table class="table">
          <thead>
            <tr>
              <th>Title</th>
              <th>Release</th>
              <th>Rating</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
              $movieTitle = $_POST['movieTitle'];
              $releaseYear = $_POST['releaseYear'];
              $rating = $_POST['rating'];
              echo "<tr>";
              echo "<td>$movieTitle</td>";
              echo "<td>$releaseYear</td>";
              echo "<td>$rating</td>";
              echo "</tr>";
            }
            ?>
            <tr>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td></td>
              <td></td>
              <td></td>
            </tr>
          </tbody>
        </table>
      </div>
  </main>
  <script src="script.js"></script>
  <script>
    document.getElementById('addMovieBtn').addEventListener('click', function(event) {
      alert('Movie added successfully!');
    });
  </script>
</body>

</html>
