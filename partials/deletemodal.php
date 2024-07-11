<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Delete</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this movie?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <form id="deleteMovieForm" method="POST" action="../logic/deletemovie.php">
          <input type="hidden" id="deleteMovieID" name="movieID" style="display: none;">
          <button type="submit" name="confirmDelete" class="btn btn-danger">Confirm</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>

document.addEventListener('DOMContentLoaded', () => {  

  let deletebutton = document.querySelectorAll('.deleteBtn');

  deletebutton.forEach(button => {
    button.addEventListener('click', () => {
      let movieId = button.getAttribute('data-movie-id');
      console.log('Movie ID:', movieId);
      
      document.getElementById('deleteMovieID').value = movieId;

    })
  })
});

</script>