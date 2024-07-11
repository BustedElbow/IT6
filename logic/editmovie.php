<?php
var_dump($_POST);

require 'connection.php';


if(isset($_POST['save'])) {
  
  $movieID = $_POST['movieID'];
  $title = $_POST['title'];
  $director = $_POST['director'];
  $releaseDate = $_POST['releaseDate'];
  $genre = $_POST['genre'];

  $sql = "UPDATE tbl_movie SET title = ?, director = ?, releaseYear = ?, genre = ? WHERE movieID = ?";

  $stmt = $conn->prepare($sql);

  $stmt->bind_param("ssssi", $title, $director, $releaseDate, $genre, $movieID);

  if($stmt->execute()) {
    header('Location: ../src/index.php');
  } else {
    echo "Error updating record: " . $stmt->error;
  }

  $stmt->close();
}

$conn->close();