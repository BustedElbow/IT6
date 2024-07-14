
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="main.css">
</head>
<body>
  <div class="d-flex justify-content-center align-items-center min-vh-100 ">
      <div class="login-container">
        <div class="col-md-12">
          <div class="text-center">
            <img src="images/logo/logo.png" alt="Logo" class="">
          </div>
        </div>
        <div class="">
            <form action="../logic/login.php" method="POST">
              <div class="form-group">
                <label for="email">Username</label>
                <input type="text" class="form-control" id="email" name="username" required>
              </div>
              <div class="form-group mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
              </div>
              <button type="submit" name="login" class="btn custom-btn w-100">Login</button>
            </form>
            <div class="d-flex justify-content-center mt-4">
              <span>Don't have an account? <a href="register.view.php" class="align-self-center">Signup</a></span>
            </div>
        </div>
      </div>
  </div>
  <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>