<?php 
require(__DIR__."/../template/_header.php");
?>
<div class="container">
    <div class="formulaire">
        <div class="formConnection">
            <div class="formColumn">
            <h2>Se connecter</h2>
                <form method="post" action="">
                    <label for="email">Email:</label>
                    <input type="email" name="email" required>
                    <br>
                    <span class="error"><?php echo $error["email"]??""; ?></span>
                    <br>
                    <label for="password">Mot de passe :</label>
                    <input type="password" name="password" required>
                    <br>
                    <span class="error"><?php echo $error["password"]??""; ?></span>
                    <br>
                    <input type="submit" name="connecter" value="Se connecter">
                    <br>
                    <span class="error"><?php echo $error["connecter"]??""; ?></span>
                </form>
            </div>
            <a href="/php/view/motDepasseOublie.php">Mot de passe oublié</a>
        </div>
    </div>

    <div class="formulaire">
        <div class="formEnregistrement">
            <h2>Vous n'avez pas encore de compte?</h2>
            <h3>Créez un compte</h3>
            <div class="formColumn">
                <form method="post" action="">
                    <label for="identifiant">Identifiant :</label>
                    <input type="text" name="identifiant" required>
                    <span class="erreur"><?php echo $error["identifiant"]??""; ?></span>
                    <br>
                    <label for="email">Email :</label>
                    <input type="text" name="emailInscription" required>
                    <span class="erreur"><?php echo $error["emailInscription"]??""; ?></span> 
                    <br>
                    <label for="password">Mot de passe:</label>
                    <input type="password" name="passwordInscription" required>
                    <span class="erreur"><?php echo $error["passwordInscription"]??""; ?></span> 
                    <br>
                    <label for="password">Confirmer votre mot de passe:</label>
                    <input type="password" name="passwordInscriptionBis" required>
                    <span class="erreur"><?php echo $error["passwordInscriptionBis"]??""; ?></span> 
                    <br>
                    <input type="submit" value="Enregistrement" name="inscription">
                </form>
            </div>
        </div>
    </div>
</div>

<?php 
require(__DIR__."/../template/_footer.php");
?>