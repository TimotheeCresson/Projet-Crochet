// panier.js
import { getCart, removeFromCart } from '../shoppingCart/cart.js';

function createItemElement(item) {
    const itemDiv = document.createElement("div");
    itemDiv.classList.add("itemInCart");

    const imgElement = document.createElement("img");
    imgElement.src = `/img/${item.photo}`;
    imgElement.alt = item.nom;
    imgElement.classList.add("imgCreationNew");

    const nameCreationNew = document.createElement("p");
    nameCreationNew.textContent = item.nom;

    const priceCreationNew = document.createElement("p");
    priceCreationNew.textContent = `Prix: ${item.prix} €`;

    const deleteBtn = document.createElement("button");
    deleteBtn.classList.add("deleteBtn");
    deleteBtn.textContent = "Supprimer";

    // Ajout du gestionnaire d'événements pour supprimer l'article du panier
    deleteBtn.addEventListener("click", () => {
        removeFromCart(item);
        itemDiv.remove(); // Supprimer l'élément du DOM
        checkEmptyCart(); // Vérifier si le panier est vide après suppression
    });

    itemDiv.append(imgElement, nameCreationNew, priceCreationNew, deleteBtn);

    return itemDiv;
}

function checkEmptyCart() {
    const panier = getCart();
    const panierContainer = document.getElementById("votrePanier");

    // Supprimer tous les éléments du panier actuel
    panierContainer.innerHTML = "";

    if (panier.length === 0) {
        const emptyMessage = document.createElement("p");
        emptyMessage.textContent = "Votre panier est vide.";
        panierContainer.appendChild(emptyMessage);
    } else {
        // Afficher les éléments du panier
        panier.forEach((item) => {
            const itemElement = createItemElement(item);
            panierContainer.appendChild(itemElement);
        });
    }
}

// Appelez la fonction pour afficher le panier lorsque la page du panier est chargée
window.addEventListener('load', checkEmptyCart);
