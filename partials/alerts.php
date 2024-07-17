
<?php if(isset($_SESSION['watchLaterAdded']) && $_SESSION['watchLaterAdded']): ?>
    <div style="position: fixed; top: 10px; left: 50%; transform: translateX(-50%); z-index: 1050; width: 80%; max-width: 600px;">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Movie successfully added to watch later.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            setTimeout(function() {
                var alert = document.querySelector('.alert');
                if (alert) {
                    alert.style.display = 'none';
                }
            }, 3000); d
        });
    </script>
<?php 
    unset($_SESSION['watchLaterAdded']);
endif; 
?>

<?php if(isset($_SESSION['watchLaterExists']) && $_SESSION['watchLaterExists']): ?>
    <div style="position: fixed; top: 10px; left: 50%; transform: translateX(-50%); z-index: 1050; width: 80%; max-width: 600px;">
      <div class="alert alert-warning alert-dismissible fade show" role="alert" id="watchLaterAlert">
          This movie is already added in watch later.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            setTimeout(function() {
                var alert = document.querySelector('.alert');
                if (alert) {
                    alert.style.display = 'none';
                }
            }, 3000); d
        });
    </script>
<?php 
    unset($_SESSION['watchLaterExists']);
endif; 
?>