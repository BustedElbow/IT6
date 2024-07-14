
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
<?php 


require '../logic/connection.php';

if (isset($_SESSION['userID'])) {
  $sql = "SELECT username, password, picture FROM tbl_users WHERE userID = ?";

  $stmt = $conn -> prepare($sql);

  $stmt -> bind_param("i", $_SESSION['userID']);

  $stmt -> execute();

  $result = $stmt -> get_result();
  if ($row = $result -> fetch_assoc()) {
    $username = $row['username'];
    $password = $row['password'];
    $picture = $row['picture'];
  } else {
    echo "User not found.";
  }
}

?>
  
  <main class="container d-flex justify-content-center align-items-center min-vh-100">  
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