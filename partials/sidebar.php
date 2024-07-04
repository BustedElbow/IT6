<nav class="sidebar">
  <div class="sidebar-div">
    <span>Menu</span>
    <ul>
      <li><a id="homeLink" href="../it6/index.php">Home</a></li>
      <li><a id="moviesLink" href="../it6/movielist.php">Movie List</a></li>
    </ul>
  </div>
  <div class="sidebar-div">
    <div class="nav-lib-div-title">
      <span>Library</span>
      <button id="addPlaylistBtn">+</button>
    </div>
    <ul id="playlistContainer">
      <?php
      // Include database connection file or write the PDO connection code here
      include 'connection.php';

      try {
        // Prepare SQL query to select all movie lists
        $sql = "SELECT listName FROM tbl_movielist";
        $stmt = $pdo->prepare($sql);

        // Execute the query
        $stmt->execute();

        // Fetch the results
        $movieLists = $stmt->fetchAll();

        // Check if movie lists were found
        if ($movieLists) {
          // Loop through each movie list and display it
          foreach ($movieLists as $movieList) {
            echo "<li><a>" . htmlspecialchars($movieList['listName']) . "</a></li>";
          }
          
        } else {
          echo "<li>No movie lists found.</li>";
        }
      } catch (PDOException $e) {
        // Handle potential errors here
        die("Could not connect to the database $dbname :" . $e->getMessage());
      }
      ?>
    </ul>
  </div>
</nav>