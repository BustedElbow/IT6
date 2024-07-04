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
      <button id="addlistBtn">+</button>
    </div>
    <ul>
      <?php require('../it6/logic/playlistList.php'); ?>
    </ul>
  </div>
</nav>

<?php require('addlistoverlay.php'); ?>
