<?php
// Inclure le fichier contenant la fonction addArticleToJson
require_once 'addArticle.php';

// Récupérer les données d'entrée du formulaire
$categoryToAdd = isset($_POST['category']) ? $_POST['category'] : null;
$nomToAdd = isset($_POST['nom']) ? $_POST['nom'] : null;
$prixToAdd = isset($_POST['prix']) ? $_POST['prix'] : null;
$descriptionToAdd = isset($_POST['description']) ? $_POST['description'] : null;

// Vérifier si les valeurs sont présentes
if ($categoryToAdd !== null && $nomToAdd !== null && $prixToAdd !== null && $descriptionToAdd !== null) {
    try {
        // Générer un nouvel ID en fonction des ID existants dans la catégorie
        $newArticleId = generateNewArticleId($categoryToAdd);

        // Ajouter l'article avec le nouvel ID généré
        $newJsonContent = addArticleToJson($categoryToAdd, $newArticleId, $nomToAdd, $prixToAdd, $descriptionToAdd);

        // Afficher un message de succès ou effectuer d'autres actions si nécessaire
        echo "L'article a été ajouté avec succès.";

        // Redirection après l'ajout
        header("Location: /compteAdmin");
        exit;
    } catch (InvalidArgumentException $e) {
        echo "Erreur : " . $e->getMessage();
    } catch (RuntimeException $e) {
        echo "Erreur : " . $e->getMessage();
    }
} else {
    // Gérer l'absence de certaines données d'entrée
    echo "Certaines données d'entrée ne sont pas spécifiées.";
}
?>
