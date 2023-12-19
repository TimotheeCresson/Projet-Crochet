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



inputCheck.addEventListener('change', function () {
    
    openMenu.style.display = this.checked ? 'none' : 'block';
    barreNavDisplay.style.display = this.checked ? 'block' : 'none';
    setTimeout(()=>{
        // barreNav.classList.toggle('active', this.checked);
        // barreNav.classList.toggle('leave', this.checked);
        if (this.checked) {
            setTimeout(() => {
            barreNav.classList.add('active');
            barreNav.classList.remove('leave')
            }, 150);
        }
        if (!this.checked) {
            setTimeout(() => {
                barreNav.classList.add('leave');
                barreNav.classList.remove('active')
            }, 150);
        }
        // else if (this.checked) {
        //     barreNav.classList.remove('leave');
        // }
    }, 150);
});






