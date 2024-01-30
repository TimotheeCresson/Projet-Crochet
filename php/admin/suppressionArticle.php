<?php
if (isset($_POST['deleteArticles']) && isset($_POST['selectedArticles'])) {
    foreach ($_POST['selectedArticles'] as $selectedArticle) {
        // Divisez la valeur de chaque case à cocher pour obtenir l'id et la catégorie
        list($articleId, $category) = explode('-', $selectedArticle);

        // Inclure la fonction de suppression
        require_once 'deleteArticle.php';

        // Appeler la fonction de suppression
        deleteArticleFromJson($category, $articleId);
    }

    // Rediriger vers la page d'administration après la suppression
    header("Location: /adminCompte.php");
    exit;
}
?>
