
<?php require '../logic/displaywatchlater.php' ?>


<div class="container">
  <div class="row justify-content-between align-items-center mt-3 mb-2">
    <div class="col-auto">
      <h2>Watch Later</h2>
    </div>
  </div>
  <div class="row gx-3 mb-5">
    <?php
    $hasMovies = !empty($moviesList); // Check if there are movies in the list
    foreach ($moviesList as $movie): // Iterate over $moviesList instead of $movies
      ?>
      <div class="col-lg-3 col-md-4 mb-3">
        <div class="card card-color w-auto h-100">
          <img src="<?= !empty($movie['thumbnail']) ? '../src/images/movies/' . htmlspecialchars($movie['thumbnail']) : '../src/images/movies/no_image.png'; ?>" class="card-img-top img-fluid" alt="<?= htmlspecialchars($movie['title'] ?? 'Default Title'); ?>">
          <div class="card-body">
            <h5 class="card-title"><?= htmlspecialchars($movie['title'] ?? ''); ?></h5>
            <p class="card-text mb-1">Directed by <?= htmlspecialchars($movie['director'] ?? ''); ?></p>
            <p class="card-text mb-2">Released on <?= !empty($movie['releaseYear']) ? date_format(date_create($movie['releaseYear']), 'F j, Y') : ''; ?></p>
            <p class="card-text mb-3"><span class="genre-tag"><?= htmlspecialchars($movie['genre'] ?? '--Not Set--'); ?></span></p> 
            <form method="POST" action="../logic/removefromwatchlater.php">
              <input type="hidden" name="watchLaterID" value="<?= htmlspecialchars($movie['watchLaterID']); ?>">
              <button type="submit" name="watched" class="btn custom-btn w-100">Watched</button>
            </form>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
    <?php if (!$hasMovies): ?>
      <div class="col-12 text-center">
        <div class='text-center mt-5'><h4 class='text-secondary'>You don't have movies added to your list</h4></div>
      </div>
    <?php endif; ?>
  </div>
</div>
