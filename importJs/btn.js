// btn.js
// import { addToCart } from '../shoppingCart/cart.js';

// export function btnAjoutPanier(infoDiv, itemCallback) {
//     const newButton = document.createElement('button');
//     newButton.textContent = "Ajouter au panier";
//     newButton.classList.add("btnAjoutPanier");

//     newButton.addEventListener('click', () => {
//         itemCallback(); // Appel de la fonction fournie en argument
//     });

//     infoDiv.appendChild(newButton);
// }

// btn.js
// ... (Votre code existant)

// Événement de clic pour le boutonAjoutPanier
// Dans votre fichier btn.js
export function btnAjoutPanier(infoDiv, items) {
    const newButton = document.createElement('button');
    newButton.textContent = "Ajouter au panier";
    newButton.classList.add("btnAjoutPanier");

    newButton.addEventListener('click', () => {
        // Récupérez les informations spécifiques de l'élément sur lequel le bouton a été cliqué
        const patronInfo = {
            nom: items.nom,
            prix: items.prix,
            photo: items.photo,
            // Ajoutez d'autres informations nécessaires au panier
        };

        // Utilisez fetch pour ajouter cet élément au panier côté serveur
        fetch('/php/panier/misAJourPanier/_ajout_panier.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(patronInfo),
        })
        .then(response => response.json())
        .then(data => {
            // Gérer la réponse du serveur si nécessaire
            alert('Item added to cart!');
        })
        .catch(error => {
            console.error('Error adding item to cart:', error);
        });
    });

    infoDiv.appendChild(newButton);
}

// ... (Votre code existant)

   

