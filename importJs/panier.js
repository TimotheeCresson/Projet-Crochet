"use strict";

export function panier() {
    const panier = document.getElementById("Panier");

    console.log(panier);


    // Fonction pour restaurer le contenu de la div container
    function restaurerContenu() {
        var contenuDivSauvegardePanier = localStorage.getItem('contenuDivSauvegardePanier');
        if (contenuDivSauvegardePanier) {
            document.getElementById('allContent').innerHTML = contenuDivSauvegardePanier;
        }
    }

    panier.addEventListener("click", ()=> {
        // sauvegarderContenu();
        const allContent = document.getElementById('allContent');
        allContent.innerHTML = "";

        // création titre panier
        const titlePanier = document.createElement("h2");
        titlePanier.classList.add("titlePanier");
        titlePanier.textContent = "Panier";
        allContent.append(titlePanier);

        // création btn retour 
        const btnBoutique = document.createElement("button")
        btnBoutique.classList.add("btnBoutiqueFromPanier");
        btnBoutique.textContent = "Go to Home";
        allContent.append(btnBoutique);

        btnBoutique.addEventListener("click", ()=> {
            restaurerContenu();
        })
    })

}