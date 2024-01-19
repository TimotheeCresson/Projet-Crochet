"use strict";
import { btnAjoutPanier } from '../importJs/btn.js';
import { addToCart } from '../shoppingCart/cart.js';

// function patronMain() {
    fetch("/data.json")
        .then((response) => response.json())
        .then((data) => {
            try {
                // console.log('patronPage.js script is executed');
                const containerPatronsPage = document.querySelector(".containerPatrons");
                const imgPatronContainerPage = document.querySelector(".imgPatronContainerPage"); 
                console.log(imgPatronContainerPage);
                let patronArray = [];
                // console.log(data.patrons);
                patronArray = data.patrons;
                
                patronArray.forEach((items) => {
                    const imgNewDiv = document.createElement("div");
                    imgNewDiv.classList.add("imgNewDiv");
                    const imgElement = document.createElement("img");
                    imgElement.src = `/img/${items.photo}`;
                    imgElement.alt = items.nom;
                    imgElement.classList.add("imgCreationNew");

                    // Créations div info
                    const infoDivNew = document.createElement("div");
                    infoDivNew.classList.add("infoDiv");

                    const nameCreationNew = document.createElement("p");
                    nameCreationNew.textContent = items.nom;

                    const priceCreationNew = document.createElement("p");
                    priceCreationNew.textContent = `Prix: ${items.prix} €`;

                    const descriptionBtnNew = document.createElement("button");
                    descriptionBtnNew.classList.add("descriptionBtn");
                    descriptionBtnNew.textContent = "Description";

        
                    const descriptionDiv = document.createElement("div");
                    descriptionDiv.classList.add("descriptionDiv");
                    descriptionDiv.textContent = `${items.description}`;
        
                    const descriptionBtnClose = document.createElement("button");
                    descriptionBtnClose.classList.add("descriptionBtnClose");
                    descriptionBtnClose.innerHTML = `<i class="fa-solid fa-circle-xmark"></i>`;

                    // Création du bouton ajouter au panier
                    // const addToCartBtn = document.createElement("button");
                    // addToCartBtn.classList.add("addToCartBtn");
                    // addToCartBtn.textContent = "Ajouter au panier";

                    // addToCartBtn.addEventListener("click", () => {
                    //     const patronInfo = {
                    //         nom: items.nom,
                    //         prix: items.prix,
                    //         photo: items.photo,
                    //         // Ajoutez d'autres informations nécessaires au panier
                    //     };
                    //     addToCart(patronInfo);
                    //     alert('Item added to cart!');
                    // });
                   // Appel à btnAjoutPanier pour créer et attacher le bouton
                    


                    descriptionDiv.append(descriptionBtnClose);
                    infoDivNew.append(nameCreationNew, priceCreationNew, descriptionBtnNew,);
                    imgNewDiv.append(imgElement, infoDivNew, descriptionDiv);
                    imgPatronContainerPage.append(imgNewDiv);
                    containerPatronsPage.append(imgPatronContainerPage)
                    // on importe le bouton ajout Panier
                    
                    btnAjoutPanier(infoDivNew, () => {
                        const patronInfo = {
                            nom: items.nom,
                            prix: items.prix,
                            photo: items.photo,
                            // Ajoutez d'autres informations nécessaires au panier
                        };
                        addToCart(patronInfo);
                        alert('Item added to cart!');
                    });

                    descriptionBtnNew.addEventListener("click", () => {
                        descriptionDiv.style.display = "flex";
                    })
                    descriptionBtnClose.addEventListener("click", ()=> {
                        descriptionDiv.style.display = "none";
                    })
                })
            }
            catch (error) {
                console.error('Erreur chargement donnée:', error);
            }
        })
    // }