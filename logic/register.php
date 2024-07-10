<?php
// Database connection details
include 'connection.php';


// Get the form input values
$username = $_POST['username'];
$password = $_POST['password'];

// Prepare and execute the SQL query
$sql = "INSERT INTO tbl_users (username, password, isAdmin) VALUES ('$username', '$password', 0)";

if ($conn->query($sql) === TRUE) {
  header('Location: ../src/login.view.php');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the connection
$conn->close();
?>