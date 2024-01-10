
"use strict";
import { btnAjoutPanier } from './btn.js';
export function newProjet() {
fetch("/data.json")
    .then((response)=> response.json())
    .then((data) => {
        try{
            const projetContainer = document.querySelector(".projetContainer")
            const imgProjectNew = document.querySelector(".imgProjetNouveautés")
            if (projetContainer.querySelector(".imgProjectNew")) {
                return;
            }
            let newCreations = [];
            console.log(imgProjectNew);

            newCreations = data.nouveautés;
            console.log(newCreations);

                newCreations.forEach((items) => {
                    // Créations images
                    const imgNewDiv = document.createElement("div");
                    imgNewDiv.classList.add("imgNewDiv");
                    const imgElement = document.createElement("img");
                    imgElement.src = `./img/${items.photo}`
                    imgElement.alt = items.nom;
                    imgElement.classList.add("imgCreationNew");

                    // Créations div info
                    const infoDivNew = document.createElement("div");
                    infoDivNew.classList.add("infoDiv");

                    const nameCreationNew = document.createElement("p");
                    nameCreationNew.textContent = items.nom;

                    const priceCreationNew = document.createElement("p");
                    priceCreationNew.textContent = `Prix: ${items.prix} €`

                    const descriptionBtnNew = document.createElement("button");
                    descriptionBtnNew.classList.add("descriptionBtn");
                    descriptionBtnNew.textContent = "Description";

        
                    const descriptionDiv = document.createElement("div");
                    descriptionDiv.classList.add("descriptionDiv")
                    descriptionDiv.textContent = `${items.description}`
        
                    const descriptionBtnClose = document.createElement("button");
                    descriptionBtnClose.classList.add("descriptionBtnClose");
                    descriptionBtnClose.innerHTML = `<i class="fa-solid fa-circle-xmark"></i>`;

                    descriptionDiv.append(descriptionBtnClose)
                    infoDivNew.append(nameCreationNew, priceCreationNew, descriptionBtnNew);
                    imgNewDiv.append(imgElement, infoDivNew, descriptionDiv);
                    imgProjectNew.append(imgNewDiv);

                    // on importe le bouton ajout Panier
                    btnAjoutPanier(infoDivNew);


                    descriptionBtnNew.addEventListener("click", () => {
                        descriptionDiv.style.display = "flex";
                    })
                    descriptionBtnClose.addEventListener("click", ()=> {
                        descriptionDiv.style.display = "none";
                    })
                    saveNewProjetData(data.nouveautés);
                })
                
            }
        catch(error) {
            console.error('Erreur chargement donnée:', error);
        }
    })
    function saveNewProjetData(newCreations) {
                    // Vérifiez si les données existent déjà dans le localStorage
                    const storedData = localStorage.getItem('newProjetData');
                    if (!storedData) {
                        // Si non, enregistrez les données dans le localStorage
                        localStorage.setItem('newProjetData', JSON.stringify(newCreations));
                    }
                }
}