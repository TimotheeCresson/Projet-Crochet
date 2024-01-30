export function btnAjoutPanier(infoDiv, items, index) {
    const newButton = document.createElement('button');
    newButton.textContent = "Ajouter au panier";
    newButton.classList.add("btnAjoutPanier");
    
    newButton.addEventListener('click', (event) => {
        // Récupérez les informations spécifiques de l'élément sur lequel le bouton a été cliqué
        event.preventDefault();
        const patronInfo = {
            id: items.id,
            nom: items.nom,
            prix: items.prix,
            photo: items.photo,
            description: items.description, 
            quantite: 0
        };
        console.log(patronInfo);
        // Utilisez fetch pour ajouter cet élément au panier côté serveur
        fetch('/ajoutPanier', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(patronInfo),
        })
        .then(response =>
            {
                console.log(response);
                if(!response.ok) return;
                response.text().then(test=>console.log(test))
            } )
        // .then(data => {
        //     console.log(data);
        //     // Gérer la réponse du serveur si nécessaire
        //     alert('Item added to cart!');
        // })
        // .catch(error => {
        //     console.error('Error adding item to cart:', error);
        // });
    });

    infoDiv.appendChild(newButton);
}



// ... (Votre code existant)

   

