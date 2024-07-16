<?php
require '../logic/connection.php';

$sql = "SELECT m.movieID, m.title, m.director, m.releaseYear, m.genre, u.username, u.userID, m.thumbnail, u.picture, m.comment
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
require 'commentmodal.php';

$search = $_GET['search'] ?? '';
if (!empty($search)) {
    $movies = array_filter($movies, function($movie) use ($search) {
        return stripos($movie['title'], $search) !== false;
    });
}

?>

<div class="container">
  <div class="row justify-content-between align-items-center mt-3 mb-2">
    <div class="col-auto">
      <h2>Your Movies</h2>
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
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton<?php echo $movie['movieID']; ?>" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="bi bi-three-dots-vertical"></i> <!-- Bootstrap Icons for kebab menu -->
                </button>
          
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
              <p class="card-text mb-3 comment fst-italic" data-bs-toggle="modal" data-bs-target="#fullCommentModal" data-full-comment="<?= htmlspecialchars($movie['comment'] ?? '--Not Set--'); ?>"><span class="comment-tag"><?= htmlspecialchars($movie['comment'] ?? '--Not Set--',15);?></span></p>
              
                
                
              
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

  <h2 class="mb-3">Other Movies</h2>
  <div class="row gx-3">
    <?php
    $otherMovies = false; 
    foreach ($movies as $movie):
      if ($_SESSION['userID'] != ($movie['userID'] ?? null)):
        $otherMovies = true; ?>
        <div class="col-lg-3 col-md-4 mb-3 h-100">
          <div class="card card-color w-auto">
          <img src="<?= !empty($movie['thumbnail']) ? '../src/images/movies/' . htmlspecialchars($movie['thumbnail']) : '../src/images/movies/no_image.png'; ?>" class="card-img-top img-fluid" alt="<?= htmlspecialchars($movie['title'] ?? 'Default Title'); ?>">           
            <div class="card-body">
              <h5 class="card-title"><?= htmlspecialchars($movie['title'] ?? ''); ?></h5>
              <p class="card-text mb-1">Directed by <?= htmlspecialchars($movie['director'] ?? ''); ?></p>
              <p class="card-text mb-2">Released on <?= !empty($movie['releaseYear']) ? date_format(date_create($movie['releaseYear']), 'F j, Y') : ''; ?></p>
              <p class="card-text mb-1"><span class="genre-tag"><?= htmlspecialchars($movie['genre'] ?? '--Not Set--'); ?></span></p>
              <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton<?php echo $movie['movieID']; ?>" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="bi bi-three-dots-vertical"></i> <!-- Bootstrap Icons for kebab menu -->
                </button>
          
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
              <p class="card-text mb-3 comment fst-italic" data-bs-toggle="modal" data-bs-target="#fullCommentModal" data-full-comment="<?= htmlspecialchars($movie['comment'] ?? '--Not Set--'); ?>"><span class="comment-tag"><?= htmlspecialchars($movie['comment'] ?? '--Not Set--',15);?></span></p>
              <div class="d-flex gap-0 mt-4">
                <img src="../src/images/users/<?= !empty($movie['picture']) ? htmlspecialchars($movie['picture']) : 'no_image.png'; ?>" class="img-circle-sm" alt="User Picture">
                <span class="align-self-center"><?= htmlspecialchars($movie['username'] ?? ''); ?></span>
              </div>
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

<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Function to truncate text
    function truncateText(selector, maxLength) {
        var elements = document.querySelectorAll(selector);
        for (var i = 0; i < elements.length; i++) {
            var element = elements[i];
            if (element.innerText.length > maxLength) {
                element.innerText = element.innerText.substr(0, maxLength) + '...';
                element.classList.add('truncated');
            }
        }
    }

    // Apply truncation to all elements with the class 'comment'
    truncateText('.comment', 60); // Truncate to 100 characters
    
    //comment modal
  
    var commentElements = document.querySelectorAll('.comment');
    var fullCommentModal = document.getElementById('fullCommentModal');
    var modalBody = fullCommentModal.querySelector('.modal-body');

    commentElements.forEach(function(commentElement) {
        commentElement.addEventListener('click', function() {
            var fullComment = commentElement.getAttribute('data-full-comment');
            modalBody.textContent = fullComment; // Populate modal with full comment
        });
    });
});


</script>