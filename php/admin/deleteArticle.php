<?php
function deleteArticleFromJson($category, $articleId) {
    $jsonFile = __DIR__ . '/../../data.json';

    // Vérifier si le fichier existe
    if (file_exists($jsonFile)) {
        // Lire le contenu actuel du fichier JSON
        $jsonContent = file_get_contents($jsonFile);
        
        // Décoder le contenu JSON en tableau PHP
        $articles = json_decode($jsonContent, true);

        // Vérifier si la catégorie existe
        if (isset($articles[$category])) {
            // Vérifier si l'ID de l'article existe
            if (isset($articles[$category][$articleId])) {
                // Supprimer l'article avec l'ID spécifié de la catégorie spécifiée
                unset($articles[$category][$articleId]);

                // Réorganiser les clés du tableau après la suppression
                $articles[$category] = array_values($articles[$category]);

                // Encoder le tableau en JSON
                $newJsonContent = json_encode($articles);

                // Écrire le nouveau contenu dans le fichier JSON
                file_put_contents($jsonFile, $newJsonContent);

                // Redirection vers adminCompte.php
                header("Location: adminCompte.php");
                exit;
            } else {
                echo "L'ID de l'article n'existe pas.";
            }
        } else {
            echo "La catégorie n'existe pas.";
        }
    } else {
        echo "Le fichier data.json n'existe pas.";
    }
}

?>
