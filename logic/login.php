<?php 

session_start();

include 'connection.php';

if(isset($_POST['login'])) {
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);

  $sql = "SELECT userID, username, isAdmin FROM tbl_users WHERE username = '$username' AND password = '$password'";
  $result = mysqli_query($conn, $sql);

  if(mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result); 
    echo "Login successful";
    header('Location: ../src/index.php');
    $_SESSION['username'] = $user['username'];
    $_SESSION['userID'] = $user['userID'];
    $_SESSION['isAdmin'] = $user['isAdmin']; 

  } else {
    echo "Login failed";
  }
}