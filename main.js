// import  home from './importJs/home.js';
import {createCarrousel, resetSlider} from './importJs/slider.js';
import { newProjet } from './importJs/newProjet.js';
import { boutique } from './importJs/boutique.js';
import { accessoire } from './importJs/accessoire.js';
import { patron } from './importJs/patron.js';
import { panier } from './importJs/panier.js';
import { about } from './importJs/about.js';
// import { resetAnimations } from './importJs/slider.js';

    const inputCheck = document.getElementById('check');
    const barreNav = document.querySelector('.barreNav');
    const openMenu = document.querySelector('.open-menu');
    const barreNavDisplay = document.querySelector('.barreNavDisplay');

function init() {
    // Appelle la fonction pour créer le carrousel
    createCarrousel();
    newProjet();
    boutique();
    accessoire();
    patron();
    panier();
    about();

    // sauvergarder le contenu de allContent
    sauvegarderContenu();
    }
function sauvegarderContenu() {
        localStorage.setItem('contenuDivSauvegardePanier', document.getElementById('allContent').innerHTML);
    }


function restaurerContenu() {
    console.log('Avant la restauration du contenu');
    var contenuDivSauvegardePanier = localStorage.getItem('contenuDivSauvegardePanier');
    if (contenuDivSauvegardePanier) {
        console.log('Contenu restauré:', contenuDivSauvegardePanier);
        document.getElementById('allContent').innerHTML = contenuDivSauvegardePanier;

        // Appellez les fonctions d'initialisation de chaque module après la restauration du contenu
        init();
        resetSlider();
    }
    
}

// function resetSliderAnimations() {
//     // Importez votre module de slider
//     import { resetAnimations } from './importJs/slider.js';
    
//     // Appelez la fonction de réinitialisation du slider
//     resetAnimations();
// }

document.addEventListener('DOMContentLoaded', () => {
    init();

    // Ajoutez un événement au bouton Home pour restaurer le contenu
    const home = document.getElementById("home");

    home.addEventListener("click", () => {
        restaurerContenu();
    });
    

    inputCheck.addEventListener('change', function () {
        if (this.checked) {
            openMenu.style.display = "none";
            barreNavDisplay.style.display = "block";
            setTimeout(() => {
                barreNav.classList.add('active');
            }, 300);
        } else {
            barreNav.classList.remove('active')
            setTimeout(() => {
                openMenu.style.display = "block";
                barreNavDisplay.style.display = "none";
            }, 1000);
        }
    });
})



// document.addEventListener('DOMContentLoaded', ()=> {
//     init()
// });
