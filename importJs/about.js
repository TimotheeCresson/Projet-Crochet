"use strict";

export function about() {
    const about = document.getElementById("about");

    about.addEventListener("click", () => {
        const allContent = document.getElementById('allContent');
        allContent.innerHTML = "";
        // on fetch le contenu à partir du dossier html
        fetch('../html/about.html')
            .then(response => response.text())
            .then(htmlContent => {
                allContent.innerHTML = htmlContent;
            })
            .catch(error => {
                console.error('Error fetching content:', error);
            });
    });
}

