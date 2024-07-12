<?php 
session_start()
?>

<nav class="sticky-top">
  <div class="bg-primary d-lg-none">
    <button class="btn d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasResponsive" aria-controls="offcanvasResponsive">
      <i class="lni lni-menu"></i>
    </button>
  </div>
  
  <div class="d-none d-lg-block bg-primary">
    <ul class="nav justify-content-center">
      <li class="nav-item">
      <?php if(isset($_SESSION['username'])): ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Hello, <?= htmlspecialchars($_SESSION['username']); ?>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="../src/login.view.php">Logout</a></li>
          </ul>
        </li>
      <?php endif; ?>
      </li>
    </ul>
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

