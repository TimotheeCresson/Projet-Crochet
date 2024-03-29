<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$redirectUrl = '/compte'; // par défaut, si l'utilisateur n'est pas connecté

if (isset($_SESSION['logged']) && $_SESSION['logged'] === true) {
    // Utilisateur connecté, déterminez la redirection en fonction du rôle
    if ($_SESSION['role'] === 'Admin') {
        $redirectUrl = '/compteAdmin';
    } elseif ($_SESSION['role'] === 'user') {
        $redirectUrl = '/compteUser';
    }
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
<body>
    <header>
        <div class="imgHeader"></div>
        <label for="check" class="open-menu"><i class="fa-solid fa-house"></i></label>
        <nav class="barreNav barreNavDisplay">
            <ul>
                <input type="checkbox" id="check">
                    <li><a href="/" id="home">Boutique</a></li>
                    <li>
                        <a href="<?php echo $redirectUrl; ?>" id="compteLink">Compte</a>
                    </li>

                    <li><a href="/panier" id="panier">Panier</a></li>
                    <li><a href="/about" id="about">À Propos</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <label for="check" class="close-menu"><i class="fa-solid fa-circle-xmark"></i></label>
            </ul>
        </nav>
    </header>