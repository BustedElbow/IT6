<?php
require 'connection.php';

$userId = $_POST['userID'];

try {
    $sqlMovies = "DELETE FROM tbl_movie WHERE userID = ?";
    $stmtMovies = $conn->prepare($sqlMovies);
    $stmtMovies->bind_param("i", $userId);
    $stmtMovies->execute();
    $stmtMovies->close();

    $sqlProfile = "DELETE FROM tbl_users WHERE userID = ?";
    $stmtProfile = $conn->prepare($sqlProfile);
    $stmtProfile->bind_param("i", $userId);
    $stmtProfile->execute();
    $stmtProfile->close();

    header('Location: ../src/login.view.php');
    exit();
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
} finally {
    $conn->close();
}
?>