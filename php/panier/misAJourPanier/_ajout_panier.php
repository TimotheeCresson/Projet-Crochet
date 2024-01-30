<?php
session_start();
function addToCart($item) {
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Recherche de l'index du produit dans le panier
    $productIndex = array_search($item['id'], array_column($_SESSION['cart'], 'id'));

    if ($productIndex !== false) {
        // Si le produit est déjà dans le panier, augmenter la quantité
        $_SESSION['cart'][$productIndex]['quantite']++;
    } else {
        // Ajouter une nouvelle entrée pour le produit avec une quantité de 1
        $item['quantite'] = 1;
        $_SESSION['cart'][] = $item;
    }

    // Envoi d'une réponse JSON appropriée avec l'index
    $index = count($_SESSION['cart']) - 1; // Index du dernier élément ajouté
    header('Content-Type: application/json');
    echo json_encode(['success' => true, 'message' => 'Item added to cart', 'index' => $index]);
    exit();
}

// Vérifier si les données POST sont présentes
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données JSON envoyées depuis le client
    $json_data = file_get_contents("php://input");
    $patronInfo = json_decode($json_data, true);
    
    // Vérifier si la conversion JSON s'est bien passée
    if ($patronInfo === null) {
        // Envoi d'une réponse JSON appropriée en cas d'erreur
        header('Content-Type: application/json');
        echo json_encode(['success' => false, 'message' => 'Invalid JSON data']);
        exit();
    }

    addToCart($patronInfo);
    header('Content-Type: application/json');
    echo json_encode(['success' => true, 'message' => 'Ajouté au Panier']);
    exit();
} else {
    // Envoi d'une réponse JSON appropriée en cas de méthode non autorisée
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit();
}


