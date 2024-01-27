<?php 
    function addArticleToJson($category, $newArticle) {
        $jsonFile = __DIR__ . '/../../data.json';
        // Lire le contenu actuel du fichier JSON
        $jsonContent = file_get_contents($jsonFile);
        // Décoder le contenu JSON en tableau PHP
        $articles = json_decode($jsonContent, true);

        // Ajouter le nouvel article à la catégorie spécifiée
        $articles[$category][] = $newArticle;

        // Encoder le tableau en JSON
        $newJsonContent = json_encode($articles);

        // Écrire le nouveau contenu dans le fichier JSON
        file_put_contents($jsonFile, $newJsonContent);
    }