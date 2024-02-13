
/* MODALE */
// Trouver le bouton pour ouvrir la modale
var modalLink = document.querySelector('a[href="#myModal"]');

// Trouver la modale
var modal = document.getElementById('myModal');

// Trouver le bouton de fermeture
var closeButton = document.querySelector('.close');

// Ouvrir la modale quand le bouton est cliqué
modalLink.addEventListener('click', function() {
  modal.style.display = 'block';
});

// Fermer la modale quand le bouton de fermeture est cliqué
closeButton.addEventListener('click', function() {
  modal.style.display = 'none';
});
