<?php
include 'connection.php'; // Include your connection script

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect value of input field
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $director = mysqli_real_escape_string($conn, $_POST['director']);
    $year = mysqli_real_escape_string($conn, $_POST['year']);

    // SQL query to insert data into the movies table
    $sql = "INSERT INTO tbl_movie (title, director, releaseyear) VALUES ('$title', '$director', '$year')";

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