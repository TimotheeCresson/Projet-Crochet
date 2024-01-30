<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function removeFromCart() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['removeItem'])) {
        $itemId = $_POST['removeItem'];

        if (isset($_SESSION['cart'])) {
            $productIndex = array_search($itemId, array_column($_SESSION['cart'], 'id'));

            if ($productIndex !== false) {
                // Si le produit est trouvé dans le panier, le supprimer
                unset($_SESSION['cart'][$productIndex]);
                $_SESSION['cart'] = array_values($_SESSION['cart']); // Réorganiser les indices après la suppression

                // Envoi d'une réponse JSON appropriée avec succès
                header("Location: /panier");
                // echo json_encode(['success' => true, 'message' => 'Item removed from cart']);
                exit();
            } else {
                // Si le produit n'est pas trouvé dans le panier
                header("Location: /panier");
                echo "L'article n'a pas été trouvé dans le panier";
                exit();
            }
        }
    }
}
// Appeler la fonction de suppression
removeFromCart();
?>
