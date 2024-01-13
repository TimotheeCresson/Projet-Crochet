<?php 
// var_dump($_ENV);
return [
    // L'host est l'hébergeur de la base de donnée 
    "host"=>$_ENV["DB_HOST"]??"127.0.0.1",

    // Le port utilisé pour se connecter
    "port"=>$_ENV["DB_PORT"]??"3306",

    // Le nom de la base de donnée
    "database"=>$_ENV["DB_NAME"]??"compte_site_crochet",

    // Le nom d'utilisateur pour se connecter
    "user"=>$_ENV["DB_USER"]??"root",

    // Le mot de passe 
    "password"=>$_ENV["DB_PASSWORD"]??"",

    // Le set de caractère utilisé
    "charset"=>$_ENV["DB_CHARSET"]??"utf8mb4",

    /* 
        Ce tableau d'option sera utilisé par "PDO"
        PHP Data Object est un objet servant à la connexion aux bases de données  
    */
    "options"=>[
        // Choisir le mode d'affichage d'erreur
        //PDO::ERRMODE_EXCEPTION est une constante statique spécifique définie dans la classe PDO pour définir le mode de gestion des erreurs à "exception"
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,  // le ::  est utilisé pour accéder aux membres statiques d'une classe, y compris les constantes, les propriétés statiques et les méthodes statiques.

        // Choisir le mode de récupération des données (ici tableau associatif)
        //PDO::ATTR_DEFAULT_FETCH_MODE permet de définir le mode de récupération par défaut pour toutes les requêtes ultérieures exécutées par cet objet PDO.
        //PDO::FETCH_ASSOC est une constante qui indique que les données seront récupérées sous la forme d'un tableau associatif, où les noms des colonnes de la base de données serviront de clés dans le tableau associatif, et les valeurs associées seront les valeurs correspondantes des colonnes.
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,

        // Indiquer à PDO de ne pas émuler les requêtes préparées, ce sera ma base de donnée qui s'en occupera
        PDO::ATTR_EMULATE_PREPARES => false
    ]
    
];
?>