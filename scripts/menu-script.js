// Niet kunnen scrollen wanneer hamburgermenu geopend is
window.addEventListener('DOMContentLoaded', (event) => {
    const checkbox = document.getElementById('click');
    const body = document.body;

    checkbox.addEventListener('change', function() {
        if (this.checked) {
            body.classList.add('no-scroll');
        } else {
            body.classList.remove('no-scroll');
        }
    });
});