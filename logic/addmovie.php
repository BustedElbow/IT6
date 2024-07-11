<?php 
session_start();

require 'connection.php';

$title = $_POST['title'];
$director = $_POST['director'];
$releaseDate = $_POST['releaseDate'];
$genre = $_POST['genre'];
$userID = $_SESSION['userID']; 

if (empty($releaseDate)) {
  $releaseDate = NULL;
}

$sql = "INSERT INTO tbl_movie (title, director, releaseYear, genre, userID) VALUES (?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

$stmt->bind_param("ssssi", $title, $director, $releaseDate, $genre, $userID);

if ($stmt->execute()) {
    header('Location: ../src/index.php');
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();

$conn->close();
?>