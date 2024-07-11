<div class="modal fade" id="editMovieModal" tabindex="-1" aria-labelledby="editMovieModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editMovieModalLabel">Edit Movie</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="editMovieForm" method="POST" action="../logic/editmovie.php">
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
          <div class="mb-3">
            <label for="movieGenre" class="form-label">Genre</label>
            <select class="form-control" id="movieGenre" name="genre">
              <option value="">Select a Genre</option>
              <option value="action">Action</option>
              <option value="comedy">Comedy</option>
              <option value="drama">Drama</option>
              <option value="fantasy">Fantasy</option>
              <option value="horror">Horror</option>
              <option value="mystery">Mystery</option>
              <option value="romance">Romance</option>
              <option value="thriller">Thriller</option>
            </select>
          </div>
          <button type="submit" name="save" class="btn btn-primary">Save Changes</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
  let editButtons = document.querySelectorAll('.editBtn');


  editButtons.forEach(button => {
    button.addEventListener('click', function() {

      let movieId = this.getAttribute('data-movie-id');
      let movieTitle = this.getAttribute('data-movie-title');
      let movieDirector = this.getAttribute('data-movie-director');
      let releaseDate = this.getAttribute('data-release-date');

      document.getElementById('movieID').value = movieId;
      document.getElementById('movieTitle').value = movieTitle;
      document.getElementById('movieDirector').value = movieDirector;
      document.getElementById('releaseDate').value = releaseDate;
    });
  });
});

</script>