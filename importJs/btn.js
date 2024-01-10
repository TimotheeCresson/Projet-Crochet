// common.js
export function btnAjoutPanier(infoDiv) {
    const newButton = document.createElement('button');
    newButton.textContent = "Ajouter au panier";
    newButton.classList.add("btnAjoutPanier");
    infoDiv.appendChild(newButton);
}
