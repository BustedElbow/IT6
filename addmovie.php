<?php
include 'connection.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect value of input field
    $title = mysqli_real_escape_string($conn, $_POST['movieTitle']);
    $director = mysqli_real_escape_string($conn, $_POST['director']);
    $releaseYear = mysqli_real_escape_string($conn, $_POST['releaseYear']);

    // SQL query to insert data into the movies table
    $sql = "INSERT INTO tbl_movie (title, director, releaseYear) VALUES ('$title', '$director', '$releaseYear')";

    // Execute the query
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Close the connection
mysqli_close($conn);
?>