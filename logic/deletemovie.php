<?php
var_dump($_POST);

require 'connection.php';


if(isset($_POST['confirmDelete'])) {

  $movieID = $_POST['movieID'];
 
  $sql = "DELETE FROM tbl_movie WHERE movieID = ?";

  $stmt = $conn->prepare($sql);

  $stmt->bind_param("i", $movieID);

  if($stmt->execute()) {
    header('Location: ../src/index.php');
  } else {
    echo "Error updating record: " . $stmt->error;
  }


  $stmt->close();
}


$conn->close();