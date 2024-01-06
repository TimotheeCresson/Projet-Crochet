"use strict";

// function patronMain() {
    fetch("/data.json")
        .then((response) => response.json())
        .then((data) => {
            try {
                const containerPatronsPage = document.querySelector(".containerPatrons");
                const imgPatronContainerPage = document.querySelector(".imgPatronContainerPage"); 
    
                let patronArray = [];
    
                patronArray = data.patrons
                


                patronArray.forEach((items, index) => {
                    const imgNewDiv = document.createElement("div");
                    imgNewDiv.classList.add("imgNewDiv");
                    const imgElement = document.createElement("img");
                    imgElement.src = `./img/${items.photo}`
                    imgElement.alt = items.nom;
                    imgElement.classList.add("imgCreationNew");

                    // Créations div info
                    const infoDivNew = document.createElement("div");
                    infoDivNew.classList.add("infoDiv");

                    const nameCreationNew = document.createElement("p");
                    nameCreationNew.textContent = items.nom;

                    const priceCreationNew = document.createElement("p");
                    priceCreationNew.textContent = `Prix: ${items.prix} €`

                    const descriptionBtnNew = document.createElement("button");
                    descriptionBtnNew.classList.add("descriptionBtn");
                    descriptionBtnNew.textContent = "Description";

        
                    const descriptionDiv = document.createElement("div");
                    descriptionDiv.classList.add("descriptionDiv")
                    descriptionDiv.textContent = `${items.description}`
        
                    const descriptionBtnClose = document.createElement("button");
                    descriptionBtnClose.classList.add("descriptionBtnClose");
                    descriptionBtnClose.innerHTML = `<i class="fa-solid fa-circle-xmark"></i>`;

                    descriptionDiv.append(descriptionBtnClose)
                    infoDivNew.append(nameCreationNew, priceCreationNew, descriptionBtnNew);
                    imgNewDiv.append(imgElement, infoDivNew, descriptionDiv);
                    imgPatronContainerPage.append(imgNewDiv);
                    containerPatronsPage.append(imgPatronContainerPage);

                    descriptionBtnNew.addEventListener("click", () => {
                        descriptionDiv.style.display = "flex";
                    })
                    descriptionBtnClose.addEventListener("click", ()=> {
                        descriptionDiv.style.display = "none";
                    })
                })
            }
            catch (error) {
                console.error('Erreur chargement donnée:', error);
            }
        })
    // }