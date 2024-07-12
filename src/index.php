

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Movie Manager Collection</title>
  
  <link rel="stylesheet" href="">
  <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
  <link rel="stylesheet" href="main.css">
  
</head>

<body>
  
<?php require '../partials/navbar.php'; ?>

<!-- Hamburger Button -->
<button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar" aria-controls="sidebar">
	<span class="navbar-toggler-icon"></span>
</button>

<!-- Sidebar -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="sidebar" aria-labelledby="sidebarLabel">
	<div class="offcanvas-header">
		<h5 class="offcanvas-title" id="sidebarLabel">Menu</h5>
		<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
	</div>
	<div class="offcanvas-body">
		<ul class="nav flex-column">
			<li class="nav-item"><a href="#" class="nav-link">User Info</a></li>
			<li class="nav-item"><a href="../src/login.view.php" class="nav-link">Logout</a></li>
		</ul>
	</div>
</div>

  <main class="main container py-2">
  
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addMovieModal">
  Add Movie
    </button>
  
    <?php require '../partials/movielist.php'; ?>

    <?php require '../partials/addmodal.php'; ?>  
    
  </main>
  <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


