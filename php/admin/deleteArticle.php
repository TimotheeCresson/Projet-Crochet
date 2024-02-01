<?php
function deleteArticleFromJson($articleId, $category) {
    $jsonFile = __DIR__ . '/../../data.json';
    $jsonContent = null;

    // Vérifier si le fichier existe
    if (file_exists($jsonFile)) {
        // Lire le contenu actuel du fichier JSON
        $jsonContent = file_get_contents($jsonFile);

        // Décoder le contenu JSON en tableau PHP
        $articles = json_decode($jsonContent, true);

        // Vérifier si la catégorie existe
        if (isset($articles[$category])) {
            // Rechercher la clé de l'élément à supprimer
            $keyToDelete = array_search($articleId, array_column($articles[$category], 'id'));

            // Vérifier si l'élément a été trouvé
            if ($keyToDelete !== false) {
                // Supprimer l'élément du tableau
                unset($articles[$category][$keyToDelete]);

                // Réorganiser les clés du tableau après la suppression
                $articles[$category] = array_values($articles[$category]);

                // Encoder le tableau en JSON avec l'option JSON_PRETTY_PRINT
                // JSON_UNESCAPED_UNICODE Cette option permet de ne pas échapper les caractères Unicode lors de l'encodage en JSON. (Par exemple, la lettre "é" pourrait être représentée comme "\u00e9".)
                // JSON_PRETTY_PRINT Cette option ajoute une indentation et des sauts de ligne à la sortie JSON, rendant le fichier JSON plus lisible. 
                $newJsonContent = json_encode($articles, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

                // Écrire le nouveau contenu dans le fichier JSON
                if (file_put_contents($jsonFile, $newJsonContent) !== false) {
                    // Retourner le nouveau contenu JSON
                    return $newJsonContent;
                } else {
                    echo "Erreur lors de l'écriture dans le fichier JSON.";
                    return;
                }
            } else {
                echo "L'ID de l'article n'a pas été trouvé dans la catégorie spécifiée.";
                return;
            }
        } else {
            echo "La catégorie n'existe pas.";
            return;
        }
    } else {
        echo "Le fichier data.json n'existe pas.";
        return;
    }

    // En cas d'erreur, retourner le contenu JSON actuel
    return $jsonContent;
}
?>
