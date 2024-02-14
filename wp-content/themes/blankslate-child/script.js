
/* MODALE */

// var modalLink = document.querySelector('a[href="#myModal"]');


// var modal = document.getElementById('myModal');


// var closeButton = document.querySelector('.close');


// modalLink.addEventListener('click', function() {
//   modal.style.display = 'block';
// });

// closeButton.addEventListener('click', function() {
//   modal.style.display = 'none';
// });



/* FILTRE */
jQuery(document).ready(function($) {
  // Lorsqu'un élément de la liste est sélectionné
  $('.filter-select').change(function() {
      // Soumettre automatiquement le formulaire
      $('#filter-form').submit();
  });
});

/* TEST CHargement des images */
document.addEventListener('DOMContentLoaded', function() {
  const imageRow = document.getElementById('image-row');
  const loadMoreButton = document.getElementById('load-more');
  const maxImagesPerPage = 8; // Nombre maximum d'images à afficher par page
  let loadedImages = 0; // Nombre d'images actuellement chargées

  // Fonction pour charger les images suivantes
  function loadMoreImages() {
      const imagesToLoad = 8; // Nombre d'images à charger
      for (let i = 0; i < imagesToLoad; i++) {
          if (loadedImages >= maxImagesPerPage) return; // Arrêtez le chargement si le nombre maximum d'images est atteint
          const imageContainer = document.createElement('div');
          imageContainer.classList.add('column');
          const image = document.createElement('img');
          image.src = 'URL_DE_L_IMAGE'; // Remplacez 'URL_DE_L_IMAGE' par l'URL de l'image à charger
          image.alt = 'Description de l\'image'; // Ajoutez une description de l'image
          imageContainer.appendChild(image);
          imageRow.appendChild(imageContainer);
          loadedImages++;
      }
  }

  // Gérer le clic sur le bouton "Charger plus d'images"
  loadMoreButton.addEventListener('click', function() {
      loadMoreImages();
  });

  // Charger les premières images au chargement de la page
  loadMoreImages();
});


