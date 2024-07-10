<?php

require '../logic/connection.php';

$sql = "SELECT m.movieID, m.title, m.director, m.releaseYear, m.active, u.username, u.userID
FROM tbl_movie m
JOIN tbl_users u ON m.userID = u.userID"; 
$result = $conn->query($sql);

$movies = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $movies[] = $row;
    }
} else {
    echo "0 results";
}
$conn->close();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Movie Manager Collection</title>
  
  <link rel="stylesheet" href="">
  <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
  <link rel="stylesheet" href="main.css">
  
</head>

<body>

  <?php require '../partials/navbar.php';
  $isAdmin = $isAdmin ?? false;
  
//   if (!isset($_SESSION['userId'])) {
//     $_SESSION['userId'] = null;
// }
   ?>


<main class="main container">
  <h1>Home Page</h1>
  <div class="row">
    <?php foreach ($movies as $movie): ?>
      <div class="col-md-4 mb-4">
        <div class="card">
          <img src="movie_image.jpg" class="card-img-top" alt="<?= htmlspecialchars($movie['title'] ?? ''); ?>">
          <div class="card-body">
            <h5 class="card-title"><?= htmlspecialchars($movie['title'] ?? ''); ?></h5>
            <p class="card-text">Director: <?= htmlspecialchars($movie['director'] ?? ''); ?></p>
            <p class="card-text">Release Date: <?= htmlspecialchars($movie['teleaseYear'] ?? ''); ?></p>
            <p class="card-text">Added by: <?= htmlspecialchars($movie['username'] ?? ''); ?></p>
            <p>Session User ID: <?= htmlspecialchars($_SESSION['userID'] ?? 'Not set'); ?></p>
            <!-- Print movie userID -->
            <p>Movie User ID: <?= htmlspecialchars($movie['userID'] ?? 'Not set'); ?></p>
            
            <?php if ($isAdmin || $_SESSION['userID'] == ($movie['userID'] ?? null)): ?>
              <a href="edit_movie.php?id=<?= $movie['id'] ?? ''; ?>" class="btn btn-primary">Edit</a>
            <?php endif; ?>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
  </main>
  <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>