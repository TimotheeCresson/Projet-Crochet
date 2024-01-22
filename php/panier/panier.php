<?php 
    session_start(); // Make sure to start or resume the session

    require(__DIR__."/../template/_header.php");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site vitrine Crochet</title>
    <script src="/importJs/panier.js" type="module" defer></script>
</head>
<body>
    <div id="allContent">
        <h2 class="titlePanier">
            Panier
        </h2>

        <?php 
        // Check if the 'cart' key is set in the session
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $item): ?>
                <div class="itemInCart">
                    <img src="/img/<?php echo $item['photo']; ?>" alt="<?php echo $item['nom']; ?>" class="imgCreationNew">
                    <p><?php echo $item['nom']; ?></p>
                    <p>Prix: <?php echo $item['prix']; ?> €</p>
                    <button class="deleteBtn" onclick="deleteItem('<?php echo $item['nom']; ?>')">Supprimer</button>
                </div>
            <?php endforeach;
        } else {
            // Display a message when the cart is empty
            echo '<p>Votre panier est vide.</p>';
        }
        ?>

        <a class="btnBoutiqueFromPanier" href="/index.php">Retourner à la boutique</a>
    </div>

<?php 
    require(__DIR__."/../template/_footer.php");
?>
