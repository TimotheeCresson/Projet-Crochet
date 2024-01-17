<?php 
require __DIR__ . "/../../services/_userShouldBeLogged.php";
require __DIR__ . "/../model/userModel.php";

function connexionUser() {
    userShouldBeLogged(false, "../view/page_compte.php");

    $username = $email= $password = "";
    $error = [];

    if ($_SERVER['REQUEST_METHOD']=== 'POST' && isset( $_POST['connecter'])) {
        var_dump("login");
        if (empty($_POST['usernameOrEmail'])) {
            $error["usernameOrEmail"] = 'Veuillez entrer votre identifiant ou votre adresse mail';
        } else {
        $input = trim($_POST['usernameOrEmail']);
    
        // Déterminer si l'entrée est un email ou un identifiant
        if (filter_var($input, FILTER_VALIDATE_EMAIL)) {
            // L'entrée est un email
            $email = $input;
            $username = null;
        } else {
            // L'entrée est un identifiant
            $username = $input;
            $email = null;
        }
    }
    if (empty($_POST["password"])) {
        $error["password"] = "Veuillez entrer votre mot de passe";
    }
    else {
        $password = trim($_POST["password"]);
    }

    if (empty($error)) {
        $userEmail = getUserByEmail($email);
        $userIdentifiant = getUserByUsername($username);

        $user = $userEmail ?: $userIdentifiant;
        // on vérifie si le $user est bon et si le password est bon
        if ($user && password_verify($password, $user["password"])) {
            $_SESSION["logged"] = true;
            $_SESSION["username"] = $user["username"];
            $_SESSION["idUser"] = $user["idUser"];
            // Et si je souhaite créer une durée limite de connexion
            $_SESSION["expire"] = time() + 3600;
                header("Location: /../../view/page_compte.php");
                exit;
            }
            else {
                $error["connecter"] = "Email/Identifiant ou Mot de Passe Incorrecte (password)";
            }
        }
        else {
            $error["connecter"] = "Email/Identifiant ou Mot de Passe Incorrecte (email)";
        }
    }
    require __DIR__ . "/../view/page_compte.php";
}
connexionUser();
// function deconnexionUser() {
//     userShouldBeLogged(true, "../view/deconnexionUser.php");

//     unset($_SESSION);
//     session_destroy();

//     setcookie("PHPSESSID", "", time()-3600);
    
//     header("Location: ../../../view/page_compte.php");
//     exit;
// }