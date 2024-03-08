// SECTION 1

document.addEventListener('click', function(event) {
  const isDropdownClick = event.target.closest('.dropdown-content');
  const dropdowns = document.querySelectorAll('.dropdown-content');

  // Fermer tous les menus déroulants sauf celui qui a été activé
  dropdowns.forEach(function(menu) {
    if (menu !== isDropdownClick && menu.style.display === 'block') {
      menu.style.display = 'none';
    }
  });
});

function dropdown(menuId) {
  const dropdownContent = document.getElementById(menuId);

  // Inverser l'état d'affichage du menu
  dropdownContent.style.display = (dropdownContent.style.display === 'block') ? 'none' : 'block';

  // Fermer tous les autres menus déroulants
  const allMenus = document.querySelectorAll('.dropdown-content');
  allMenus.forEach(function(menu) {
    if (menu.id !== menuId && menu.style.display === 'block') {
      menu.style.display = 'none';
    }
  });
}

function selectOption(option) {
  document.getElementById('selectedOption').innerText = option;
  toggleDropdown('menu1');
}

// Ajouter un gestionnaire d'événements pour chaque élément de carte
const cards = document.querySelectorAll('.card1');
cards.forEach(function(card) {
  card.addEventListener('click', function(event) {
    event.stopPropagation(); // Éviter la propagation de l'événement au gestionnaire global
    const menuId = card.dataset.menuId;
    dropdown(menuId);
  });
});