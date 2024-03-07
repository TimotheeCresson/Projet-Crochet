<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require __DIR__ . "/../../services/_userShouldBeLogged.php";

function deconnexionUser() {
    // Vérifiez si l'utilisateur est connecté avant de détruire la session
    if (isset($_SESSION['logged']) && $_SESSION['logged']) {

        // Conserve les informations du panier, si la session est remplie, on la récupère sinon on met un tableau vide
        $panier = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

        // Détruit la session (sauf le panier)
        $_SESSION = [];
        session_destroy();
        // Solution 2 :
        // unset($_SESSION["logged"]);
        // unset($_SESSION["username"]);
        // unset($_SESSION["id_User"]);
        // unset($_SESSION["email"]);
        // unset($_SESSION["role"]);
        // unset($_SESSION["expire"]);

        // Restaure les informations du panier
        session_start();
        $_SESSION['cart'] = $panier;


        // Redirige vers une page spécifique après la déconnexion
        header("Location: /compte");  // Changez "/compte" par l'URL souhaitée
        exit;
    } else {
        // L'utilisateur n'était pas connecté, redirigez-le vers une page d'accueil ou une autre page
        header("Location: /");  // Changez "/" par l'URL souhaitée
        exit;
    }
}
?>
