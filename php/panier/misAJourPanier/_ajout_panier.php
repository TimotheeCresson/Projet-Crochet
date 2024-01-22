<?php
session_start();

function addToCart($item) {
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Ajout de notre article dans le panier 
    $_SESSION['cart'][] = $item;
}

// Utilisation 
$patronInfo = [
    'nom' => 'Patron A',
    'prix' => 10.99,
    'photo' => 'patron_a.jpg',
];

addToCart($patronInfo);

// Envoi d'une réponse JSON appropriée
header('Content-Type: application/json');
echo json_encode(['success' => true, 'message' => 'Item added to cart']);

// var_dump($_SESSION['cart']);

exit();
?>
