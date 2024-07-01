document.addEventListener("DOMContentLoaded", function() {
  let currentUrl = window.location.href;

  if (currentUrl.includes('public')) {
    const homeLink = document.getElementById('homeLink');
    const moviesLink = document.getElementById('moviesLink'); 
    
    if (currentUrl.includes('index.php')) {
      homeLink.style.backgroundColor = '#5c7ced';
      homeLink.style.borderRadius = '4px';
      homeLink.style.color = 'white'; 
    }
    if (currentUrl.includes('movielist.php')) {
      moviesLink.style.backgroundColor = '#5c7ced'; 
      moviesLink.style.borderRadius = '4px';
      moviesLink.style.color = 'white'; 
    }
  }
});