<div id="addmovieOverlay" style="display:none;">
  <div class="overlay-content">
    <h1 class="overlayh1">Movie Details</h1>
    <span class="close" onclick="hideOverlay()">&times;</span>
    <form id="addMovieForm" action="/logic/addmovie.php" method="POST">
      <input type="text" name="movieTitle" placeholder="Movie Title" required>
      <input type="text" name="director" placeholder="Director" required>
      <input type="date" name="releaseYear" placeholder="Release Year" required>
      <button type="submit">Submit</button>
    </form>
  </div>
</div>

