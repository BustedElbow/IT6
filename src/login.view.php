<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form action="../logic/login.php" method="POST">
            <div class="form-group">
                <label for="email">Username:</label>
                <input type="text" class="form-control" id="email" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" name="login" class="btn btn-primary">Login</button>
          </form>
          <a href="register.view.php">Register</a>
    </div>
    <!-- Bootstrap JS and dependencies -->
    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>