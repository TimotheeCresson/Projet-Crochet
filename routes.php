<?php
// require le router que l'on aura besoin
require_once __DIR__.'/router.php';

get("/", "index.php");
// on met ensuite http://localhost:8082/userlist pour afficher notre page

get("/panier", "./php/panier/panier.php");
get("/about", "./php/view/phpLink/about.php");
get("/paiementEtEnvoi", "./php/view/phpLink/paiementEtEnvoi.php");
get("/mentionsLegales", "./php/view/phpLink/mentionsLegales.php");
get("/conditionGenerale", "./php/view/phpLink/conditiongenerale.php");
get("/patronPage", "./php/view/phpLink/patrons.php");
get("/validationPanier", "./php/panier/validationCommande.php");
get("/mdpOublie", "./php/view/motDepasseOublie.php");
get("/supprimerUser", "./php/admin/supprimerUser.php");

any("/editArticle","./php/admin/EditerArticle/ajoutForm.php");

any("/supprimerPanier", "./php/panier/misAJourPanier/_suppression_panier.php");
any("/suppressionArticle","./php/admin/suppressionArticle.php");
any("/ajoutPanier", "./php/panier/misAJourPanier/_ajout_panier.php");
any("/compteAdmin", "./php/admin/adminCompte.php");
any("/compteUser", "./php/view/userCompte.php");




// ----------------  crud ---------------------------
// Liste utilisateur 
any("/compte", function() {
    require "./php/controller/authController.php";
    gestionConnexionEnregistrement();
});
any("/deconnexion", function() {
    require "./php/controller/deconnexionCompte.php";
    deconnexionUser();
});
// ------------ Erreur 404 ------------------
any("/404", "./404.php");

?>