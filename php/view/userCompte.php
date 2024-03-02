<?php 
require __DIR__."/../template/_header.php";
// require __DIR__ ."/../../services/_userShouldBeLogged.php";
require __DIR__ . "/../controller/deconnexionCompte.php";


userShouldBeLogged(true, "/");

?>

<div class="containerUserCompte">
    <div class="userAdmission">
        <p>Bonjour, bienvenue, vous voici connecté</p>
    </div>
    
    <form method="post" action="/deconnexion">
        <input type="submit" name="deconnexion" value="Déconnexion">
    </form>
    
    <span class="erreur"><?php echo $error["deconnexionUser"] ?? ""; ?></span>
</div>

<?php 
require(__DIR__."/../template/_footer.php");
?>
