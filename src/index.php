

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

  <main class="main container py-2">
  
    <div class="container sticky-search">
      <div class="row align-items-center"> <!-- Added sticky-top class here -->
        <div class="col">
          <form action="" method="GET" class="d-flex">
            <input type="text" name="search" placeholder="Search movies..." class="form-control me-2">
            <button type="submit" class="btn btn-primary">Search</button>
          </form>
        </div>
      </div>
    </div>

  
    <?php require '../partials/movielist.php'; ?>

    <?php require '../partials/addmodal.php'; ?>  
    
  </main>
  <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


