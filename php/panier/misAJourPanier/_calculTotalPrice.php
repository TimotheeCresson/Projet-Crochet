<?php 
function calculTotalPrice() {
        $totalPrice = 0;

        if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $item) {
                if (isset($item["prix"], $item["quantite"])) {
                    $totalPrice += $item["prix"] * $item['quantite'];
                }
        }
    }
    return $totalPrice;
}

$totalPanier = calculTotalPrice();
