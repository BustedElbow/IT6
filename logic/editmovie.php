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
  $comment =  $_POST['comment'];

  $genre = $_POST['genre'] === '' ? null : $_POST['genre'];
  
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
      $sql = "UPDATE tbl_movie SET title = ?, director = ?, releaseYear = ?, genre = ?, thumbnail = ?, comment = ? WHERE movieID = ?";
      $params = ["ssssssi", $title, $director, $releaseDate, $genre, $fileName, $comment, $movieID];
  } else {
      $sql = "UPDATE tbl_movie SET title = ?, director = ?, releaseYear = ?, genre = ?, comment = ? WHERE movieID = ?";
      $params = ["sssssi", $title, $director, $releaseDate, $genre, $comment, $movieID];
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