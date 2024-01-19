// btn.js
import { addToCart } from '../shoppingCart/cart.js';

export function btnAjoutPanier(infoDiv, item) {
    const newButton = document.createElement('button');
    newButton.textContent = "Ajouter au panier";
    newButton.classList.add("btnAjoutPanier");

    newButton.addEventListener('click', () => {
        addToCart(item);
        alert('Item added to cart!');
    });

    infoDiv.appendChild(newButton);
}

