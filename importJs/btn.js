// btn.js
// import { addToCart } from '../shoppingCart/cart.js';

export function btnAjoutPanier(infoDiv, itemCallback) {
    const newButton = document.createElement('button');
    newButton.textContent = "Ajouter au panier";
    newButton.classList.add("btnAjoutPanier");

    newButton.addEventListener('click', () => {
        itemCallback(); // Appel de la fonction fournie en argument
    });

    infoDiv.appendChild(newButton);
}
