const sideMenu = document.querySelector("aside");
const menuBtn = document.querySelector("#menu-btn");
const closeBtn = document.querySelector("#close-btn");

//mostrar menu
menuBtn.addEventListener('click', () => {
  sideMenu.style.display = 'block';
});


closeBtn.addEventListener('click', (event) => {
  event.preventDefault();
  sideMenu.style.display = 'none';
});