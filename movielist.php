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
      <div class="tablecontainer">
        <table class="table">
          <thead class = tablehead>
            <tr>
              <th>Title</th>
              <th>Director</th>
              <th>Release Year</th>
            </tr>
          </thead>
          <tbody>
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
    </div>
    <div id="overlay" style="display:none;">
      <div class="overlay-content">
        <span class="close" onclick="hideOverlay()">&times;</span>
        <form id="addMovieForm" action="addmovie.php" method="POST">
          <input type="text" name="movieTitle" placeholder="Movie Title" required>
          <input type="date" name="director" placeholder="Director" required>
          <input type="text" name="releaseYear" placeholder="Realease Year" required>
          <button type="submit">Submit</button>
        </form>
      </div>
    </div>
  </main>

  <div id="overlay" style="display: none;"></div>
  <script src="script.js"></script>
</body>

</html>


<!--
<form action="addmovie.php" method="POST"></form>
        <input type="text" name="movieTitle" placeholder="Movie Title" required>
        <input type="date" name="releaseYear" placeholder="Release Year" required>
        <input type="text" name="director" placeholder="Director" required>
        <button type="submit" id="addMovieBtn">Add Movie</button>
      </form>