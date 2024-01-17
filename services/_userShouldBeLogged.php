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
function userShouldBeLogged(bool $logged = true, string $redirection = "/"): void {

    // if ($redirection) {
    //     // message si une redirection est effectuée
    //     throw new Exception("Redirection effectuée vers $redirection");
    // }
    if ($logged) {
        if (isset($_SESSION["expire"])) {

            // on vérifie si notre session a expiré
            $now = time();
            $expire = $_SESSION["expire"];
            $session_logged = $_SESSION["logged"];

            if ($now >$expire) {
                unset($_SESSION);
                session_destroy();
                // on supprime les cookies au bout d'une heure
                setcookie("PHPSESSID", "", $now-3600);
            }
            else {
                // Sinon elle est renouvelé pour 1h
                $expire = $now + 3600; 
            }
        }
        if (!isset($session_logged) || $session_logged !== true) {
            // Si l'utilisateur n'est pas connecté, on le redirige
            header("Location: $redirection");
            exit;
        }
    }
    else {
        // si l'utilisateur doit être déconnecté
        if(isset($session_logged) && $session_logged === true ) {
            header("Location: $redirection");
            exit;
        }
    }
}