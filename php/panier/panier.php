<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require(__DIR__ . "/../template/_header.php");
require __DIR__ . "/misAJourPanier/_suppression_panier.php";


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site vitrine Crochet</title>
    <!-- <script src="/importJs/panier.js" type="module" defer></script> -->
</head>
<body>
    <div id="allContent">
        <h2 class="titlePanier">
            Panier
        </h2>
        <div id="votrePanier">
            <?php
            // Check if the 'cart' key is set in the session
            if (isset($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $index => $item):
                    ?>
                    <div class="itemInCart">
                        <?php if (isset($item['photo'])): ?>
                            <img src="/img/<?php echo $item['photo']; ?>" alt="<?php echo $item['nom']; ?>"
                                 class="imgCreationNew">
                        <?php endif; ?>
                        <?php if (isset($item['nom'])): ?>
                            <p><?php echo $item['nom']; ?></p>
                        <?php endif; ?>
                        <?php if (isset($item['prix'])): ?>
                            <p>Prix: <?php echo $item['prix']; ?> €</p>
                        <?php endif; ?>
                        <button class="deleteBtn" data-item-index="<?php echo $itemIndex; ?>">Supprimer</button>
                    </div>
                <?php
                endforeach;
            } else {
                // Display a message when the cart is empty
                echo '<p>Votre panier est vide.</p>';
            }
            ?>
        </div>
        <a class="btnBoutiqueFromPanier" href="/index.php">Retourner à la boutique</a>
    </div>

    <?php
    require(__DIR__ . "/../template/_footer.php");
    ?>
    
</body>
</html>
