<?php 
require(__DIR__."/../template/_header.php");
require __DIR__ ."/../../services/_userShouldBeLogged.php";

userShouldBeLogged(true, "/");


if (isset($_POST["deconnexion"])) {
    require __DIR__."/../controller/deconnexionCompte.php"; 
    deconnexionUser();
}
?>

<div class="containerUserCompte">
    <div class="userAdmission">
        <p>Bonjour, bienvenue, votre inscription s'est déroulée avec succès</p>
    </div>
    
    <form method="post" action="/php/view/page_compte.php">
        <input type="submit" name="deconnexion" value="Déconnexion">
    </form>
    
    <span class="erreur"><?php echo $error["deconnexionUser"] ?? ""; ?></span>
</div>

<?php 
require(__DIR__."/../template/_footer.php");
?>
