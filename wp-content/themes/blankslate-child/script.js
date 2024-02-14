
/* MODALE */

// Sélectionnez le lien de menu vers la modale de contact
var modalLink = document.querySelector('nav a[href="#modal-contact"]');

// Sélectionnez la modale de contact
var modal = document.getElementById('myModal');

// Sélectionnez le bouton de fermeture de la modale
var closeButton = modal.querySelector('.close');

// Ajoutez un gestionnaire d'événements pour ouvrir la modale lorsque le lien de menu est cliqué
modalLink.addEventListener('click', function(event) {
  event.preventDefault(); // Empêche le comportement par défaut du lien
  modal.style.display = 'block'; // Affiche la modale de contact
});

// Ajoutez un gestionnaire d'événements pour fermer la modale lorsque le bouton de fermeture est cliqué
closeButton.addEventListener('click', function() {
  modal.style.display = 'none'; // Masque la modale de contact
});




/* FILTRE */
jQuery(document).ready(function($) {
  // Lorsqu'un élément de la liste est sélectionné
  $('.filter-select').change(function() {
      // Soumettre automatiquement le formulaire
      $('#filter-form').submit();
  });
});

/* TEST CHargement des images */

// document.addEventListener('DOMContentLoaded', function() {
//   const imageRow = document.getElementById('image-row');
//   const loadMoreButton = document.getElementById('load-more');
//   const maxImagesPerPage = 8;
//   let loadedImages = 0;

//   function loadMoreImages() {
//       const imagesToLoad = 8;
//       for (let i = 0; i < imagesToLoad; i++) {
//           if (loadedImages >= maxImagesPerPage) return;
//           const imageContainer = document.createElement('div');
//           imageContainer.classList.add('column');
//           const image = document.createElement('img');
//           image.src = 'URL_DE_L_IMAGE';
//           image.alt = 'Description de l\'image';
//           imageContainer.appendChild(image);
//           imageRow.appendChild(imageContainer);
//           loadedImages++;
//       }
//   }

//   loadMoreButton.addEventListener('click', function() {
//       loadMoreImages();
//   });

//   loadMoreImages();
// });


