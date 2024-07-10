<?php 
session_start();

require 'connection.php';


  $title = $_POST['title'];
  $director = $_POST['director'];
  $releaseDate = $_POST['releaseDate'];


  $sql = "INSERT INTO tbl_movie (title, director, releaseYear, active, userID) VALUES ('$title', '$director', '$releaseDate', 1, '{$_SESSION['userID']}')";

if ($conn->query($sql) === TRUE) {
  header('Location: ../src/index.php');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the connection
$conn->close();
?>