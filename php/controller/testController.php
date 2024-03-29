<?php
if (session_status()===PHP_SESSION_NONE) {  // si session pas démarré, on la démarre
    session_start();
}
require __DIR__ . "/../../services/_userShouldBeLogged.php";
require __DIR__ . "/../model/userModel.php";

function gestionConnexionEnregistrement() {
    userShouldBeLogged(false, "/");

    $email = $password = $identifiantInscription = $emailInscription = $passwordInscription = "";
    $error = [];
    $regexPass = "/^(?=.*[!?@#$%^&*+-])(?=.*[0-9])(?=.*[A-Z])(?=.*[a-z]).{6,}$/";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['connecter'])) {
            // Traitement pour la connexion
            if (empty($_POST['email']) || empty($_POST['password'])) {
                $error["email"] = "Veuillez entrer un email";
                $error["password"] = "Veuillez entrer un password";
            } else {
                    $email = trim($_POST['email']);
                    $password = trim($_POST['password']);

                    // Effectuer le traitement de connexion
                    $userEmail = getUserByEmail($email);

                    if ($userEmail) {
                        if (password_verify($password, $userEmail["password"])) {
                            $_SESSION["logged"] = true;
                            $_SESSION["username"] = $userEmail["username"];
                            $_SESSION["id_User"] = $userEmail["id_User"];
                            $_SESSION["email"] = $userEmail["email"];
                            
                            // Utilisez la nouvelle fonction pour obtenir le rôle de l'utilisateur
                            $_SESSION["role"] = getUserRole($userEmail["id_User"]);
                    
                            $_SESSION["expire"] = time() + 3600;
                    
                            // Redirection basée sur le rôle
                            if ($_SESSION["role"] === "Admin") {
                                header("Location: /compteAdmin");
                                exit;
                            } else if ($_SESSION["role"] === "user") {
                                header("Location: /compteUser");
                                exit;
                            }
                        } else {
                            $error["connecter"] = "Email ou Mot de Passe Incorrecte (password)";
                        }
                    }
            }
        } elseif (isset($_POST['inscription'])) {
            // Traitement pour l'inscription
            if (empty($_POST['identifiant']) || empty($_POST['emailInscription']) || empty($_POST['passwordInscription']) || empty($_POST['passwordInscriptionBis'])) {
                $error["inscription"] = "Veuillez remplir tous les champs.";
            } else {
                $identifiantInscription = clean_data($_POST['identifiant']);
                $emailInscription = clean_data($_POST['emailInscription']);
                $passwordInscription = trim($_POST['passwordInscription']);
                $passwordInscriptionBis = trim($_POST['passwordInscriptionBis']);

                // Effectuer le traitement d'inscription
                $userEmailInscription = getUserByEmail($emailInscription);

                if ($userEmailInscription) {
                    $error["emailInscription"] = "Cet email est déjà enregistré";
                } else {
                    if (!preg_match("/^[a-zA-Z' -]{2,25}$/", $identifiantInscription)) {
                        $error["identifiant"] = "Veuillez saisir un nom d'identifiant valide";
                    }

                    if (!filter_var($emailInscription, FILTER_VALIDATE_EMAIL)) {
                        $error["emailInscription"] = "Veuillez saisir un email valide";
                    }

                    if (!preg_match($regexPass, $passwordInscription)) {
                        $error["passwordInscription"] = "Veuillez saisir un mot de passe valide";
                    }

                    if ($passwordInscription !== $passwordInscriptionBis) {
                        $error["passwordInscriptionBis"] = "Veuillez saisir le même mot de passe";
                    }

                    if (empty($error)) {
                        $passwordInscription = password_hash($passwordInscription, PASSWORD_DEFAULT);
                       // On met le rôle d'un nouvel utilisateur par défaut à user
                        $idRole = getRoleIdByName('user');
                        addingUser($identifiantInscription, $emailInscription, $passwordInscription, $idRole);

                        $_SESSION['inscription_message'] = 'Inscription réussie !';

                        header("Location: /compte");
                        exit;
                    }
                }
            }
        }
    }
    require __DIR__ . "/../view/page_compte.php";
}



