$email = trim($_POST['email']);
                    $password = trim($_POST['password']);

                    // Effectuer le traitement de connexion
                    $userEmail = getUserByEmail($email);
                    var_dump($userEmail);
                    if ($userEmail) {
                        if(password_verify($password, $userEmail["password"])) {
                        $_SESSION["logged"] = true;
                        $_SESSION["username"] = $userEmail["username"];
                        $_SESSION["id_User"] = $userEmail["id_User"];
                        $_SESSION["email"] = $userEmail["email"]; 
                        $_SESSION["role"] = $userEmail["role"];
                        $_SESSION["expire"] = time() + 3600;

                       if ($_SESSION["role"] === "Admin") {
                            header("Location: /compteAdmin");  // Redirection page admin
                            exit;
                        } else if ($_SESSION["role"] === "user") {
                            // Gestion du panier pour les utilisateurs
                            if (!isset($_SESSION['cart'])) {
                                $_SESSION['cart'] = [];
                            }

                            $cart = $_SESSION['cart'];
                            $userCart = getUserById($_SESSION['id_User']);

                            if ($userCart) {
                                // Fusionnez le panier de session avec le panier stocké en base de données
                                $cart = array_merge($cart, $userCart);
                            }

                            header("Location: /compteUser");   // Redirection page user
                            exit;
                        }
                        // dans auth controller 


                        // ajout panier 

                        <?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

function addToCart($item) {
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Vérifiez si $_SESSION['id_User'] est défini
    if (isset($_SESSION['id_User'])) {
        $userId = $_SESSION['id_User'];

        // Assurez-vous que $_SESSION['cart'][$userId] est initialisé comme un tableau
        if (!isset($_SESSION['cart'][$userId]) || !is_array($_SESSION['cart'][$userId])) {
            $_SESSION['cart'][$userId] = [];
        }

        // Recherche de l'index du produit dans le panier
        $productIndex = array_search($item['id'], array_column($_SESSION['cart'][$userId], 'id'));

        if ($productIndex !== false) {
            // Si le produit est déjà dans le panier, augmentez la quantité
            if (isset($_SESSION['cart'][$userId][$productIndex]['quantite'])) {
                $_SESSION['cart'][$userId][$productIndex]['quantite']++;
            } else {
                // Si la clé "quantite" n'est pas définie, initialisez-la avec la valeur 1
                $_SESSION['cart'][$userId][$productIndex]['quantite'] = 1;
            }
        } else {
            // Ajoutez une nouvelle entrée pour le produit avec une quantité de 1
            $item['quantite'] = 1;
            $item['id_User'] = $userId;  // Ajout de l'ID de l'utilisateur
            $_SESSION['cart'][$userId][] = $item;
        }

        // Envoi d'une réponse JSON appropriée avec l'index
        $index = count($_SESSION['cart'][$userId]) - 1; // Index du dernier élément ajouté
        header('Content-Type: application/json');
        echo json_encode(['success' => true, 'message' => 'Item added to cart', 'index' => $index]);
        exit();
    }
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
} else {
    // Envoi d'une réponse JSON appropriée en cas de méthode non autorisée
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit();
}
?>
