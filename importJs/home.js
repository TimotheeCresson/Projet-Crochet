export default function home() {
    const home = document.getElementById("home");
    
    function restaurerContenu() {
        var contenuDivSauvegardePanier = localStorage.getItem('contenuDivSauvegardePanier');
        if (contenuDivSauvegardePanier) {
            document.getElementById('allContent').innerHTML = contenuDivSauvegardePanier;
        }
    }

    home.addEventListener("click", ()=> {
        restaurerContenu();
    })
}

