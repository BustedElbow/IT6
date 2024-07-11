<?php 
session_start();

require 'connection.php';

$title = $_POST['title'];
$director = $_POST['director'];
$releaseDate = $_POST['releaseDate'];
$genre = $_POST['genre'];
$userID = $_SESSION['userID']; // Assuming userID is stored in session

if (empty($releaseDate)) {
  $releaseDate = NULL;
}
// Prepare the SQL statement with placeholders
$sql = "INSERT INTO tbl_movie (title, director, releaseYear, genre, userID) VALUES (?, ?, ?, ?, ?)";

// Prepare the statement
$stmt = $conn->prepare($sql);

// Bind the parameters
$stmt->bind_param("ssssi", $title, $director, $releaseDate, $genre, $userID);

// Execute the statement and check if it was successful
if ($stmt->execute()) {
    header('Location: ../src/index.php');
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement
$stmt->close();

// Close the connection
$conn->close();
?>