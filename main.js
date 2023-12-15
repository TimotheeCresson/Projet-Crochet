import createCarrousel from './slider.js';

// Appelle la fonction pour créer le carrousel
createCarrousel();

const inputCheck = document.getElementById('check');
const barreNav = document.querySelector('.barreNav');
const openMenu = document.querySelector('.open-menu')
const barreNavDisplay = document.querySelector('.barreNavDisplay');


// Ajoutez un écouteur d'événements pour détecter les changements de la checkbox
inputCheck.addEventListener('change', function () {
    // Mettez à jour la classe "active" de la barre de navigation en fonction de l'état de la checkbox
    openMenu.style.display = this.checked ? 'none' : 'block';
    barreNavDisplay.style.display = this.checked ? 'block' : 'none';
    setTimeout(()=>{
        barreNav.classList.toggle('active', this.checked);
    }, 150)
    
});




fetch("./data.json")
    .then((response) => response.json())
    .then((data) => {
        try{
            // on sélectionne nos éléments
            const allCreationSelect = document.getElementById("allCreation");
            const optionCreations = allCreationSelect.querySelectorAll("option");
            const inputRecherche = document.querySelector("#rechercherProduits")
            const creationImgContainer= document.querySelector(".creationImgDiv")

            let animaux = [];
            let trapilho = [];
            animaux = data.animaux;
            trapilho = data.trapilho;
            console.log(animaux, trapilho);

            // on crée une fonction afin de sélectionner chacunes de nos options
            function handleSelectChange() {
                optionCreations.forEach((option) => {
                    if (option.selected) {
                        const selectedOption = option.value;
                        updateImage(selectedOption)
                    }
                })
            }
            allCreationSelect.addEventListener("change", () => {
                handleSelectChange();
            })

            function updateImage(selectedOption) {
                creationImgContainer.innerHTML = "";

                const selectedArrayOption = selectedOption === "animaux" ? animaux : trapilho;
                // console.log(selectedArrayOption);

                selectedArrayOption.forEach((item)=>{
                    // Creation de mes images
                    const imgDivElement = document.createElement("div");
                    imgDivElement.classList.add("imgDivElement")
                    const imgCreation = document.createElement("img");
                    imgCreation.classList.add("imgCreation")
                    imgCreation.src = `./img/${item.photo}`;
                    imgCreation.alt = item.nom;

                    // Creation de la div Info
                    const infoDiv = document.createElement("div");
                    infoDiv.classList.add("infoDiv");

                    const nameCreation = document.createElement("p");
                    nameCreation.textContent = item.nom;

                    const priceCreation = document.createElement("p");
                    priceCreation.textContent = `Prix: ${item.prix} €`;

                    const descriptionBtn =  document.createElement("button");
                    descriptionBtn.textContent = "Description";
                    
                    infoDiv.append(nameCreation, priceCreation, descriptionBtn);

                
                    imgDivElement.append(imgCreation, infoDiv);

                    
                    creationImgContainer.append(imgDivElement);
    
                })
            }



        }
        catch (error){
            console.error('Error fetching data:', error);
        }
    })



