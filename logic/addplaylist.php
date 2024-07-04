<?php

include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $playlistName = mysqli_real_escape_string($conn, $_POST['playlist-title']);
  
  $sql = "INSERT INTO tbl_movielist (ListName) VALUES ('$playlistName')";

  if (mysqli_query($conn, $sql)) {
      echo "New record created successfully";
      header('Location: ' . $_SERVER['HTTP_REFERER']);
  } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}

mysqli_close($conn);

?>