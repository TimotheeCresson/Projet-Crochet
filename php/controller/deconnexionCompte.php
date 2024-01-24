<?php
// deconnexionCompte.php

require __DIR__ . "/../../services/_userShouldBeLogged.php";

function deconnexionUser() {
    userShouldBeLogged(true, "/");

    unset($_SESSION);
    session_destroy();

    setcookie("PHPSESSID", "", time()-3600);

    header("Location: /");
    exit;
}

?>
