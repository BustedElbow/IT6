<?php

include 'connection.php';

$sql = "SELECT ListName FROM tbl_movielist";
$result = $conn->query($sql);

if ($result->num_rows > 0 ) {
  while($row = $result->fetch_assoc()) {
    echo "<li><a>" . htmlspecialchars($row["ListName"]) . "</a></li>";
  }
} else {
  echo "<li><a>Add playlist</a></li>";
}

$conn->close();