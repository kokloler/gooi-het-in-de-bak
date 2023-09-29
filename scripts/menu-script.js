// Niet kunnen scrollen wanneer hamburgermenu geopend is
window.addEventListener('DOMContentLoaded', (event) => {
    const checkbox = document.getElementById('click');
    const body = document.body;
    const nav = document.querySelector('nav');

    checkbox.addEventListener('change', function() {
        if (this.checked) {
            body.classList.add('no-scroll'); // Voeg de "no-scroll" klasse toe
            window.scrollTo(0, 0); // Scroll naar bovenaan de pagina
        } else {
            body.classList.remove('no-scroll'); // Verwijder de "no-scroll" klasse
        }
    });

    // Voeg een eventlistener toe aan de "logo" om naar boven te scrollen wanneer erop wordt geklikt
    const logo = document.querySelector('.logo');
    logo.addEventListener('click', function() {
        if (checkbox.checked) {
            checkbox.checked = false;
            body.classList.remove('no-scroll');
        }
        window.scrollTo(0, 0); // Scroll naar bovenaan de pagina
    });
});