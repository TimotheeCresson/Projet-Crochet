// // cart.js
// "use strict";

// const cart = JSON.parse(localStorage.getItem("cart")) || [];

// function sauvegarderPanier() {
//     localStorage.setItem("cart", JSON.stringify(cart));
// }

// export function addToCart(item) {
//     cart.push(item);
//     sauvegarderPanier();
// }

// export function getCart() {
//     return cart;
// }

// export function removeFromCart(item) {
//     const index = cart.findIndex((cartItem) => cartItem.nom === item.nom);

//     if (index !== -1) {
//         cart.splice(index, 1);
//         sauvegarderPanier();
//     }
// }
