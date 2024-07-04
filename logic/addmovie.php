<?php
include 'connection.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $title = mysqli_real_escape_string($conn, $_POST['movieTitle']);
    $director = mysqli_real_escape_string($conn, $_POST['director']);
    $releaseYear = mysqli_real_escape_string($conn, $_POST['releaseYear']);

    $sql = "INSERT INTO tbl_movie (title, director, releaseYear) VALUES ('$title', '$director', '$releaseYear')";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
header('Location: ../movielist.php');

mysqli_close($conn);
?>