<?php 
session_start();

function removeFromCart($itemIndex) {
    if (isset($_SESSION["cart"][$itemIndex])) {
        unset($_SESSION['cart'][ $itemIndex ]);

        // on réindexe notre tableau après suppression
        $_SESSION['cart'] = array_values($_SESSION['cart']);
    }
}