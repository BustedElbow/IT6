<?php
var_dump($_POST);

require 'connection.php';


if(isset($_POST['save'])) {
  // Assuming 'editMovieForm' is a correct field to check. If not, adjust accordingly.
  $movieID = $_POST['movieID'];
  $title = $_POST['title'];
  $director = $_POST['director'];
  $releaseDate = $_POST['releaseDate'];

  // Prepare an UPDATE statement
  $sql = "UPDATE tbl_movie SET title = ?, director = ?, releaseYear = ? WHERE movieID = ?";

  // Prepare the statement
  $stmt = $conn->prepare($sql);

  // Bind parameters to the prepared statement
  // "sssi" specifies the types: s = string, i = integer
  $stmt->bind_param("sssi", $title, $director, $releaseDate, $movieID);

  // Execute the prepared statement
  if($stmt->execute()) {
    header('Location: ../src/index.php');
  } else {
    echo "Error updating record: " . $stmt->error;
  }

  // Close statement
  $stmt->close();
}

// Close connection
$conn->close();