<?php
require __DIR__ . "/../../services/_userShouldBeLogged.php";
require __DIR__ . "/../model/userModel.php";

function gestionConnexionEnregistrement(): void {
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
                        if(password_verify($password, $userEmail["password"])) {
                        $_SESSION["logged"] = true;
                        $_SESSION["username"] = $userEmail["username"];
                        $_SESSION["id_User"] = $userEmail["id_User"];
                        $_SESSION["role"] = $userEmail["role"];
                        $_SESSION["expire"] = time() + 3600;

                                        
                        if ($_SESSION["role"] === "Admin") {
                            header("Location: /php/view/adminCompte.php");  // Redirect to the admin page
                            exit;
                        } else {
                            header("Location: /php/view/userCompte.php");   // Redirect to the regular user page
                            exit;
                        }
                        // header("Location: /php/view/userCompte.php");
                        // exit;
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
                        addingUser($identifiantInscription, $emailInscription, $passwordInscription);

                        header("Location: /php/view/userCompte.php");
                        exit;
                    }
                }
            }
        }
    }

    require __DIR__ . "/../view/page_compte.php";
}
gestionConnexionEnregistrement();

// function deconnexionUser() {
//     userShouldBeLogged(true, "/");

//     unset($_SESSION);
//     session_destroy();

//     setcookie("PHPSESSID", "", time()-3600);
    
//     header("Location: /");
//     exit;
//     echo "Déconnexion réussie !";
// }



// function enregistrement(): void {
//     userShouldBeLogged(false, "../controller/authController.php");

//     $identifiant = $emailInscription = $passwordInscription = "";
//     $error = [];
//     $regexPass = "/^(?=.*[!?@#$%^&*+-])(?=.*[0-9])(?=.*[A-Z])(?=.*[a-z]).{6,}$/";

//     if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['inscription'])) {
//         // traitement identifiant
//         if (empty($_POST['identifiant'])) {
//             $error["identifiant"] = `Veuillez saisir un nom d'identification`;
//         }
//         else {
//             $identifiant = clean_data($_POST["identifiant"]);
//             if (!preg_match("/^[a-zA-Z' -]{2,25}$/", $identifiant)) {
//                 $error["identifiant"] = "Veuillez saisir un nom d'identifiant valide";
//             }
//         }
//         // Traitement email
//         if (empty($_POST["emailInscription"])) {
//             $error["emailInscription"] = "Veuillez saisir un email";
//         }
//         else {
//             $emailInscription = clean_data($_POST["emailInscription"]);

//             if(!filter_var($emailInscription, FILTER_VALIDATE_EMAIL))
//             {
//                 $error["email"] = "Veuillez saisir un email valide";
//             }
//             $resultat = getUserByEmail($emailInscription);
//             if($resultat)
//             {
//                 $error["emailInscription"] = "Cet email est déjà enregistré";
//             }
//         }
//         // traitement du mot de passe
//         if(empty($_POST["passwordInscription"]))
//         {
//             $error["passwordInscription"] = "Veuillez saisir un mot de passe";
//         }
//         else
//         {
//             $passwordInscription = trim($_POST["passwordInscription"]);
//             if(!preg_match($regexPass, $passwordInscription))
//             {
//                 $error["password"] = "Veuillez saisir un mot de passe valide";
//             }
//             else
//             {
//                 $passwordInscription = password_hash($passwordInscription, PASSWORD_DEFAULT);
//             }
//         }
//         // Traitement vérification du mot de passe
//         if(empty($_POST["passwordInscriptionBis"]))
//         {
//             $error["passwordInscriptionBis"] = "Veuillez saisir à nouveau votre mot de passe";
//         }
//         else if($_POST["passwordInscriptionBis"] !== $_POST["passwordInscription"])
//         {
//             $error["passwordInscriptionBis"] = "Veuillez saisir le même mot de passe";
//         }
//         // Envoi des données :
//         if(empty($error))
//         {
//             addingUser($identifiant, $emailInscription, $passwordInscription);
            
//             header("Location: /");
//             exit;
//         }
//     }
//     require __DIR__ . "/../view/page_compte.php";
// }
// enregistrement();