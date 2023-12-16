import createCarrousel from './importJs/slider.js';
import {newProjet} from './importJs/newProjet.js';
import {boutique} from './importJs/boutique.js';
// Appelle la fonction pour créer le carrousel
createCarrousel();
newProjet();
boutique();

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


// fetch("./data.json")
//     .then((response)=> response.json())
//     .then((data) => {
//         try{
//             const imgProjectNew = document.querySelector(".imgProjetNouveautés")
//             let newCreations = [];
//             console.log(imgProjectNew);

//             newCreations = data.nouveautés;
//             console.log(newCreations);

//             newCreations.forEach((items) => {
//                 // Créations images
//                 const imgNewDiv = document.createElement("div");
//                 imgNewDiv.classList.add("imgNewDiv");
//                 const imgElement = document.createElement("img");
//                 imgElement.src = `./img/${items.photo}`
//                 imgElement.alt = items.nom;
//                 imgElement.classList.add("imgCreationNew");

//                 // Créations div info
//                 const infoDivNew = document.createElement("div");
//                 infoDivNew.classList.add("infoDiv");

//                 const nameCreationNew = document.createElement("p");
//                 nameCreationNew.textContent = items.nom;

//                 const priceCreationNew = document.createElement("p");
//                 priceCreationNew.textContent = `Prix: ${items.prix} €`
//                 const descriptionBtnNew = document.createElement("button");
//                 descriptionBtnNew.classList.add("description");
//                 descriptionBtnNew.textContent = "Description";

//                 infoDivNew.append(nameCreationNew, priceCreationNew, descriptionBtnNew);
//                 imgNewDiv.append(imgElement, infoDivNew);
//                 imgProjectNew.append(imgNewDiv);
//             })
//         }
//         catch(error) {
//             console.error('Erreur chargement donnée:', error);
//         }
//     })





