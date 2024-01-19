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
    
    
    <script src="/importJs/panier.js" type="module" defer></script>
</head>
<body>
    <div id="allContent">
        <h2 class="titlePanier">
            Panier
        </h2>
        <div id="votrePanier"></div>
        <div id="cartItems"></div>
        <a class="btnBoutiqueFromPanier" href="/index.php">Retourner à la boutique</a>
    </div>




<?php 
    require(__DIR__."/../../template/_footer.php");
?>