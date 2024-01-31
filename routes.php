<?php
// require le router que l'on aura besoin
require_once __DIR__.'/router.php';

get("/", "index.php");
// on met ensuite http://localhost:8082/userlist pour afficher notre page


// // on doit changer nos chemin dans index.php où on avait "./01-syntaxe/01-variable.php" (on met juste /variables)
// // on a changé les liens vers nos dossier php
// // Ici pour la syntaxe
get("/panier", "./php/panier/panier.php");
get("/about", "./php/view/phpLink/about.php");
get("/paiementEtEnvoi", "./php/view/phpLink/paiementEtEnvoi.php");
get("/mentionsLegales", "./php/view/phpLink/mentionsLegales.php");
get("/conditionGenerale", "./php/view/phpLink/conditiongenerale.php");
get("/patronPage", "./php/view/phpLink/patrons.php");
get("/validationPanier", "./php/panier/validationCommande.php");
get("/mdpOublie", "./php/view/motDepasseOublie.php");
get("/supprimerUser", "./php/admin/supprimerUser.php");


any("/supprimerPanier", "./php/panier/misAJourPanier/_suppression_panier.php");
any("/suppressionArticle","./php/admin/suppressionArticle.php");
any("/ajoutPanier", "./php/panier/misAJourPanier/_ajout_panier.php");
any("/compteAdmin", "./php/admin/adminCompte.php");
any("/compteUser", "./php/view/userCompte.php");
// get("/fonction", "./01-syntaxe/04-fonction.php");
// get("/include", "./01-syntaxe/05-include.php");
// get("/session", "./01-syntaxe/06-a-session.php");
// // ne pas oublier de rechanger  require __DIR__. "/../ressources/template/_header.php";
// get("/date", "./01-syntaxe/07-date.php");
// get("/header", "./01-syntaxe/08-a-header.php");

// // Ici pour le form
// get("/get", "./02-form/01-get.php");
// get("/post", "./02-form/02-post.php");
// get("/file", "./02-form/03-file.php");
// get("/connexion", "./02-form/04-connexion.php");
// get("/deconnexion", "./02-form/05-deconnexion.php");
// get("/security", "./02-form/06-security.php");



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
// // Inscription  (on pourrait tout mettre en any  pour gérer le get et le post)
// any("/inscription", function() {
//     require "./03-crud/controller/UserController.php";
//     inscription();
// });
// // Suppression
// get("/userdelete", function() {
//     require "./03-crud/controller/UserController.php";
//     deleteUser();
// });
// // Mise à jour
// any("/userupdate", function() {
//     require "./03-crud/controller/UserController.php";
//     updateUser();
// });

// //----------------- Authentification 
// // Connexion BDD
// any("/connexionBDD", function() {
//     require "./03-crud/controller/AuthController.php";
//     connexion();
// });

// // Déconnexion
// get("/deconnexionBDD", function(){
//     require "./03-crud/controller/AuthController.php";
//     deconnexion();
// });

// // ------------------Crud message ------------------

// post("/blog/ajout", function() {
//     require "./03-crud/controller/MessageController.php";
//     createMessage();
// });
// any('/blog/update/$id', function($id) {
//     require "./03-crud/controller/MessageController.php";
//     updateMessage($id);
// });
// get('/blog/delete/$id', function($id) {
//     require "./03-crud/controller/MessageController.php";
//     deleteMessage($id);
// });

// get('/blog/$id', function($id) {
//     require "./03-crud/controller/MessageController.php";
//     readMessage($id);
// });

// //------------------- API ---------------------------
// any('/api/user', './04-api/controller/UserController.php');

// //----------------------- 404 ---------------------
// // page 404  doit être tout en bas



// // ##################################################
// // ##################################################
// // ##################################################

// // Static GET
// // In the URL -> http://localhost
// // The output -> Index
// get('/', 'views/index.php');

// // Dynamic GET. Example with 1 variable
// // The $id will be available in user.php
// get('/user/$id', 'views/user');

// // Dynamic GET. Example with 2 variables
// // The $name will be available in full_name.php
// // The $last_name will be available in full_name.php
// // In the browser point to: localhost/user/X/Y
// get('/user/$name/$last_name', 'views/full_name.php');

// // Dynamic GET. Example with 2 variables with static
// // In the URL -> http://localhost/product/shoes/color/blue
// // The $type will be available in product.php
// // The $color will be available in product.php
// get('/product/$type/color/$color', 'product.php');

// // A route with a callback
// get('/callback', function(){
//   echo 'Callback executed';
// });

// // A route with a callback passing a variable
// // To run this route, in the browser type:
// // http://localhost/user/A
// get('/callback/$name', function($name){
//   echo "Callback executed. The name is $name";
// });

// // Route where the query string happends right after a forward slash
// get('/product', '');

// // A route with a callback passing 2 variables
// // To run this route, in the browser type:
// // http://localhost/callback/A/B
// get('/callback/$name/$last_name', function($name, $last_name){
//   echo "Callback executed. The full name is $name $last_name";
// });

// // ##################################################
// // ##################################################
// // ##################################################
// // Route that will use POST data
// post('/user', '/api/save_user');



// // ##################################################
// // ##################################################
// // ##################################################
// // any can be used for GETs or POSTs

// // For GET or POST
// // The 404.php which is inside the views folder will be called
// // The 404.php has access to $_GET and $_POST
// any('/404','views/404.php');

?>