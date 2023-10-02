// Niet kunnen scrollen wanneer hamburgermenu geopend is
window.addEventListener('DOMContentLoaded', (event) => {
    const checkbox = document.getElementById('click');
    const body = document.body;
    const nav = document.querySelector('nav');

    checkbox.addEventListener('change', function() {
        if (this.checked) {
            body.classList.add('no-scroll'); // Voeg de "no-scroll" class toe
            window.scrollTo(0, 0); // Scroll naar bovenaan de pagina
        } else {
            body.classList.remove('no-scroll'); // Verwijder de "no-scroll" class
        }
    });
});