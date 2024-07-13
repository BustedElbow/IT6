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
        <a class="nav-brand" href="index.php">Brand</a>
          <?php if(isset($_SESSION['username'])): ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Hello, <?= htmlspecialchars($_SESSION['username']); ?>
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="../src/login.view.php">Logout</a></li>
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

