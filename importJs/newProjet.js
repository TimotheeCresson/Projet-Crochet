

export function newProjet() {
fetch("./data.json")
    .then((response)=> response.json())
    .then((data) => {
        try{
            const imgProjectNew = document.querySelector(".imgProjetNouveautés")
            let newCreations = [];
            console.log(imgProjectNew);

            newCreations = data.nouveautés;
            console.log(newCreations);

                newCreations.forEach((items) => {
                    // Créations images
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
                    descriptionBtnNew.classList.add("description");
                    descriptionBtnNew.textContent = "Description";
    
                    infoDivNew.append(nameCreationNew, priceCreationNew, descriptionBtnNew);
                    imgNewDiv.append(imgElement, infoDivNew);
                    imgProjectNew.append(imgNewDiv);
                })
            }
        catch(error) {
            console.error('Erreur chargement donnée:', error);
        }
    })
}