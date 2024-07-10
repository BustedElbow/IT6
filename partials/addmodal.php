<div class="modal fade" id="addMovieModal" tabindex="-1" aria-labelledby="addMovieModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addMovieModalLabel">Add New Movie</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="addMovieForm" method="POST" action="../logic/addmovie.php">
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
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>