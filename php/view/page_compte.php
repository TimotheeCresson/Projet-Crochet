<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require(__DIR__."/../template/_header.php");
?>
<div class="containerCompte">
    <div class="formulaire">
        <div class="formConnection">
            <div class="formColumn">
            <h2>Se connecter</h2>
                <form method="post" action="">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" required>
                    <br>
                    <span class="error"><?php echo $error["email"]??""; ?></span>
                    <br>
                    <label for="password">Mot de passe :</label>
                    <input type="password" name="password" id="password" required>
                    <br>
                    <span class="error"><?php echo $error["password"]??""; ?></span>
                    <br>
                    <input type="submit" name="connecter" id="connecter" value="Se connecter" class="connectBtn">
                    <br>
                    <span class="error"><?php echo $error["connecter"]??""; ?></span>
                </form>
            </div>
            <a href="/mdpOublie" class="mdpOublie">Mot de passe oublié ?</a>
        </div>
    </div>

    <div class="formulaire">
        <div class="formEnregistrement">
            <h2>Vous n'avez pas encore de compte?</h2>
            <h3>Créez un compte</h3>
            <div class="formColumn">
                <form method="post" action="">
                    <label for="identifiant">Identifiant :</label>
                    <input type="text" name="identifiant" id="identifiant" required>
                    <span class="erreur"><?php echo $error["identifiant"]??""; ?></span>
                    <br>
                    <label for="email">Email :</label>
                    <input type="text" name="emailInscription" id="emailInscription" required>
                    <span class="erreur"><?php echo $error["emailInscription"]??""; ?></span> 
                    <br>
                    <label for="password">Mot de passe:</label>
                    <input type="password" name="passwordInscription" id="passwordInscription" required>
                    <span class="erreur"><?php echo $error["passwordInscription"]??""; ?></span> 
                    <br>
                    <label for="password">Confirmer votre mot de passe:</label>
                    <input type="password" name="passwordInscriptionBis" id="passwordInscriptionBis" required>
                    <span class="erreur"><?php echo $error["passwordInscriptionBis"]??""; ?></span> 
                    <br>
                    <input type="submit" value="Enregistrement" name="inscription" id="inscription"  class="connectBtn">
                </form>

                <?php
                if (isset($_SESSION['inscription_message']) && !empty($_SESSION['inscription_message'])) {
                    echo '<p>' . $_SESSION['inscription_message'] . '</p>';
                    
                    // Supprimer la variable de session
                    unset($_SESSION['inscription_message']);
                }      
                ?>
            </div>
        </div>
    </div>
</div>

<?php 
require(__DIR__."/../template/_footer.php");
?>