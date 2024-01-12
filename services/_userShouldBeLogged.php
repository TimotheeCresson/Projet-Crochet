<?php 
// Nous allons créer une fonction pour savoir si notre utilisateur est connecté ou non 
if (session_start()===PHP_SESSION_NONE) {
    session_start();
}
