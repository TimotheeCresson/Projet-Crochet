"use strict";

export function panier() {
    const panier = document.getElementById("panier");


    panier.addEventListener("click", () => {
        const allContent = document.getElementById('allContent');
        allContent.innerHTML = "";
        // on fetch le contenu à partir du dossier html
        fetch('../html/panier.html')
            .then(response => response.text())
            .then(htmlContent => {
                allContent.innerHTML = htmlContent;

                // Sélection du bouton de retour à la boutique
                const btnBoutique = document.querySelector(".btnBoutiqueFromPanier")
                function restaurerContenu() {
                    var contenuDivSauvegardePanier = localStorage.getItem('contenuDivSauvegardePanier');
                    if (contenuDivSauvegardePanier) {
                        document.getElementById('allContent').innerHTML = contenuDivSauvegardePanier;
                    }
                }
            
                btnBoutique.addEventListener("click", ()=> {
                    restaurerContenu();
                })
            })
            .catch(error => {
                console.error('Error fetching content:', error);
            });
    });

    // Fonction pour restaurer le contenu de la div container
    
}