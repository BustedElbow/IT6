<div id="overlay" style="display:none;">
  <div class="overlay-content">
    <span class="close" onclick="hideOverlay()">&times;</span>
    <form id="addMovieForm" action="addmovie.php" method="POST">
      <input type="text" name="movieTitle" placeholder="Movie Title" required>
      <input type="date" name="director" placeholder="Director" required>
      <input type="text" name="releaseYear" placeholder="Release Year" required>
      <button type="submit">Submit</button>
    </form>
  </div>
</div>