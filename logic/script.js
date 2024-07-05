document.addEventListener("DOMContentLoaded", () => {
  const currentUrl = window.location.href;

  if (currentUrl.includes('index.php')) {
    const homeLink = document.getElementById('homeLink');
    homeLink.style.backgroundColor = '#5c7ced';
    homeLink.style.borderRadius = '4px';
    homeLink.style.color = 'white';
  }

  if (currentUrl.includes('movielist.php')) {
    const moviesLink = document.getElementById('moviesLink');
    moviesLink.style.backgroundColor = '#5c7ced';
    moviesLink.style.borderRadius = '4px';
    moviesLink.style.color = 'white';
  }
});

let addmovieBtn = document.getElementById('addmovieBtn');
if (addmovieBtn) {
  addmovieBtn.addEventListener('click', showOverlay);
}

function showOverlay() {
  document.getElementById('addmovieOverlay').style.display = 'block';
}

function hideOverlay() {
  document.getElementById('addmovieOverlay').style.display = 'none';
}

let addlistBtn = document.getElementById('addlistBtn');
addlistBtn.addEventListener('click', showListOverlay);

let hideListOverlay = document.querySelector('#hideListOverlay');
hideListOverlay.addEventListener('click', () => {
  document.querySelector('#showlistOverlay').style.display = 'none';
})

function showListOverlay() {
  document.getElementById('showlistOverlay').style.display = 'flex';
}

//action listener for movie list
document.addEventListener('DOMContentLoaded', function () {
  // Select all table rows within the tbody of the table
  var rows = document.querySelectorAll('.table tbody tr');

  rows.forEach(function (row) {
    row.addEventListener('click', function () {
      // Example action: log the first cell's text (movie title) to the console
      console.log(this.cells[0].textContent);

      // Example action: navigate to a URL
      window.location.href = 'movielist.php?title=' + encodeURIComponent(this.cells[0].textContent);
    });
  });
});