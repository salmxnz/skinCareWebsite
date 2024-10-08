// JavaScript to toggle mobile menu
document.addEventListener('DOMContentLoaded', () => {
  const navToggle = document.getElementById('nav-toggle');
  const navMenu = document.querySelector('.nav__menu');

  if (navToggle) {
    navToggle.addEventListener('click', () => {
      navMenu.classList.toggle('show-menu');
    });
  }
});

// document.addEventListener("DOMContentLoaded", function () {
//   const dropdownToggle = document.getElementById("navbarDropdownMenuLink");
//   const dropdownMenu = dropdownToggle.nextElementSibling; // The dropdown menu

//   dropdownToggle.addEventListener("click", function (event) {
//     event.preventDefault(); // Prevent default anchor behavior
//     dropdownMenu.classList.toggle("show"); // Toggle dropdown visibility
//   });
// });
