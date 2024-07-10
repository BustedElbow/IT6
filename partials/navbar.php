<?php 
session_start()
?>

<nav>
  <div class="bg-primary d-lg-none">
    <button class="btn d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasResponsive" aria-controls="offcanvasResponsive">
      <i class="lni lni-menu"></i>
    </button>
  </div>
  
  <div class="d-none d-lg-block bg-primary">
    <ul class="nav justify-content-center">
      <li class="nav-item">
        <?php if(isset($_SESSION['username'])): ?>
          <a class="nav-link text-dark" href="#">Hello, <?= htmlspecialchars($_SESSION['username']); ?></a>
        <?php else: ?>
          <a class="nav-link text-dark" href="#">Welcome, Guest</a>
        <?php endif; ?>
      </li>
    </ul>
  </div>
  
  <div class="offcanvas offcanvas-start d-lg-none" tabindex="-1" id="offcanvasResponsive" aria-labelledby="offcanvasResponsiveLabel" >
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="offcanvasResponsiveLabel">Responsive offcanvas</h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      test
    </div>
  </div>
</nav>