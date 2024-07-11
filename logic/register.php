<?php

include 'connection.php';

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "INSERT INTO tbl_users (username, password, isAdmin) VALUES ('$username', '$password', 0)";

if ($conn->query($sql) === TRUE) {
  header('Location: ../src/login.view.php');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>