<?php 
session_start();

require 'connection.php';

$title = $_POST['title'];
$director = $_POST['director'];
$releaseDate = $_POST['releaseDate'];
$genre = $_POST['genre'];
$userID = $_SESSION['userID']; 
$comment = isset($_POST['comment']) ? $_POST['comment'] : '';

$genre = $_POST['genre'] === '' ? null : $_POST['genre'];

if (empty($releaseDate)) {
  $releaseDate = NULL;
}

if (isset($_FILES['thumbnail']) && $_FILES['thumbnail']['error'] == UPLOAD_ERR_OK) {
  $uploadDir = '../src/images/movies/';
  $fileName = basename($_FILES['thumbnail']['name']);
  $targetPath = $uploadDir . $fileName;
  
  if (move_uploaded_file($_FILES['thumbnail']['tmp_name'], $targetPath)) {
  } else {
      echo "Error uploading file";
      exit; 
  }
} else {
  $fileName = ''; 
}

$sql = "INSERT INTO tbl_movie (title, director, releaseYear, genre, userID, thumbnail, comment) VALUES (?, ?, ?, ?, ?, ?,?)";

$stmt = $conn->prepare($sql);

$stmt->bind_param("ssssiss", $title, $director, $releaseDate, $genre, $userID, $fileName, $comment);

if ($stmt->execute()) {
    header('Location: ../src/index.php');
} else {
    echo "Error: " . $stmt->error;
}


$stmt->close();

$conn->close();
?>

