import createCarrousel from './slider.js';

// Appelle la fonction pour créer le carrousel
createCarrousel();

const inputCheck = document.getElementById('check');
const barreNav = document.querySelector('.barreNav');
const barreNavDisplay = document.querySelector('.barreNavDisplay');


// Ajoutez un écouteur d'événements pour détecter les changements de la checkbox
inputCheck.addEventListener('change', function () {
    // Mettez à jour la classe "active" de la barre de navigation en fonction de l'état de la checkbox
    barreNavDisplay.style.display = this.checked ? 'block' : 'none';
    setTimeout(()=>{
        barreNav.classList.toggle('active', this.checked);
    }, 150)
    
});