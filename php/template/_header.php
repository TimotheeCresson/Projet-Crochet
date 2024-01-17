<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site vitrine Crochet</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="/../../style.css">
    <script src="/../../main.js" defer type="module"></script>
</head>
<body>
    <header>
        <div class="imgHeader"></div>
        <label for="check" class="open-menu"><i class="fa-solid fa-house"></i></label>
        <nav class="barreNav barreNavDisplay">
            <ul>
                <input type="checkbox" id="check">
                    <li><a href="/index.php" id="home">Boutique</a></li>
                    <li><a href="/php/controller/authController.php" id="compteLink">Compte</a></li>
                    <li><a href="/php/view/phpLink/panier.php" id="panier">Panier</a></li>
                    <li><a href="/php/view/phpLink/about.php" id="about">À Propos</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <label for="check" class="close-menu"><i class="fa-solid fa-circle-xmark"></i></label>
            </ul>
        </nav>
    </header>