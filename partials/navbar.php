<?php 
session_start()
?>

<nav class="sticky-top nav-bar-custom">
  
  <div class="bg-primary d-lg-none">
    <button class="btn d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasResponsive" aria-controls="offcanvasResponsive">
      <i class="lni lni-menu"></i>
    </button>
  </div>
  
  <div class="container">
    <div class="d-none d-lg-block ms-auto">
      <ul class="nav justify-content-between">
        <a class="nav-brand text-custom-blue" href="index.php"><img src="../src/images/Logo/logo_alt.png" alt=""></a>
        <form action="" method="GET" class="d-flex custom-search">
            <input type="text" name="search" placeholder="Search movies..." class="custom-input search-form">
        </form>
          <?php if(isset($_SESSION['username'])): ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Hello, <?= htmlspecialchars($_SESSION['username']); ?>
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
              </ul>
            </li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </div>
  
  <div class="offcanvas offcanvas-start d-lg-none" tabindex="-1" id="offcanvasResponsive" aria-labelledby="offcanvasResponsiveLabel" >
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="offcanvasResponsiveLabel">Menu</h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <ul class="nav flex-column">
        <li><a href="#" class="nav-link">User Info</a></li>
        <li><a href="../src/login.view.php" class="nav-link">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

