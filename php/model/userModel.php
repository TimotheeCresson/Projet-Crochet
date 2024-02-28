<?php 

require_once __DIR__ . "/../../services/_pdo.php";

/**
 * On récupère tous les utilisateurs
 *
 * @return array
 */
function getEveryUsers():array {
    // On se connecte à notre base de donnée
    $pdo = connexionPDO();
    // On envoi notre requête SQL
    $sql = $pdo->query("SELECT u.id_User, u.username, u.email, r.NomRole as role FROM users u JOIN role r ON u.idRole = r.idRole");
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
 * on récupère un utilisateur par son identifiant
 *
 * @param string $username
 * @return array|boolean
 */
function getUserByUsername(string $username):array|bool {
    $pdo = connexionPDO();
    $sql = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $sql->execute([$username]);
    return $sql->fetch();
}


/**
 * On récupère un utilisateur par son email
 *
 * @param string $email
 * @return array|boolean
 */
function getUserByEmail(string $email): array|bool {
    $pdo = connexionPDO();
    $sql = $pdo->prepare("SELECT id_User, username, email, password, idRole FROM users WHERE email = :email");
    $sql->execute(["email" => $email]);
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
function addingUser(string $username, string $email, string $password, int $idRole): void {
    $pdo = connexionPDO();
    $sql = $pdo->prepare("INSERT INTO users(username, email, password, idRole) VALUES(:username, :email, :password, :idRole)");

    // Utilisation de execute avec un tableau associatif
    $sql->execute([
        ":username" => $username,
        ":email" => $email,
        ":password" => $password,
        ":idRole" => $idRole
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

// function addRoleColumnIfNotExists(): void {
//     $pdo = connexionPDO();

//     // Check if the column already exists
//     $sqlCheck = $pdo->query("SHOW COLUMNS FROM users LIKE 'role'");
//     $columnExists = $sqlCheck->rowCount() > 0;

//     if (!$columnExists) {
//         // If the column doesn't exist, add it
//         $sql = $pdo->query("ALTER TABLE users ADD COLUMN role VARCHAR(255) DEFAULT 'user'");
//         $sql->execute();
//     }
// }

function getUserRole(int $id_roleUser): string|bool {
    $pdo = connexionPDO();
    $sql = $pdo->prepare("SELECT role.NomRole FROM role INNER JOIN users ON role.idRole = users.idRole WHERE users.id_User = ?");
    $sql->execute([$id_roleUser]);
    $result = $sql->fetchColumn();
    return $result !== false ? $result : false;
}

function getRoleIdByName(string $id_Role): int|bool {
    $pdo = connexionPDO();
    $sql = $pdo->prepare("SELECT idRole FROM role WHERE NomRole = ?");
    $sql->execute([$id_Role]);
    $result = $sql->fetchColumn();
    return $result ? (int)$result : false;
}




?>
