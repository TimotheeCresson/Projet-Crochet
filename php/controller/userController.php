<?php 

require __DIR__ ."/../../services/_userShouldBeLogged.php";
require __DIR__ ."/../model/userModel.php";

function enregistrement(): void {
    userShouldBeLogged(false, "../controller/authController.php");

    $identifiant = $emailInscription = $passwordInscription = "";
    $error = [];
    $regexPass = "/^(?=.*[!?@#$%^&*+-])(?=.*[0-9])(?=.*[A-Z])(?=.*[a-z]).{6,}$/";

    if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['inscription'])) {
        // traitement identifiant
        if (empty($_POST['identifiant'])) {
            $error["identifiant"] = `Veuillez saisir un nom d'identification`;
        }
        else {
            $identifiant = clean_data($_POST["identifiant"]);
            if (!preg_match("/^[a-zA-Z' -]{2,25}$/", $identifiant)) {
                $error["identifiant"] = "Veuillez saisir un nom d'identifiant valide";
            }
        }
        // Traitement email
        if (empty($_POST["emailInscription"])) {
            $error["emailInscription"] = "Veuillez saisir un email";
        }
        else {
            $emailInscription = clean_data($_POST["emailInscription"]);

            if(!filter_var($emailInscription, FILTER_VALIDATE_EMAIL))
            {
                $error["email"] = "Veuillez saisir un email valide";
            }
            $resultat = getUserByEmail($emailInscription);
            if($resultat)
            {
                $error["emailInscription"] = "Cet email est déjà enregistré";
            }
        }
        // traitement du mot de passe
        if(empty($_POST["passwordInscription"]))
        {
            $error["passwordInscription"] = "Veuillez saisir un mot de passe";
        }
        else
        {
            $passwordInscription = trim($_POST["passwordInscription"]);
            if(!preg_match($regexPass, $passwordInscription))
            {
                $error["password"] = "Veuillez saisir un mot de passe valide";
            }
            else
            {
                $passwordInscription = password_hash($passwordInscription, PASSWORD_DEFAULT);
            }
        }
        // Traitement vérification du mot de passe
        if(empty($_POST["passwordInscriptionBis"]))
        {
            $error["passwordInscriptionBis"] = "Veuillez saisir à nouveau votre mot de passe";
        }
        else if($_POST["passwordInscriptionBis"] !== $_POST["passwordInscription"])
        {
            $error["passwordInscriptionBis"] = "Veuillez saisir le même mot de passe";
        }
        // Envoi des données :
        if(empty($error))
        {
            addingUser($identifiant, $emailInscription, $passwordInscription);
            
            header("Location: /");
            exit;
        }
    }
    require __DIR__ . "/../view/page_compte.php";
}
enregistrement();