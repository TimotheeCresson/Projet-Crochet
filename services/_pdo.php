<?php 
function connexionPDO(): \PDO {
    // Je récupère les infos du fichier de configuration
    $config = require __DIR__ . "/../config/_compteConfig.php";
    /* 
        bdd = base de donnée
        PDO = PHP Data Objects
        Je vais devoir construire un DSN, "Data Source Name"
        C'est un string qui contient toutes les infos pour localiser la base de donnée
        Il prendra la forme suivante: 
            "pilote de la bdd":hôte de la bdd";port="port de la bdd";dbname="nom de la bdd";charset="charset de la bdd";
        Par exemple :
            mysql:host=localhost;port=3306;dbname=blog;charset=utf=utf8mb4
    */
    $dsn =  "mysql:host=".$config["host"]
            .";port=". $config["port"]
            .";dbname=". $config["database"]
            .";charset=". $config["charset"];
    try {
        /* 
            on crée une nouvelle instance de PDO en lui donnant en argument :
                Le DSN
                Le nom d'utilisateur 
                Le mot de passe 
                Et les options de PDO
        */
        $pdo = new \PDO($dsn, $config["user"], $config["password"], $config["options"]);
        return $pdo;
    } catch (\PDOException $e) {
        /* 
            On lance une nouvelle instance de "PDOException"
        */
         // ->  utilisé pour accéder aux propriétés ou méthodes d'un objet en PHP. En l'occurrence, il est utilisé pour accéder aux propriétés de l'objet \PDOException qui a été capturé dans le bloc catch.
        throw new \PDOException($e->getMessage(), (int)$e->getCode());  
    }
}

/**
 * filtre le string passé en paramètre
 *
 * @param string $data
 * @return string
 */
function clean_data(string $data): string {
    $data = trim($data);
    $data = stripslashes($data);
    return htmlspecialchars($data);
    // return htmlspecialchars(stripslashes(trim($data)));  même chose que les 3 lignes du dessus 
}
?>