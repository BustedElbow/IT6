<?php
require 'connection.php'; 
$moviesList = []; 

// Check if the user is logged in and has a userID set
if (isset($_SESSION['userID'])) {
    $userId = $_SESSION['userID'];

    // Construct the SQL query to include user information and filter by userID in the watchlater list
    $sql = "SELECT m.movieID, m.title, m.director, m.releaseYear, m.genre, m.thumbnail, w.watchLaterID
            FROM tbl_movie m
            JOIN tbl_watchlater w ON m.movieID = w.movieID
            WHERE w.userID = $userId"; // Directly using $userId in the query, ensure $userId is safe to use

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $moviesList[] = $row;
        }
    }
}

?>