<?php
// Inclure le fichier contenant la fonction generateNewArticleId
require_once 'genererId.php';

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

        // Inclure le fichier contenant la fonction addArticleToJson
        require_once 'ajouterArticle.php';

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

<!-- Formulaire HTML -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un article</title>
</head>
<body>
    <div class="containerUserCompte">
        <h1>Ajouter un article</h1>

        <form action="" method="post">
            <label for="category">Catégorie:</label>
            <input type="text" id="category" name="category" required>

            <label for="nom">Nom:</label>
            <input type="text" id="nom" name="nom" required>

            <label for="prix">Prix:</label>
            <input type="number" name="prix" id="prix" required>

            <label for="description">Description:</label>
            <textarea name="description" id="description" cols="30" rows="10"></textarea>

            <button type="submit">Ajouter l'article</button>
            <a href="/compteAdmin">Retour page Admin</a>
        </form>
    </div>
</body>
</html>
