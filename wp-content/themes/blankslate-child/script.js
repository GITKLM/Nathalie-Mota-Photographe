
/* MODALE */
document.addEventListener("DOMContentLoaded", function() {
  // Récupérer le bouton et la modale
  var btnModal = document.getElementById("btnModal");
  var modal = document.getElementById("myModal");

  // Ajouter un gestionnaire d'événement de clic au bouton
  btnModal.addEventListener("click", function() {
      // Afficher la modale
      modal.style.display = "block";
  });

  // Ajouter un gestionnaire d'événement pour fermer la modale en cliquant en dehors de celle-ci
  window.addEventListener("click", function(event) {
      if (event.target == modal) {
          modal.style.display = "none";
      }
  });
});

/* MODALE CONTACT CLIC */
jQuery(document).ready(function($) {
  // Ajoute un gestionnaire d'événements au clic sur l'élément de menu "Contact"
  $('#menu-item-136').on('click', function(event) {
      event.preventDefault(); // Empêche le comportement par défaut du lien

      // Affiche la modale
      $('#myModal').css('display', 'block');
  });
     // Fermer la modale au clic sur l'élément contenant la classe "close"
     $('.close').on('click', function() {
      $('#myModal').css('display', 'none'); // Cacher la modale
  });

  // Ajoute un gestionnaire d'événements pour fermer la modale en cliquant en dehors de celle-ci
  $(window).on('click', function(event) {
      if ($(event.target).is('#myModal')) {
          $('#myModal').css('display', 'none');
      }
  });
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


/* TRIE */

