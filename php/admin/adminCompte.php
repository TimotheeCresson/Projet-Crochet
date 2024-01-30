<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require __DIR__ . "/../../services/_userShouldBeLogged.php";
require __DIR__ . "/../model/userModel.php";
require __DIR__ . "/getArticleJson.php";
require __DIR__ . "/deleteArticle.php";

if (!$_SESSION["role"] === "Admin") {
    header("Location: /compte");
}

// Vérifier si l'utilisateur est connecté en tant qu'administrateur
userShouldBeLogged(true, "/");

// Traitement de la déconnexion
if (isset($_POST["deconnexion"])) {
    require __DIR__ . "/../controller/deconnexionCompte.php"; 
    deconnexionUser();
}

// Vérifier si l'utilisateur est connecté
if (isset($_SESSION['logged']) && $_SESSION['logged'] === true) {
    echo 'Vous êtes connecté.';
} else {
    echo 'Vous n\'êtes pas connecté.';
    // Éventuellement, rediriger l'utilisateur vers la page de connexion
    // header("Location: /chemin/vers/page_connexion.php");
    // exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site vitrine Crochet</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/../../style.css">
    <!-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> -->
    <script src="/../../main.js" defer type="module"></script>
</head>

<div class="containerUserCompte">
    <div class="sidebarAdmin">
        <div class="adminTitle">
            <h1>Dashboard Admistrateur</h1>
        </div>

        <!-- toggle bouton users -->
        <a class="toggle-button" onclick="toggleUserList()">
            <i class="fa-solid fa-list"></i>
            <span>Utilisateurs</span>
        </a>

        <!-- toggle bouton article -->
        <a class="toggle-button" onclick="toggleArticleList()">
            <i class="fa-solid fa-list"></i>
            <span>Articles</span>
        </a>
</div>

        <div id="userList" style="display: none;">
            <?php 
            $recupUsers = getEveryUsers();
            foreach ($recupUsers as $user):
            ?>
                <p><?= $user['username'] ?><?= $user['username'] ?> - <?= $user['email'] ?> - <?= $user['role'] ?> <a href="supprimerUser.php?id_User=<?= $user['id_User']; ?>" style="color: red; text-decoration: none;">Supprimer l'utilisateur</a></p>
            <?php endforeach; ?>
        </div>
    
        <div id="articleList" style="display: none;">
        <?php 
        $categories = ['nouveautés', 'animaux', 'trapilho', 'accessoire', 'patrons'];
        foreach ($categories as $category):
        ?>
            <h2><?= ucfirst($category) ?></h2>

            <?php  $articles = getArticlesFromJson()[$category];
            foreach ($articles as $article):
            ?>
            <p><?= $article['nom'] ?> - <?= $article['prix'] ?> € - <a href="suppressionArticle.php?id=<?= $article['id'] ?>&category=<?= $category ?>" style="color: red; text-decoration: none;">Supprimer l'article</a></p>

            <?php 
                endforeach;
            ?>
        <?php 
            endforeach;
        ?>
    </div>

<<<<<<< HEAD
        <form method="post" action="compte">
=======
        <form method="post" action="/php/view/page_compte.php">
>>>>>>> 7cca76e8f4bada2c9db1cabd1ae1ef3ec123b3b7
            <input type="submit" name="deconnexion" class="deconnectAdmin" value="Déconnexion">
        </form>
        <span class="erreur"><?php echo $error["deconnexionUser"] ?? ""; ?></span>
    </div>
</div>

<script>
    // JavaScript function to toggle visibility of user list
    function toggleUserList() {
        var userList = document.getElementById("userList");
        userList.style.display = (userList.style.display === 'none' || userList.style.display === '') ? 'block' : 'none';
    }

    function toggleArticleList() {
        var articleList = document.getElementById("articleList");
        articleList.style.display = (articleList.style.display === 'none' || articleList.style.display === '') ? 'block' : 'none';
    }
</script>
<<<<<<< HEAD
=======

>>>>>>> 7cca76e8f4bada2c9db1cabd1ae1ef3ec123b3b7
