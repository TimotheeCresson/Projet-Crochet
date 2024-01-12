<?php 

require_once __DIR__ . "/../../ressources/services/_pdo.php";

/**
 * On récupère tous les utilisateurs
 *
 * @return array
 */
function getEveryUsers():array {
    // On se connecte à notre base de donnée
    $pdo = connexionPDO();
    // On envoi notre requête SQL
    $sql = $pdo->query("SELECT id_User, username FROM users");
    // on récupère les infos (ici on utilisera donc fetchAll)
    return $sql->fetchAll();
}

/**
 * On récupère un utilisateur par son ID
 *
 * @param string $id
 * @return array|boolean
 */
function getUserById(string $id):array|bool {
    $pdo = connexionPDO();

    $sql = $pdo->prepare("SELECT * FROM users WHERE id_User = :id");

    $sql->execute(["id"=>$id]);
    return $sql->fetch();
}


/**
 * On récupère un utilisateur par son email
 *
 * @param string $email
 * @return array|boolean
 */
function getUserByEmail(string $email):array|bool {
    $pdo = connexionPDO();

    $sql = $pdo->prepare("SELECT * FROM users WHERE email = :email");

    $sql->execute(["email"=>$email]);

    return $sql->fetch();
}

/**
 * On ajoute un utilisateur à notre base de donnée
 *
 * @param string $username 
 * @param string $email
 * @param string $password
 * @return void
 */
function addingUser(string $username, string $email, string $password): void {
    $pdo = connexionPDO();
    $sql = $pdo->prepare("INSERT INTO users(username, email, password) VALUES(:username, :email, :password)");

    // Utilisation de execute avec un tableau associatif
    $sql->execute([
        ":username" => $username,
        ":email" => $email,
        ":password" => $password
    ]);
}

/**
 * On supprime un utilisateur par son id
 *
 * @param string $id
 * @return void
 */
function deleteUserByIsID(string $id):void {
    $pdo = connexionPDO();
    $sql = $pdo->prepare("DELETE FROM users WHERE id_User = :id");
    $sql->execute(["id"=>$id]);
}

function updateUserByIsId (string $id, string $username, string $email, string $password): void {
    $pdo = connexionPDO();
    $sql = $pdo->prepare("UPDATE users SET username=?, email=?, password=? WHERE id_User=?");
    $sql->execute([(int)$id, $username, $email, $password]);
}



?>