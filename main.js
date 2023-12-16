import createCarrousel from './importJs/slider.js';
import {newProjet} from './importJs/newProjet.js';
import {boutique} from './importJs/boutique.js';
import { accessoire } from './importJs/accessoire.js';
// Appelle la fonction pour créer le carrousel
createCarrousel();
newProjet();
boutique();
accessoire();

const inputCheck = document.getElementById('check');
const barreNav = document.querySelector('.barreNav');
const openMenu = document.querySelector('.open-menu')
const barreNavDisplay = document.querySelector('.barreNavDisplay');


// Ajoutez un écouteur d'événements pour détecter les changements de la checkbox
inputCheck.addEventListener('change', function () {
    // Mettez à jour la classe "active" de la barre de navigation en fonction de l'état de la checkbox
    openMenu.style.display = this.checked ? 'none' : 'block';
    barreNavDisplay.style.display = this.checked ? 'block' : 'none';
    setTimeout(()=>{
        barreNav.classList.toggle('active', this.checked);
    }, 150)
    
});






