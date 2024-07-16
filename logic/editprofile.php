<?php
session_start();

var_dump($_POST);

require 'connection.php';

if (isset($_POST['profile-save'])) {
    $userID = $_SESSION['userID']; 
    $username = $_POST['profile-username'];
    $password = $_POST['new-user-password'];

    $picture = ''; 
    if (isset($_FILES['profile-picture']) && $_FILES['profile-picture']['error'] == UPLOAD_ERR_OK) {
        $uploadDir = '../src/images/users/';
        $picture = basename($_FILES['profile-picture']['name']);
        $targetPath = $uploadDir . $picture;

        if (!move_uploaded_file($_FILES['profile-picture']['tmp_name'], $targetPath)) {
            echo "Error uploading file";
            exit;
        }
    }

    $sql = "UPDATE tbl_users SET username = ?";
    $params = ["s", $username];

    // Check if a new password is provided
    if (!empty($password)) {
        // Add password to the SQL query and parameters
        $sql .= ", password = ?";
        $params[0] .= "s"; // Append 's' to types string
        $params[] = $password; // Add password to parameters array
    }

    // Check if a picture is provided
    if (!empty($picture)) {
        // Add picture to the SQL query and parameters
        $sql .= ", picture = ?";
        $params[0] .= "s"; // Append 's' to types string
        $params[] = $picture; // Add picture to parameters array
    }

    // Finalize the SQL query
    $sql .= " WHERE userID = ?";
    $params[0] .= "i"; // Append 'i' for integer (userID) to types string
    $params[] = $userID; // Add userID to parameters array

    $stmt = $conn->prepare($sql);
    $stmt->bind_param(...$params);

    if ($stmt->execute()) {
        header('Location: ../src/userprofile.php');
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}