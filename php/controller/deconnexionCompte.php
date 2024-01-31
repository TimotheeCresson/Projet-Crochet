<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require __DIR__ . "/../../services/_userShouldBeLogged.php";

function deconnexionUser() {
    // Vérifiez si l'utilisateur est connecté avant de détruire la session
    if (isset($_SESSION['logged']) && $_SESSION['logged']) {
        // Récupère les variables de session liées à l'utilisateur
        $username = $_SESSION['username'];
        $role = $_SESSION['role'];
        $idUser =  $_SESSION["id_User"];
        $email     = $_SESSION["email"]; 
        // Conserve les informations du panier
        $panier = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

        // Détruit la session (sauf le panier)
        $_SESSION = [];
        session_destroy();

        // Restaure les informations du panier
        $_SESSION['cart'] = $panier;

        // Supprime le cookie de session
        setcookie("PHPSESSID", "", time() - 3600);

        // Vous pouvez ajouter d'autres actions de nettoyage si nécessaire

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
