<?php 
// Nous allons créer une fonction pour savoir si notre utilisateur est connecté ou non 
if (session_start()===PHP_SESSION_NONE) {
    session_start();
}


/**
 * On vérifie si notre utilisateur est connecté ou non, si ce dernier n'est pas connecté on le redirige
 *
 * @param boolean $logged est true quand utilisateur est connecté et false dasn le cas contraire
 * @param string $redirection on redirige à notre page de connexion de compte
 * @return void
 */
function userShouldBeLogged(bool $logged = true, string $redirect = "/"): void { //void est utilisé pour indiquer qu'une fonction ne retourne aucune valeur. Cela signifie que la fonction exécute des actions ou des opérations, mais elle ne produit pas de résultat qui doit être utilisé ou manipulé par le code appelant.
    if ($logged) {
        if(isset($_SESSION["expire"])) {
            // Si la session a expiré, on la supprime
            if (time() > $_SESSION["expire"]) {
                unset($_SESSION); // vide la superglobal, plus besoin de recharger la page
                session_destroy();
                setcookie("PHPSESSID", "", time()-3600); // supprimer le cookie au bout d'une heure (*)
            } 
            else {
                // Sinon elle est renouvelé pour 1h
                $_SESSION["expire"] = time() + 3600;  // si session pas utilisé, on peut relancer pendant 1h 
            }
        } // fin vérification expire
        if (!isset($_SESSION["logged"]) || $_SESSION["logged"] !== true) {
            // Si l'utilisateur n'est pas connecté, on le redirige
            header("Location: $redirect");
            exit;
        }
    }
    else {
        /* 
            Si l'utilisateur doit être déconnecté pour accéder à la page, alors on vérifie si il est connecté et dans ce cas on le redirige
        */
        if (isset($_SESSION["logged"]) && $_SESSION["logged"] === true) {
            header("Location: $redirect");
            exit;
        }
    }
}