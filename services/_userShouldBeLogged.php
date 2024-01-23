<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/**
 * On vérifie si notre utilisateur est connecté ou non, si ce dernier n'est pas connecté on le redirige
 *
 * @param boolean $logged est true quand utilisateur est connecté et false dans le cas contraire
 * @param string $redirect on redirige à notre page de connexion de compte
 * @return void
 */
function userShouldBeLogged(bool $logged = true, string $redirect = "/"): void {

    if ($logged) {
        if (isset($_SESSION["expire"])) {
            // Si la session a expiré, on la supprime
            if (time() > $_SESSION["expire"]) {
                unset($_SESSION); // vide la superglobal, plus besoin de recharger la page
                session_destroy();
                setcookie("PHPSESSID", "", time() - 3600); // supprimer le cookie au bout d'une heure (*)
            } else {
                // Sinon elle est renouvelée pour 1h
                $_SESSION["expire"] = time() + 3600;  // si session pas utilisée, on peut relancer pendant 1h 
            }
        } // fin vérification expire

        if (!isset($_SESSION["logged"]) || $_SESSION["logged"] !== true) {
            // Si l'utilisateur n'est pas connecté, on le redirige
            header("Location: $redirect");
            exit;
        }
    } else {
        /* 
            Si l'utilisateur doit être déconnecté pour accéder à la page, alors on vérifie s'il est connecté et dans ce cas on le redirige
        */
        if (isset($_SESSION["logged"]) && $_SESSION["logged"] === true) {
            header("Location: $redirect");
            exit;
        }
    }
}
