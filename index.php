<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Movie Manager Collection</title>
  <link rel="stylesheet" href="app.css">
  
</head>

<body>

  <?php require('partials/sidebar.php'); ?>
  
  <main class="main">
    <h2>Add Movie</h2>
    <form action="addmovie.php" method="post">
      <label for="title">Title:</label><br>
      <input type="text" id="title" name="title" required><br>
      <label for="director">Director:</label><br>
      <input type="text" id="director" name="director" required><br>
      <label for="year">Year:</label><br>
      <input type="date" id="year" name="year" required><br>
      <input type="submit" value="Submit">
    </form>
  </main>
  <script src="script.js"></script>
</body>
</html>