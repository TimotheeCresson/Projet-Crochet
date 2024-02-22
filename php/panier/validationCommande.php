<?php
require __DIR__ ."/../template/_header.php";
require __DIR__ . "/misAJourPanier/_calculTotalPrice.php";
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validation de Commande</title>
</head>
<body>
    <div class="validationCommande">
        <h2>Validation de Commande</h2>

        <?php
        // Vérifier si le panier existe et n'est pas vide
        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])):
            $totalPanier = calculTotalPrice();
        ?>
            
        <form class="formValidationPanier" action="process_commande.php" method="post">
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" required>

            <label for="nom">Prénom :</label>
            <input type="text" id="prenom" name="prenom" required>

            <label for="pays">Pays :</label>
            <select name="pays" id="pays">
                <option value="" disabled selected>Votre pays</option>
            </select>

            <label for="adresse">Adresse de livraison :</label>
            <textarea id="adresse" name="adresse" required></textarea>

            <label for="cp">Code Postal :</label>
            <input type="number" name="cp" id="cp">

            <label for="ville">Ville :</label>
            <input type="text" name="ville" id="ville">

            <label for="telephone">Numéro de téléphone :</label>
            <input type="tel" name="telephone" id="telephone">

            <label for="email">Email :</label>
            <input type="email" name="email" id="email">
            </form>
            
            <table class="tableValidationPanier">
                <thead>
                    <tr>
                        <th>Produit</th>
                        <th>Quantité</th>
                        <th>Prix Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($_SESSION['cart'] as $item):
                        // Afficher les détails du produit et calculer le total pour chaque produit
                        $totalItem = $item['prix'] * $item['quantite'];
                    ?>
                    <tr>
                        <td><?php echo $item['nom']; ?></td>
                        <td><?php echo $item['quantite']; ?></td>
                        <td><?php echo $totalItem; ?> €</td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <!-- Afficher le prix total -->
            <p>Total à payer : <?php echo $totalPanier ?> €</p>

            <button type="submit">Payer</button>
    </div>
    <?php endif; ?>
</body>
</html>

<?php 
require __DIR__ ."/../template/_footer.php";
?>
