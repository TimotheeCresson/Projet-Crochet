// import  home from './importJs/home.js';
import {createCarrousel} from './importJs/slider.js';
import { newProjet } from './importJs/newProjet.js';
import { boutique } from './importJs/boutique.js';
import { accessoire } from './importJs/accessoire.js';
import { patron } from './importJs/patron.js';
import { panier } from './importJs/panier.js';
// import { about } from './importJs/about.js';

// import { resetAnimations } from './importJs/slider.js';

    const inputCheck = document.getElementById('check');
    const barreNav = document.querySelector('.barreNav');
    const openMenu = document.querySelector('.open-menu');
    const barreNavDisplay = document.querySelector('.barreNavDisplay');
   


function init() {
    console.log('Initializing...');
    // Appelle la fonction pour créer le carrousel
    createCarrousel();
    newProjet();
    boutique();
    accessoire();
    patron();
    panier();
    // about();
    
    // sauvergarder le contenu de allContent
    // sauvegarderContenu();
    }
// function sauvegarderContenu() {
//         localStorage.setItem('contenuDivSauvegardePanier', document.getElementById('allContent').innerHTML);
//     }


// function restaurerContenu() {
//     // console.log('Avant la restauration du contenu');
//     console.log('Restoring content...');
//     var contenuDivSauvegardePanier = localStorage.getItem('contenuDivSauvegardePanier');
//     if (contenuDivSauvegardePanier) {
//         console.log('Contenu restauré:', contenuDivSauvegardePanier);
//         document.getElementById('allContent').innerHTML = contenuDivSauvegardePanier;

//         // Appellez les fonctions d'initialisation de chaque module après la restauration du contenu
//         init();
//         // resetSlider();
//         startSlider();
//     }
    
// }

// infoDivAllPage.forEach((div) => {
//     // Create a new button element
//     console.log(div);
//     const btn = document.querySelector(".descriptionBtn");
//     console.log(btn);
//     const newButton = document.createElement('button');
//     newButton.textContent = "New Button"; // Set button text as needed

//     // Append the new button to the current div
//     div.appendChild(newButton);
// });


document.addEventListener('DOMContentLoaded', () => {
    init();
    const infoDivAllPage = document.querySelectorAll(".infoDiv");

    infoDivAllPage.forEach((div) => {
        const newButton = document.createElement('button');
        newButton.textContent = "New Button";
        div.appendChild(newButton);
    });
})

//  const home = document.getElementById("home");

//     home.addEventListener("click", () => {
//         restaurerContenu();
//     });

inputCheck.addEventListener('change', function () {
   if (this.checked) {
        
        setTimeout(() => {
            openMenu.style.display = "none";
        }, 0);
        // Delay the display change to give time for openMenu to hide
        setTimeout(() => {
            barreNavDisplay.style.display = "block";
        }, 0);

        // Delay adding 'active' class to allow for smoother animation
        setTimeout(() => {
            barreNav.classList.add('active');
        }, 10); // Adjust the delay as needed
    } else {
        barreNav.classList.remove('active');
        setTimeout(() => {
            openMenu.style.display = "block";
            barreNavDisplay.style.display = "none";
        }, 1000); 
    }
});

// document.getElementById('btnPagePatrons').addEventListener('click', function () {
//     // Assuming patron.js is an HTML file with the content you want to load
//     fetch('./html/patrons.html')
//         .then(response => response.text())
//         .then(data => {
//             // Assuming #allContent is the container where you want to inject the content
//             document.getElementById('allContent').innerHTML = data;
//         })
//         .catch(error => console.error('Error loading patron.js:', error));
// });



// document.addEventListener('DOMContentLoaded', ()=> {
//     init()
// });
