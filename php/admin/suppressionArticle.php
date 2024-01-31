<?php
// Inclure le fichier contenant la fonction deleteArticleFromJson
require_once 'deleteArticle.php';

// Récupérer l'ID de l'article et la catégorie 
$articleIdToDelete = isset($_GET['id']) ? $_GET['id'] : null;
$categoryToDelete = isset($_GET['category']) ? $_GET['category'] : null;

// Vérifier si les valeurs sont présentes
if ($articleIdToDelete !== null && $categoryToDelete !== null) {
    // Supprimer l'article et obtenir le nouveau contenu JSON
    $newJsonContent = deleteArticleFromJson($articleIdToDelete, $categoryToDelete);

    // Écrire le nouveau contenu JSON dans le fichier
    file_put_contents(__DIR__ . '/../../data.json', $newJsonContent);

    // Afficher un message de succès ou effectuer d'autres actions si nécessaire
    echo "L'article a été supprimé avec succès.";
} else {
    // Gérer l'absence d'ID de l'article ou de catégorie
    echo "L'ID de l'article ou la catégorie n'est pas spécifié.";
}

?>
