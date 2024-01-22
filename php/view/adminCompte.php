<?php 
require(__DIR__."/../template/_header.php");
?>

<div class="containerUserCompte">
    <div class="userAdmission">
        <h1>Administrateur</h1>
    </div>
    
    <form method="post" action="/php/controller/authController.php">
        <input type="submit" name="deconnexion" value="Déconnexion">
    </form>
    <span class="erreur"><?php echo $error["deconnexionUser"] ?? ""; ?></span>
</div>

<?php 
require(__DIR__."/../template/_footer.php");
?>
