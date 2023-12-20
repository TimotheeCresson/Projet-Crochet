import createCarrousel from './importJs/slider.js';
import {newProjet} from './importJs/newProjet.js';
import {boutique} from './importJs/boutique.js';
import { accessoire } from './importJs/accessoire.js';
import { patron } from './importJs/patron.js';
// Appelle la fonction pour créer le carrousel
createCarrousel();
newProjet();
boutique();
accessoire();
patron();

const inputCheck = document.getElementById('check');
const barreNav = document.querySelector('.barreNav');
const openMenu = document.querySelector('.open-menu')
const barreNavDisplay = document.querySelector('.barreNavDisplay');
// const closeMenu = document.querySelector(".close-menu")



inputCheck.addEventListener('change', function () {
    if(this.checked)
        {
        openMenu.style.display = "none";
        barreNavDisplay.style.display = "block";
        setTimeout(() => {
            barreNav.classList.add('active');
            // barreNav.classList.remove('leave')
            }, 300);
        }
        else
        {

        // barreNav.classList.add('leave');
        barreNav.classList.remove('active')
        setTimeout(() => {  
            openMenu.style.display = "block";
            barreNavDisplay.style.display = "none";
            }, 1000);
        }
});

// closeMenu.addEventListener('click', function () {
//     openMenu.style.display = this.checked ? 'block' : 'none';
//     barreNavDisplay.style.display = this.checked ? 'none' : 'block';
// })



