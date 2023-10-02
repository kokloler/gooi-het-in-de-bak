document.addEventListener('DOMContentLoaded', function () {
    const scrollButton = document.getElementById('scroll-to-top');
  
    // Laat button zien wanneer er omlaag word gescrold
    window.addEventListener('scroll', () => {
      if (window.scrollY > 20) {
        scrollButton.classList.add('active');
      } else {
        scrollButton.classList.remove('active');
      }
    });
  
    // Scroll naar boven wanneer er op de knop word gedrukt 
    scrollButton.addEventListener('click', () => {
      window.scrollTo({
        top: 0,
        behavior: 'smooth',
      });
    });
  });
  