<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="main.css">
  <title>Document</title>
</head>
<body>
  <div class="d-flex justify-content-center align-items-center vh-90">
      <div class="container p-5">
        <div class="row">
          <div class="col-md-6 offset-md-3 border border-radius-register">
            <h2>Register</h2>
            <form action="../logic/register.php" method="post">
              <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" name="username" required>
              </div>
              <div class="form-group mb-3">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
              </div>
              <button type="submit" class="btn btn-primary">Register</button>
            </form>
            <a href="login.view.php">Login</a>
          <div>
        </div>
      </div>
  </div>
  <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>