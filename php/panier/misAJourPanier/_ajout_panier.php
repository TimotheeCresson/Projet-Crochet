<?php
// session_start();

// function addToCart($item) {
//     if (!isset($_SESSION['cart'])) {
//         $_SESSION['cart'] = [];
//     }

//     // Ajout de notre article dans le panier 
//     $_SESSION['cart'][] = $item;
// }

// // Utilisation 
// $patronInfo = [
//     'nom' => $item['nom'],
//     'prix' => $item['prix'],
//     'photo' => $item['photo'],
// ];

// addToCart($patronInfo);

// // Envoi d'une réponse JSON appropriée
// header('Content-Type: application/json');
// echo json_encode(['success' => true, 'message' => 'Item added to cart']);

// // var_dump($_SESSION['cart']);

// exit();

session_start();

function addToCart($item) {
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Ajout de notre article dans le panier 
    $_SESSION['cart'][] = $item;
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

    // Envoi d'une réponse JSON appropriée avec l'index
    $index = count($_SESSION['cart']) - 1; // Index du dernier élément ajouté
    header('Content-Type: application/json');
    echo json_encode(['success' => true, 'message' => 'Item added to cart', 'index' => $index]);
    exit();
} else {
    // Envoi d'une réponse JSON appropriée en cas de méthode non autorisée
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit();
}


