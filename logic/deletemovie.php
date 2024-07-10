//Trial
<?php
include 'connection.php'; // Database connection

if(isset($_POST['MovieiD'])) {
  $movieId = $_POST['MovieID'];
  $sql = "DELETE FROM tbl_movie WHERE MovieID = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $movieId);
  $stmt->execute();
  
  if($stmt->affected_rows > 0) {
    echo "Movie deleted successfully";
  } else {
    echo "Error deleting movie";
  }
  
  $stmt->close();
  $conn->close();
}
header('Location: movielist.php');

?>