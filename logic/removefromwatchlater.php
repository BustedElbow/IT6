<?php
session_start();

var_dump($_POST);

require 'connection.php'; // Include your database connection script

if(isset($_POST['watched']) && isset($_SESSION['userID'])) {
    $watchLaterID = $_POST['watchLaterID'];
    $userID = $_SESSION['userID'];

    // Prepare the DELETE statement to use the unique record ID
    $stmt = $conn->prepare("DELETE FROM tbl_watchlater WHERE watchLaterID = ? AND userID = ?");
    $stmt->bind_param("ii", $watchLaterID, $userID);

    // Execute the statement
    if($stmt->execute()) {
        // Redirect back to the watch later page with a success message
        header('Location: ../src/watchlater.view.php');
    } else {
        // Handle errors, for example, redirect with an error message
        header('Location: watchlater.php?status=error');
    }

    // Close the statement and the connection
    $stmt->close();
    $conn->close();
} else {
    // Redirect back if the recordID or userID is not set
    header('Location: watchlater.php?status=invalid');
}
?>