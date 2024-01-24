<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require(__DIR__ . "/../template/_header.php");
require __DIR__ . "/misAJourPanier/_suppression_panier.php";
require __DIR__ . "/misAJourPanier/_calculTotalPrice.php";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site vitrine Crochet</title>
    <!-- <script src="/importJs/panier.js" type="module" defer></script> -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
    <body>
        <div id="allContentPanier">
            <h2 class="titlePanier">
                Panier
            </h2>
            <div id="votrePanier">
                <?php
                // Check if the 'cart' key is set in the session
                if (isset($_SESSION['cart'])):
                ?>
                <form action="" method="post">
                    <table>
                        <thead>
                            <tr>
                                <th class="colonne colonneSupprimer">Supprimer</th>
                                <th class="colonne colonneDuProduit">Produit</th>
                                <th class="colonne colonneNom">Nom</th>
                                <th class="colonne colonnePrix">Prix</th>
                                <th class="colonne colonneQuantité">Quantité</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($_SESSION['cart'] as $index => $item):
                            ?>
                            <tr>
                                <!--<td class="boutonSupprimer colonneDuProduit">
                                    <button type="submit" name="removeItem" value="<?php echo $item['id']; ?>"><i class="fa-solid fa-trash-can"></i></button>
                                </td>-->
                                <input type="hidden" name="removeItem" value="<?php echo $item['id']; ?>">
                                <td class="boutonSupprimer colonneDuProduit">
                                    <button type="submit" name="removeItemBtn"><i class="fa-solid fa-trash-can"></i></button>
                                </td>

                                <td class="produit colonneDuProduit">
                                    <?php if (isset($item['photo'])): ?>
                                        <img src="/img/<?php echo $item['photo']; ?>" alt="<?php echo $item['nom']; ?>" class="imgPanier">
                                    <?php endif; ?>
                                </td>
                                <td class="nom colonneDuProduit">
                                <?php if (isset($item['nom'])): ?>
                                    <p><?php echo $item['nom']; ?></p>
                                <?php endif; ?>
                                </td>
                                <td class="prix colonneDuProduit">
                                    <?php if (isset($item['prix'])): ?>
                                        <p><?php echo $item['prix']; ?> €</p>
                                    <?php endif; ?>
                                </td>
                                <td class="quantité colonneDuProduit">
                                    <?php if (isset($item['quantite'])): ?>
                                        <p><?php echo $item['quantite']; ?></p>
                                    <?php endif; ?>
                                </td>   
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </form>
                <div class="afterTablePanier">
                    <div class="totalPanier">
                        <p>Le total de votre panier est de <?php echo $totalPanier ?> € </p>
                    </div>   
                        <a class="btnBoutiqueFromPanier" href="../panier/validationCommande.php">Valider la commande</a>
                    <?php else: ?>
                        <!-- Display a message when the cart is empty -->
                        <p>Votre panier est vide.</p>
                    <?php endif; ?>
                    <a class="btnBoutiqueFromPanier" href="/index.php">Retourner à la boutique</a>
                </div>
            </div>
        </div>
    </body>
</html>
<?php
require(__DIR__ . "/../template/_footer.php");
?>