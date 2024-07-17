<?php
var_dump($_POST);
require 'connection.php';

$userId = $_POST['userID'];

try {
    // Archive movies
    $sqlArchiveMovies = "INSERT INTO tbl_movie_archive SELECT * FROM tbl_movie WHERE userID = ?";
    $stmtArchiveMovies = $conn->prepare($sqlArchiveMovies);
    $stmtArchiveMovies->bind_param("i", $userId);
    $stmtArchiveMovies->execute();
    $stmtArchiveMovies->close();

    // Delete original movie records
    $sqlDeleteMovies = "DELETE FROM tbl_movie WHERE userID = ?";
    $stmtDeleteMovies = $conn->prepare($sqlDeleteMovies);
    $stmtDeleteMovies->bind_param("i", $userId);
    $stmtDeleteMovies->execute();
    $stmtDeleteMovies->close();

    // Archive user profile
    $sqlArchiveProfile = "INSERT INTO tbl_users_archive SELECT * FROM tbl_users WHERE userID = ?";
    $stmtArchiveProfile = $conn->prepare($sqlArchiveProfile);
    $stmtArchiveProfile->bind_param("i", $userId);
    $stmtArchiveProfile->execute();
    $stmtArchiveProfile->close();

    // Delete original user profile
    $sqlDeleteProfile = "DELETE FROM tbl_users WHERE userID = ?";
    $stmtDeleteProfile = $conn->prepare($sqlDeleteProfile);
    $stmtDeleteProfile->bind_param("i", $userId);
    $stmtDeleteProfile->execute();
    $stmtDeleteProfile->close();

    header('Location: ../src/login.view.php');
    exit();
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
} finally {
    $conn->close();
}