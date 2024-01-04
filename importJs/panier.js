"use strict";

export function panier() {
    const panier = document.getElementById("Panier");
    const home = document.getElementById("home");

    console.log(panier);

    function sauvegarderContenu() {
        var contenuDiv = document.getElementById('allContent').innerHTML;
        localStorage.setItem('contenuDivSauvegarde', contenuDiv);
    }

    // Fonction pour restaurer le contenu de la div container
    function restaurerContenu() {
        var contenuDivSauvegarde = localStorage.getItem('contenuDivSauvegarde');
        if (contenuDivSauvegarde) {
            document.getElementById('allContent').innerHTML = contenuDivSauvegarde;
        }
    }

    panier.addEventListener("click", ()=> {
        sauvegarderContenu();
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

    home.addEventListener("click", ()=> {
        restaurerContenu();
    })


}