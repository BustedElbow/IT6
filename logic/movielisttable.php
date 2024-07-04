<?php

include 'logic/connection.php';
$sql = "SELECT title, director, releaseYear FROM tbl_movie WHERE active = 1 ORDER BY title ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

  while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . htmlspecialchars($row["title"]) . "</td><td>" . htmlspecialchars($row["director"]) . "</td><td>" . htmlspecialchars($row["releaseYear"]) . "</td></tr>";
  }
} else {
  echo "<tr><td colspan='3'>No movies found</td></tr>";
}

$conn->close();
?>