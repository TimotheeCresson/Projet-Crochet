<?php 
// session_start();
// $bdd = new PDO('mysql:host=localhost;dbname=compte_site_crochet;charset=utf8;', 'root', '');
// if(isset($_POST['connecter'])) {
//     if(!empty($_POST['username']) AND !empty($_POST['password'])) {
//         $username = htmlspecialchars($_POST['username']);
//         $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

//         $insertUser = $bdd->prepare('INSERT INTO users(username, password) VALUES(?,?)');

//         $insertUser->execute(array($username, $password));
//     } else {
//         echo "Veuillez compléter tous les champs...";
//     }
// }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site vitrine Crochet</title>
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <script src="main.js" defer type="module"></script> -->
</head>
<body>
<div class="container">
    <div class="formulaire">
        <div class="formConnection">
            <div class="formColumn">
            <h2>Se connecter</h2>
                <form method="post" action="">
                    <label for="usernameOrEmail">Identifiants ou email:</label>
                    <input type="text" name="usernameOrEmail" required>
                    <br>
                    <span class="error"><?php echo $error["usernameOrEmail"]??""; ?></span>
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
</div>
</body>
</html>