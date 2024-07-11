<?php
require '../logic/connection.php';

$sql = "SELECT m.movieID, m.title, m.director, m.releaseYear, m.genre, u.username, u.userID
  FROM tbl_movie m
  JOIN tbl_users u ON m.userID = u.userID"; 
$result = $conn->query($sql);

$movies = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $movies[] = $row;
    }
}

$isAdmin = $_SESSION['isAdmin'] ?? false;

$conn->close();

require 'editmodal.php';
require 'deletemodal.php';

?>

<div class="container">
  <h2>My Movies</h2>
  <div class="row gx-3">
    <?php
    $hasMovies = false; 
    foreach ($movies as $movie):
      if ($_SESSION['userID'] == ($movie['userID'] ?? null)):
        $hasMovies = true; ?>
        <div class="col-md-3 mb-3">
          <div class="card w-auto">
            <img src="<?= !empty($movie['image']) ? htmlspecialchars($movie['image']) : '../src/images/no_image.png'; ?>" class="border-bottom border-1" alt="<?= htmlspecialchars($movie['title'] ?? 'Default Title'); ?>">
            <div class="card-body">
              <h5 class="card-title"><?= htmlspecialchars($movie['title'] ?? ''); ?></h5>
              <p class="card-text mb-1">Director: <?= htmlspecialchars($movie['director'] ?? ''); ?></p>
              <p class="card-text mb-1">Release Date: <?= htmlspecialchars($movie['releaseYear'] ?? ''); ?></p>
              <p class="card-text mb-1">Genre: <?= htmlspecialchars($movie['genre'] ?? ''); ?></p>
              <p class="card-text mb-1">Added by: <?= htmlspecialchars($movie['username'] ?? ''); ?></p>
              <?php if ($isAdmin || $_SESSION['userID'] == ($movie['userID'] ?? null)): ?>
                <button type="button" class="btn btn-primary editBtn" data-bs-toggle="modal" data-bs-target="#editMovieModal" 
                data-movie-id="<?= htmlspecialchars($movie['movieID'] ?? ''); ?>" 
                data-movie-title="<?= htmlspecialchars($movie['title'] ?? ''); ?>" 
                data-movie-director="<?= htmlspecialchars($movie['director'] ?? ''); ?>" 
                data-release-date="<?= htmlspecialchars($movie['releaseYear'] ?? ''); ?>"
                data-movie-genre="<?= htmlspecialchars($movie['genre'] ?? ''); ?>">Edit</button>
                <button type="button" class="btn btn-danger deleteBtn" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal" 
                data-movie-id="<?= htmlspecialchars($movie['movieID'] ?? ''); ?>">Delete</button>
              <?php endif; ?>
            </div>
          </div>
        </div>
      <?php endif; ?>
    <?php endforeach; ?>
    <?php if (!$hasMovies): ?>
      <div class="col-12 text-center">
        <div class='text-center mt-5'><h4 class='text-secondary'>You haven't added any movies yet.</h4></div>
      </div>
    <?php endif; ?>
  </div>

  <h2>Other Movies</h2>
  <div class="row gx-3">
    <?php
    $otherMovies = false; 
    foreach ($movies as $movie):
      if ($_SESSION['userID'] != ($movie['userID'] ?? null)):
        $otherMovies = true; ?>
        <div class="col-md-3 mb-3">
          <div class="card w-auto">
          <img src="<?= !empty($movie['image']) ? htmlspecialchars($movie['image']) : '../src/images/no_image.png'; ?>" class="border-bottom border-1" alt="<?= htmlspecialchars($movie['title'] ?? 'Default Title'); ?>">
            <div class="card-body">
              <h5 class="card-title"><?= htmlspecialchars($movie['title'] ?? ''); ?></h5>
              <p class="card-text mb-1">Director: <?= htmlspecialchars($movie['director'] ?? ''); ?></p>
              <p class="card-text mb-1">Release Date: <?= htmlspecialchars($movie['releaseYear'] ?? ''); ?></p>
              <p class="card-text mb-1">Genre: <?= htmlspecialchars($movie['genre'] ?? ''); ?></p>
              <p class="card-text mb-1">Added by: <?= htmlspecialchars($movie['username'] ?? ''); ?></p>
              <?php if ($isAdmin || $_SESSION['userID'] == ($movie['userID'] ?? null)): ?>
                <button type="button" class="btn btn-primary editBtn" data-bs-toggle="modal" data-bs-target="#editMovieModal" 
                data-movie-id="<?= htmlspecialchars($movie['movieID'] ?? ''); ?>" 
                data-movie-title="<?= htmlspecialchars($movie['title'] ?? ''); ?>" 
                data-movie-director="<?= htmlspecialchars($movie['director'] ?? ''); ?>" 
                data-release-date="<?= htmlspecialchars($movie['releaseYear'] ?? ''); ?>"
                data-movie-genre="<?= htmlspecialchars($movie['genre'] ?? ''); ?>">Edit</button>
                <button type="button" class="btn btn-danger deleteBtn" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal" 
                data-movie-id="<?= htmlspecialchars($movie['movieID'] ?? ''); ?>">Delete</button>
              <?php endif; ?>
            </div>
          </div>
        </div>
      <?php endif; ?>
    <?php endforeach; ?>
    <?php if (!$otherMovies): ?>
      <div class="col-12 text-center">
        <div class='text-center mt-5'><h4 class='text-secondary'>No movies added by other users yet.</h4></div>
      </div>
    <?php endif; ?>
  </div>
</div>

