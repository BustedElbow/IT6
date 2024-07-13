<div class="modal fade" id="addMovieModal" tabindex="-1" aria-labelledby="addMovieModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addMovieModalLabel">Add New Movie</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="addMovieForm" method="POST" action="../logic/addmovie.php" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="movieThumbnail" class="form-label">Movie Thumbnail</label>
            <input type="file" class="form-control" id="movieThumbnail" name="thumbnail" accept="image/png, image/jpeg">
          </div>
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
          <div class="mb-3">
            <label for="movieGenre" class="form-label">Genre</label>
            <div id="genreTags" class="mt-2">
              <select class="form-control" id="movieGenre" name="genre">
                <option value="">Select a Genre</option>
                <option value="Action">Action</option>
                <option value="Comedy">Comedy</option>
                <option value="Cartoon">Cartoon</option>
                <option value="Drama">Drama</option>
                <option value="Fantasy">Fantasy</option>
                <option value="Horror">Horror</option>
                <option value="Mystery">Mystery</option>
                <option value="Romance">Romance</option>
                <option value="Thriller">Thriller</option>
              </select>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>