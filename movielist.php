<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies List</title>
    <link rel="stylesheet" href="app.css">
</head>
<body>
  
  <?php require('partials/sidebar.php'); ?>
  <?php require('partials/addmovieoverlay.php'); ?>

  <main>
    <div class="tablebody">
      <div class="mov">
        <h1>Movies</h1>
        <button id="addmovieBtn">Add</button>
      </div>
      <div class="tablecontainer">
        <table class="table">
          <thead class = tablehead>
            <tbody>
              <tr>
                <th>Movie Title</th>
                <th>Director</th>
                <th>Release Date</th>
              </tr>
              </thead>
              <?php require('logic/movielisttable.php') ?>
            </tbody>
        </table>
        
      </div>
    </div>
  </main>

  <script src="logic/script.js"></script>
  </script>
</body>

</html>
