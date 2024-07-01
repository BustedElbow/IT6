document.addEventListener("DOMContentLoaded", () => {
  let currentUrl = window.location.href;

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