<?php 
    require(__DIR__."/../../template/_header.php");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site vitrine Crochet</title>
    <!-- <script src="main.js" defer type="module"></script> 
    <script src="/JS/patronPage.js" type="module" defer></script>-->
</head>
<body>
    <div id="allContent">
        <h2 class="titlePanier">
            Panier
        </h2>
        <div id="votrePanier"></div>
        <div id="cartItems"></div>
        <button class="btnBoutiqueFromPanier">Retourner à la boutique</button>
    </div>

<?php 
    require(__DIR__."/../../template/_footer.php");
?>