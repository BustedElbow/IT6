
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
  
<?php require '../partials/navbar.php'; ?>
  
  <main class="container py-2">  
    <div class="d-flex justify-content-center align-items-center mt-3">
      <div class="d-flex flex-column flex-md-row gap-4 profile-card align-items-center justify-content-center">
        <div>
          <img src="images/users/<?= !empty($picture) ? htmlspecialchars($picture): 'no_image.png' ?>" class="img-circle" alt="User Image">
        </div>
        <div class="d-flex flex-column justify-content-center">
          <form method="POST" action="../logic/editprofile.php" enctype="multipart/form-data">
            <div class="d-flex">
              <i class="lni lni-pencil align-self-center"></i>
              <input type="text" class="profile-name-input" value="<?= $username ?>" name="profile-username">
            </div>
            <label for="profile-picture">Profile Picture</label>
            <input type="file" name="profile-picture" class="custom-input-alt">
            <label for="user-password">New Password</label>
            <input type="text" name="new-user-password" class="custom-input">
            <div class="d-flex flex-column flex-md-row gap-2 mt-3">
              <button class="btn custom-btn" type="submit" name="profile-save">Save Changes</button>
              <button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#deleteConfirmationModal"
              data-user-id="<?= $_SESSION['userID'] ?>" id="delete-profile">Delete</button>
            </div>
          </form>
        </div>
      </div>
    </div>

<div class="container mt-5">
  <div class="row justify-content-between align-items-center mt-3 mb-2">
    <div class="col-auto">
      <h2>Movies You Added</h2>
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
              <p class="card-text mb-3">Comment: <span class="comment-tag"><?= htmlspecialchars($movie['comment'] ?? '--Not Set--'); ?></span></p>
              <?php if ($isAdmin || $_SESSION['userID'] == ($movie['userID'] ?? null)): ?>
                <button type="button" class="btn custom-btn editBtn" data-bs-toggle="modal" data-bs-target="#editMovieModal" 
                data-movie-id="<?= htmlspecialchars($movie['movieID'] ?? ''); ?>" 
                data-movie-title="<?= htmlspecialchars($movie['title'] ?? ''); ?>" 
                data-movie-director="<?= htmlspecialchars($movie['director'] ?? ''); ?>" 
                data-release-date="<?= htmlspecialchars($movie['releaseYear'] ?? ''); ?>"
                data-movie-genre="<?= htmlspecialchars($movie['genre'] ?? ''); ?>"
                data-movie-comment="<?= htmlspecialchars($movie['comment'] ?? ''); ?>">Edit</button>
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

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteConfirmationModalLabel">Confirm Delete</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete your account? This action cannot be undone.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <form id="deleteMovieForm" method="POST" action="../logic/deleteprofile.php">
          <input type="hidden" id="deleteUserID" name="userID" style="display: none;">
          <button type="submit" name="confirm-delete-profile" class="btn btn-danger">Confirm</button>
        </form>
      </div>
    </div>
  </div>
</div>


    
  </main>
  <script>
    document.addEventListener("DOMContentLoaded", () => {
      let deleteBtn = document.getElementById('delete-profile')
      
      deleteBtn.addEventListener('click', () => {
        let userID = deleteBtn.getAttribute('data-user-id')

        console.log('UserID', userID)

        document.getElementById('deleteUserID').value = userID

      })
    })
  </script>
  <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>