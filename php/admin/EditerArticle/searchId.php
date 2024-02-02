<?php
function generateNewArticleId($category) {
    // Charger le contenu actuel du fichier JSON
    $jsonFile = __DIR__ . '/../../../data.json';
    $jsonContent = file_get_contents($jsonFile);

    // Décoder le contenu JSON en tableau PHP
    $articles = json_decode($jsonContent, true);

    // Vérifier si la catégorie existe
    if (isset($articles[$category]) && is_array($articles[$category])) {
        $existingIds = array_column($articles[$category], 'id');

        // Générer un nouvel ID qui n'existe pas encore
        $newId = generateUniqueId($existingIds);

        return $newId;
    } else {
        // Gérer le cas où $articles[$category] n'est pas défini ou n'est pas un tableau
        return 1; // Ou une valeur par défaut appropriée
    }
}

function generateUniqueId($existingIds) {
    $newId = 1;

    // Incrémenter l'ID jusqu'à trouver un ID unique
    while (in_array($newId, $existingIds)) {
        $newId++;
    }

    return $newId;
}
?>
