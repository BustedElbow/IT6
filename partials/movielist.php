<?php
require '../logic/connection.php';

$sql = "SELECT m.movieID, m.title, m.director, m.releaseYear, m.genre, u.username, u.userID, m.imagePath
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

$search = $_GET['search'] ?? '';
if (!empty($search)) {
    $movies = array_filter($movies, function($movie) use ($search) {
        return stripos($movie['title'], $search) !== false;
    });
}

?>

<div class="container">
  <div class="row justify-content-between align-items-center mb-3 mt-5">
    <div class="col-auto">
      <h2>My Movies</h2>
    </div>
    <div class="col-auto">
      <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#addMovieModal">
        <img src="../src/images/svg/plus.svg" alt="">
      </button>
    </div>
  </div>
  <div class="row gx-3">
    <?php
    $hasMovies = false; 
    foreach ($movies as $movie):
      if ($_SESSION['userID'] == ($movie['userID'] ?? null)):
        $hasMovies = true; ?>
        <div class="col-lg-3 col-md-4 mb-3">
          <div class="card card-color w-auto h-100">
            <img src="<?= !empty($movie['imagePath']) ? '../src/images/movies/' . htmlspecialchars($movie['imagePath']) : '../src/images/movies/no_image.png'; ?>" class="card-img-top img-fluid" alt="<?= htmlspecialchars($movie['title'] ?? 'Default Title'); ?>">
        
            <div class="card-body">
              <h5 class="card-title"><?= htmlspecialchars($movie['title'] ?? ''); ?></h5>
              <p class="card-text mb-1">Directed by <?= htmlspecialchars($movie['director'] ?? ''); ?></p>
              <p class="card-text mb-1">Released on <?= htmlspecialchars($movie['releaseYear'] ?? ''); ?></p>
              <p class="card-text mb-1"><span class="genre-tag"><?= htmlspecialchars($movie['genre'] ?? 'Genre: Unknown'); ?></span></p>
              <p class="card-text mb-1 user-added">Added by <?= htmlspecialchars($movie['username'] ?? ''); ?></p>
              <?php if ($isAdmin || $_SESSION['userID'] == ($movie['userID'] ?? null)): ?>
                <button type="button" class="btn btn-primary editBtn" data-bs-toggle="modal" data-bs-target="#editMovieModal" 
                data-movie-id="<?= htmlspecialchars($movie['movieID'] ?? ''); ?>" 
                data-movie-title="<?= htmlspecialchars($movie['title'] ?? ''); ?>" 
                data-movie-director="<?= htmlspecialchars($movie['director'] ?? ''); ?>" 
                data-release-date="<?= htmlspecialchars($movie['releaseYear'] ?? ''); ?>"
                data-movie-genre="<?= htmlspecialchars($movie['genre'] ?? ''); ?>"
                data-movie-image="<?= htmlspecialchars($movie['imagePath'] ?? ''); ?>">Edit</button>
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
        <div class='text-center mt-5'><h4 class='text-secondary'>No movies found</h4></div>
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
        <div class="col-lg-3 col-md-4 mb-3 h-100">
          <div class="card card-color w-auto">
          <img src="<?= !empty($movie['imagePath']) ? '../src/images/movies/' . htmlspecialchars($movie['imagePath']) : '../src/images/movies/no_image.png'; ?>" class="card-img-top img-fluid" alt="<?= htmlspecialchars($movie['title'] ?? 'Default Title'); ?>">           
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
        <div class='text-center mt-5'><h4 class='text-secondary'>No movies found</h4></div>
      </div>
    <?php endif; ?>
  </div>
</div>

