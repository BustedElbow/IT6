

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


  <main class="main container">
  
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addMovieModal">
  Add Movie
    </button>
  
    <?php require '../partials/movielist.php'; ?>

    <?php require '../partials/addmodal.php'; ?>  
    
  </main>
  <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>