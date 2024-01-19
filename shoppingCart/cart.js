"use strict";
const cart = [];

export function addToCart(item) {
    cart.push(item);
}
export function getCart() {
    return cart;
}