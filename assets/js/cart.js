// Selecting elements
const cartShop = document.getElementById('cart-shop'); // Cart icon use of jQuery selector  
const cart = document.getElementById('cart'); // Cart container
const cartClose = document.querySelector('.cart__close'); // Close button

// Show the cart when cart icon is clicked
cartShop.addEventListener('click', () => {
  cart.classList.add('show-cart');
});

// Hide the cart when close icon is clicked
cartClose.addEventListener('click', () => {
  cart.classList.remove('show-cart');
});
