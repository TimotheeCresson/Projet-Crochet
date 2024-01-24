<?php
// ...

// Ajoutez cette fonction quelque part dans votre code PHP
function determineCompteLink() {
    if (isset($_SESSION["role"])) {
        if ($_SESSION["role"] === "Admin") {
            return "/php/view/adminCompte.php";
        } elseif ($_SESSION["role"] === "User") {
            return "/php/view/userCompte.php";
        }
    }
    return "/"; // Redirection par défaut vers la page principale
}

// ...
?>
