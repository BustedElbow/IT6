
<?php
require '../logic/addwatchlater.php';
?>
<div class="container">
  <div class="row justify-content-between align-items-center mt-3 mb-2">
    <div class="col-auto">
      <h2>Watch Later</h2>
    </div>
    <div class="col-auto">
      <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#addMovieModal">
        <img src="../src/images/svg/plus.svg" alt="">
      </button>
    </div>
  </div>
  <div class="row gx-3 mb-5">
    <?php
    $hasMovies = false; 
    foreach ($movies as $movie):
      if ($_SESSION['userID'] == ($movie['userID'] ?? null)):
        $hasMovies = true;
        ?>
        <div class="col-lg-3 col-md-4 mb-3">
          <div class="card card-color w-auto h-100">
            <img src="<?= !empty($movie['thumbnail']) ? '../src/images/movies/' . htmlspecialchars($movie['thumbnail']) : '../src/images/movies/no_image.png'; ?>" class="card-img-top img-fluid" alt="<?= htmlspecialchars($movie['title'] ?? 'Default Title'); ?>">
            <div class="card-body">
              <h5 class="card-title"><?= htmlspecialchars($movie['title'] ?? ''); ?></h5>
              <p class="card-text mb-1">Directed by <?= htmlspecialchars($movie['director'] ?? ''); ?></p>
              <p class="card-text mb-2">Released on <?= !empty($movie['releaseYear']) ? date_format(date_create($movie['releaseYear']), 'F j, Y') : ''; ?></p>
              <p class="card-text mb-3"><span class="genre-tag"><?= htmlspecialchars($movie['genre'] ?? '--Not Set--'); ?></span></p> 
              <div class="dropdown">
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton<?php echo $movie['movieID']; ?>">
                  <?php if ($isAdmin || $_SESSION['userID'] == ($movie['userID'] ?? null)): ?>
                    <li><button type="button" class="btn custom-btn editBtn" data-bs-toggle="modal" data-bs-target="#editMovieModal" 
                      data-movie-id="<?= htmlspecialchars($movie['movieID'] ?? ''); ?>" 
                      data-movie-title="<?= htmlspecialchars($movie['title'] ?? ''); ?>" 
                      data-movie-director="<?= htmlspecialchars($movie['director'] ?? ''); ?>" 
                      data-release-date="<?= htmlspecialchars($movie['releaseYear'] ?? ''); ?>"
                      data-movie-genre="<?= htmlspecialchars($movie['genre'] ?? ''); ?>"
                      data-movie-comment="<?= htmlspecialchars($movie['comment'] ?? ''); ?>">Edit</button></li>
                    <li><button type="button" class="btn btn-danger deleteBtn" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal" 
                      data-movie-id="<?= htmlspecialchars($movie['movieID'] ?? ''); ?>">Delete</button></li>
                  <?php endif; ?>
                    <li><a class="dropdown-item" href="#">Watch Later</a></li>
                </ul>
              </div>
              
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