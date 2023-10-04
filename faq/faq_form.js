// Functie om de melding te laten vervagen
function fadeOutMessage() {
    var message = document.getElementById('message');
    if (message && message.textContent === 'Je vraag is ingediend!') {
      // Verwijder de melding na 3 seconden
      setTimeout(function() {
        // Voeg een CSS-klasse toe om de melding te laten vervagen
        message.classList.add('fade-out');
      }, 3000);

      // Verwijder de melding na 4 seconden
      setTimeout(function() {
        message.style.display = 'none';
      }, 4000);
    }
  }

  // Roep de functie aan wanneer de pagina is geladen
  window.addEventListener('DOMContentLoaded', fadeOutMessage);