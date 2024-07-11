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
    <div class="d-flex justify-content-center align-items-center vh-90">
        <div class="container p-5">
            <div class="row">
                <div class="col-md-6 offset-md-3"> <!-- Adjusts width to 50% on medium devices and centers it -->
                    <h2>Login</h2>
                    <?php if(isset($_GET['error'])): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo htmlspecialchars($_GET['error']); ?>
                        </div>
                    <?php endif; ?>
                    <form action="../logic/login.php" method="POST">
                        <div class="form-group">
                            <label for="email">Username:</label>
                            <input type="text" class="form-control" id="email" name="username" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" name="login" class="btn btn-primary">Login</button>
                    </form>
                    <a href="register.view.php">Register</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS and dependencies -->
    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>