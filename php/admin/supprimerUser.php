<?php
require __DIR__ . "/../model/userModel.php";

if (isset($_GET["id_User"]) && !empty($_GET["id_User"])) {
    $get_id_User = $_GET["id_User"];

    
    $recupUser = getUserById($get_id_User);

    
    if (count($recupUser) > 0) {
        
        $supprimerUser = deleteUserByIsID($get_id_User);

        if ($supprimerUser) {
            echo "L'utilisateur a été supprimé avec succès.";
        } else {
            echo "Erreur lors de la suppression de l'utilisateur.";
        }

        // Redirection vers adminCompte.php
        header("Location: /compteAdmin");
        exit; 
    } else {
        echo "Aucun utilisateur n'a été trouvé avec cet identifiant.";
    }
} else {
    echo "L'identifiant n'a pas été récupéré.";
}
?>
