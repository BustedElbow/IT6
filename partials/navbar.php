<?php 
session_start();

require '../logic/connection.php';

if (isset($_SESSION['userID'])) {
  $sql = "SELECT username, password, picture FROM tbl_users WHERE userID = ?";

  $stmt = $conn -> prepare($sql);

  $stmt -> bind_param("i", $_SESSION['userID']);

  $stmt -> execute();

  $result = $stmt -> get_result();
  if ($row = $result -> fetch_assoc()) {
    $username = $row['username'];
    $password = $row['password'];
    $picture = $row['picture'];
  } else {
    echo "User not found.";
  }
}

$sql = "SELECT m.movieID, m.title, m.director, m.releaseYear, m.genre, u.username, u.userID, m.thumbnail, u.picture, m.comment
  FROM tbl_movie m
  JOIN tbl_users u ON m.userID = u.userID"; 
$result = $conn->query($sql);

$movies = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $movies[] = $row;
    }
}

$isAdmin = $_SESSION['isAdmin'] ?? false;

$conn->close();

require '../partials/editmodal.php';
require '../partials/deletemodal.php';

$search = $_GET['search'] ?? '';
if (!empty($search)) {
    $movies = array_filter($movies, function($movie) use ($search) {
        return stripos($movie['title'], $search) !== false;
    });
}


?>

<nav class="sticky-top nav-bar-custom">
  
  <div class="d-lg-none d-flex w-100 justify-content-between">
    <button class="btn d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasResponsive" aria-controls="offcanvasResponsive">
      <i class="lni lni-menu"></i>
    </button>
    <span>search</span>
  </div>
  
  <div class="container">
    <div class="d-none d-lg-block ms-auto">
      <div class="nav justify-content-between">
        <a class="nav-brand text-custom-blue" href="index.php"><img src="../src/images/Logo/logo_alt.png" alt=""></a>
        <?php if (basename($_SERVER['SCRIPT_NAME']) != 'userprofile.php'): ?>
          <form action="" method="GET" class="d-flex custom-search">
              <input type="text" name="search" placeholder="Search movies..." class="custom-input search-form">
          </form>
        <?php endif ?>
            <li class="nav-item dropdown">
              <a class="dropdown-toggle text-light text-decoration-none" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img class="img-circle-sm" src="../src/images/users/<?= !empty($picture) ? htmlspecialchars($picture) : 'no_image.png' ?>"><?= htmlspecialchars($username); ?>
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li>
                  <div class="d-flex gap-2 dropdown-item">
                    <img class="custom-img" src="../src/images/svg/user.svg">
                    <a class="custom-link" href="../src/userprofile.php">
                      Profile
                    </a>
                  </div>
                </li>
                <li>
                  <div class="d-flex gap-2 dropdown-item">
                    <i class="custom-img lni lni-exit"></i>
                    <a class="custom-link" href="../src/login.view.php">
                    Logout
                    </a>
                  </div>
                </li>
                <li>
                  <div class="d-flex gap-2 dropdown-item">
                    <img class="custom-img" src="../src/images/svg/user.svg">
                    <a class="custom-link" href="../src/watchlater.view.php">
                      Watch Later
                    </a>
                  </div>
                </li>
              </ul>
            </li>
        </ul>
      </div>
    </div>
  </div>
  
  <div class="offcanvas offcanvas-start d-lg-none" tabindex="-1" id="offcanvasResponsive" aria-labelledby="offcanvasResponsiveLabel" >
    <div class="offcanvas-header">
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <img class="img-circle-md" src="../src/images/users/<?= !empty($picture) ? htmlspecialchars($picture) : 'no_image.png' ?>">
      <ul class="nav flex-column">
        <li><a href="#" class="nav-link">User Info</a></li>
        <li><a href="../src/login.view.php" class="nav-link">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

