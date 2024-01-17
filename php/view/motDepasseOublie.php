<?php 
require(__DIR__."/../template/_header.php");
?>
<div class="container">
    <div class="textMotdepassePerdu">
        <h2>Mot de passe Oublié</h2>
        <p>
            Veuillez saisir votre identifiant ou email.
            Vous allez recevoir un lien sur votre boîte mail contenant une réinitialisation de mot de passe
        </p>
        
    </div>
    <div class="inputMotdepassePerdu">
        <label for="inputMdpOublie">Votre email ou identifiant :</label>
        <input type="text" name="inputMdpOublie" id="inputMdpOublie">
        <input type="submit" value="Réinitialiser votre mot de passe">
    </div>
</div>

<?php 
require(__DIR__."/../template/_footer.php");
?>