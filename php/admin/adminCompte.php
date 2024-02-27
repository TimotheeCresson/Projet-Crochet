<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// require __DIR__ . "/../../services/_userShouldBeLogged.php";
require __DIR__ . "/../model/userModel.php";
require __DIR__ . "/../controller/deconnexionCompte.php";
require __DIR__ . "/getArticleJson.php";
require __DIR__ . "/deleteArticle.php";

if (!$_SESSION["role"] === "Admin") {
    header("Location: /compte");
}

// Vérifier si l'utilisateur est connecté en tant qu'administrateur
userShouldBeLogged(true, "/");

// Vérifier si l'utilisateur est connecté
if (isset($_SESSION['logged']) && $_SESSION['logged'] === true) {
    echo 'Vous êtes connecté.';
} else {
    echo 'Vous n\'êtes pas connecté.';
    // Éventuellement, rediriger l'utilisateur vers la page de connexion
    header("Location: /compte");
    exit;
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
    <div class="headerUserInfo" onclick="toggleLogoutContainer()">
        <p><span style="margin-right: 10px;"><i class="fa-solid fa-user"></i></span><?= $_SESSION['email'] ?></p>
        <div id="logoutContainer" class="logoutContainer" style="display: none;">
            <form method="post" action="/deconnexion">
                <span><i class="fa-solid fa-arrow-right-from-bracket"></i></span>
                <input type="submit" name="deconnexion" class="deconnectAdmin" value="Déconnexion">
            </form>
            <span class="erreur"><?php echo $error["deconnexionUser"] ?? ""; ?></span>
        </div>
    </div>
    

        <div id="userList" style="display: none;">
            <?php 
            $recupUsers = getEveryUsers();
            foreach ($recupUsers as $user):
                if ($user['role'] === 'user'):
            ?>
            <!-- Suppression d'un utilisateeur géré en js plus bas  -->
            <p>
                <?= $user['username'] ?> - <?= $user['email'] ?> - <?= $user['role'] ?> - <a href="#" style="color: red; text-decoration: none;" onclick="confirmDeleteUser(<?= $user['id_User']; ?>)">Supprimer l'utilisateur</a>
            </p>
            <?php endif; ?>
            <?php endforeach; ?>
        </div>
    
        <div id="articleList" style="display: none;">
        
        <a href="/editArticle">Éditer</a>
        <?php 
        $categories = ['nouveautés', 'animaux', 'trapilho', 'accessoire', 'patrons'];
        foreach ($categories as $category):
        ?>
        <!-- ucfirst (mettre en majuscule la première lettre du mot)  -->
            <h2><?= ucfirst($category) ?></h2>

            <?php  $articles = getArticlesFromJson()[$category];
            foreach ($articles as $article):
            ?>
            
            <p>
                <?= $article['nom'] ?> - <?= $article['prix'] ?> € <a href="#" onclick="confirmDeleteArticle(<?= $article['id'] ?>, '<?= $category ?>');" style="color: red; text-decoration: none;"> Supprimer l'article</a>
            </p>

            <?php 
                endforeach;
            ?>
        <?php 
            endforeach;
        ?>
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

    function toggleLogoutContainer() {
    var logoutContainer = document.getElementById("logoutContainer");
    logoutContainer.style.display = (logoutContainer.style.display === 'none' || logoutContainer.style.display === '') ? 'block' : 'none';
}

    function confirmDeleteUser(userId) {
    // Utilisation de la boîte de dialogue de confirmation
    var confirmation = confirm("Êtes-vous sûr de vouloir supprimer cet utilisateur?");

    // Si l'utilisateur clique sur "OK", redirigez vers la page de suppression
    if (confirmation) {
        window.location.href = "/supprimerUser?id_User=" + userId;
    } else {
        // Sinon, je ne fais rien
    }
}

function confirmDeleteArticle(articleId, category) {
    // Utilisation de la boîte de dialogue de confirmation
    var confirmation = confirm("Êtes-vous sûr de vouloir supprimer cet article?");

    // Si l'utilisateur clique sur "OK", redirigez vers la page de suppression
    if (confirmation) {
        var deleteUrl = "/suppressionArticle?id=" + articleId + "&category=" + category;
        window.location.href = deleteUrl;
    } else {
        // Sinon, je ne fais rien
    }
}


</script>
