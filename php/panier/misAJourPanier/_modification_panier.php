<?php 
session_start();

function updateCartItemQuantity($itemIndex, $newQuantity) {
    if (isset($_SESSION["cart"][$itemIndex])) {
        $_SESSION['cart'][$itemIndex]['quantite'] = $newQuantity;
    }
}