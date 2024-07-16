<?php
require 'connection.php';
session_start(); // Ensure session is started to access $_SESSION

// Check if movieID is provided in the POST request and the user is logged in
if(isset($_POST['watch-later-btn']) && isset($_SESSION['userID'])) {
    $movieID = $_POST['movieID'];
    $userID = $_SESSION['userID'];

    // Prepare the SQL statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO tbl_watchlater (userID, movieID) VALUES (?, ?)");
    $stmt->bind_param("ii",$userID, $movieID); 

    // Execute the prepared statement
    if($stmt->execute()) {
        echo "Movie added to Watch Later list successfully.";
        
    } else {
        // If the query failed, output error
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
} else {
    // If movieID or userID is not set, output an error message
    echo "Error: Movie ID or User ID is missing.";
}

// Close the database connection
$conn->close();
?>