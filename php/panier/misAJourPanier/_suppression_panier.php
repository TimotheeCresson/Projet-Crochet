<?php 
// session_start();

// function removeFromCart($itemIndex) {
//     if (isset($_SESSION['cart'][$itemIndex])) {
//         // Supprimer l'élément du panier
//         unset($_SESSION['cart'][$itemIndex]);

//         // Réindexer le tableau après la suppression
//         $_SESSION['cart'] = array_values($_SESSION['cart']);

//         // Envoi d'une réponse JSON appropriée
//         header('Content-Type: application/json');
//         echo json_encode(['success' => true, 'message' => 'Item removed from cart']);
//         exit();
//     } else {
//         // Envoi d'une réponse JSON appropriée en cas d'erreur
//         header('Content-Type: application/json');
//         echo json_encode(['success' => false, 'message' => 'Item not found in cart']);
//         exit();
//     }
// }
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
function removeFromCart($itemId) {
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $itemIndex => $item) {
            if (isset($item['id']) && $item['id'] === $itemId) {
                var_dump($item['id']);
                // Supprimer l'image associée
                if (isset($item['photo'])) {
                    $imagePath = __DIR__ . "/./img/" . $item['photo'];
                    if (file_exists($imagePath)) {
                        unlink($imagePath); // Supprimer le fichier image
                    }
                }

                // Supprimer l'élément du panier
                unset($_SESSION['cart'][$itemIndex]);

                // Réindexer le tableau après la suppression
                $_SESSION['cart'] = array_values($_SESSION['cart']);

                // Envoi d'une réponse JSON appropriée
                header('Content-Type: application/json');
                echo json_encode(['success' => true, 'message' => 'Item removed from cart']);
                exit();
            }
        }
    }

    // Envoi d'une réponse JSON appropriée en cas d'erreur
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'message' => 'Item not found in cart']);
    exit();
}



?>
