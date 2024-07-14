<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="main.css">
  <title>Document</title>
</head>
<body>
  <div class="d-flex justify-content-center align-items-center min-vh-100">
      <div class="login-container">
            <h2>Register</h2>
            <form action="../logic/register.php" method="post">
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="custom-input" id="username" name="username" required>
              </div>
              <div class="form-group mb-3">
                <label for="password">Password</label>
                <input type="password" class="custom-input" id="password" name="password" required>
              </div>
              <button type="submit" class="btn custom-btn w-100">Register</button>
            </form>
            <div class="d-flex justify-content-center mt-4">
              <span>Already have an account? <a href="login.view.php">Login</a></span>
            </div>
      </div>
  </div>
  <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>