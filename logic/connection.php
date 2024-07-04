<?php
$servername = "localhost";
$username = "root";
$password = "admin123";
$database = "db_movies";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>