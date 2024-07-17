<?php
session_start();

require 'connection.php';
// Check if movieID is provided in the POST request and the user is logged in
if(isset($_POST['watch-later-btn']) && isset($_SESSION['userID'])) {
  $movieID = $_POST['movieID'];
  $userID = $_SESSION['userID'];

  // First, check if the movie is already in the watch later list for this user
  $checkStmt = $conn->prepare("SELECT * FROM tbl_watchlater WHERE userID = ? AND movieID = ?");
  $checkStmt->bind_param("ii", $userID, $movieID);
  $checkStmt->execute();
  $result = $checkStmt->get_result();
  $checkStmt->close();

  if($result->num_rows > 0) {
      // Movie is already in the watch later list
      echo "This movie is already in your Watch Later list.";
  } else {
      // Movie is not in the watch later list, proceed with insertion
      $stmt = $conn->prepare("INSERT INTO tbl_watchlater (userID, movieID) VALUES (?, ?)");
      $stmt->bind_param("ii", $userID, $movieID);

      // Execute the prepared statement
      if($stmt->execute()) {
          header('Location: ../src/index.php');
      } else {
          // If the query failed, output error
          echo "Error: " . $stmt->error;
      }

      // Close the statement
      $stmt->close();
  }
} else {
  // If movieID or userID is not set, output an error message
  echo "Error: Movie ID or User ID is missing.";
}

// Close the database connection
$conn->close();
?>