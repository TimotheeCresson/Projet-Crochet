export function boutique() {
fetch("./data.json")
    .then((response) => response.json())
    .then((data) => {
        try{
        // on sélectionne nos éléments
        const allCreationSelect = document.getElementById("allCreation");
        const optionCreations = allCreationSelect.querySelectorAll("option");
        const inputRecherche = document.querySelector("#recherche")
        const creationImgContainer= document.querySelector(".creationImgDiv")
        const btnSuite = document.getElementById("btnSuite");

        let animaux = [];
        let trapilho = [];
        let currentSetIndex = 0; 
        const imagesPerSet = 4;

        animaux = data.animaux;
        trapilho = data.trapilho;
        console.log(animaux, trapilho);

        function handleSelectChange() {
            optionCreations.forEach((option) => {
                if (option.selected) {
                    const selectedOption = option.value;
                    updateImage(selectedOption);
                }
            });
        }
        inputRecherche.addEventListener("click", () => {
            console.log("click");
            creationImgContainer.innerHTML = ""; // on supprime les images présente afin que lorsque l'on change de sélection, nous n'avons que celle sélectionné
            currentSetIndex = 0; // Réinitialise le currentSetIndex quand on clique sur le btn
            
            handleSelectChange();
            console.log(currentSetIndex);
        });

        btnSuite.addEventListener("click", () => {
            currentSetIndex += imagesPerSet; // Faire apparaître les 4 images suivantes
            handleSelectChange();
        });

        function updateImage(selectedOption) {
            const selectedArrayOption = selectedOption === "animaux" ? animaux : trapilho;

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
            descriptionBtn.classList.add("description");
            descriptionBtn.textContent = "Description";

            infoDiv.append(nameCreation, priceCreation, descriptionBtn);

            imgDivElement.append(imgCreation, infoDiv);
            creationImgContainer.append(imgDivElement);
            // console.log(`i: ${i}, selectedArray : ${item}, currentIndex: ${currentSetIndex}, endIndex : ${endIndex}`);
        }
        
}
        }
        catch (error){
            console.error('Erreur chargement donnée:', error);
        }
    })
}
