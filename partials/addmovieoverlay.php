

<div id="overlay" style="display:none;">
  <div class="overlay-content">
    <h1 class="overlayh1">Movie Details</h1>
    <span class="close" onclick="hideOverlay()">&times;</span>
    <form class="addMovieForm" action="addmovie.php" method="POST">
      <label for="movietitle">Movie Title</label>
      <input type="text" name="movieTitle" required>
      <label for="director">Director</label>
      <input type="text" name="director"required>
      <label for="releaseYear">Release Year</label>
      <input type="date" name="releaseYear"required>
      <button type="submit" class="submitoverlay">Save</button>
    </form>
  </div>
</div>

