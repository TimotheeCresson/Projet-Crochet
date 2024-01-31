<?php 
if (session_status()===PHP_SESSION_NONE) {  // si session pas démarré, on la démarre
    session_start();
}

/**
 * Vérifie si l'utilisateur est connecté et le redirige dans la cas contaire
 * 
 * @param boolean $logged true si l'utilisateur doit être connecté et false si il ne doit pas être connecté
 * @param string $redirect chemin de redirection
 * @return void
 */
function userShouldBeLogged(bool $logged = true, string $redirect = "/compte"): void { //void est utilisé pour indiquer qu'une fonction ne retourne aucune valeur. Cela signifie que la fonction exécute des actions ou des opérations, mais elle ne produit pas de résultat qui doit être utilisé ou manipulé par le code appelant.
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