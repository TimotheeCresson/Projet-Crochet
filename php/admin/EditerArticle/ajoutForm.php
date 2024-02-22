<?php
require_once 'searchId.php';
require_once 'addArticle.php';

$categoryToAdd = isset($_POST['category']) ? $_POST['category'] : null;
$nomToAdd = isset($_POST['nom']) ? $_POST['nom'] : null;
$prixToAdd = isset($_POST['prix']) ? $_POST['prix'] : null;
$descriptionToAdd = isset($_POST['description']) ? $_POST['description'] : null;

if ($categoryToAdd !== null && $nomToAdd !== null && $prixToAdd !== null && $descriptionToAdd !== null) {
    try {
        $newArticleId = generateNewArticleId($categoryToAdd);
        addArticleToJson($categoryToAdd, $newArticleId, $nomToAdd, $prixToAdd, $descriptionToAdd);
        echo "L'article a été ajouté avec succès.";
        header("Location: /compteAdmin");
        exit;
    } catch (InvalidArgumentException $e) {
        echo "Erreur : " . $e->getMessage();
    } catch (RuntimeException $e) {
        echo "Erreur : " . $e->getMessage();
    }
} else {
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
