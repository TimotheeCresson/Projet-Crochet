"use strict";
export function boutique() {
fetch("./data.json")
    .then((response) => response.json())
    .then((data) => {
        try{
        // on sélectionne nos éléments
        const allCreationSelect = document.getElementById("allCreation");
        const optionCreations = allCreationSelect.querySelectorAll("option");
        const inputRecherche = document.querySelector("#recherche")
        const rechercherProduitsInput = document.querySelector("#rechercherProduits");
        const creationImgContainer= document.querySelector(".creationImgDiv")
        const btnSuite = document.getElementById("btnSuite");
        let animauxArray = [];
        let trapilhoArray = [];
        let currentSetIndex = 0; 
        // Afin à pouvoir mettre 4 images lorsque l'on appuyera sur le bouton lire la suite
        const imagesPerSet = 4;
        let searchProduitsProcessed = false;
        animauxArray = data.animaux;
        trapilhoArray = data.trapilho;
        // console.log(animauxArray, trapilhoArray);

        // rechercherProduitsInput.addEventListener("input", function() {
        //     // Affichez la valeur actuelle dans la console
        //     const searchProduits = rechercherProduitsInput.value.toLowerCase();
        //     creationImgContainer.innerHTML = ""; // Clear previous images
        //     currentSetIndex = 0; // Reset currentSetIndex when searching
        //     handleSelectChange(searchProduits);
        //     console.log("Valeur de l'input :", rechercherProduitsInput.value);
        // });



        handleSelectChange();
        
        function handleSelectChange() {
            optionCreations.forEach((option) => {
                if (option.selected) {
                    const selectedOption = option.value;
                    updateImage(selectedOption);
                }
            });
        }
        // inputRecherche.addEventListener("click", () => {
        //     console.log("click");
        //     creationImgContainer.innerHTML = ""; // on supprime les images présente afin que lorsque l'on change de sélection, nous n'avons que celle sélectionné
        //     currentSetIndex = 0; // Réinitialise le currentSetIndex quand on clique sur le btn
        //     handleSearch();
        //     handleSelectChange();
        //     console.log(currentSetIndex);
        // });

        btnSuite.addEventListener("click", () => {
            currentSetIndex += imagesPerSet; // Faire apparaître les 4 images suivantes
            if (searchProduitsProcessed === false) {
                // console.log(searchProduitsProcessed);
                handleSelectChange();
            }
            
        });


    inputRecherche.addEventListener("click", function() {
            // Affichez la valeur actuelle dans la console
            const searchProduits = rechercherProduitsInput.value.trim().toLowerCase();
            if (searchProduits) {
                // localStorage.setItem("searchProduits", searchProduits);
                searchProduitsProcessed = true;
                rechercherProduitsInput.innerHTML = "";
                creationImgContainer.innerHTML = ""; // Clear previous images
                currentSetIndex = 0; // Reset currentSetIndex when searching
                
                const resultatsAnimaux = animauxArray.filter(animaux => animaux.nom.toLowerCase().startsWith(searchProduits));
                const resultatsTrapilho = trapilhoArray.filter(trapilho => trapilho.nom.toLowerCase().startsWith(searchProduits));
                const resultatsFinaux = resultatsAnimaux.concat(resultatsTrapilho);
                updateImageInput(resultatsFinaux);
            }
            else {
                creationImgContainer.innerHTML = ""; // on supprime les images présente afin que lorsque l'on change de sélection, nous n'avons que celle sélectionné
                searchProduitsProcessed = false;
                currentSetIndex = 0; // Réinitialise le currentSetIndex quand on clique sur le btn
                handleSelectChange();
            }
            // handleSelectChange(searchProduits);
            // handleSelectChange();

            console.log("Valeur de l'input :", searchProduits);
        });

        // Enlever la valeur de mon input lors du reload de la page
        window.addEventListener('beforeunload', function() {
            // Réinitialisez la valeur de l'input à une chaîne vide
            rechercherProduitsInput.value = '';
        });


        function updateImageInput(items) {
            creationImgContainer.innerHTML = "";
            let imagesPerSet = 30;
            const endIndex = Math.min(currentSetIndex + imagesPerSet, items.length);

    // Afficher les images correspondantes aux résultats de la recherche
        for (let i = currentSetIndex; i < endIndex; i++) {
            const item = items[i];
            const imgDivElement = document.createElement("div");
            imgDivElement.classList.add("imgDivElement");
            const imgCreation = document.createElement("img");
            imgCreation.classList.add("imgCreation");
            imgCreation.src = `./img/${item.photo}`;
            imgCreation.alt = item.nom;

            // Creation de la div Info
            const infoDiv = document.createElement("div");
            infoDiv.classList.add("infoDiv");

            const nameCreation = document.createElement("p");
            nameCreation.textContent = item.nom;

            const priceCreation = document.createElement("p");
            priceCreation.textContent = `Prix: ${item.prix} €`;

            const descriptionBtn = document.createElement("button");
            descriptionBtn.classList.add("descriptionBtn");
            descriptionBtn.textContent = "Description";

            const descriptionDiv = document.createElement("div");
            descriptionDiv.classList.add("descriptionDiv")
            descriptionDiv.textContent = `${item.description}`

            const descriptionBtnClose = document.createElement("button");
            descriptionBtnClose.classList.add("descriptionBtnClose");
            descriptionBtnClose.innerHTML = `<i class="fa-solid fa-circle-xmark"></i>`;

            descriptionDiv.append(descriptionBtnClose)
            infoDiv.append(nameCreation, priceCreation, descriptionBtn);

            imgDivElement.append(imgCreation, infoDiv, descriptionDiv);
            creationImgContainer.append(imgDivElement);
            // console.log(`i: ${i}, selectedArray : ${item}, currentIndex: ${currentSetIndex}, endIndex : ${endIndex}`);

            descriptionBtn.addEventListener("click", () => {
                descriptionDiv.style.display = "flex";
            })
            descriptionBtnClose.addEventListener("click", ()=> {
                descriptionDiv.style.display = "none";
            })
        }
    }

        function updateImage(selectedOption) {
        const selectedArrayOption = selectedOption === "animaux" ? animauxArray : trapilhoArray;

        const endIndex = Math.min(currentSetIndex + imagesPerSet, selectedArrayOption.length);  //Math.min(a, b), on calcule si les 2 valeurs currentSetIndex + imagesPerSet cumulé ne dépasse pas la taille de notre tableau)

        // Tant que i est inférieur à endIndex, notre boucle continue
        for (let i = currentSetIndex; i < endIndex; i++) {
            const item = selectedArrayOption[i];  // on stocke la valeur actuelle de notre objet dans notre tableau d'options
            // Creation de mes images
            const imgDivElement = document.createElement("div");
            imgDivElement.classList.add("imgDivElement");
            const imgCreation = document.createElement("img");
            imgCreation.classList.add("imgCreation");
            imgCreation.src = `./img/${item.photo}`;
            imgCreation.alt = item.nom;

            // Creation de la div Info
            const infoDiv = document.createElement("div");
            infoDiv.classList.add("infoDiv");

            const nameCreation = document.createElement("p");
            nameCreation.textContent = item.nom;

            const priceCreation = document.createElement("p");
            priceCreation.textContent = `Prix: ${item.prix} €`;

            const descriptionBtn = document.createElement("button");
            descriptionBtn.classList.add("descriptionBtn");
            descriptionBtn.textContent = "Description";

            const descriptionDiv = document.createElement("div");
            descriptionDiv.classList.add("descriptionDiv")
            descriptionDiv.textContent = `${item.description}`

            const descriptionBtnClose = document.createElement("button");
            descriptionBtnClose.classList.add("descriptionBtnClose");
            descriptionBtnClose.innerHTML = `<i class="fa-solid fa-circle-xmark"></i>`;

            descriptionDiv.append(descriptionBtnClose)
            infoDiv.append(nameCreation, priceCreation, descriptionBtn);

            imgDivElement.append(imgCreation, infoDiv, descriptionDiv);
            creationImgContainer.append(imgDivElement);
            // console.log(`i: ${i}, selectedArray : ${item}, currentIndex: ${currentSetIndex}, endIndex : ${endIndex}`);

            descriptionBtn.addEventListener("click", () => {
                descriptionDiv.style.display = "flex";
            })
            descriptionBtnClose.addEventListener("click", ()=> {
                descriptionDiv.style.display = "none";
            })
            };
            
        
    }
        }
        catch (error){
            console.error('Erreur chargement donnée:', error);
        }
    })
}



  // inputRecherche.addEventListener("click", () => {
            //     // Get the search input value and convert it to lowercase
            //     const inputSearchProduit = document.getElementById("rechercherProduits").value.toLowerCase();
            
            //     // Clear existing images
            //     creationImgContainer.innerHTML = "";
            
            //     // Filter the 'animaux' array based on the search input
            //     const resultatsAnimaux = animauxArray.filter(animaux => animaux.nom.toLowerCase().startsWith(inputSearchProduit));
            
            //     // Display the images associated with the filtered results
            //     resultatsAnimaux.forEach(animal => {
            //         updateImage("animaux", animal); // Assuming the function updateImage takes the category ("animaux") and the animal item
            //     });
            // });