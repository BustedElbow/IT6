<?php
var_dump($_POST);

require 'connection.php';

if(isset($_POST['confirmDelete'])) {
    $movieID = $_POST['movieID'];

    $sqlArchive = "INSERT INTO tbl_movie_archive SELECT * FROM tbl_movie WHERE movieID = ?";
    $stmtArchive = $conn->prepare($sqlArchive);
    $stmtArchive->bind_param("i", $movieID);
    $archiveSuccess = $stmtArchive->execute();
    $stmtArchive->close();

    if($archiveSuccess) {
        $sqlDelete = "DELETE FROM tbl_movie WHERE movieID = ?";
        $stmtDelete = $conn->prepare($sqlDelete);
        $stmtDelete->bind_param("i", $movieID);

        if($stmtDelete->execute()) {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        } else {
            echo "Error updating record: " . $stmtDelete->error;
        }

        $stmtDelete->close();
    } else {
        echo "Error archiving record: " . $stmtArchive->error;
    }
}

$conn->close();