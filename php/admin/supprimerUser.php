<?php
require __DIR__ . "/../model/userModel.php";

if (isset($_GET["id_User"]) && !empty($_GET["id_User"])) {
    $get_id_User = $_GET["id_User"];

    // Assuming getUserById returns an array
    $recupUser = getUserById($get_id_User);

    // Checking if the array has elements
    if (count($recupUser) > 0) {
        // Assuming deleteUserByIsID performs the deletion and returns a result
        $supprimerUser = deleteUserByIsID($get_id_User);

        if ($supprimerUser) {
            echo "L'utilisateur a été supprimé avec succès.";
        } else {
            echo "Erreur lors de la suppression de l'utilisateur.";
        }

        // Redirection vers adminCompte.php
        header("Location: adminCompte.php");
        exit; // Arrête l'exécution du script ici
    } else {
        echo "Aucun utilisateur n'a été trouvé avec cet identifiant.";
    }
} else {
    echo "L'identifiant n'a pas été récupéré.";
}
?>
