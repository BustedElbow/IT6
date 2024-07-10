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

$isAdmin = $_SESSION['isAdmin'] ?? false;

echo "isAdmin: " . ($isAdmin ? 'true' : 'false'); 


$conn->close();
?>

<div class="container">
  <!-- <h2>My Movies</h2>
  <div class="row">
    <?php foreach ($movies as $movie): ?>
      <?php if ($_SESSION['userID'] == ($movie['userID'] ?? null)): ?>
        <div class="col-md-4 mb-4">
          <div class="card">
            <img src="movie_image.jpg" class="card-img-top" alt="<?= htmlspecialchars($movie['title'] ?? ''); ?>">
            <div class="card-body">
              <h5 class="card-title"><?= htmlspecialchars($movie['title'] ?? ''); ?></h5>
              <p class="card-text">Director: <?= htmlspecialchars($movie['director'] ?? ''); ?></p>
              <p class="card-text">Release Date: <?= htmlspecialchars($movie['releaseYear'] ?? ''); ?></p>
              <p class="card-text">Added by: <?= htmlspecialchars($movie['username'] ?? ''); ?></p>
              <?php if ($isAdmin || $_SESSION['userID'] == ($movie['userID'] ?? null)): ?>
                <button type="button" class="btn btn-primary editBtn" data-bs-toggle="modal" data-bs-target="#editMovieModal" data-movie-id="1" data-movie-title="Movie Title" data-movie-director="Director Name" data-release-date="2023-01-01">Edit</button>
              <?php endif; ?>
            </div>
          </div>
        </div>
      <?php endif; ?>
    <?php endforeach; ?>
  </div> -->
  <h2>My Movies</h2>
  <div class="row">
    <?php foreach ($movies as $movie): ?>
      <?php if ($_SESSION['userID'] == ($movie['userID'] ?? null)): ?>
        <div class="col-md-4 mb-4">
          <div class="card">
            <img src="movie_image.jpg" class="card-img-top" alt="<?= htmlspecialchars($movie['title'] ?? ''); ?>">
            <div class="card-body">
              <h5 class="card-title"><?= htmlspecialchars($movie['title'] ?? ''); ?></h5>
              <p class="card-text">Director: <?= htmlspecialchars($movie['director'] ?? ''); ?></p>
              <p class="card-text">Release Date: <?= htmlspecialchars($movie['releaseYear'] ?? ''); ?></p>
              <p class="card-text">Added by: <?= htmlspecialchars($movie['username'] ?? ''); ?></p>
              <?php if ($isAdmin || $_SESSION['userID'] == ($movie['userID'] ?? null)): ?>
                <button type="button" class="btn btn-primary editBtn" data-bs-toggle="modal" data-bs-target="#editMovieModal" 
                data-movie-id="<?= htmlspecialchars($movie['movieID'] ?? ''); ?>" 
                data-movie-title="<?= htmlspecialchars($movie['title'] ?? ''); ?>" 
                data-movie-director="<?= htmlspecialchars($movie['director'] ?? ''); ?>" 
                data-release-date="<?= htmlspecialchars($movie['releaseYear'] ?? ''); ?>">Edit</button>
                <button type="button" class="btn btn-danger deleteBtn" data-bs-toggle="modal" data-bs-target="#editMovieModal" 
                data-movie-id="<?= htmlspecialchars($movie['movieID'] ?? ''); ?>">Delete</button>
              <?php endif; ?>
            </div>
          </div>
        </div>
      <?php endif; ?>
    <?php endforeach; ?>
  </div>

  <h2>Other Movies</h2>
  <div class="row">
    <?php foreach ($movies as $movie): ?>
      <?php if ($_SESSION['userID'] != ($movie['userID'] ?? null)): ?>
        <div class="col-md-4 mb-4">
          <div class="card">
            <img src="movie_image.jpg" class="card-img-top" alt="<?= htmlspecialchars($movie['title'] ?? ''); ?>">
            <div class="card-body">
              <h5 class="card-title"><?= htmlspecialchars($movie['title'] ?? ''); ?></h5>
              <p class="card-text">Director: <?= htmlspecialchars($movie['director'] ?? ''); ?></p>
              <p class="card-text">Release Date: <?= htmlspecialchars($movie['releaseYear'] ?? ''); ?></p>
              <p class="card-text">Added by: <?= htmlspecialchars($movie['username'] ?? ''); ?></p>
              <?php if ($isAdmin || $_SESSION['userID'] == ($movie['userID'] ?? null)): ?>
                <button type="button" class="btn btn-primary editBtn" data-bs-toggle="modal" data-bs-target="#editMovieModal" 
                data-movie-id="<?= htmlspecialchars($movie['movieID'] ?? ''); ?>" 
                data-movie-title="<?= htmlspecialchars($movie['title'] ?? ''); ?>" 
                data-movie-director="<?= htmlspecialchars($movie['director'] ?? ''); ?>" 
                data-release-date="<?= htmlspecialchars($movie['releaseYear'] ?? ''); ?>">Edit</button>
                <button type="button" class="btn btn-danger deleteBtn" data-bs-toggle="modal" data-bs-target="#editMovieModal" 
                data-movie-id="<?= htmlspecialchars($movie['movieID'] ?? ''); ?>">Delete</button>

              <?php endif; ?>
            </div>
          </div>
        </div>
      <?php endif; ?>
    <?php endforeach; ?>
  </div>
</div>


<div class="modal fade" id="editMovieModal" tabindex="-1" aria-labelledby="editMovieModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editMovieModalLabel">Edit Movie</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="editMovieForm" method="POST" action="../logic/edit.php">
          <input type="hidden" id="movieID" name="movieID">
          <div class="mb-3">
            <label for="movieTitle" class="form-label">Title</label>
            <input type="text" class="form-control" id="movieTitle" name="title" required>
          </div>
          <div class="mb-3">
            <label for="movieDirector" class="form-label">Director</label>
            <input type="text" class="form-control" id="movieDirector" name="director">
          </div>
          <div class="mb-3">
            <label for="releaseDate" class="form-label">Release Date</label>
            <input type="date" class="form-control" id="releaseDate" name="releaseDate">
          </div>
          <!-- Add more fields as needed -->
          <button type="submit" name="save" class="btn btn-primary">Save Changes</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>

document.addEventListener('DOMContentLoaded', function() {
  // Select all edit buttons
  var editButtons = document.querySelectorAll('.editBtn');

  // Add click event listener to each button
  editButtons.forEach(function(button) {
    button.addEventListener('click', function() {
      // Extract data attributes
      var movieId = this.getAttribute('data-movie-id');
      var movieTitle = this.getAttribute('data-movie-title');
      var movieDirector = this.getAttribute('data-movie-director');
      var releaseDate = this.getAttribute('data-release-date');

      // Log the data to the console
      console.log('Movie ID:', movieId);
      console.log('Movie Title:', movieTitle);
      console.log('Movie Director:', movieDirector);
      console.log('Release Date:', releaseDate);

      document.getElementById('movieID').value = movieId;
      document.getElementById('movieTitle').value = movieTitle;
      document.getElementById('movieDirector').value = movieDirector;
      document.getElementById('releaseDate').value = releaseDate;
    });
  });

  let deletebutton = document.querySelector('.deleteBtn');

  deletebutton.addEventListener('click', () => {
    let movieId = deletebutton.getAttribute('data-movie-id');
    console.log('Movie ID:', movieId);
  })
});

</script>