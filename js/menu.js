const $menu = document.querySelector('nav');
const $targetMenu = document.querySelector('.hbg-menu');

$menu.addEventListener('click', toggleMenu);


function toggleMenu() {
  $targetMenu.classList.toggle('show');
}