<?php
var_dump($_POST);

require 'connection.php';

if (isset($_POST['save'])) {
  $movieID = $_POST['movieID'];
  $title = $_POST['title'];
  $director = $_POST['director'];
  $releaseDate = $_POST['releaseDate'];
  $genre = $_POST['genre'];
  $userID = $_SESSION['userID'];

  if (empty($releaseDate)) {
      $releaseDate = NULL;
  }

  $fileName = ''; 
  if (isset($_FILES['thumbnail']) && $_FILES['thumbnail']['error'] == UPLOAD_ERR_OK) {
      $uploadDir = '../src/images/movies/';
      $fileName = basename($_FILES['thumbnail']['name']);
      $targetPath = $uploadDir . $fileName;

      if (!move_uploaded_file($_FILES['thumbnail']['tmp_name'], $targetPath)) {
          echo "Error uploading file";
          exit;
      }
  }

  if (!empty($fileName)) {
      $sql = "UPDATE tbl_movie SET title = ?, director = ?, releaseYear = ?, genre = ?, imagePath = ? WHERE movieID = ?";
      $params = ["sssssi", $title, $director, $releaseDate, $genre, $fileName, $movieID];
  } else {
      $sql = "UPDATE tbl_movie SET title = ?, director = ?, releaseYear = ?, genre = ? WHERE movieID = ?";
      $params = ["ssssi", $title, $director, $releaseDate, $genre, $movieID];
  }

  $stmt = $conn->prepare($sql);
  $stmt->bind_param(...$params);

  if ($stmt->execute()) {
      header('Location: ../src/index.php');
  } else {
      echo "Error: " . $stmt->error;
  }

  $stmt->close();
  $conn->close();
}