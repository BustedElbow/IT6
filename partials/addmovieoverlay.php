

<div id="addmovieOverlay" style="display:none;">
  <div class="overlay-content">
    <form class="addMovieForm" action="../it6/logic/addmovie.php" method="POST">
      <h1 class="overlayh1">Movie Details</h1>
      <label for="movietitle">Title</label>
      <input type="text" name="movieTitle" required>
      <label for="director">Director</label>
      <input type="text" name="director" required>
      <label for="releaseYear">Year</label>
      <input type="date" name="releaseYear" required>
      <div class="button-container-movielist">
        <button type="submit" class="primary-button" id="submitoverlay">Submit</button>
        <button class="secondary-button" id="cancelbtn" onclick="hideOverlay()">Cancel</button>
      </div>
    </form>
  </div>
</div>

