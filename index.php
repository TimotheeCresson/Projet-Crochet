<?php
// Inclure le fichier d'en-tête
require "./php/template/_header.php";

// Inclure le fichier de contenu principal
require './php/template/_main.php';

// Inclure le fichier de pied de page
require './php/template/_footer.php';


 /* <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site vitrine Crochet</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <script src="main.js" defer type="module"></script>
</head>
<body>
    <header>
        <div class="imgHeader"></div>
        <label for="check" class="open-menu"><i class="fa-solid fa-house"></i></label>
        <nav class="barreNav barreNavDisplay">
            <ul>
                <input type="checkbox" id="check">
                    <li><a href="#boutique" id="home">Boutique</a></li>
                    <li><a href="#compte" id="compteLink">Compte</a></li>
                    <li><a href="#panier" id="panier">Panier</a></li>
                    <li><a href="#about" id="about">À Propos</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <label for="check" class="close-menu"><i class="fa-solid fa-circle-xmark"></i></label>
            </ul>
        </nav>
    </header>

    <div class="main-Container" id="allContent">

        <section class="accueil">
                <h1>Bienvenue Sur Mon Site</h1>
                <p>Je m'appelle Justine, je suis passionnée depuis quelques années par le crochet, voci mes créations en espérant qu'elles vous plairont</p>
                <div class="carrousel"></div>
        </section>


        <section class="projets" id="nouveautés">
            <div class="separationPage"></div>
            <h1>les nouveaux projets</h1>
            <div class="projetContainer">
                <div class="imgProjetNouveautés"></div>
            </div>
        </section>

        <section class="boutique" id="creations">
            <div class="separationPage"></div>
            <h1>ma boutique</h1>
            <div class="creationContainerInput">
                <div class="creationSelection">
                    <select name="allCreation" id="allCreation">
                        <option value="animaux">Animaux</option>
                        <option value="trapilho">Trapilho</option>
                    </select>
                </div>
                <div class="creationInputRecherche">
                    <input type="search" name="rechercherProduits" id="rechercherProduits" placeholder="Rechercher des produits ...">
                    <!-- <input type="button" id="recherche" value="Rechercher"> -->
                    <button id="recherche"><span>Rechercher</span></button>
                </div>
            </div>
                <div class="apparitionCreation">
                    <h2>Créations</h2>
                    <div class="creationImgDiv"></div>
                    <input type="button" id="btnSuite" value="Lire la suite">
                </div>
        </section>

        <section class="accessoires" id="accessoire">
            <div class="separationPage"></div>
            <h1>les accessoires</h1>
            <div class="accessoireContainer">
                <div class="accessoireImg imageAnimateInitial"></div>
            </div>
            <div class="textAccessoire">
            <p>
                Les accessoires sont disponibles individuellements ou lors de l'achat d'un amigurumi
            </p>
            </div>
        </section>

        <section class="patrons" id="patrons">
            <div class="separationPage"></div>
            <h1>les patrons</h1>
            <div class="patronContainer">
                <div class="patronImgContainer"></div>
            </div> 
            <p>Les patrons des accessoires sont également disponibles à la vente</p>
            <button class="btnPatrons" id="btnPagePatrons">Accéder aux différents patrons</button>
        </section>
    </div>
    </body>

    <footer>
        <span class="titleFooterSection1">Boutique</span>
        <div class="menuFooter">
            <ul>
                <li><a href="#nouveautés">Nouveautés</a></li>
                <li><a href="#creations">Créations</a></li>
                <li><a href="#accessoire">Accessoires</a></li>
                <li><a href="#patrons">Patrons</a></li>
            </ul>
        </div>
            <span class="titleFooterSection2">Infos</span>
        <div class="menuFooter">
            <ul>
                <li><a href="" id="paiementEtEnvoi">Paiement et envoi</a></li>
                <li><a href="" id="mentionsLegales">Mentions légales</a></li>
                <li><a href="" id="ConditionVentes">Conditions générales de ventes</a></li>
            </ul>
        </div>

        <div class="footerBottom">
            <div class="copyright">
                <p>Copyright © 2023 | Creation by Timothée</p>
            </div>
            <div class="barreMid"></div>
            <div class="mediaContainer">
                <p>Mes réseaux sociaux</p>
                <div class="socialMedia" id="contact">
                    <a href=""><i class="fa-brands fa-facebook"></i></a>
                    <a href=""><i class="fa-brands fa-instagram"></i></a>
                    <a href=""><i class="fa-solid fa-envelope"></i></a>
                </div>
            </div>
        </div>
    </footer>


    <script>
        // accès à la page de compte
        $(document).ready(function () {
            $('#compteLink').click(function (e) {
                e.preventDefault();
                $('#allContent').load('./php/controller/authController.php');
            });
        });

        // accès à la page condition générale
        $(document).ready(function () {
            $('#ConditionVentes').click(function (e) {
                e.preventDefault();
                $('#allContent').load('./html/conditiongenerale.html');
            });
        });

        // accès à la page paiement et envoi
        $(document).ready(function () {
            $('#paiementEtEnvoi').click(function (e) {
                e.preventDefault();
                $('#allContent').load('./html/paiementEtEnvoi.html');
            });
        });
        
        // accès à la page mentions légales
        $(document).ready(function () {
            $('#mentionsLegales').click(function (e) {
                e.preventDefault();
                $('#allContent').load('./html/mentionsLegales.html');
            });
        });

        $(document).ready(function () {
    // Function to load patrons.html content
    function loadPatronsPage() {
        $('#allContent').load('./html/patrons.html', function () {
            // Add a class to indicate that content is loaded
            $('#allContent').addClass('content-loaded');
        });
    }
    // Event delegation for the "Patron" button
    $(document).on('click', '#btnPagePatrons', function (e) {
        e.preventDefault();
        // Always reload the content, even if it was loaded before
        loadPatronsPage();
    });
        })
    </script>

</html> */
    
?>