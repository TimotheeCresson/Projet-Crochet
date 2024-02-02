<?php
function addArticleToJson($category, $id, $nom, $prix, $description) {
    // Charger le contenu actuel du fichier JSON
    $jsonFile = __DIR__ . '/../../../data.json';
    $jsonContent = file_get_contents($jsonFile);

    // Décoder le contenu JSON en tableau PHP
    $articles = json_decode($jsonContent, true);

    // Vérifier si la catégorie existe, sinon la créer
    if (!isset($articles[$category])) {
        $articles[$category] = [];
    }

    // Ajouter le nouvel article
    $newArticle = [
        'id' => $id,
        'nom' => $nom,
        'prix' => $prix,
        'description' => $description
    ];

    $articles[$category][] = $newArticle;

    // Encoder le tableau en JSON avec l'option JSON_PRETTY_PRINT
    $newJsonContent = json_encode($articles, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

    // Écrire le nouveau contenu dans le fichier JSON
    if (file_put_contents($jsonFile, $newJsonContent) !== false) {
        // Retourner le nouveau contenu JSON
        return $newJsonContent;
    } else {
        throw new RuntimeException("Erreur lors de l'écriture dans le fichier JSON.");
    }
}
?>
