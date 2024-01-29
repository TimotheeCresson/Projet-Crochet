<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require __DIR__ . "/../../services/_userShouldBeLogged.php";
require __DIR__ . "/../model/userModel.php";
require __DIR__ . "/getArticleJson.php";
require __DIR__ . "/deleteArticle.php";

if (!$_SESSION["role"] === "Admin") {
    header("Location: /view/page_compte");
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

<?php require __DIR__ . "/../template/_header.php"; ?>


<div class="containerUserCompte">
    <div class="sidebarAdmin">
        <div class="userAdmission">
            <h1>Dashboard Admistrateur</h1>
        </div>

    <!-- Toggle User List Button -->
        <a class="toggle-button" onclick="toggleUserList()">
            <i class="fa-solid fa-list"></i>
            <span>Utilisateurs</span>
        </a>

        <!-- Toggle Article List Button -->
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

        <form method="post" action="/php/view/page_compte.php">
            <input type="submit" name="deconnexion" class="decoAdmin" value="Déconnexion">
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

<?php
require(__DIR__ . "/../template/_footer.php");
?>
