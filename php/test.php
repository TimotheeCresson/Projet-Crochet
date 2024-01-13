<?php
require_once __DIR__ . "/model/userModel.php";


// Test de la fonction getEveryUsers()
$users = getEveryUsers();
var_dump($users);

// Test de la fonction getUserById()
$userById = getUserById(1);
var_dump($userById);

// Test de la fonction getUserByEmail()
$userByEmail = getUserByEmail("example@email.com");
var_dump($userByEmail);

// Test de la fonction addingUser()
addingUser("NouvelUtilisateur", "nouveau@email.com", "motdepasse");

// Test de la fonction deleteUserByIsID()
deleteUserByIsID(2);

// Test de la fonction updateUserByIsId()
updateUserByIsId(1, "NouveauNom", "nouveau@email.com", "nouveaumotdepasse");
?>
