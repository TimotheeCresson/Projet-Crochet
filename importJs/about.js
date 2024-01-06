
"use strict";

export function about() {
    const about = document.getElementById("about");

    console.log(about);

    // // Fonction pour restaurer le contenu de la div container
    // function restaurerContenu() {
    //     var contenuDivSauvegardeabout = localStorage.getItem('contenuDivSauvegardeabout');
    //     if (contenuDivSauvegardeabout) {
    //         document.getElementById('allContent').innerHTML = contenuDivSauvegardeabout;
    //     }
    // }

    about.addEventListener("click", ()=> {
        // sauvegarderContenu();
        const allContent = document.getElementById('allContent');
        allContent.innerHTML = "";

        // création titre about
        const titleabout = document.createElement("h2");
        titleabout.classList.add("titleabout");
        titleabout.textContent = "about";
        allContent.append(titleabout);

    })

}