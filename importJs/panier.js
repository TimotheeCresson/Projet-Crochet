// panier.js
// import { getCart, removeFromCart } from '../shoppingCart/cart.js';

// function createItemElement(item) {
//     const itemDiv = document.createElement("div");
//     itemDiv.classList.add("itemInCart");

//     const imgElement = document.createElement("img");
//     imgElement.src = `/img/${item.photo}`;
//     imgElement.alt = item.nom;
//     imgElement.classList.add("imgCreationNew");

//     const nameCreationNew = document.createElement("p");
//     nameCreationNew.textContent = item.nom;

//     const priceCreationNew = document.createElement("p");
//     priceCreationNew.textContent = `Prix: ${item.prix} €`;

//     const deleteBtn = document.createElement("button");
//     deleteBtn.classList.add("deleteBtn");
//     deleteBtn.textContent = "Supprimer";

//     // Ajout du gestionnaire d'événements pour supprimer l'article du panier
//     deleteBtn.addEventListener("click", () => {
//         removeFromCart(item);
//         itemDiv.remove(); // Supprimer l'élément du DOM
//         checkEmptyCart(); // Vérifier si le panier est vide après suppression
//     });

//     itemDiv.append(imgElement, nameCreationNew, priceCreationNew, deleteBtn);

//     return itemDiv;
// }

// function checkEmptyCart() {
//     const panier = getCart();
//     const panierContainer = document.getElementById("votrePanier");

//     // Supprimer tous les éléments du panier actuel
//     panierContainer.innerHTML = "";

//     if (panier.length === 0) {
//         const emptyMessage = document.createElement("p");
//         emptyMessage.textContent = "Votre panier est vide.";
//         panierContainer.appendChild(emptyMessage);
//     } else {
//         // Afficher les éléments du panier
//         panier.forEach((item) => {
//             const itemElement = createItemElement(item);
//             panierContainer.appendChild(itemElement);
//         });
//     }
// }

// // Appelez la fonction pour afficher le panier lorsque la page du panier est chargée
// window.addEventListener('load', checkEmptyCart);


// panier.js

// function createItemElement(item) {
//     const itemDiv = document.createElement("div");
//     itemDiv.classList.add("itemInCart");

//     // Création des éléments pour afficher les informations de l'article
//     // Assurez-vous d'ajuster ceci en fonction de la structure de vos articles
//     const imgElement = document.createElement("img");
//     imgElement.src = `/img/${item.photo}`;
//     imgElement.alt = item.nom;
//     imgElement.classList.add("imgCreationNew");
//     console.log(imgElement);
//     const nameCreationNew = document.createElement("p");
//     nameCreationNew.textContent = item.nom;

//     const priceCreationNew = document.createElement("p");
//     priceCreationNew.textContent = `Prix: ${item.prix} €`;

//     const deleteBtn = document.createElement("button");
//     deleteBtn.classList.add("deleteBtn");
//     deleteBtn.textContent = "Supprimer";
//     console.log(deleteBtn);
//     // Ajout du gestionnaire d'événements pour supprimer l'article du panier
//     deleteBtn.addEventListener("click", () => {
//         // Utiliser une requête AJAX pour supprimer l'article côté serveur
//         fetch('/php/panier/misAJourPanier/_suppression_panier.php', {
//             method: 'POST',
//             headers: {
//                 'Content-Type': 'application/json',
//             },
//             body: JSON.stringify(item),
//         })
//         .then(response => response.json())
//         .then(data => {
//             // Gérer la réponse si nécessaire
//             console.log(data);
//             itemDiv.remove(); // Supprimer l'élément du DOM
//             checkEmptyCart(); // Vérifier si le panier est vide après suppression
//         })
//         .catch(error => {
//             console.error('Error removing item from cart:', error);
//         });
//     });

//     // Ajout des éléments à la div de l'article
//     itemDiv.append(imgElement, nameCreationNew, priceCreationNew, deleteBtn);

//     return itemDiv;
// }

// function checkEmptyCart() {
//     const panierContainer = document.getElementById("votrePanier");

//     // Supprimer tous les éléments du panier actuel
//     panierContainer.innerHTML = "";

//     // Utiliser des appels AJAX vers _modification_panier.php pour les modifications si nécessaire
// }

// // Appeler la fonction pour afficher le panier lorsque la page du panier est chargée
// window.addEventListener('load', checkEmptyCart);

// fetch('/php/panier/misAJourPanier/_ajout_panier.php', {
//     method: 'POST',
//     headers: {
//         'Content-Type': 'application/json',
//     },
//     body: JSON.stringify(item),
// })
// .then(response => {
//     if (!response.ok) {
//         throw new Error(`HTTP error! Status: ${response.status}`);
//     }
//     return response.json(); // Parse la réponse JSON
// })
// .then(data => {
//     // Gérer la réponse JSON
//     console.log(data); // Affichez la réponse JSON dans la console
//     alert('Item added to cart!');
// })
// .catch(error => {
//     console.error('Error adding item to cart:', error);
// });